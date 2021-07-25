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
  <tr><th>Friend Name</th><th>Status</th><th>Confirm</th><th>Cancel</th></tr>
  ";
  $query="select * from frd where frd2_id='$_SESSION[user_id]' AND ((status='Process')||(status='Confirm')||(status='Cancel'))";
$res=mysqli_query($con,$query);
if(mysqli_num_rows($res)>0)
{
while($row=mysqli_fetch_array($res))
 {

$query2="select * from profile_tb where id='$row[frd_id]'";
$res2=mysqli_query($con,$query2);
$row2=mysqli_fetch_array($res2);
 ?>

 <tr>
 
 <td><?php echo $row2['fname']; ?> </td>
<!-- <td><a href="profile1.php?fid=<?php echo $row2['id']; ?>">View</a></td> -->
  <td><?php echo $row['status']; ?> </td>
  
 <td>
 <?php 
 if($row['status']=='Confirm') 
 { 
     echo "Confirmed"; 
 }
 else
 {
	 ?>
 <a href="?status=Confirm&tid=<?php echo $row['id']; ?>">Confirm</a>
 <?php } ?>
 </td>
 <td>
 <?php 
 if($row['status']=='Cancel') 
 { 
     echo "Cancelled"; 
 }
 else
 {
	 ?>
 <a href="?status=Cancel&tid=<?php echo $row['id']; ?>">Cancel</a>
 <?php } ?>
 </td>
 </tr>
 
 <?php
 }
}
else
 {
	 
 ?>
 <tr>
  <td colspan="5" style="font-size:18px; color:#F00;" align="center"><b>No friend Requests</b></td>
  </tr>
  <?php } ?>
 
 
 
 
 
 
 </table>
  </div>
  
  
  
  <?php
  include("right.php");
  
  ?>