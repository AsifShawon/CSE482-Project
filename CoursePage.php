<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body {
        background-color: #DDD0C8;
    }
    .card {
        background-color: #f5f5f5;
    }
</style>
<body>
    <?php include 'navbar.php'; ?>
    <!-- Container div with course details -->
    <div class="container mt-2 mb-3">
        <!-- Course details HTML -->
    </div>
    <!-- JavaScript and jQuery imports -->
    <script>
        $(document).ready(function () {
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
                <div class="container mt-5 mb-5 course-container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="images p-3">
                                <div class="text-center p-4"> <img id="main-image" src="${course.image}" width="500px" /> </div>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center"> </div> <i class="fa fa-shopping-cart text-muted"></i>
                                </div>
                                <div class="mt-4 mb-3">
                                    <h5 class="text-uppercase">${course.title}</h5>
                                    <div class="price d-flex flex-row align-items-center"> <span class="act-price"><strong>${course.price}</strong></span>
                                    </div>
                                    <p class="rating" style="color:#fcd703;">${course.rating} <i class="bi bi-star-fill"></i></p>
                                </div>
                                <p class="about">${course.description}</p>
                                
                                <div class="cart mt-4 align-items-center"> <button class="btn btn-danger text-uppercase mr-2 px-4">Enroll</button> <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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