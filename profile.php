<?php
error_reporting(0);
session_start();
include("connectionclass.php");
include("header.php");
//$db_name="music"; // Database name 
$tbl_name="profile_tb"; // Table name 
 $result = mysqli_query($con,"SELECT * FROM $tbl_name WHERE id='$_SESSION[user_id]' ") or die('Could not connect: ' . mysqli_error($con));

$row = mysqli_fetch_array($result);

?>

<div class="col-sm-6">



<div class="container" >

      
  <table class="table table-striped table-bordered" style="width:615px;">
   
    <tbody>
    <br>
    <br>
 <tr>
 <td colspan="2" align="center">
 <center>
  <img src="<?php echo $row['profile_pic']; ?>" class="img-circle" width="100px" height="100px">
  </center>
  </td>
  </tr>
     <tr>
        <th class="col-sm-4">First Name</th>
        <td><?php echo $row["fname"]; ?></td>
       
      </tr>
  
      
         <tr>
        <th>Last Name</th>
        <td><?php echo $row["lname"]; ?></td>
       
      </tr>
     
     
      <tr>
        <th>Email</th>
        <td><?php echo $row["email"]; ?></td>
       
      </tr>
      
      <tr>
        <th>Gender</th>
        <td><?php echo $row["gender"]; ?></td>
       
      </tr>
      
      
      
       <tr>
        <th>DOB</th>
        <td><?php echo $row["dob"]; ?></td>
       
      </tr>
 
    </tbody>
    
  </table> <br/><br/>
 
  
     
  
  
</div>






  </div>
  <?php
  include("right.php");
  
  ?>