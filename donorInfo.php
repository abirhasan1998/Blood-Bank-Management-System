<?php 
session_start();
error_reporting(0);
require 'file/connection.php';
if(empty($_SESSION['remail'])) {
    $receiverEmail="";
}else {
    $receiverEmail = $_SESSION['remail'];
}

    $sql = "select * from donor";
    $result = mysqli_query($conn, $sql);

    ?>
<!DOCTYPE html>
<html>
<?php $title="Bloodbank | home page"; ?>
<?php require 'head.php'; ?>

<body>
    <?php require 'header.php'; ?>

    <div class="container cont">

        <table class="table table-responsive table-striped rounded mb-5">
            <tr>
                <th colspan="7" class="title">Available Blood Samples</th>
            </tr>
            <tr>
                <th>#</th>
                <th>Donor Name</th>
                <th>Donor City</th>
                <th>Donor Email</th>
                <th>Donor Phone</th>
                <th>Blood Group</th>
                <th>Availability</th>
                <th>Request For Blood</th>
            </tr>
            <?php   $counter = 0; ?>
            <?php while($row = mysqli_fetch_array($result)) {
                           if($row['rbg']=='A+') {
                            ++$aPlus;
                        }
                        else if($row['rbg']=='A-') {
                            ++$aMinus;
                        }
                        else if($row['rbg']=='AB-') {
                            ++$abMinus;
                        }
                        else if($row['rbg']=="AB+") {
                            ++$abPlus;
                        }
                        else if($row['rbg']=='O+') {
                            ++$oPlus;
                        }
                        else  if($row['rbg']=='O-') {
                            ++$oMinus;
                        }
                
                ?>
 
            <tr>
                <td><?php echo ++$counter;?></td>
                <td><?php echo $row['rname'];?></td>
                <td><?php echo ($row['rcity']); ?></td>
                <td><?php echo ($row['remail']); ?></td>
                <td><?php echo ($row['rphone']); ?></td>
                <td><?php echo ($row['rbg']); ?></td>
                <td><?php if($row['visibility']==1 && $row['accepted']!=1) 
                { echo "<p class='text-success'><b>Available</b></p>";
                }else
                {
                    echo "<p class='text-danger'><b>Not Available</b></p>";
                } ?></td>
               <?php  if($row['visibility']==1) { ?>

                <form action="file/request.php" method="post">
                <input type="hidden" name="did" value="<?php echo $row['id'] ?>">
                  <input type="hidden" name="email" value="<?php echo $receiverEmail; ?>">
                <?php if($row['receiveremail'] ===NULL || $row['receiveremail']==0) { ?>
                    <td><input type="submit" name="requestDonor" class="btn btn-info" value="Request Sample"></td>
                <?php   }else if($row['accepted']==1 &&$receiverEmail) { ?>
                    <td><span class="btn btn-primary ">Not Available</span></td>
                <?php }else { ?>
                    <td><input type="submit" name="requestDonor" class="btn btn-info disabled" value="Already Requested"></td>
               <?php   }?>
                </form> 

         <?php  }else { ?> 
            <form action="file/request.php" method="post">
                    <input type="hidden" name="email" value="<?php echo $receiverEmail; ?>">
                   <td><a href="javascript:void(0);" class="btn btn-info hospital disabled">No request accept</a></td>
            </form> 

            <?php  }?>

            </tr>


            <?php } ?>
        </table>
  

    </div>
    <?php require 'footer.php'; ?>

</body>

</html>