<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['username'])) {
    if ($_SESSION['$username'] != 'admin@admin.com') {
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
    <title>Guardian Dashboard</title>
</head>

<body style="padding-top: 20px;">
    <?php include ('navbar.php') ?>

    <div class="container pb-5">
        <div class="px-4 pt-1 my-1 text-center border-bottom">
            <h1 class="display-4 fw-bold">Trainers</h1>
        </div>
    </div>

    <div class="container">
        <!-- Pending Trainers Table -->
        <h2>Pending Trainers</h2>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include ('connection.php');

                $sql = "SELECT * FROM pending_trainer";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    echo "Error: " . mysqli_error($conn);
                } else {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $trainer_id = $row['user_id'];
                            $trainer_info_sql = "SELECT * FROM user WHERE id = $trainer_id";
                            $trainer_info_result = mysqli_query($conn, $trainer_info_sql);
                            $trainer_info = mysqli_fetch_assoc($trainer_info_result);

                            echo "<tr>";
                            echo "<td>" . $trainer_info['id'] . "</td>";
                            echo "<td>" . $trainer_info['first_name'] . " " . $trainer_info['last_name'] . "</td>";
                            echo "<td>" . $trainer_info['email'] . "</td>";
                            echo "<td>
                                    <button class='btn btn-success approve-btn' data-eid='{$trainer_info["id"]}'>Approve</button>
                                    <button class='btn btn-danger delete-btn' data-eid='{$trainer_info["id"]}'>Delete</button>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No pending trainers</td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>

        <!-- Approved Trainers Table -->
        <h2>Approved Trainers</h2>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include ('connection.php');

                $query = "SELECT u.id, u.first_name, u.last_name, u.email FROM user u INNER JOIN trainer_details td ON u.id = td.user_id";
                $result = mysqli_query($conn, $query);

                if (!$result) {
                    echo "Error: " . mysqli_error($conn);
                } else {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No approved trainers</td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>

    </div>

    <?php include ('footer.html') ?>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Approve button click handler
            $('.approve-btn').click(function () {
                var trainerId = $(this).data('eid');
                $.ajax({
                    url: 'approveTrainer.php',
                    method: 'POST',
                    data: { id: trainerId },
                    success: function (response) {
                        // Reload the page after approval
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            // Delete button click handler
            $('.delete-btn').click(function () {
                var trainerId = $(this).data('eid');
                $.ajax({
                    url: 'deleteTrainer.php',
                    method: 'POST',
                    data: { id: trainerId },
                    success: function (response) {
                        // Reload the page after deletion
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