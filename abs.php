<?php 
session_start();
error_reporting(0);
require 'file/connection.php';
if(isset($_GET['search'])){
    $searchKey = $_GET['search'];
    $sql = "select bloodinfo.*, hospitals.* from bloodinfo, hospitals where bloodinfo.hid=hospitals.id && bg LIKE '%$searchKey%'";
}else{
    $sql = "select bloodinfo.*, hospitals.* from bloodinfo, hospitals where bloodinfo.hid=hospitals.id";
}
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
        <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
            <form method="get" action="" style="margin-top:-20px; ">
            <label class="font-weight-bolder">Select Blood Group:</label>
               <select name="search" class="form-control">
               <option><?php echo @$_GET['search']; ?></option>
               <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
               </select><br>
               <a href="abs.php" class="btn btn-info mr-4"> Reset</a>
               <input type="submit" name="submit" class="btn btn-info" value="search">
           </form>
        </div>
       
        </div>

<div class="row">
<div class="col-sm-12 col-md-10 col-lg-10 col-xl-8">
<table class="table table-responsive table-striped rounded mb-5">
            <tr><th colspan="7" class="title">Available Blood Samples</th></tr>
            <tr>
                <th>#</th>
                <th>Hospital Name</th>
                <th>Hospital City</th>
                <th>Hospital Email</th>
                <th>Hospital Phone</th>
                <th>Blood Group</th>
                <th>Action</th>
            </tr>

            <div>
                <?php
                if ($result) {
                    $row =mysqli_num_rows( $result);
                    if ($row) { //echo "<b> Total ".$row." </b>";
                }else echo '<b style="color:white;background-color:red;padding:7px;border-radius: 15px 50px;">Nothing to show.</b>';
            }
            ?>
            </div>

        <?php
        while($row = mysqli_fetch_array($result)) {
            
            if($row['bg']=='A+') {
                ++$aPlus;
            }
            else if($row['bg']=='A-') {
                ++$aMinus;
            }
            else if($row['bg']=='AB-') {
                ++$abMinus;
            }
            else if($row['bg']=="AB+") {
                ++$abPlus;
            }
            else if($row['bg']=='O+') {
                ++$oPlus;
            }
            else  if($row['bg']=='O-') {
                ++$oMinus;
            }
            
            ?>

            <tr>
                <td><?php echo ++$counter;?></td>
                <td><?php echo $row['hname'];?></td>
                <td><?php echo ($row['hcity']); ?></td>
                <td><?php echo ($row['hemail']); ?></td>
                <td><?php echo ($row['hphone']); ?></td>
                <td><?php echo ($row['bg']); ?></td>

                <?php $bid= $row['bid'];?>
                <?php $hid= $row['hid'];?>
                <?php $bg= $row['bg'];?>
                <form action="file/request.php" method="post">
                    <input type="hidden" name="bid" value="<?php echo $bid; ?>">
                    <input type="hidden" name="hid" value="<?php echo $hid; ?>">
                    <input type="hidden" name="bg" value="<?php echo $bg; ?>">

                <?php if (isset($_SESSION['hid'])) { ?>
                <td><a href="javascript:void(0);" class="btn btn-info hospital">Request Sample</a></td>
                <?php } else {(isset($_SESSION['rid']))  ?>
                <td><input type="submit" name="request" class="btn btn-info" value="Request Sample"></td>
                <?php } ?>
                
                </form> 
            </tr>

        <?php } ?>
        </table>
</div>
<!-- Side INfo -->
<div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Total Blood Samples Available : <?php echo $counter;  ?></h5>
            <span class="btn btn-info">Blood Name - Number</span>
            <table class="table table-striped">
            <thead>
            <th>Blood Name</th>
            <th>Available</th>
            </thead>
            <tbody>
            <tr>
            <td>AB+ </td>
            <td><?php echo $abPlus;  ?></td>
            </tr>
            <tr>
            <td>AB- </td>
            <td><?php echo $abMinus;  ?></td>
            </tr>
            <tr>
            <td>.O-</td>
            <td><?php echo  $oMinus;   ?></td>
            </tr>
            <tr>
            <td>O+ </td>
            <td><?php echo  $oPlus;   ?></td>
            </tr>
            <tr>
            <td>A+ </td>
            <td><?php echo  $aPlus;  ?></td>
            </tr>
            <tr>
            <td>.A-  </td>
            <td><?php echo  $aMinus;  ?></td>
            </tr>
            </tbody>
            </table>
        </div>
</div>
<!-- Side INfo -->
</div>

    </div>
    <?php require 'footer.php' ?>
</body>

<script type="text/javascript">
    $('.hospital').on('click', function(){
        alert("Hospital user can't request for blood.");
    });
</script>