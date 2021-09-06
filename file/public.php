<?php
include "connection.php";
    $reqid=$_GET['reqid'];
	$status =1;
	$sql = "update donor SET visibility = '$status',requested=0,receiveremail=0,accepted=0 WHERE id = '$reqid'";
    if (mysqli_query($conn, $sql)) {
	$msg="You have Public the your Profile.";
	header("location:../dabs.php?msg=".$msg );
    } else {
    $error= "Error changing status: " . mysqli_error($conn);
    header("location:../dabs.php?error=".$error );
    }
    mysqli_close($conn);
?>