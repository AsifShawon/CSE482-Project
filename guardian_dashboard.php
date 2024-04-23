<?php
session_start();


if (!isset($_SESSION['username'])) {
    echo "<script>alert('You must be logged in to access this page')</script>";
    echo "<script>window.open('./login.php', '_self')</script>";
    exit();
}


include('connection.php');

$connection = mysqli_connect($host, $user, $pass, $db);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


$username = $_SESSION['username'];



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
    body{margin-top:10px;
    background-color:#DDD0c8;
    }
    .course-box{background-color:#f0ebe8;
    padding:20px;
    margin-bottom:20px;
    border-radius:5%;}
    .title{
        display:inline-block;
        background-color:rgba(32, 32, 32,0.5);
    color:white;}
    a{text-decoration:none;
    color:black;}
    </style>
</head>

<body>
    <?php include ('navbar.php') ?>

    <div class="container text-center">
        <h2 class="shadow-lg p-3 mb-5 bg-body-tertiary rounded title">Your Enrolled Courses:</h2>
        <div class="course-container">
            <?php

        $query = "SELECT id FROM users WHERE email = '$username'";
$user_result = mysqli_query($connection, $query);

if ($user_result && mysqli_num_rows($user_result) > 0) {
    $user_row = mysqli_fetch_assoc($user_result);
    $user_id = $user_row['id'];

    $course_query = "SELECT c.courseID, c.Course_name, c.Course_description,c.fees FROM course_user cu
                             JOIN course c ON cu.courseID = c.courseID
                             WHERE cu.userID = $user_id";

    $course_result = mysqli_query($connection, $course_query);
    

    $progress_widths = [75, 15,30];
    $current_index = 0; 

    while ($row = mysqli_fetch_assoc($course_result)) {
        ?>
            <div class="course-box">
                <a 
                    href="course_details.php?courseID=<?php echo $row['courseID']; ?>">
                    <h3>
                    <?php echo $row['Course_name']; ?>
                </h3>
                    <p>Course ID:
                    <?php echo $row['courseID']; ?>
                </p>
                    <p>
                    <?php echo $row['Course_description']; ?>
                    </p>
                    <p>Fees:
                        <?php echo $row['fees']; ?>
                    </p>
                    <strong><em>Course Progress:</em></strong>
                    <div class="progress">
                        <div class="progress-bar"
                            style="width: <?php echo $progress_widths[$current_index] ?? '0'; ?>%;">
                        </div>
                    </div>
                </a>
            </div>
            <?php
        $current_index++;
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
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./Scripts/script.js"></script>
</body>

</html>