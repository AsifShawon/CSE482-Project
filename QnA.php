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
                <input required class="form-control" type="text" id="title" placeholder="Title" aria-label="Title">
            </div>
            <div class="title-group mb-3 col-10">
                <div class="col-2"></div>
                <textarea required class="form-control" id="textarea1"
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

    <!-- want to login Modal -->
    <div class="modal" tabindex="-1" id="askloginmodal">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #d1ddc8;">
                <div class="modal-header">
                    <h5 class="modal-title">Sorry! You are not logged in.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Login to ask or answer questions.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn" style="background-color: #323232; color: #f5f5f5;">Login</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="answerModal" tabindex="-1" aria-labelledby="answerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="background-color: #f5f5f5;">
                <div class="modal-header">
                    <h5 class="modal-title" id="answerModalLabel">Answer Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="question-details">
                        <h3 id="modal-question-title"></h3>
                        <p id="modal-question-body"></p>
                    </div>
                    <div class="existing-answers">
                        <h4>Previous Answers</h4>
                        <div id="previous-answers-container"></div>
                    </div>
                    <form id="answer-form">
                        <div class="form-group">
                            <label for="answer-textarea">Your Answer</label>
                            <textarea class="form-control" id="answer-textarea" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn" style="background-color: #323232; color: #f5f5f5;" id="submit-answer">Submit Answer</button>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.html'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="./Scripts/QnA.js"></script>
    <script>
        $(document).ready(function () {
            const isLoggedIn = localStorage.getItem('authToken') !== null;

            $('#ask-btn').click(function (e) {
                e.preventDefault(); // Prevent the default form submission behavior
                if (!isLoggedIn) {
                    $('#askloginmodal').modal('show');
                    return;
                }
                var title = $('#title').val();
                var description = $('#textarea1').val();
                // Create HTML for the new question
                var newQuestionHTML = `
            <div class="question">
                <h3><strong>${title}</strong></h3>
                <figure>
                    <blockquote class="blockquote">
                        <p>${description}</p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        <cite title="Source Title">Your Name</cite>
                    </figcaption>
                </figure>
                <button>Answer</button>
            </div>
        `;

                // Append the new question HTML to the .questions container
                $('.ques').append(newQuestionHTML);

                // Clear input fields after adding the question
                $('#title').val('');
                $('#textarea1').val('');
            });

            $('.question button').on('click', function () {
                const questionTitle = $(this).closest('.question').find('h3').text();
                const questionBody = $(this).closest('.question').find('blockquote p').text();

                // Populate the modal with question data
                $('#modal-question-title').text(questionTitle);
                $('#modal-question-body').text(questionBody);

                // Clear the answer textarea
                $('#answer-textarea').val('');

                // Clear the previous answers container
                $('#previous-answers-container').empty();

                // Retrieve existing answers from local storage
                const existingData = JSON.parse(localStorage.getItem('qnaData')) || [];
                const questionData = existingData.find(data => data.question.title === questionTitle && data.question.body === questionBody);

                if (questionData && questionData.answers) {
                    // Display previous answers
                    questionData.answers.forEach((answer, index) => {
                        $('#previous-answers-container').append(`<div class="answer"><strong>Answer ${index + 1}:</strong> ${answer}</div>`);
                    });
                }

                // Open the modal
                $('#answerModal').modal('show');
            });
            // Handle the "Submit Answer" button click in the modal
            $('#submit-answer').on('click', function () {
                if (!isLoggedIn) {
                    $('#answerModal').modal('hide');
                    $('#askloginmodal').modal('show');
                    return;
                }
                const answer = $('#answer-textarea').val().trim();

                if (answer) {
                    const questionTitle = $('#modal-question-title').text();
                    const questionBody = $('#modal-question-body').text();
                    const data = {
                        question: {
                            title: questionTitle,
                            body: questionBody
                        },
                        answer: answer
                    };

                    // Save the data to local storage
                    saveDataToLocalStorage(data);

                    // Clear the form
                    $('#answer-textarea').val('');

                    // Close the modal
                    $('#answerModal').modal('hide');

                    // Show a success message or perform any other desired action
                    alert('Answer submitted successfully!');
                } else {
                    alert('Please enter an answer.');
                }
            });
        });

        // Function to save data to local storage
        function saveDataToLocalStorage(data) {
            const existingData = JSON.parse(localStorage.getItem('qnaData')) || [];
            const questionData = existingData.find(item => item.question.title === data.question.title && item.question.body === data.question.body);

            if (questionData) {
                // Question already exists, add the new answer to the existing answers array
                if (!questionData.answers) {
                    questionData.answers = [];
                }
                questionData.answers.push(data.answer);
            } else {
                // New question, add the question and answer data to the array
                data.answers = [data.answer];
                existingData.push(data);
            }

            localStorage.setItem('qnaData', JSON.stringify(existingData));
        }

    </script>
</body>

</html>