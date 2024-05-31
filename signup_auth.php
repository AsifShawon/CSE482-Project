<?php
include('connection.php');

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone_num = $_POST['phone_num'];
$role_id = (int)$_POST['usertypes'];
$password = $_POST['password'];

// Checking for empty fields
if($first_name == '' || $last_name == '' || $email == '' || $phone_num == '' || $password == ''){
    echo "<script>alert('please fill the empty field(s)')</script>";
    echo "<script>window.open('./signup.php', '_self')</script>";
    exit();
}

// Existence of email checking
$check_mail_sql = "SELECT * FROM user WHERE email='$email'";
$result_mail = mysqli_query($conn, $check_mail_sql);
if(mysqli_num_rows($result_mail) > 0) {
    echo "<script>alert('The $email is already used')</script>";
    echo "<script>window.open('./signup.php', '_self')</script>";
    exit();
}

// Hashing the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Inserting the user into the user table
$sql = "INSERT INTO user (first_name, last_name, email, phone_num, password, role_id) VALUES ('$first_name', '$last_name', '$email', '$phone_num', '$hashed_password', '$role_id')";
$result = mysqli_query($conn, $sql);

if($result){
    // Check if the user is a trainer (assuming role_id for trainer is 2)
    if($role_id == 2) {
        $user_id = mysqli_insert_id($conn); // Get the inserted user's ID
        $pending_sql = "INSERT INTO pending_trainer (user_id) VALUES ('$user_id')";
        $pending_result = mysqli_query($conn, $pending_sql);

        if(!$pending_result) {
            echo "<script>alert('Error in adding to pending trainer list')</script>";
            echo "<script>window.open('./signup.php','_self')</script>";
            exit();
        }
    }
    echo "<script>window.open('./index.php','_self')</script>"; 
}
else {
    echo "<script>alert('Error in signup')</script>";
    echo "<script>window.open('./signup.php','_self')</script>";
}

?>
