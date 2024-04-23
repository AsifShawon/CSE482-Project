<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['username'])) {
    if ($_SESSION['$username'] != 'admin@admin.com') {
        header("Location: ./login.php");
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
    <title>Guardian Dashboard</title>
</head>

<body style="padding-top: 20px;">
    <?php include ('navbar.php') ?>

    <div class="container pb-5">
        <div class="px-4 pt-1 my-1 text-center border-bottom">
            <h1 class="display-4 fw-bold">Course List</h1>
        </div>
    </div>
    <div class="container">
        <div class="row mb-2">


        </div>
    </div>
    <div class="container">
        <div class="row mb-2">
            <?php
            include ('connection.php');

            $sql = "SELECT * FROM course";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                // Query execution failed, handle the error
                echo "Error: " . mysqli_error($conn);
            } else {
                // Query executed successfully
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="col-md-6">';
                        echo '<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">';
                        echo '<div class="col p-4 d-flex flex-column position-static">';
                        echo '<strong class="d-inline-block mb-2 text-success">' . $row['courseID'] . '</strong>';
                        echo '<h3 class="mb-0">' . $row['Course_name'] . '</h3>';
                        echo '<div class="mb-1 text-muted">Price: ' . $row['fees'] . '</div>';
                        echo '<p class="mb-auto">' . $row['Course_description'] . '</p>';

                        echo "<td><button class='btn btn-danger delete-btn' data-eid='{$row["courseID"]}'>Delete</button></td>";
                        echo '</div></div></div>';
                    }
                } else {
                    echo "No records found";
                }
            }
            ?>
        </div>
    </div>


    <?php include ('footer.html') ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.delete-btn').click(function () {
                var rowId = $(this).data('eid');
                $.ajax({
                    url: 'deleteCourse.php',
                    method: 'POST',
                    data: { id: rowId },
                    success: function (response) {

                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>