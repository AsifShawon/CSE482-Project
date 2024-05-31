<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch course data from the form
    $title = $_POST['title'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $minAge = $_POST['minAge'];
    $maxAge = $_POST['maxAge'];
    $duration = $_POST['duration'];
    $prerequisite = $_POST['prerequisite'];

    // Insert course data into the course table
    $courseQuery = "INSERT INTO course (Course_name, Course_description, fees, MinAge, MaxAge, Enrolled, image, duration, prerequisite)
                    VALUES ('$title', '$description', $price, $minAge, $maxAge, 0, '$image', $duration, '$prerequisite')";

    if (mysqli_query($conn, $courseQuery)) {
        // Get the ID of the newly inserted course
        $courseId = mysqli_insert_id($conn);

        // Assign teachers/instructors to the course
        if (!empty($_POST['teachers'])) {
            $teachers = $_POST['teachers'];
            foreach ($teachers as $teacherId) {
                $assignQuery = "INSERT INTO course_teacher (course_id, teacher_id) VALUES ($courseId, $teacherId)";
                mysqli_query($conn, $assignQuery);
            }
        }

        // Redirect to a success page or show a success message
        echo "<script>alert('Course added successfully!'); window.location.href='Create_course.php';</script>";
    } else {
        // If course insertion fails, show an error message
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.href='Create_course.php';</script>";
    }
} else {
    // If the request method is not POST, redirect back to the create course page
    header("Location: Create_course.php");
}
?>
