<?php
error_reporting(0);
session_start();
	session_destroy();
	session_unset();
$status=$_REQUEST['status'];
if($status=="error")
{
?>	
	<script type="text/javascript">
	alert("Sorry : Username or Password Error");
	</script>
	
<?php	
}

if($status=="success")
{
?>	
	<script type="text/javascript">
	alert("Account Successfully Created");
	</script>
	
<?php	
}

if($_REQUEST['st']=="logout")
{
	header("location:login.php");
}
?>


<html>
 

<head>
 <meta name="viewport" content="width=device-width" content="initial-scale=1">
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/log.css" rel="stylesheet">
</head>
<body>
<?php
include("nav.php");
?>
  <div id="p3">
  <div class="container" id="id1">
  <div class="row-justify-content-center">
  <div class="col-sm-5">
     <h1><center>LOGIN</center></h1><br>
     <form action="loginexe.php" method="POST">
     <div id="t1">
     Username : <input type="email" name="email" placeholder="Enter your email" required id="ip1"><br><br>
     Password : <input type="password" name="password" placeholder="Password" required id="ip1"><br><br>
     </div>
     <div class="text-center"><input type="Submit" value="Login" style="height: 40px; width: 250px" id="p1"></div><br>
   </form>
   <form>
     <div class="text-center"><input type="Submit" value="Create New Account" formaction="newacc.php"style="height: 40px; width: 250px" id="p2"></div><br>
    </form> 
   </div>
   </div>
   </div>
   </div>
   </div>
</body>
</html>