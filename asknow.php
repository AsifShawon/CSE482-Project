<?phP
session_start();
include('connection.php');
$title = $_POST['title'];
$question = $_POST['question'];

if(!isset($_SESSION['username'])){
    echo "<script>alert('Please login to ask a question')</script>";
    echo "<script>window.open('./QnA.php', '_self')</script>";
    exit();
}

if($title == '' || $question == ''){
    echo "<script>alert('Please fill in both fields')</script>";
    echo "<script>window.open('./QnA.php', '_self')</script>";
    exit();
}

$username = $_SESSION['username'];
$quuery = "insert into qna (title, question, email) values ('$title', '$question', '$username')";
$result = mysqli_query($conn, $quuery);
if($result){
    echo "<script>alert('Question posted successfully')</script>";
    echo "<script>window.open('./QnA.php', '_self')</script>";
}
else {
    echo "<script>alert('Error in posting question')</script>";
    echo "<script>window.open('./QnA.php', '_self')</script>";
}
?>