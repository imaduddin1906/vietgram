<?php

session_start();

include("connection.php");

$username = $_POST['username'];
$password = $_POST['password'];
$res = mysqli_query($conn,"select * from account where username='$username' and password='$password'");

$cek = mysqli_num_rows($res); 
if($cek == 1){
    $profile_data = mysqli_query($conn,"select * from profile where username ='$username'");
    $row_acc = mysqli_fetch_array($profile_data);
    $_SESSION['username'] = $username;
    $_SESSION['logstatus'] = "true";
	$_SESSION["name"] = $row_acc["name"];
	$_SESSION["website"] = $row_acc["website"];
	$_SESSION["bio"] = $row_acc["bio"];
	$_SESSION["email"] = $row_acc["email"];
	$_SESSION["phone_number"] = $row_acc["phone_number"];
	$_SESSION["gender"] = $row_acc["gender"];
	$_SESSION["profile_photos"] = $row_acc["profile_photos"];
	header("location:feed.php");
}else{
	header("location:index.php?logstatus=false");
}
?>