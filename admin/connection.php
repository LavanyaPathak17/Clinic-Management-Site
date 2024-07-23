<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "testing";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(mysqli_connect_error()){
     echo "<script> alert('cannot connect to the database'); </script>";
     exit();
}

?>
