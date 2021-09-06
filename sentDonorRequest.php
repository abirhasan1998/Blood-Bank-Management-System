<?php 
require 'file/connection.php'; 
session_start();
  if(!isset($_SESSION['rid']))
  {
  header('location:login.php');
  }
  else {
    $rid = $_SESSION['rid'];
	$remail = $_SESSION['remail'];
    $sql = "select * from donor where requested=1 and receiveremail = '$remail'";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<?php $title="Bloodbank | Sent Requests"; ?>
<?php require 'head.php'; ?>
<body>
	<?php require 'header.php'; ?>
	<div class="container cont">

		<?php require 'message.php'; ?>

	<table class="table table-responsive table-striped rounded mb-5">
		<tr><th colspan="8" class="title">Sent requests</th></tr>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th>City</th>
			<th>Phone</th>
			<th>Blood Group</th>
			<th>Status</th>
			<th>Cancel</th>
		</tr>

		    <div>
                <?php
                if ($result) {
                    $row =mysqli_num_rows( $result);
                    if ($row) { //echo "<b> Total ".$row." </b>";
                }else echo '<b style="color:white;background-color:red;padding:7px;border-radius: 15px 50px;">You have not requested yet. </b>';
            }
            ?>
            </div>

		<?php while($row = mysqli_fetch_array($result)) { ?>

		<tr>
			<td><?php echo ++$counter;?></td>
			<td><?php echo $row['rname'];?></td>
			<td><?php echo $row['remail'];?></td>
			<td><?php echo $row['rcity'];?></td>
			<td><?php echo $row['rphone'];?></td>
			<td><?php echo $row['rbg'];?></td>
            <td>
            <span ><?php if($row['accepted']==1){ echo "<span class='btn btn-success'>Accepted</span>";?></span><?php  }else { ?>
            <a href="#" class="btn btn-info">Pending</a></td>
            <?php  }?>
			<td><a href="file/cancelDonorRequest.php?reqid=<?php echo $row['id'];?>" class="btn btn-danger">Cancel Request</a></td></td>
		</tr>
		<?php } ?>
<a href="#" onclick="window.print()" class="btn btn-success float-right">Print</a>
	</table>
 

</div>
    <?php require 'footer.php'; ?>
</body>
</html>
<?php } ?>