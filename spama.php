
<form action="" method="post" enctype="multipart/form-data">
<textarea name="msg" class="form-control" placeholder="Enter the message"></textarea><br>

<input type="submit" name="submit" class='btn btn-primary'>
</form>
<br /> 
<?php
$msgResponds="";
if(isset($_POST['submit']))
{

///$data="semantic similarity for Knowledge Graphs (KGs). It is easy to use Sematch to compute semantic similarity scores of concepts, claims you are winner";
$data=$_POST['msg'];
$target_path = "uploads/";

//$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

//move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path) ;
   

//echo $data;



$myFile = "input.txt";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = $data;
fwrite($fh, $stringData);
fclose($fh);

 $python=`python test.py`;
$msgResponds=file_get_contents('output.txt', true);
$data=mysqli_real_escape_string($con,$data);
$res=mysqli_query($con,"INSERT INTO activity(msg,status,user,photo) VALUES('$data','$msgResponds','$_SESSION[email]','$target_path')");
if($res)
{
move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path) ;
}

}

  
  
  
?>