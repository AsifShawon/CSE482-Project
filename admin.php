<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['username'])){
    if($_SESSION['$username'] !== 'admin@admin.com'){
        header("Location: ./signup.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./CSS/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>Admin Page</title>
</head>

<body style="padding-top: 20px;">
    <?php include ('navbar.php') ?>

    <div class="container pb-5">
        <div class="px-4 pt-1 my-1 text-center border-bottom">
            <h1 class="display-4 fw-bold">Admin Dashboard</h1>
            <div class="col-lg-6 mx-auto">
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                    <a href="./Course_create.php" type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Add Course</a>
                    <!-- <button type="button" class="btn btn-outline-secondary btn-lg px-4">Pending Teachers</button> -->
                </div>
            </div>
        </div>

        <div class="row justify-content-center gap-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <?php
                    include ('connection.php');
                    $sql = "SELECT * FROM user WHERE role_id = 2";
                    $result = mysqli_query($conn, $sql);
                    $trainers = mysqli_num_rows($result);
                    echo '<div class="card-header text-center h1">' . $trainers . '</div>';
                    ?>
                    <h5 class="card-title text-center h1">Trainers</h5>

                    <div class="text-center"><a href="./allTrainers.php" class="btn btn-primary">See All</a></div>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                <?php
                    include ('connection.php');
                    $sql = "SELECT * FROM course";
                    $result = mysqli_query($conn, $sql);
                    $courses = mysqli_num_rows($result);
                    echo '<div class="card-header text-center h1">' . $courses . '</div>';
                    ?>
                    <h5 class="card-title text-center h1">Courses</h5>
                    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                    <div class="text-center"><a href="./allCourses.php" class="btn btn-primary">See All</a></div>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <?php
                    include ('connection.php');
                    $sql = "SELECT * FROM user WHERE role_id = 3";
                    $result = mysqli_query($conn, $sql);
                    $guardians = mysqli_num_rows($result);
                    echo '<div class="card-header text-center h1">' . $guardians . '</div>';
                    ?>
                    <h5 class="card-title text-center h1">Guardians</h5>
                    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                    <div class="text-center"><a href="./allGuardians.php" class="btn btn-primary">See All</a></div>
                </div>
            </div>
        </div>
    </div>



    <?php include ('footer.html') ?>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>