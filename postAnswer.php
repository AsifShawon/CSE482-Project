<?php
include('connection.php');
session_start();
if(!isset($_SESSION['username'])){
    echo "<script>alert('Please login to answer a question')</script>";
    echo "<script>window.open('./QnA.php', '_self')</script>";
    exit();
}

$answer = $_POST['answer'];
$qna_id = $_POST['id'];
$email = $_SESSION['username'];

if($answer == ''){
    echo "<script>alert('Please fill in the answer field')</script>";
    echo "<script>window.open('./QnA.php', '_self')</script>";
    exit();
}

$query = "insert into qna_answers (qna_id, email, answer) values ( '$qna_id', '$email', '$answer')";
$result = mysqli_query($conn, $query);
if($result){
    echo "<script>alert('Answer posted successfully')</script>";
    echo "<script>window.open('./QnA.php', '_self')</script>";
}
else {
    echo "<script>alert('Error in posting answer')</script>";
    echo "<script>window.open('./QnA.php', '_self')</script>";
}

?>