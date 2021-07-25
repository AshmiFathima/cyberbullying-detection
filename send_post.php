<?php
error_reporting(0);
session_start();
include("connectionclass.php");
include("header.php");

$status=$_REQUEST['status'];
$receiver_id=$_REQUEST['receiver_id'];
$receiver=$_REQUEST['receiver'];
$receiver_name=$_REQUEST['receiver_name'];
if($status=="already")
{
?>	
	<script type="text/javascript">
	alert("Already Joined");
	</script>
	
<?php	
}
if($status=="success")
{
?>	
	<script type="text/javascript">
	alert("Successfully Joined");
	</script>
	
<?php	
}


?> 







<div class="col-sm-7">
 <br>Write On Friends Wall<br>
 <?php
 include("spam2.php");
 ?>



 <span style="color:#306;">Your Posts to Friends</span><br>
 <?php
 $query="select * from wall WHERE user='$_SESSION[email]' AND friend!='' order by id desc";
$res=mysqli_query($con,$query);
while($row=mysqli_fetch_array($res))
 {
 ?>
 <table width="100%">
 <tr>
 <?php
 if($row['status']=="none")
 {
echo "<td class='alert alert-success'>";
 }
 else
 {
	 echo "<td class='alert alert-danger'>";
	 
 }
 echo "TO USER : ".$row['user']."<br>".$row['msg']."<br>".$row['date']; ?> </td>
 
 </tr>
 </table>
 <br>
 <?php
 }?>


 <span style="color:#F00;">Friends Posts</span><br>
 
 <?php
 
 $query="select * from wall WHERE friend='$_SESSION[email]' order by id desc";
$res=mysqli_query($con,$query);
while($row=mysqli_fetch_array($res))
 {
 ?>
 <table width="100%">
 <tr>
 <?php
 if($row['status']=="")
 {
echo "<td class='alert alert-success'>";
 }
 else
 {
	 echo "<td class='alert alert-danger'>";
	 
 }
 echo "USER : ".$row['user']."<br>".$row['msg']."<br>".$row['date']; ?> </td>
 
 </tr>
 </table>
 <br>
 <?php
 }?>
 
 
 
  
  
  </div>
  
  
  
  <?php
 // include("right.php");
  
  ?>