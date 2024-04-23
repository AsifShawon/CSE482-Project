<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['username'])) {
    header("Location: ./login.php");
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
    <title>Trainer Dashboard</title>
</head>

<body style="padding-top: 20px;">
    <?php include ('navbar.php') ?>

    <div class="container pb-5">
        <div class="px-4 pt-1 my-1 text-center border-bottom border-bottom">
            <h1 class="display-4 fw-bold">Trainer Dashboard</h1>
        </div>
    </div>

    <div class="container pb-5">
        <div class="profile-sec d-flex gap-5">
            <img src="./components/dummy-profile-pic-1.jpg" class="img-thumbnail" alt="...">
            <div class="pro-2 ">
                <?php
                include ('connection.php');
                $sql = "SELECT * FROM users WHERE email = '" . $_SESSION['username'] . "'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                echo '<h1>' . $row['first_name'] . ' ' . $row['last_name'] . '</h1>';
                echo '<p>' . $row['email'] . '</p>';
                ?>
            </div>
        </div>
    </div>

    <?php include ('footer.html') ?>
</body>

</html>