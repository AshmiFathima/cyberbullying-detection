<?php
include("connectionclass.php");
if(isset($_POST['register']))
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$organization=$_POST['organization'];
$place=$_POST['place'];
$username=$_POST['username'];
$password=$_POST['password'];


$uploadDir = 'Profile Pics/';
$fileName = $_FILES['profile_pic']['name'];
$tmpName = $_FILES['profile_pic']['tmp_name'];
$fileSize = $_FILES['profile_pic']['size'];
$fileType = $_FILES['profile_pic']['type'];	
date_default_timezone_set("Asia/Calcutta");  
$filePath = $uploadDir .date('d-m-Y H-i-s'). "-".$fileName;  
$result = move_uploaded_file($tmpName, $filePath);

$data=mysqli_query($con,"SELECT * FROM facebook WHERE fname='$fname'");
if(mysqli_num_rows($data)>0)
{
	mysqli_query($con,"INSERT INTO profile_tb(fname,place,username,password,profile_pic) VALUES ('$fname','$place','$username','$password','$filePath')");
	$last_id=mysqli_insert_id($con);
	
	$data1=mysqli_query($con,"SELECT * FROM facebook WHERE lname='$lname'");
	if(mysqli_num_rows($data1)>0)
	{
	mysqli_query($con,"UPDATE profile_tb SET lname='$lname' WHERE id='$last_id'");
	$data2=mysqli_query($con,"SELECT * FROM facebook WHERE email='$email'");
	if(mysqli_num_rows($data2)>0)
	{
	mysqli_query($con,"UPDATE profile_tb SET email='$email' WHERE id='$last_id'");
	$data3=mysqli_query($con,"SELECT * FROM facebook WHERE contact='$contact'");
	if(mysqli_num_rows($data3)>0)
	{
	mysqli_query($con,"UPDATE profile_tb SET contact='$contact' WHERE id='$last_id'");
	$data4=mysqli_query($con,"SELECT * FROM facebook WHERE dob='$dob'");
	if(mysqli_num_rows($data4)>0)
	{
	mysqli_query($con,"UPDATE profile_tb SET dob='$dob' WHERE id='$last_id'");
	$data5=mysqli_query($con,"SELECT * FROM facebook WHERE gender='$gender'");
	if(mysqli_num_rows($data5)>0)
	{
	mysqli_query($con,"UPDATE profile_tb SET gender='$gender' WHERE id='$last_id'");
	$data6=mysqli_query($con,"SELECT * FROM facebook WHERE organization='$organization'");
	if(mysqli_num_rows($data6)>0)
	{
	mysqli_query($con,"UPDATE profile_tb SET organization='$organization' WHERE id='$last_id'");
	header("location:login.php?status=success");
	}
	else
	{
		header("location:newacc.php?status=organization&&last_id=$last_id&&fname=$fname&&lname=$lname&&email=$email&&contact=$contact&&dob=$dob&&gender=$gender&&organization=$organization");
	}
	}
	else
	{
		header("location:newacc.php?status=gender&&last_id=$last_id&&fname=$fname&&lname=$lname&&email=$email&&contact=$contact&&dob=$dob&&gender=$gender&&organization=$organization");
	}
	}
	else
	{
		header("location:newacc.php?status=dob&&last_id=$last_id&&fname=$fname&&lname=$lname&&email=$email&&contact=$contact&&dob=$dob&&gender=$gender&&organization=$organization");
	}
	}
	else
	{
		header("location:newacc.php?status=contact&&last_id=$last_id&&fname=$fname&&lname=$lname&&email=$email&&contact=$contact&&dob=$dob&&gender=$gender&&organization=$organization");
	}
	}
	else
	{
		header("location:newacc.php?status=email&&last_id=$last_id&&fname=$fname&&lname=$lname&&email=$email&&contact=$contact&&dob=$dob&&gender=$gender&&organization=$organization");
	}
	}
	else
	{
		header("location:newacc.php?status=lname&&last_id=$last_id&&fname=$fname&&lname=$lname&&email=$email&&contact=$contact&&dob=$dob&&gender=$gender&&organization=$organization");
	}
	
}


else
{

$query="INSERT INTO profile_tb(fname,lname,email,contact,dob,gender,organization,place,username,password,profile_pic) VALUES ('$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[contact]','$_POST[dob]','$_POST[gender]','$_POST[organization]','$_POST[place]','$_POST[username]','$_POST[password]','$filePath')";
if(mysqli_query($con,$query))
   {
     header("location:login.php?status=success");
   }
 else
 {
  echo "Error:" .mysqli_error($con);
 }
}
}
?>
 