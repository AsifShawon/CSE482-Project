<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Course</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./Css/Course_Create.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-3">
        <h1>Create Course</h1>
        <div class="card shadow">
            <div class="card-body">
                <form id="course-form">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image Upload</label>
                        <input type="file" class="form-control" id="image" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="suitable-ages" class="form-label">Suitable Ages</label>
                        <input type="text" class="form-control" id="suitable-ages" required>
                    </div>
                    <div class="mb-3">
                        <label for="trainers" class="form-label">Trainers</label>
                        <div id="trainers-container">
                            <div class="mb-2">
                                <input type="text" class="form-control trainer-name mb-1" placeholder="Trainer Name"
                                    required>
                                <input type="url" class="form-control trainer-link mb-1" placeholder="Trainer Link"
                                    required>
                                <button type="button" class="btn btn-danger btn-sm delete-trainer">Delete</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary btn-sm mt-2" id="add-trainer">Add
                            Trainer</button>
                    </div>
                    <button type="submit" class="btn btn-success">Create Course</button>
                </form>
            </div>
        </div>
    </div>
    <div class="mb-5"></div>
    <?php include 'footer.html'; ?>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Add trainer input field
            $('#add-trainer').click(function () {
                $('#trainers-container').append(`
                    <div class="mb-2">
                        <input type="text" class="form-control trainer-name" placeholder="Trainer Name" required>
                        <input type="url" class="form-control trainer-link" placeholder="Trainer Link" required>
                        <button type="button" class="btn btn-danger btn-sm delete-trainer">Delete</button>
                    </div>
                `);
            });

            // Delete trainer input field
            $('#trainers-container').on('click', '.delete-trainer', function () {
                $(this).closest('.mb-2').remove();
            });

            // Submit form
            $('#course-form').submit(function (e) {
                e.preventDefault();
                var course = {
                    title: $('#title').val(),
                    image: $('#image').val(), // Not implemented for local file system
                    description: $('#description').val(),
                    price: $('#price').val(),
                    suitableAges: $('#suitable-ages').val(),
                    trainers: []
                };

                // Retrieve trainer data
                $('.trainer-name').each(function (index) {
                    var trainerName = $(this).val();
                    var trainerLink = $('.trainer-link').eq(index).val();
                    course.trainers.push({ name: trainerName, link: trainerLink });
                });

                // Store course data in local storage
                var courses = JSON.parse(localStorage.getItem('courses')) || [];
                courses.push(course);
                localStorage.setItem('courses', JSON.stringify(courses));

                // Clear form fields
                $('#course-form')[0].reset();
                $('#trainers-container').html(`
                    <div class="mb-2">
                        <input type="text" class="form-control trainer-name" placeholder="Trainer Name" required>
                        <input type="url" class="form-control trainer-link" placeholder="Trainer Link" required>
                        <button type="button" class="btn btn-danger btn-sm delete-trainer">Delete</button>
                    </div>
                `);

                alert('Course created successfully!');
            });
        });
    </script>
</body>

</html>