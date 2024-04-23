<?php
include('connection.php'); 
$courseID = $_POST['courseID'];

$query = "DELETE FROM course WHERE courseID = '$courseID'";

$result = mysqli_query($conn, $query);
if($result){
    echo "<script>alert('Course deleted successfully')</script>";
    echo "<script>window.open('./admin.php', '_self')</script>";
}
else {
    echo "<script>alert('Error in deleting course')</script>";
    echo "<script>window.open('./admin.php', '_self')</script>";
}
?>