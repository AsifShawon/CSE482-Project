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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Course</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #DDD0C8;
            color: #323232;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-custom {
            background-color: #323232;
            color: white;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-3">
        <h1>Create Course</h1>
        <div class="card shadow">
            <div class="card-body">
                <form id="course-form" action="store_course.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image Link</label>
                        <input type="url" class="form-control" id="image" name="image" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="minAge" class="form-label">Minimum Age</label>
                        <input type="number" class="form-control" id="minAge" name="minAge" required>
                    </div>
                    <div class="mb-3">
                        <label for="maxAge" class="form-label">Maximum Age</label>
                        <input type="number" class="form-control" id="maxAge" name="maxAge" required>
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration (in weeks)</label>
                        <input type="number" class="form-control" id="duration" name="duration" required>
                    </div>
                    <div class="mb-3">
                        <label for="prerequisite" class="form-label">Pre-requisite</label>
                        <textarea class="form-control" id="prerequisite" name="prerequisite" rows="2"
                            required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="teachers" class="form-label">Teachers/Instructors</label>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        
                                        Select All
                                    </th>
                                    <th scope="col">Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Fetch teachers/instructors from the database
                                $query = "SELECT * FROM user WHERE role_id = 2";
                                $result = mysqli_query($conn, $query);
                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>';
                                        echo '<td><input type="checkbox" class="form-check-input" name="teachers[]" value="' . $row['id'] . '"></td>';
                                        echo '<td>' . $row['first_name'] . ' ' . $row['last_name'] . '</td>';
                                        echo '</tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-custom">Create Course</button>
                </form>
            </div>
        </div>
    </div>
    <div class="mb-5"></div>
    <?php include 'footer.html'; ?>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>