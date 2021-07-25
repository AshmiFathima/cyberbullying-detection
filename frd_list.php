<?php
session_start(0);
include("connectionclass.php");
include("header.php");
?> <div class="col-sm-6">
 <br><?php
 if($_REQUEST['status']!="")
 {
	mysqli_query($con,"update frd set status='$_REQUEST[status]' where id='$_REQUEST[tid]'") or die("error".mysqli_error($con));
//echo ",mhkjkkj";
 
 }

 

  echo " <table class='table'>
  <tr><th>Friend Name</th><th>Status</th><th>Wall Post</th><th>Block</th></tr>
  ";
 // $result1=mysqli_query($con,"select * from frd WHERE (frd_id='$frd_id' AND frd2_id='$frd2_id') OR (frd_id='$frd2_id' AND frd2_id='$frd_id')");
  $query="select * from frd where ((frd_id='$_SESSION[user_id]')||(frd2_id='$_SESSION[user_id]')) AND status='Confirm'";
$res=mysqli_query($con,$query);
while($row=mysqli_fetch_array($res))
 {
	 $frd_id=$row['frd_id'];
	 if($frd_id==$_SESSION['user_id'])
	 {
	     $query2="select * from profile_tb where id='$row[frd2_id]'";
	 }
	 else
	 {
		 $query2="select * from profile_tb where id='$row[frd_id]'";
	 }
$res2=mysqli_query($con,$query2);
$row2=mysqli_fetch_array($res2);
 ?>

 <tr>
 
 <td><?php echo $row2['fname']; ?> </td>
  <td><?php echo $row['status']; ?> </td>

 <?php 
  if($row['status']=='Block')
  { ?>
	  <td>Can't Post</td>
      <?php 
  }
  else
  {
	  ?>
  
 <td><a href="send_post.php?receiver_id=<?php echo $row2['id']; ?>&&receiver=<?php echo $row2['email']; ?>&&receiver_name=<?php echo $row2['fname']; ?>&&status1=send">Post</a></td>
 <?php } ?>
 <?php 
  if($row['status']=='Block')
  { ?>
	  <td>Already Blocked</td>
      <?php 
  }
  else
  {
	  ?>
 
 <td><a href="?status=Block&tid=<?php echo $row['id']; ?>">Block</a></td>
 <?php } ?>
 </tr>
 
 <?php
 }?>
 
 </table>
  </div>
  
  
  
  <?php
  include("right.php");
  
  ?>