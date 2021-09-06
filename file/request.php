<?php
session_start(); 
require 'connection.php';
if(!isset($_SESSION['rid']))
{
	header('location:../login.php');
}
else {
	if(isset($_POST['request'])){
		$hid = $_POST['hid'];
		$rid = $_SESSION['rid'];
		$bg = $_POST['bg'];
		$check_data = mysqli_query($conn, "SELECT reqid FROM bloodrequest where hid='$hid' and rid='$rid'");
		if(mysqli_num_rows($check_data) > 0){
			$error= 'You have already requested for blood sample from this Hospital.';
			header( "location:../abs.php?error=".$error );
}else{
		$sql="INSERT INTO bloodrequest (bg, hid, rid) VALUES ('$bg', '$hid', '$rid')";
		if ($conn->query($sql) === TRUE) {
			$msg = 'You have requested for blood group '.$bg.'. Our team will contact you soon.';
			header( "location:../sentrequest.php?msg=".$msg);
		} else {
			$error = "Error: " . $sql . "<br>" . $conn->error;
            header( "location:../abs.php?error=".$error );
		}
		$conn->close();
	}
}

// Donor 
if(isset($_POST['requestDonor'])){
	$email = $_POST['email'];
	$did = $_POST['did'];
	// echo $email;
	// echo $did;
	$check_data = mysqli_query($conn, "SELECT receiveremail FROM donor where receiveremail='$email' and id='$did'");
	if(mysqli_num_rows($check_data) > 0){
		$error= 'You have already requested for blood sample from the donor.';
		header( "location:../sentDonorRequest.php?error=".$error );
}else{
	$sql="UPDATE donor SET receiveremail='$email',requested=1 WHERE id='$did'";
	if ($conn->query($sql) === TRUE) {
		$msg = 'You have requested for blood group. Our team will contact you soon.';
		header( "location:../sentDonorRequest.php?msg=".$msg);
	} else {
		$error = "Error: " . $sql . "<br>" . $conn->error;
		header( "location:../abs.php?error=".$error );
	}
	$conn->close();
}
}



}
?>