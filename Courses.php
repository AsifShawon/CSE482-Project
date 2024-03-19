<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #DDD0C8;
        }

        .card {
            background-color: #f5f5f5;
        }

        .rating {
            color: #d49502; /* Golden color for stars */
        }
    </style>
</head>
<body>
<?php include 'navbar.html'; ?>
<div class="container mt-2 mb-3">
    <div class="row mb-3">
        <div class="col">
            <h1>Courses</h1>
        </div>
        <div class="col-auto">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Sort By
                </button>
                <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                   <li><a class="dropdown-item" href="#">Price</a></li>
                    <li><a class="dropdown-item" href="#">Rating</a></li>
                    <li><a class="dropdown-item" href="#">Newest</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="courseList">
        <!-- Course cards will be dynamically added here -->
    </div>
</div>
<?php include 'footer.html'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        // Sample course data (replace with actual data)
        var courses = [
            {
                title: "Course 1",
                description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                image: "https://images.squarespace-cdn.com/content/v1/5bd1e5f1e5f7d10cd41b9ff9/1553619571898-UO6O5P1W8CB1K1KJ5EJ3/Kidsgogym-1.jpg?format=2500w",
                price: "$100",
                rating: 4.5
            },
            {
                title: "Course 2",
                description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                image: "https://m.media-amazon.com/images/M/MV5BZDVjMDQ0YmQtM2Y2My00ZTg3LWI4OWUtMzNiYzg3OWU2MGU3XkEyXkFqcGdeQXVyMTA2MDQ4Mg@@._V1_.jpg",
                price: "$150",
                rating: 3.8
            },
            {
                title: "Course 3",
                description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                image: "https://news.sanfordhealth.org/wp-content/uploads/2022/04/When-start-training_SHN-800x600-1.jpg",
                price: "$120",
                rating: 4.2
            }
            // Add more courses as needed
        ];

        // Function to render course cards
        function renderCourses() {
            var courseList = $('#courseList');
            courseList.empty();
            courses.forEach(function(course) {
                var cardHtml = `
                    <div class="col">
                        <div class="card mb-3">
                            <img src="${course.image}" class="card-img-top" alt="${course.title}">
                            <div class="card-body">
                                <h5 class="card-title">${course.title}</h5>
                                <p class="card-text">${course.description}</p>
                                <p class="card-text"><strong>${course.price}</strong></p>
                                <p class="card-text rating">
                                    ${course.rating} <i class="bi bi-star-fill"></i> <!-- Rating stars -->
                                </p>
                                <button class="btn btn-outline-dark btn-sm enrollBtn">Enroll</button>
                                <button class="btn btn-secondary btn-sm detailsBtn">Details</button>
                            </div>
                        </div>
                    </div>
                `;
                courseList.append(cardHtml);
            });
        }

        // Render initial courses
        renderCourses();

        // Function to handle details button click
        $(document).on('click', '.detailsBtn', function() {
                // Get the index of the clicked course
                var index = $(this).closest('.col').index();
                // Encode course data as JSON and pass it as a query parameter
                var courseData = encodeURIComponent(JSON.stringify(courses[index]));
                // Redirect to the course page with the course data
                window.location.href = 'CoursePage.php?data=' + courseData;
            });
    });
</script>

</body>
</html>
