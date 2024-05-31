<?php
require __DIR__ . '/vendor/autoload.php';
session_start();
include 'connection.php';

use Dotenv\Dotenv;
if (isset($_GET['courseID']) && isset($_GET['userID'])) {
    $courseID = $_GET['courseID'];
    $userID = $_GET['userID'];


    // Load the .env file
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    // Use the Stripe secret key from the environment variables
    $stripe_secret_key = $_ENV['STRIPE_SECRET_KEY'];

    \Stripe\Stripe::setApiKey($stripe_secret_key);

    try {
        // Retrieve the session. If you require line items in the response, you may include them by expanding line_items.
        $session = \Stripe\Checkout\Session::retrieve($_GET['session_id'], [
            'expand' => ['line_items'],
        ]);

        // Check if payment was successful
        if ($session->payment_status == 'paid') {
            // Update the enrolled value in the course table
            $update_query = "UPDATE course SET Enrolled = Enrolled + 1 WHERE courseID = $courseID";
            mysqli_query($conn, $update_query);

            // Insert the payment details into the payment table
            $payment_query = "INSERT INTO payment (courseID, userID, payment_intent_id, amount, currency, status) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $payment_query);
            mysqli_stmt_bind_param($stmt, "iisiss", $courseID, $userID, $session->payment_intent, $session->amount_total, $session->currency, $session->payment_status);
            mysqli_stmt_execute($stmt);

            echo "Payment successful and enrollment updated!";
        } else {
            echo "Payment not successful.";
        }
    } catch (Exception $e) {
        echo "Error retrieving payment session: " . $e->getMessage();
    }
} else {
    echo "Invalid access.";
}
?>
