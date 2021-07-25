<?php
session_start(0);
include("connectionclass.php");
include("header.php");
?> <div class="col-sm-6">
 <br><?php
 if($_REQUEST['request']==1)
 {
	mysqli_query($con,"INSERT INTO frd(frd_id,frd2_id,status) VALUES('$_SESSION[user_id]','$_REQUEST[frd_id]','Process')") or die("error".mysqli_error($con));
//echo ",mhkjkkj";
 
 }
 include("search.php");
 
 ?>
  
  </div>
  
  
  
  <?php
  include("right.php");
  
  ?>