<?php
session_start(); 
include("connection.php");

$username = $_POST['email'];
$pass = $_POST['pass'];

//checking 
if($username == '' || $pass == ''){
    echo "<script>alert('Please fill in both fields')</script>";
    echo "<script>window.open('./login.php', '_self')</script>";
    exit();
}

$check_user = "SELECT * FROM users WHERE email = '$username'";
$result = mysqli_query($conn, $check_user);
$row = mysqli_fetch_assoc($result);

if($row){
    $stored_pass = $row["password"];
    // echo "<script>console.log('Stored Password: $stored_pass');</script>"; // Debug: Log stored password
    // echo "<script>console.log('Provided Password: $pass');</script>"; // Debug: Log provided password
    if(password_verify($pass, $stored_pass)){
        $_SESSION['username'] = $username;
        $_SESSION['role_id'] = $row['role_id'];
        echo "<script>alert('Login successful');</script>";
        echo "<script>window.open('./index.php', '_self')</script>"; 
        exit();
    }
    else{
        echo "<script>alert('Incorrect password');</script>";
        echo "<script>window.open('./login.php', '_self')</script>";
        exit();
    }
}
else {
    echo "<script>alert('No user found with that email');</script>";
    echo "<script>window.open('./login.php', '_self')</script>";
}
?>
