<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Choose Appropriate Training</title>
</head>

<body>

    <div class="container justify-content-center d-flex flex-column" id="cont">
        <?php include 'navbar.php'; ?>
        <div>
            <h2 class="CourseDet"> Our Course Objectives </h2>
            <br>
            <p class="CourseDet lead" id="vision"> As cautious and responsible parents we all want our children to grow
                up strong, confident and with the
                ability to defend themselves in this unpredictable and scary world. Besides, in this new age of
                technology, our children do not get to do as much physical activity as we want them to. Our courses
                specially crafted and curated for your child not only will equip them with the necessary skills of self
                defense, but also will be a great way for them to get introduced to physical exercise as an athletic
                pursuit/a self- defense mechanism. With 50+ experts with tons of experience, we have a wide array of
                courses you can choose from to make your child's experience a great, enlightening and fun one.</p>
            <br><br>
        </div>

        <div>
            <h2 class="CourseDet">Our Features</h2>
            <br><br>
            <div class="d-flex flex-wrap flex-lg-nowrap justify-content-evenly">
                <div class="d-flex flex-column align-items-center"><img src="components/medal-.png" alt="" class="icon"><br>
                    <p class="corefet">Courses provided by 50+ certified expert instructors</p>
                </div>
                <div class="d-flex flex-column align-items-center"><img src="components/taekwondo.png" alt="" class="icon"><br>
                    <p class="corefet">In-person classes help learners gain hands-on experience</p>
                </div>
                <div class="d-flex flex-column align-items-center"><img src="components/communication.png" alt="" class="icon"><br>
                    <p class="corefet">Online community always ready to provide information.</p>
                </div>
            </div>
            <br><br>
        </div>

        <div>
            <h2 class="CourseDet">Our Courses</h2>
            <br>
            <!-- Search Input Field -->
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="search" placeholder="Search for courses">
            </div>
            <!-- Courses Container -->
            <div id="courses-container"></div>
        </div>
    </div>

    <?php include 'footer.html'; ?>
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Function to fetch and display courses
            function fetchCourses(query = '') {
                $.ajax({
                    url: 'fetch_courses.php',
                    method: 'GET',
                    data: { search: query },
                    success: function(data) {
                        $('#courses-container').html(data);
                    }
                });
            }

            // Fetch courses on page load
            fetchCourses();

            // Fetch courses on search input
            $('#search').on('keyup', function() {
                var query = $(this).val();
                fetchCourses(query);
            });

            // Enroll button click handler
            $(document).on('click', '.Enroll', function() {
                var courseID = $(this).data('courseid');
                window.location.href = 'checkout.php?courseID=' + courseID;
            });
        });
    </script>

</body>

</html>
