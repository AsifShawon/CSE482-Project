<?php
include 'connection.php';

// Get the search query if it exists
$searchQuery = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

// Modify the SQL query to include search functionality
$query = "SELECT * FROM course";
if (!empty($searchQuery)) {
    $query .= " WHERE Course_name LIKE '%$searchQuery%' OR Course_description LIKE '%$searchQuery%'";
}

$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='bgcolor container p-3 my-3 rounded'>
                <div class='row'>
                    <div class='col-12' id='course" . $row['courseID'] . "'></div>
                </div>
                <div class='row'>
                    <img src=" . $row['image'] . " class='col-12 center mb-4 mx-auto' alt='Picture of MMA fighters' height='500'>
                </div>
                <div class='row'>
                    <h5 class='col-6 '>" . $row['Course_name'] . "</h5>
                    <h5 class='col-6 text-end'>BDT" . $row['fees'] . "/= Monthly</h5>
                </div>
                <div class='row'>
                    <p class='col-12'>" . $row['Course_description'] . "</p>
                </div>
                <div class='row d-flex justify-content-between'>
                    <h6 class='col-6 my-2'><em>Ages " . $row['MinAge'] . "-" . $row['MaxAge'] . "</em></h6>
                    <span class='col-6 text-end my-2'><strong>" . $row['Enrolled'] . " Enrolled</strong></span>
                </div>
                <div class='row mt-2'>
                    <button class='col-4 Enroll btn btn-outline-dark mx-2' data-courseid='" . $row['courseID'] . "'>Enroll Today!</button>
                </div>
            </div>";
    }
} else {
    echo "<p>No courses found matching your search query.</p>";
}
?>
