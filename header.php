<?php
error_reporting(0);
if($_SESSION['email']=="")
{
	header("location:login.php");
}
?><!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Cyberbullying</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
   <link href="css/log.css" rel="stylesheet">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  
  <style>
  .page-header2
  {
	background:#141D29;
	color:#FFF;  
	height:60px;
  }
   .menu2 
  {
	  
	border-radius:10px;
  }
  .menu2 a
  {
	color:#FFF;  
	
  }
  .page-header2 a
  {
	  float:right;
	color:#FFF;  
  }
  .tmenu
  {
	margin-top:15px;  
  }
  
  .right
  {
	background:#F5F5F5; 
	height:100%;
	min-height:600px;
  }
  
  .menu
  {
	background:#F0F0F0; 
	height:100%;
	min-height:600px;
	 
  }
  .menu ul
  {
list-style-type:none ;
margin-left:-10px;
  }
   .menu li
  {
height:30px; 
font-size:16px;
  }
  .glyphicon
  {
	color:#06F; 
	margin-right:10px; 
  }
  </style>
  <div class="col-sm-12 page-header2" >
  <div class="col-sm-4"><h2>Bubble </h2></div>
   <div class="col-sm-8 tmenu">
   
  <a href="index.php" class="nav-btn" style="margin-left:20px;"> Welcome <?php echo $_SESSION['fname'] ?></a>
  
  </div>
  </div>
  <div class="col-sm-3 menu" >
<br>
  <ul style="background:#333;" class='menu2'>
 
  <li><a class="active nav-btn"></a></li>
   <li>   <span class="glyphicon glyphicon-home"></span>   <a href="index.php" class="nav-btn">Home</a></li>
   <li>   <span class="glyphicon glyphicon-user"></span>   <a href="profile.php" class="nav-btn">Profile</a></li>
   <!--
    <li>   <span class="glyphicon glyphicon-bitcoin"></span>   <a href="skills.php" class="nav-btn">Skills</a></li>
     <li>   <span class="glyphicon glyphicon-education"></span>   <a href="exp.php" class="nav-btn">Experiance</a></li>
     <li>   <span class="glyphicon glyphicon-ban-circle"></span>   <a href="edu.php" class="nav-btn">Education</a></li>
	 -->
  </ul>
  <ul style="background:#333;" class="menu2">
 
  <li><a class="active nav-btn"></a></li>
   
 
  <li>  <span class="glyphicon glyphicon-search"></span>  <a class="active nav-btn" href="friend_search.php">Friend Search</a></li>
 
  <li>   <span class="glyphicon glyphicon-user"></span>  <a href="frd_request.php" class="nav-btn">Friend Requests</a></li>
  <li>   <span class="glyphicon glyphicon-user"></span> <a href="frd_list.php" class="nav-btn">Friends List</a></li>
<!--
  <li>  <span class="glyphicon glyphicon-paperclip"></span>  <a href="create_group.php">Create Group</a></li>
    <li>  <span class="glyphicon glyphicon-equalizer"></span>  <a href="spamh.php">Add Events</a></li>
     <li>  <span class="glyphicon glyphicon-equalizer"></span>  <a href="spamh.php">Add Internship</a></li>
	  <li>  <span class="glyphicon glyphicon-send"></span>  <a href="gchatpass.php">Group Chat</a></li>
	  
	 
      <li>  <span class="glyphicon glyphicon-send"></span>  <a href="chatpass.php">Chat Now</a></li>
      -->  
<!-- <li> <a href="nwpage.php">Create Page</a></li> -->
  <li> <span class="glyphicon glyphicon-log-out"></span> <a href="login.php?st=logout">Log Out</a><br></li>
    <li> <br></li>
 
 
  </ul>
  

	  
	  <?php
	  session_start();
  include("connectionclass.php");
  $sql2 = "select COUNT(*) as cc from activity where status!='none' and user='$_SESSION[email]' ";
    $result2 = mysqli_query($con, $sql2) or die("Error in Selecting " . mysqli_error($connection));
$row2 =mysqli_fetch_array($result2);
		$x=$row2['cc'];
		$sql2 = "select COUNT(*) as cc from wall where status!='none' and user='$_SESSION[email]' ";
    $result2 = mysqli_query($con, $sql2) or die("Error in Selecting " . mysqli_error($connection));
$row2 =mysqli_fetch_array($result2);
		$y=$row2['cc'];
		
		$z=$x+$y;
		
		
		if($z==1)
		{	
			echo"<div class='col-sm-12'><h2>Alert </h2><br>
			
			Warning !!!!!!!! You have created a harmful post. Please be careful.
			
			</div>";
			
		}
		if($z>=2)
		{
			echo"<div class='col-sm-12'><h2>Alert </h2><br>
			
			Warning !!!!!!!! You have created a harmful post. You will be reported if you continue. Please be careful. Cyberbullying posts count: $z
			
			</div>";
			
		}
		if($z>3)
		{
			include('mail.php');
			header("location:login.php");
			
		}
		//if($z>5)
		//{
			//include('login.php');
			//header("location:login.php");
			
		//}
  ?>

  </div>

  