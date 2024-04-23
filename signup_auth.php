<?php
include('connection.php');

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone_num = $_POST['phone_num'];
$role_id = (int)$_POST['usertypes'];
$password = $_POST['password'];

//checking 
if($first_name == '' || $last_name == '' || $email == '' || $phone_num == '' || $password == ''){
    echo "<script>alert('please fill the empty field(s)')</script>";
    echo "<script>window.open('./signup.php', '_self')</script>";
    exit();
}

// existance of email checking
$check_mail_sql = "SELECT * FROM users WHERE email='$email'";
$result_mail = mysqli_query($conn, $check_mail_sql);
if(mysqli_num_rows($result_mail) > 0) {
    echo "<script>alert('The $email is already used')</script>";
    echo "<script>window.open('./signup.php', '_self')</script>";
    exit();
}



$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (first_name, last_name, email, phone_num, password, role_id) VALUE ('$first_name', '$last_name', '$email', '$phone_num', '$hashed_password', '$role_id')";
$result = mysqli_query($conn, $sql);
if($result){
    
    echo "<script>window.open('./index.php','_self')</script>"; 
}
else {
    echo "<script>alert('Error in signup','$result')</script>";
    echo "<script>window.open('./signup.php','_self')</script>";
}

?>