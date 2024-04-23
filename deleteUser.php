<?php
include('connection.php');

$id = $_POST['id'];

$query = "DELETE FROM users WHERE id = $id";
$result = mysqli_query($conn, $query);
if($result){
    echo "<script>alert('User deleted successfully')</script>";
    echo "<script>window.open('./admin.php', '_self')</script>";
}
else {
    echo "<script>alert('Error in deleting user')</script>";
    echo "<script>window.open('./admin.php', '_self')</script>";
}

?>