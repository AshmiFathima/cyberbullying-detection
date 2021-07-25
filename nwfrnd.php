<html>
<body>
<form action="" method="post">
<input type="text" name="name" ><br><br>

<?php
include("connectionclass.php");
$query="select * from frndreq_tb";
$res=mysqli_query($con,$query);
while($row=mysqli_fetch_array($res))
 {
 ?>
 <table>
 <tr>
 <td><?php echo $row['username']; ?> </td>
 <td><a href="updatefrnd.php?id=<?php echo $row['id']; ?>">Confirm</a></td>
 <td><a href="deletefrnd.php?id=<?php echo $row['id']; ?>">Delete Request</a></td>
 </tr>
 </table>
 <?php
 }?>
 </form>
 </body>
 </html>