import csv
import pandas as pd

data = pd.read_csv('data.csv', error_bad_lines=False)

col = data['tweet']

rows = []
for i in col:
    txt = i.split()
    label = txt[-1]
    txt = txt[:-1]
    tweet = ' '
    tweet = tweet.join(txt)
    #print(tweet)
    #print(label)
    rows.append([tweet,label])

print(rows)

fields = ['tweet', 'label'] 

with open('data_final.csv', 'w', encoding='utf-8') as csvfile:  
    csvwriter = csv.writer(csvfile)
    csvwriter.writerow(fields)
    csvwriter.writerows(rows)

