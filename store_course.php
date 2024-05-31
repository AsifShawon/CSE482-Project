<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch course data from the form
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $image = mysqli_real_escape_string($conn, $_POST['image']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $minAge = mysqli_real_escape_string($conn, $_POST['minAge']);
    $maxAge = mysqli_real_escape_string($conn, $_POST['maxAge']);
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $prerequisite = mysqli_real_escape_string($conn, $_POST['prerequisite']);

    // Insert course data into the course table using prepared statements
    $courseQuery = "INSERT INTO course (Course_name, Course_description, fees, MinAge, MaxAge, Enrolled, image, duration, prerequisite) VALUES (?, ?, ?, ?, ?, 0, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $courseQuery);
    mysqli_stmt_bind_param($stmt, "ssiiisis", $title, $description, $price, $minAge, $maxAge, $image, $duration, $prerequisite);

    if (mysqli_stmt_execute($stmt)) {
        // Get the ID of the newly inserted course
        $courseId = mysqli_insert_id($conn);

        // Assign teachers/instructors to the course
        if (!empty($_POST['teachers'])) {
            $teachers = $_POST['teachers'];
            foreach ($teachers as $teacherId) {
                echo "<script>console.log('Teacher ID: " . $teacherId . "');</script>";
                $assignQuery = "INSERT INTO course_teacher (course_id, teacher_id) VALUES (?, ?)";
                $assignStmt = mysqli_prepare($conn, $assignQuery);
                mysqli_stmt_bind_param($assignStmt, "ii", $courseId, $teacherId);
                mysqli_stmt_execute($assignStmt);
            }
        }

        // Redirect to a success page or show a success message
        echo "<script>alert('Course added successfully!'); window.location.href='CAT.php';</script>";
    } else {
        // If course insertion fails, show an error message
        $error_message = mysqli_real_escape_string($conn, mysqli_error($conn));
        echo "<script>alert('Error: " . $error_message . "'); window.location.href='Create_course.php';</script>";
    }

    mysqli_stmt_close($stmt);
} else {
    // If the request method is not POST, redirect back to the create course page
    header("Location: Create_course.php");
}
?>
