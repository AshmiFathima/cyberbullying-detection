 <script src="jquery-1.12.4.js"></script>
  <script src="jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="jquery.dataTables.min.css">

<script>

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot2 th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
</script>

<style>
tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Skills</th>
                 <th>Mail</th>
                 <th>Pic</th>
                 <th>Profile</th>
                 <th>Message</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                 <th>Skills</th>
                 <th>Mail</th>
                 <th>Pic</th>
                 <th>Profile</th>
                 <th>Message</th>
               
            </tr>
        </tfoot>
        <tbody>
        <?php
include("connectionclass.php");
session_start();
       // $result=mysqli_query($con,"select * from profile_tb WHERE email!='$_SESSION[email]'");
	   
	   //boundary by organization
		$result=mysqli_query($con,"select * from skills WHERE user!='$_SESSION[email]'");
		while($row=mysqli_fetch_array($result))
		{
			
			$user=$row['user'];
			$result1=mysqli_query($con,"select * from profile_tb WHERE email='$user' ");
			$row2=mysqli_fetch_array($result1);
			if($row2['email']==$user)
			{
			?>
        <tr>
                <td><?php echo $row2['fname'].$row2['lname']; ?></td>
                 <td><?php echo $row['skills']; ?></td>
                <td><?php echo $row2['email']; ?></td>                     
				<td><img src="<?php echo $row['profile_pic']; ?>" class="img-circle" width="50px" height="50px"/></td>
                <td><a href="profile1.php?id=<?php echo $row2['id']; ?>"> Profile</a></td>
                 <td><a href="CHAT/search.php?request=1&receiver=<?php echo $row2['email']; ?>">Chat</a></td>
				
           <?php
				}
		}
		
         ?>   
        </tbody>
    </table>