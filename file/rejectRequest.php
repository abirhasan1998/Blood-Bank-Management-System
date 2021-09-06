<?php
include "connection.php";
    $reqid=$_GET['reqid'];
	$status =0;
	$sql = "update donor SET requested = '$status',receiveremail='$status',accepted='$status' WHERE id = '$reqid'";
    if (mysqli_query($conn, $sql)) {
	$msg="You have Reject the request.";
	header("location:../dabs.php?msg=".$msg );
    } else {
    $error= "Error changing status: " . mysqli_error($conn);
    header("location:../dabs.php?error=".$error );
    }
    mysqli_close($conn);
?>