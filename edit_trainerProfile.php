<?php
// Start session if not started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Redirect if user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: ./signup.php");
    exit(); // Stop further execution
}

// Include database connection
include ('connection.php');

// Get username from session
$username = $_SESSION['username'];

// Fetch user details from users table
$user_query = "SELECT * FROM user WHERE email = '$username'";
$user_result = mysqli_query($conn, $user_query);
$user_row = mysqli_fetch_assoc($user_result);

// Fetch trainer details from trainer_details table
$trainer_id = $user_row['id'];
$trainer_details_query = "SELECT * FROM trainer_details WHERE user_id = $trainer_id";
$trainer_details_result = mysqli_query($conn, $trainer_details_query);
$trainer_details_row = mysqli_fetch_assoc($trainer_details_result);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $image_link = $_POST['image_link'];
    $quote = $_POST['quote'];
    $teached_stu = $_POST['teached_stu'];
    $courses_completed = $_POST['courses_completed'];
    $private_lessons = $_POST['private_lessons'];
    $description = $_POST['description'];

    // Update trainer details
    if ($trainer_details_row) {
        $update_query = "UPDATE trainer_details SET 
                            image_link = '$image_link', 
                            quote = '$quote', 
                            teached_stu = $teached_stu, 
                            courses_completed = $courses_completed, 
                            private_lessons = $private_lessons, 
                            description = '$description' 
                         WHERE user_id = $trainer_id";
    } else {
        $update_query = "INSERT INTO trainer_details (user_id, image_link, quote, teached_stu, courses_completed, private_lessons, description) 
                         VALUES ($trainer_id, '$image_link', '$quote', $teached_stu, $courses_completed, $private_lessons, '$description')";
    }

    if (mysqli_query($conn, $update_query)) {
        echo "Profile updated successfully!";
        // Refresh to get the updated data
        header("Location: edit_trainerProfile.php");
        exit();
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Trainer Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" href="CSS/styless.css" />
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container">
        <h2>Edit Trainer Profile</h2>
        <form method="POST" action="edit_trainerProfile.php">
            <div class="form-group">
                <label for="image_link">Image Link</label>
                <input type="text" class="form-control" id="image_link" name="image_link" value="<?php echo $trainer_details_row['image_link'] ?? ''; ?>">
            </div>
            <div class="form-group">
                <label for="quote">Quote</label>
                <textarea class="form-control" id="quote" name="quote"><?php echo $trainer_details_row['quote'] ?? ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="teached_stu">Students Taught</label>
                <input type="number" class="form-control" id="teached_stu" name="teached_stu" value="<?php echo $trainer_details_row['teached_stu'] ?? ''; ?>">
            </div>
            <div class="form-group">
                <label for="courses_completed">Courses Completed</label>
                <input type="number" class="form-control" id="courses_completed" name="courses_completed" value="<?php echo $trainer_details_row['courses_completed'] ?? ''; ?>">
            </div>
            <div class="form-group">
                <label for="private_lessons">Private Lessons</label>
                <input type="number" class="form-control" id="private_lessons" name="private_lessons" value="<?php echo $trainer_details_row['private_lessons'] ?? ''; ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"><?php echo $trainer_details_row['description'] ?? ''; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
    <?php include 'footer.html' ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>
