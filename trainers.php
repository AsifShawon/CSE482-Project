<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Dashboard</title>
    <!-- <link rel="stylesheet" href="./CSS/trainers.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="padding-top: 20px;">
    <?php include 'navbar.php' ?>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-8 col-md-8 mx-auto">
                <h1>Trainers</h1>
                <p class="text-muted">
                    A physical and health trainer is a professional who guides individuals in achieving fitness goals
                    through personalized exercise plans and lifestyle adjustments. They assess clients' fitness levels,
                    provide instruction on proper exercise techniques, and offer motivation and support to promote
                    long-term health and well-being. Trainers may specialize in specific areas such as weight loss,
                    muscle building, or sports performance, and work in various settings including gyms, fitness
                    centers, or as independent contractors.</p>

            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php
                include('connection.php');
                $query = "SELECT * FROM users WHERE role_id = 2";
                $result = mysqli_query($conn, $query);
                if (!$result) {
                    echo "Error: " . mysqli_error($conn);
                } else {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col">';
                            echo '<div class="card shadow-sm">';
                            echo '<img src="https://www.w3schools.com/bootstrap4/img_avatar3.png" class="bd-placeholder-img card-img-top" width="100%" height="225">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">' . $row['first_name'] . ' ' . $row['last_name'] . '</h5>';
                            echo '<p class="card-text">' . $row['email'] . '</p>';
                            echo '<div class="d-flex justify-content-between align-items-center">';
                            echo '<div class="btn-group">';
                            echo '<button type="button" class="btn btn-sm btn-outline-secondary">Details</button>';

                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <?php include 'footer.html'; ?>
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