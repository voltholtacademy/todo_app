<?php
$host = "localhost";
$name = "root";
$pass = "";
$dbname = "todo_app";

$conn = mysqli_connect($host,$name,$pass,$dbname);

if(!$conn){
	die("Database connection failed!");
}
?>