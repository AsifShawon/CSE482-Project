<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('You must be logged in to access this page')</script>";
    echo "<script>window.open('./signup.php', '_self')</script>";
    exit();
}

include('connection.php');

$username = $_SESSION['username'];

// Fetch user profile information
$query = "SELECT * FROM user WHERE email = '$username'";
$user_result = mysqli_query($conn, $query);

if ($user_result && mysqli_num_rows($user_result) > 0) {
    $user_row = mysqli_fetch_assoc($user_result);
    $user_id = $user_row['id'];
    $role = $user_row['role_id'];

    // Check if the user is a guardian
    if ($role != 3) { // Assuming role_id 3 is for guardians
        echo "<script>alert('Access denied. Only guardians can edit this profile.')</script>";
        echo "<script>window.open('./index.php', '_self')</script>";
        exit();
    }
} else {
    echo "<script>alert('User not found')</script>";
    echo "<script>window.open('./signup.php', '_self')</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get updated profile data from the form
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_num = mysqli_real_escape_string($conn, $_POST['phone_num']);

    // Update the user's information in the database
    $update_query = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email', phone_num='$phone_num' WHERE id='$user_id'";
    
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Profile updated successfully')</script>";
        echo "<script>window.open('./guardian_dashboard.php', '_self')</script>";
    } else {
        echo "<script>alert('Error updating profile: " . mysqli_error($conn) . "')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>Edit Profile</title>
    <style>
        body {
            margin-top: 10px;
            background-color: #DDD0c8;
        }

        .profile-box {
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
    </style>
</head>

<body>
    <?php include('navbar.php') ?>

    <div class="container text-center">
        <h2 class="shadow-lg p-3 mb-5 bg-body-tertiary rounded title">Edit Profile</h2>
        <div class="profile-box">
            <form method="post" action="edit_profile.php">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                        value="<?php echo $user_row['first_name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                        value="<?php echo $user_row['last_name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="<?php echo $user_row['email']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="phone_num" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone_num" name="phone_num"
                        value="<?php echo $user_row['phone_num']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
    </div>
    <br>

    <?php include('footer.html') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./Scripts/script.js"></script>
</body>

</html>
