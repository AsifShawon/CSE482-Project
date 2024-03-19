<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags, title, CSS links -->
</head>
<body>
    <?php include 'navbar.html'; ?>
    <!-- Container div with course details -->
    <div class="container mt-2 mb-3">
        <!-- Course details HTML -->
    </div>
    <?php include 'footer.html'; ?>

    <!-- JavaScript and jQuery imports -->
    <script>
        $(document).ready(function() {
            // Function to decode query parameter and display course details
            function displayCourseDetails() {
                // Get the course data from the URL query parameter
                var urlParams = new URLSearchParams(window.location.search);
                var courseData = urlParams.get('data');
                console.log(courseData);
                // Decode and parse JSON course data
                var course = JSON.parse(decodeURIComponent(courseData));
                // Display course details in the HTML
                $('.container').html(`
                    <div class="row">
                        <div class="col">
                            <h1>${course.title}</h1>
                            <img src="${course.image}" alt="${course.title}" class="img-fluid">
                            <p>${course.description}</p>
                            <p><strong>${course.price}</strong></p>
                            <p class="rating">${course.rating} <i class="bi bi-star-fill"></i></p>
                        </div>
                    </div>
                `);
            }

            // Call the function to display course details when the page loads
            displayCourseDetails();
        });
    </script>
</body>
</html>
