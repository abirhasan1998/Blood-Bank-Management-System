<?php
include "connection.php";
    $reqid=$_GET['reqid'];
	$sql = "update donor SET requested=NULL,receiveremail=NULL, accepted =NULL WHERE id = '$reqid'";
	if (mysqli_query($conn, $sql)) {
	$msg="You have cancelled request for the blood.";
	header("location:../sentDonorRequest.php?msg=".$msg );
    } else {
    $error="Error deleting record: " . mysqli_error($conn);
    header("location:../sentDonorRequest.php?error=".$error );
    }
    mysqli_close($conn);
?>