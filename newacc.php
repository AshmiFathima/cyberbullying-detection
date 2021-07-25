<?php
error_reporting(0);

?>
 
  <style>
  .page-header2
  {
	background:#141D29;
	color:#FFF;  
	height:60px;
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
 



<html>
  <head>
    <meta name="viewport" content="width=device-width" content="initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/new3.css" rel="stylesheet">
   </head>
<body>

<div class="col-sm-12 page-header2">
  <div class="col-sm-4"><h2>Bubble </h2></div>
   <div class="col-sm-8 tmenu">
  </div>
  </div>

  <div id="p3">
   <div class="container">
    <div class="row-justify-content-center">
     <div class="col-sm-5">
      <h1><center>Create New Account</center></h1><br>
      
  
	
         <form action="newaccexe.php" method="POST" enctype="multipart/form-data">
         <div id="t1">
         <input type="text" name="fname" placeholder="First Name" id="ip1" required><br><br>
         <input type="text" name="lname" placeholder="Last Name" id="ip1" required><br><br>
         <input type="email" name="email" placeholder="Email ID" id="ip1" required ><br><br>
         <input type="text" name="contact" placeholder="Contact No" id="ip1" required><br><br>
	     Birthday : <input id="date" name="dob" type="date" placeholder="Birthday" required><br><br>
         <input type="radio" name="gender" value="male" required > Male
         <input type="radio" name="gender" value="female" required> Female<br><br>
         <input type="text" name="organization" placeholder="Organization" id="ip1" required><br><br>
         <input type="text" name="place" placeholder="Place" id="ip1" required><br><br>
         <input type="text" name="username" placeholder="User/Login Name" id="ip1" required><br><br>
		 <input type="password" name="password" placeholder="Password" id="ip1" required><br><br>
         Profile Pic : <input type="file" name="profile_pic" placeholder="Profile Pic" id="ip2" ><br><br>
         <input type="Submit" value="Register Account" name="register" style=" height: 30px; width: 250px" id="p1">
        </div>
        </form>
        
        
        
        
        
       </div>
      </div>
    </div> 
   </div>
 </body>
</html>