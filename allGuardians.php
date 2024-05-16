<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['username'])){
    if($_SESSION['$username'] != 'admin@admin.com'){
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
            <h1 class="display-4 fw-bold">Guardians</h1>
        </div>
    </div>

    <div class="container">
    <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#ID</th>
              <th scope="col">Name</th>
              <th scope="col">E-mail</th>
              <th scope="col">Phone Number</th>
              <th scope="col">Remove</th>
            </tr>
          </thead>
          <tbody>
            <?php
                include('connection.php');

                $sql = "SELECT * FROM users WHERE role_id = 3";
                $result = mysqli_query($conn, $sql);
                
                if (!$result) {
                    // Query execution failed, handle the error
                    echo "Error: " . mysqli_error($conn);
                } else {
                    // Query executed successfully
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
                            echo "<td>".$row['email']."</td>";
                            echo "<td>".$row['phone_num']."</td>";
                            echo "<td><button class='btn btn-danger delete-btn' data-eid='{$row["id"]}'>Delete</button></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "No records found";
                    }
                }
                
            ?>
          </tbody>
        </table>
    </div>


    <?php include ('footer.html') ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.delete-btn').click(function () {
                var rowId = $(this).data('eid');
                $.ajax({
                    url: 'deleteUser.php',
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