<?php
if(isset($_POST['rregister'])){
	require 'connection.php';
	$rname=$_POST['rname'];
	$remail=$_POST['remail'];
	$rpassword=$_POST['rpassword'];
	$rphone=$_POST['rphone'];
	$rcity=$_POST['rcity'];
	$rbg=$_POST['rbg'];
	$check_email = mysqli_query($conn, "SELECT remail FROM receivers where remail = '$remail' ");
	if(mysqli_num_rows($check_email) > 0){
    $error= 'Email Already exists. Please try another Email.';
    header( "location:../register.php?error=".$error );
}else{
	$sql = "INSERT INTO receivers (rname, remail, rpassword, rphone, rcity, rbg)
	VALUES ('$rname','$remail', '$rpassword', '$rphone', '$rcity', '$rbg')";
	if ($conn->query($sql) === TRUE) {
		$msg = "You have successfully registered. Please, login to continue.";
		header( "location:../login.php?msg=".$msg);
	} else {
		$error = "Error: " . $sql . "<br>" . $conn->error;
        header( "location:../register.php?error=".$error );
	}
	$conn->close();
}
}
// Donor Register 
if(isset($_POST['dregister'])){
	require 'connection.php';
	$rname=$_POST['dname'];
	$remail=$_POST['demail'];
	$rpassword=$_POST['dpassword'];
	$rphone=$_POST['dphone'];
	$rcity=$_POST['dcity'];
	$rbg=$_POST['dbg'];
	$age = $_POST['age'];
	$check_email = mysqli_query($conn, "SELECT remail FROM donor where remail = '$remail' ");
	if(mysqli_num_rows($check_email) > 0){
    $error= 'Email Already exists. Please try another Email.';
    header( "location:../register.php?error=".$error );
}else{

	if($age>=18) {
	
	$sql = "INSERT INTO donor (rname, remail, rpassword, rphone, rcity, rbg,age)
	VALUES ('$rname','$remail', '$rpassword', '$rphone', '$rcity', '$rbg','$age')";
	if ($conn->query($sql) === TRUE) {
		$msg = "You have successfully registered. Please, login to continue.";
		header( "location:../login.php?msg=".$msg);
	} else {
		$error = "Error: " . $sql . "<br>" . $conn->error;
        header( "location:../register.php?error=".$error );
	}
	$conn->close();
	} else { 
		header( "location:../login.php?msg=".'Age must be greater than 18 for register as a blood donor');

	}

}
}
?>