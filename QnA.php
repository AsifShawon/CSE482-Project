<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QnA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/QnA.css">
</head>

<body style="padding-top: 20px;">
    <?php include 'navbar.html'; ?>

    <div class="container-fluid">
    <div class="header">
        <h1>Welcome to Question & Answer</h1>
        <p>Ask us about your concerns. Let experts to answer.</p>
        <button>See Trainers</button>
        <button>See Courses</button>
    </div>

    <form class="qna-sec-1 container-fluid">
        <div class="title-group col-10">
            <div class="col-2"></div>
            <i class="fas fa-question-circle"></i>
            <input class="form-control" type="text" placeholder="Title" aria-label="Title">
        </div>
        <div class="title-group mb-3 col-10">
            <div class="col-2"></div>
            <textarea class="form-control" id="textarea1"
                placeholder="Ask any question and you be sure find your answer" rows="5"></textarea>
        </div>
        <div class="title-group">
            <div class="col-md-8 col-4"></div>
            <button class="btn btn-dark col-md-2 col-6">Ask Now</button>
        </div>
    </form>
    <hr>


    <!-- <div class="navigation">
        <a href="#" class="active">Recent Questions</a>
        <a href="#">Most Responses</a>
        <a href="#">Recently Answered</a>
        <a href="#">No answers</a>
    </div> -->
    <!-- 
    <div class="sidebar">
        <h3>Stats</h3>
        <p><i class="fas fa-question-circle"></i> Questions (20)</p>
        <p><i class="fas fa-comment"></i> Answers (50)</p>
    </div> -->

    <div class="question">
        <h3>This is my first Question</h3>
        <p>Duis dapibus aliquam mi, eget euismod sem scelerisque ut. Vivamus at elit quis urna adipiscing iaculis.
            Curabitur vitae velit in neque dictum blandit. Proin in iaculis neque. Pellentesque habitant morbi tristique
            senectus et netus et malesuada fames ac turpis egestas. Curabitur vitae velit in neque dictum blandit.</p>
        <button>Answer</button>
        <button>Report</button>
    </div>
    </div>

    <?php include 'footer.html'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('.navigation a').click(function (e) {
                e.preventDefault();
                $('.navigation a').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>
</body>

</html>