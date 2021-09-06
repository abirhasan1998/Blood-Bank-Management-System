<?php
include "connection.php";
    $reqid=$_GET['reqid'];
	$status =NULL;
	$sql = "update donor SET visibility = '$status' WHERE id = '$reqid'";
    if (mysqli_query($conn, $sql)) {
	$msg="You have Private the your Profile.";
	header("location:../dabs.php?msg=".$msg );
    } else {
    $error= "Error changing status: " . mysqli_error($conn);
    header("location:../dabs.php?error=".$error );
    }
    mysqli_close($conn);
?>