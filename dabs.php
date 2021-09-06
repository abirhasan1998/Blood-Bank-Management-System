<?php 
session_start();
require 'file/connection.php';
    $donorEmail = $_SESSION['demail'];

    $did = $_SESSION['did'];
    $sql = "select * from donor where remail='$donorEmail'";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<?php $title="Bloodbank | Available Blood Samples"; ?>
<?php require 'head.php'; ?>
<body>
    <?php require 'header.php'; ?>
    <div class="container cont">
        <?php require 'message.php'; ?> 
        <?php while($row = mysqli_fetch_array($result)) { ?>
     <?php  if($row['receiveremail']==0 || $row['receiveremail']==NULL) { echo "Not Any Request yet!";} else { ?>
        <h5>You have Blood a Blood Request Form: <span class="btn btn-info"><?php echo $row['receiveremail'] ?></span></h5>  
        <p>Do you want to Accept it or Reject ?</p>
        <table>
        <td><?php if($row['accepted'] ==1){ ?> <a href="" class="btn btn-success disabled">Accepted</a> <?php }
			else{ ?>
				<a href="file/acceptRequest.php?reqid=<?php echo $row['id'];?>" class="btn btn-success">Accept</a>
			<?php } ?> 
			</td>
			<td><?php if($row['accepted'] ==NULL || $row['requested']==0){ ?> <a href="" class="btn btn-danger disabled">Default Rejected</a> <?php }
			else{ ?>
				<a href="file/rejectRequest.php?reqid=<?php echo $row['id'];?>" class="btn btn-danger">Reject</a>
			<?php } ?>
		</td> 
        </table>
        <?php  } ?>
       <hr>

       <h6>Make your profile visibility:(Public/Private)</h6>
        <table>
        <td><?php if($row['visibility'] ==1){ ?> <a href="" class="btn btn-success disabled">Already Public</a> <?php }
			else{ ?>
				<a href="file/public.php?reqid=<?php echo $row['id'];?>" class="btn btn-success">Public</a>
			<?php } ?> 
			</td>
			<td><?php if($row['visibility'] ==NULL || $row['visibility']==0){ ?> <a href="" class="btn btn-danger disabled">Already Private</a> <?php }
			else{ ?>
				<a href="file/private.php?reqid=<?php echo $row['id'];?>" class="btn btn-danger">Private</a>
			<?php } ?>
		</td>
        </table>
        <?php } ?>

    </div>
    <?php require 'footer.php' ?>
</body>

<script type="text/javascript">
    $('.hospital').on('click', function(){
        alert("Hospital user can't request for blood.");
    });
</script>