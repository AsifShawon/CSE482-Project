<?php
include ('connection.php');
$id = $_POST['id'];

$query = "SELECT * FROM qna WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

echo '<div class="modal-dialog modal-xl">
            <div class="modal-content" style="background-color: #f5f5f5;">
                <div class="modal-header">
                    <h5 class="modal-title" id="answerModalLabel">Answer Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="question-details">
                        <h3 id="modal-question-title">' . $row['title'] . '</h3>
                        <p id="modal-question-body">' . $row['question'] . '</p>
                    </div>
                    <div class="existing-answers">
                        <h4>Previous Answers</h4>
                        <div id="previous-answers-container">';

$query = "SELECT * FROM qna_answers WHERE qna_id = '$id'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='answer'><strong>" . $row['email'] . ": </strong>" . $row['answer'] . "</div><br>";
    }
} else {
    echo "No records found";
}

echo '</div>
    </div>
    <form id="answer-form" action="./postAnswer.php" method="post"> 
        <input type="hidden" name="id" value=' . $id . '> 
        <div class="form-group">
            <label for="answer-textarea">Your Answer</label>
            <textarea class="form-control" name="answer" id="answer-textarea" rows="5"></textarea>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn" style="background-color: #323232; color: #f5f5f5;"
                id="submit-answer">Submit Answer</button>
        </div>
    </form>
</div>
</div>
</div>';

?>