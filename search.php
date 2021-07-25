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
                <th>Last Name</th>
                 <th>Mail</th>
                 <th>Pic</th>
                 <th>Request</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                 <th>Last Name</th>
                 <th>Mail</th>
                 <th>Pic</th>
                 <th>Request</th>
                 
               
            </tr>
        </tfoot>
        <tbody>
        <?php
include("connectionclass.php");
       // $result=mysqli_query($con,"select * from profile_tb WHERE email!='$_SESSION[email]'");
	   
	   //boundary by organization
		$result=mysqli_query($con,"select * from profile_tb WHERE email!='$_SESSION[email]'");
		while($row=mysqli_fetch_array($result))
		{
			
			$frd_id=$_SESSION['user_id'];
			$frd2_id=$row['id'];
			$result1=mysqli_query($con,"select * from frd WHERE (frd_id='$frd_id' AND frd2_id='$frd2_id') OR (frd_id='$frd2_id' AND frd2_id='$frd_id')");
			$row2=mysqli_fetch_array($result1);
			?>
        <tr>
                <td><?php echo $row['fname']; ?></td>
                <td><?php echo $row['lname']; ?></td>
                <td><?php echo $row['email']; ?></td>                
				<td><img src="<?php echo $row['profile_pic']; ?>" class="img-circle" width="50px" height="50px"/></td>
				
                <?php
				if(mysqli_num_rows($result1)>0)
			    {
			    ?>
                <td style="color:#F00;"><?php echo $row2['status']; ?></td>
                <?php
				}
				else
				{
					?>
               <td><a href="?request=1&frd_id=<?php echo $row['id']; ?>">Request</a></td>
            <?php  
				}
				
               
		
		}
         ?>   
        </tbody>
    </table>