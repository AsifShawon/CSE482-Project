<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "learntoprotect";

$conn = mysqli_connect($host, $user, $pass, $db);
if(mysqli_connect_errno()){
    die("Connection failed: " . mysqli_connect_error());
}

?>
