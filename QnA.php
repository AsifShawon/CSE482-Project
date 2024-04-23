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
    <?php include 'navbar.php'; ?>

    <div>
        <div class="header">
            <h1>Welcome to Question & Answer</h1>
            <p>Ask us about your concerns. Let experts to answer.</p>
            <button>See Trainers</button>
            <button>See Courses</button>
        </div>

        <form class="qna-sec-1 container" id="qna-form" action="./asknow.php" method="post">
            <div class="title-group col-12">
                <!-- <div class="col-2"></div> -->
                <i class="fas fa-question-circle"></i>
                <input required class="form-control" name="title" type="text" id="title" placeholder="Title"
                    aria-label="Title">
            </div>
            <div class="title-group mb-3 col-12">
                <!-- <div class="col-2"></div> -->
                <textarea required class="form-control" id="textarea1" name="question"
                    placeholder="Ask any question and you be sure find your answer" rows="5"></textarea>
            </div>
            <div class="title-group">
                <div class="col-md-10 col-6"></div>
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

        <div class="ques container">
            <?php
            include ('connection.php');
            $query = "SELECT * FROM qna";
            $result = mysqli_query($conn, $query);
            $count = 1;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='question'>";
                    echo "<h3 class=''><strong>Question " . $count++ . "</strong></h3>";
                    echo "<figure>";
                    echo "<blockquote class='blockquote'>";
                    echo "<p>" . $row['title'] . "</p>";
                    echo "</blockquote>";
                    echo "<figcaption class='blockquote-footer'>";
                    echo "<cite title='Source Title'>" . $row["email"] . "</cite>";
                    echo "</figcaption>";
                    echo "</figure>";
                    echo "<button class='answerBtn' data-eid='{$row["id"]}'>Answer</button>";
                    echo "<br><br>";
                    echo "</div>";
                }
            } else {
                echo "No records found";
            }
            ?>
        </div>
    </div>

    <!-- Modal -->
    <button id="answerModalBtn" data-bs-toggle="modal" data-bs-target="#answerModal" style="display:none"></button>
    <div class="modal fade" id="answerModal" tabindex="-1" aria-labelledby="answerModalLabel" aria-hidden="true">
        <!-- ------------ -->
        
    </div>

    <?php include 'footer.html'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="./Scripts/QnA.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            $(".answerBtn").click(function () {
                var id = $(this).data("eid");
                $.ajax({
                    url: "getAnswer.php",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function (data) {
                        $("#answerModal").html(data);
                        $("#answerModalBtn").click();
                    }
                });
            });

        });

    </script>

</html>