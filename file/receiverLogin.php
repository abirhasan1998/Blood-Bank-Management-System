<?php
session_start();
    require 'connection.php';
    if(isset($_POST['rlogin'])){
    $remail=$_POST['remail'];
    $rpassword=$_POST['rpassword'];
    $sql="select * from receivers where remail='$remail' and rpassword='$rpassword'";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $rows_fetched=mysqli_num_rows($result);
    if($rows_fetched==0){
        $error= "Wrong email or password. Please try again.";
        header( "location:../login.php?error=".$error);
    }else{
        $row=mysqli_fetch_array($result);
        $_SESSION['remail']=$row['remail'];
        $_SESSION['rname']=$row['rname'];
        $_SESSION['rid']=$row['id'];
        $msg= $_SESSION['rname'].' have logged in.';
        header( "location:../abs.php?msg=".$msg);
    } 
  }
  if(isset($_POST['dlogin'])){
    $remail=$_POST['demail'];
    $rpassword=$_POST['dpassword'];
    $sql="select * from donor where remail='$remail' and rpassword='$rpassword'";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $rows_fetched=mysqli_num_rows($result);
    if($rows_fetched==0){
        $error= "Wrong email or password. Please try again.";
        header( "location:../login.php?error=".$error);
    }else{
        $row=mysqli_fetch_array($result);
        $_SESSION['demail']=$row['remail'];
        $_SESSION['dname']=$row['rname'];
        $_SESSION['did']=$row['id'];
        $msg= $_SESSION['dname'].' have logged in.';
        header( "location:../dabs.php?msg=".$msg);
    } 
  }
?>