<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('You must be logged in to access this page')</script>";
    echo "<script>window.open('./signup.php', '_self')</script>";
    exit();
}

include ('connection.php');

$username = $_SESSION['username'];

// Fetch guardian's profile information
$query = "SELECT * FROM user WHERE email = '$username'";
$user_result = mysqli_query($conn, $query);

if ($user_result && mysqli_num_rows($user_result) > 0) {
    $user_row = mysqli_fetch_assoc($user_result);
    $user_id = $user_row['id'];
} else {
    echo "<script>alert('User not found')</script>";
    echo "<script>window.open('./signup.php', '_self')</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>Guardian Dashboard</title>
    <style>
        body {
            margin-top: 10px;
            background-color: #DDD0c8;
        }

        .profile-box,
        .course-box {
            background-color: #f0ebe8;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5%;
        }

        .title {
            display: inline-block;
            background-color: rgba(32, 32, 32, 0.5);
            color: white;
        }

        a {
            text-decoration: none;
            color: black;
        }

        .profile-img {
            border-radius: 50%;
        }

        .profile-edit-btn {
            background-color: #323232;
            color: white;
        }
    </style>
</head>

<body>
    <?php include ('navbar.php') ?>

    <div class="container text-center">
        <h2 class="shadow-lg p-3 mb-5 bg-body-tertiary rounded title">Guardian Profile</h2>
        <div class="profile-box">
            <div class="row">
                <div class="col-md-4">
                    <img src="./components/guardian-icon.jpg" width=60%" alt="Profile Image"
                        class="profile-img img-fluid">
                </div>
                <div class="col-md-8">
                    <h3><?php echo $user_row['first_name'] . ' ' . $user_row['last_name']; ?></h3>
                    <p>Email: <?php echo $user_row['email']; ?></p>
                    <p>Phone Number: <?php echo $user_row['phone_num']; ?></p>
                    <a href="edit_profile.php" class="btn profile-edit-btn">Edit Profile</a>
                </div>
            </div>
        </div>

        <h2 class="shadow-lg p-3 mb-5 bg-body-tertiary rounded title">Your Enrolled Courses:</h2>
        <div class="course-container">
            <?php
            $course_query = "SELECT c.courseID, c.Course_name, c.Course_description, c.fees, c.image FROM payment p
                             JOIN course c ON p.courseID = c.courseID
                             WHERE p.userID = $user_id";

            $course_result = mysqli_query($conn, $course_query);

            if ($course_result && mysqli_num_rows($course_result) > 0) {
                while ($row = mysqli_fetch_assoc($course_result)) {
                    ?>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="card course-box">
                                
                                    <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="Course image">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['Course_name']; ?></h5>
                                        <p class="card-text"><?php echo $row['Course_description']; ?></p>
                                        <p class="card-text">Fees: <?php echo $row['fees']; ?></p>
                                    </div>
                                
                            </div>
                        </div>
                    </div>


                    <?php
                }
            } else {
                echo "<p>No courses found</p>";
            }
            ?>
        </div>
    </div>
    <br>

    <?php include ('footer.html') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="an