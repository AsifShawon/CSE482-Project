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

        <form class="qna-sec-1 container-fluid" id="qna-form">
            <div class="title-group col-10">
                <div class="col-2"></div>
                <i class="fas fa-question-circle"></i>
                <input class="form-control" type="text" id="title" placeholder="Title" aria-label="Title">
            </div>
            <div class="title-group mb-3 col-10">
                <div class="col-2"></div>
                <textarea class="form-control" id="textarea1"
                    placeholder="Ask any question and you be sure find your answer" rows="5"></textarea>
            </div>
            <div class="title-group">
                <div class="col-md-8 col-4"></div>
                <button type="submit" id="ask-btn" class="btn btn-dark col-md-2 col-6">Ask Now</button>
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

        <div class="ques">
            <div class="question">
                <h3 class=""><strong>Question 1</strong></h3>
                <figure>
                    <blockquote class="blockquote">
                        <p>A well-known quote, contained in a blockquote element.</p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        <cite title="Source Title">Guardian 1</cite>
                    </figcaption>
                </figure>
                <button>Answer</button>
                <br><br>
            </div>
        </div>
    </div>

    <?php include 'footer.html'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="./Scripts/QnA.js"></script>
</body>

</html>