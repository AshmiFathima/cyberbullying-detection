<?php
error_reporting(0);
session_start();
include("connectionclass.php");

include("header.php");

$status=$_REQUEST['status'];
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







<div class="col-sm-6">
<br />
 <br>Write something here...<br>
 <?php
 include("spama.php");
 ?>

 <span style="color:#F00;">Posts</span><br>
 
 <?php
 
 $query="select * from activity order by id desc";
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
 echo "USER : ".$row['user']."<br><br>";
 
 //echo "<img src='$row[photo]' width='100%' > </br></br>";
 echo "MESSAGE:".$row['msg']."<br>".$row['date']; ?> </td>
 
 </tr>
 </table>
 <br>
 <?php
 }?>
 
 
 
  
  
  </div>
  
  
  
  <?php
  include("right.php");
  
  ?>