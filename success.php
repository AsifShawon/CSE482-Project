<?php
require __DIR__ . '/vendor/autoload.php';
session_start();
include 'connection.php';

use Dotenv\Dotenv;

if (isset($_GET['session_id']) && isset($_GET['courseID']) && isset($_GET['userID'])) {
  $session_id = $_GET['session_id'];
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
    $session = \Stripe\Checkout\Session::retrieve($session_id, [
      'expand' => ['line_items'],
    ]);

    // Check if payment was successful
    if ($session->payment_status == 'paid') {
      // Update the enrolled value in the course table
      $update_query = "UPDATE course SET Enrolled = Enrolled + 1 WHERE courseID = $courseID";
      mysqli_query($conn, $update_query);

      // Insert the payment details into the payment table (with prepared statement)
      $payment_query = "INSERT INTO payment (courseID, userID, payment_intent_id, amount, currency, status) VALUES (?, ?, ?, ?, ?, ?)";
      $stmt = mysqli_prepare($conn, $payment_query);

      if ($stmt) { // Check if statement preparation was successful
        mysqli_stmt_bind_param($stmt, "iisiss", $courseID, $userID, $session->payment_intent, $session->amount_total, $session->currency, $session->payment_status);

        if (mysqli_stmt_execute($stmt)) { // Check if statement execution was successful
          echo "<script>alert('Payment successful and enrollment updated!')</script>";
          echo "<script>window.open('./guardian_dashboard.php', '_self')</script>";
        } else {
          echo "Error inserting payment details: " . mysqli_stmt_error($stmt); // Display error message on failure
        }

        mysqli_stmt_close($stmt); // Close the statement
      } else {
        echo "Error preparing payment insert statement: " . mysqli_error($conn); // Display error message on statement preparation failure
      }
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
