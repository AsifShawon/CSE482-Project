<?php
// Start session if not started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include database connection
include('connection.php');

// Check if user is logged in
$logged_in_username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

// Fetch the trainer's details
if (isset($_GET['id'])) {
    $trainer_id = $_GET['id'];

    // Fetch trainer details
    $trainer_query = "
        SELECT 
            u.id, u.first_name, u.last_name, u.email, 
            t.image_link, t.quote, t.teached_stu, t.courses_completed, t.private_lessons, t.description 
        FROM 
            user u 
        INNER JOIN 
            trainer_details t 
        ON 
            u.id = t.user_id
        WHERE 
            u.id = $trainer_id";

    $trainer_result = mysqli_query($conn, $trainer_query);
    $trainer = mysqli_fetch_assoc($trainer_result);

    // Redirect to a 404 page if trainer not found
    if (!$trainer) {
        header("Location: ./404.php");
        exit();
    }

    // Fetch courses taught by trainer
    $courses_taught_query = "SELECT c.* FROM course c INNER JOIN course_teacher ct ON c.courseID = ct.course_id WHERE ct.teacher_id = $trainer_id";
    $courses_taught_result = mysqli_query($conn, $courses_taught_query);
} else {
    // Redirect to a 404 page if ID not set
    header("Location: ./404.php");
    exit();
}

// Determine if the logged-in user is viewing their own profile
$is_own_profile = $logged_in_username && $logged_in_username === $trainer['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trainer Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" href="CSS/styless.css" />
</head>

<body>
    <?php include 'navbar.php' ?>

    <div class="container">
        <!-- Trainer details -->
        <div class="row trainers" id="trainerinfo">
            <div class="col-lg-4">
                <?php
                // Check if trainer image is available
                $trainer_image = !empty($trainer['image_link']) ? $trainer['image_link'] : './components/default-trainer.jpg';
                ?>
                <img class="center rounded mx-auto trainerimg" src="<?php echo $trainer_image; ?>" width="90%" alt="Trainer Image"
                    width="320" height="320" />
            </div>
            <div class="col-lg-8 bio">
                <h1 class="names"><?php echo $trainer['first_name'] . ' ' . $trainer['last_name']; ?></h1>
                <h4><?php echo $trainer['quote']; ?></h4>
                <p class="bodytext"><?php echo $trainer['description']; ?></p>
                <?php if ($is_own_profile): ?>
                    <div class="buttons">
                        <a href="edit_trainerProfile.php" class="btn btn-outline-primary px-4">Edit Profile</a>
                        <button class="btn btn-outline-primary px-4 btn1">Message</button>
                        <a href="mailto:<?php echo $trainer['email']; ?>" class="btn btn-primary px-4 ms-3 btn2">Contact</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row sec2">
            <div class="col-6 d-flex justify-content-center align-items-center">
                <q class="tquote">
                    <?php echo $trainer['quote']; ?>
                </q>
            </div>
            <div class="col-6">
                <img src="https://static.thenounproject.com/png/14163-200.png" class="img-fluid mx-auto center rounded" alt="Trainer Image">
            </div>
        </div>

        <div class="counter">
            <div class="row">
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2"><?php echo $trainer['teached_stu'] ?? 0; ?></h6>
                        <p class="m-0px font-w-600">Students Taught</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2"><?php echo $trainer['courses_completed'] ?? 0; ?></h6>
                        <p class="m-0px font-w-600">Courses Completed</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2"><?php echo $trainer['photos_captured'] ?? 0; ?></h6>
                        <p class="m-0px font-w-600">Photos Captured</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2"><?php echo $trainer['private_lessons'] ?? 0; ?></h6>
                        <p class="m-0px font-w-600">Private Lessons</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trainer courses -->
        <h2 class="courseheader">Courses With Coach <?php echo $trainer['first_name']; ?></h2>
        <?php while ($course_row = mysqli_fetch_assoc($courses_taught_result)): ?>
            <div class="card">
                <h5 class="card-header">
                    <a href="#" class="badge badge-light"><?php echo $course_row['category']; ?></a>
                </h5>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $course_row['title']; ?></h5>
                    <img src="<?php echo $trainer_image; ?>" alt="Trainer" width="32" height="32" class="rounded-circle flex-shrink-0">
                    <h6 class="mb-0 d-inline">&nbsp;With <em><?php echo $trainer['first_name'] . ' ' . $trainer['last_name']; ?></em></h6>
                    <br>
                    <p class="card-text cdet"><?php echo $course_row['description']; ?></p>
                    <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-primary btn2 btntxt align-self-center">View Course Details</a>
                        <p class="d-inline price"><?php echo '$' . $course_row['price']; ?></p>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
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
