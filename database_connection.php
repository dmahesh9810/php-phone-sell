<?php
$server_name = "localhost";
$user_name = "root";
$password ="";

$conn = mysqli_connect($server_name,$user_name,$password,"old_mobile");

if($conn->connect_error){
	die("connection fail");
}
