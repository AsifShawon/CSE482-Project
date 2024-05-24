<?php
require __DIR__ . '/vendor/autoload.php';

session_start();
include 'connection.php';

if (isset($_GET['courseID'])) {
    $courseID = $_GET['courseID'];
    
    // Fetch course details from the database
    $query = "SELECT * FROM course WHERE courseID = $courseID";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $course = mysqli_fetch_assoc($result);
        // Use $course details in your checkout page
    } else {
        echo "Course not found.";
        exit;
    }
} else {
    echo "No course selected.";
    exit;
}

use Dotenv\Dotenv;

// Load the .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Use the Stripe secret key from the environment variables
$stripe_secret_key = $_ENV['STRIPE_SECRET_KEY'];

\Stripe\Stripe::setApiKey($stripe_secret_key);

try {
    $checkout_session = \Stripe\Checkout\Session::create([
        "payment_method_types" => ["card"],
        "mode" => "payment",
        "success_url" => "http://localhost:3000/success.php",
        "cancel_url" => "http://localhost/CSE482-Project/CAT.php",
        "line_items" => [
            [
                "quantity" => 1,
                "price_data" => [
                    "currency" => "bdt",
                    "unit_amount" => $course['fees'] * 100, // Amount in cents
                    "product_data" => [
                        "name" => $course['Course_name']
                        // "images" => ["https://example.com/t-shirt.png"],
                    ]
                ]
            ]
        ]
    ]);

    http_response_code(303);
    header("Location: " . $checkout_session->url);
} catch (Exception $e) {
    echo "Error creating checkout session: " . $e->getMessage();
}
