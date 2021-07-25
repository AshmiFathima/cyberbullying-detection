import pandas as pd
import re
import pickle
from keras.preprocessing.sequence import pad_sequences
import numpy as np
from keras.models import load_model

txt = []
f = open('input.txt','r')
txt.append(f.read())
f.close()

df = pd.DataFrame(txt, columns =['text']) 

def preprocess_text(sen):
    sentence = remove_tags(sen)
    sentence = re.sub('[^a-zA-Z]', ' ', sentence)
    sentence = re.sub(r"\s+[a-zA-Z]\s+", ' ', sentence)
    sentence = re.sub(r'\s+', ' ', sentence)
    return sentence
	
TAG_RE = re.compile(r'<[^>]+>')
def remove_tags(text):
    return TAG_RE.sub('', text)
	
X = []
sentences = list(df['text'])
for sen in sentences:
    X.append(preprocess_text(sen))

f = open('tokenizer.pickle','rb')
tokenizer = pickle.load(f)
f.close()

X = tokenizer.texts_to_sequences(X)

vocab_size = len(tokenizer.word_index) + 1
maxlen = 100

X_test = pad_sequences(X, padding='post', maxlen=maxlen)

model = load_model('model_final.model')

pred = model.predict(X_test)

classes = np.load('class_names.npy')

pred_class = classes[np.argmax(pred)]

f = open('output.txt','w')
f.write(str(pred_class))
f.close()