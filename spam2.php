
<form action="" method="post">
<textarea name="msg" class="form-control"></textarea>
<br>
<input type="submit" name="submit" class='btn btn-primary'>
</form>
<br />
<?php
$msgResponds="";
if(isset($_POST['submit']))
{

$data=$_POST['msg'];

//echo $data;


$myFile = "input.txt";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = $data;
fwrite($fh, $stringData);
fclose($fh);

 $python=`python test.py`;
$msgResponds=file_get_contents('output.txt', true);
$data=mysqli_real_escape_string($con,$data);
//echo "<br><b>".$msgResponds."</b>";
mysqli_query($con,"INSERT INTO wall(msg,status,user,friend) VALUES('$data','$msgResponds','$_SESSION[email]','$receiver')");


   

}


?>