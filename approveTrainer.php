<?php
session_start();

// Check if user is logged in as admin
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin@admin.com') {
    header("Location: ./signup.php");
    exit();
}

// Check if trainer ID is provided
if (!isset($_POST['id'])) {
    echo "Trainer ID is missing.";
    exit();
}

// Include database connection
include ('connection.php');

// Get trainer ID from POST data
$trainer_id = $_POST['id'];

// Check if trainer exists in the pending_trainer table
$check_query = "SELECT * FROM pending_trainer WHERE user_id = $trainer_id";
$check_result = mysqli_query($conn, $check_query);

if (!$check_result) {
    echo "Error: " . mysqli_error($conn);
    exit();
}

if (mysqli_num_rows($check_result) === 0) {
    echo "Trainer not found in pending list.";
    exit();
}

// Move trainer from pending_trainer to trainer_details table
$insert_query = "INSERT INTO trainer_details (user_id) VALUES ($trainer_id)";
if (mysqli_query($conn, $insert_query)) {
    // Remove trainer from pending_trainer table
    $delete_query = "DELETE FROM pending_trainer WHERE user_id = $trainer_id";
    if (mysqli_query($conn, $delete_query)) {
        echo "Trainer approved successfully.";
    } else {
        echo "Error deleting trainer from pending list: " . mysqli_error($conn);
    }
} else {
    echo "Error approving trainer: " . mysqli_error($conn);
}

// Close conn
mysqli_close($conn);
?>