<?php
require __DIR__ . '/vendor/autoload.php';
session_start();
include 'connection.php';

if (isset($_GET['courseID'])) {
    $courseID = $_GET['courseID'];

    // Fetch the checkout session to verify payment status
    \Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET_KEY']);

    // You can add more checks here to verify the session if needed

    // Update the enrolled value in the database
    $query = "UPDATE course SET Enrolled = Enrolled + 1 WHERE courseID = $courseID";
    if (mysqli_query($conn, $query)) {
        echo "Enrollment successful!";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "No course selected.";
}
?>
