<?php
// Start session if not started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include database connection
include('connection.php');

// Fetch all trainers and their details
$trainers_query = "
    SELECT 
        u.id, u.first_name, u.last_name, u.email, 
        t.image_link, t.quote, t.teached_stu, t.courses_completed, t.private_lessons, t.description 
    FROM 
        user u 
    INNER JOIN 
        trainer_details t 
    ON 
        u.id = t.user_id";

$trainers_result = mysqli_query($conn, $trainers_query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TrainerPage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="CSS/styless.css" />
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="row py-lg-5">
        <div class="col-lg-12"></div>
        <div class="col-lg-10 col-md-8 mx-auto">
            <h1 class="fw-light names">Our Trainers</h1>
            <p class="lead text-body-secondary bodytext">
                We have an amazing team of trainers present to cater to your every
                need and help your child transform into a disciplined, confident, and a
                powerful individual. Our diverse team brings together the best in martial arts training, each with a unique background and teaching style, all united by a common goal: to inspire, empower, and transform young lives.
            </p>
        </div>
    </div>
    <div class="">
        <a href="#trainerinfo"><img src="./components/Meet.png" alt="" class="meet" /></a>
    </div>

    <div class="container">
        <div class="row trainers" id="trainerinfo">
            <?php while ($trainer = mysqli_fetch_assoc($trainers_result)): ?>
            <div class="col-lg-4">
                <img class="rounded-circle center"
                    src="<?php echo !empty($trainer['image_link']) ? $trainer['image_link'] : 'components/default-trainer.jpg'; ?>"
                    alt="Trainer Image" width="150" height="150" />
                <h2 class="names"><?php echo $trainer['first_name'] . ' ' . $trainer['last_name']; ?></h2>
                <h6><?php echo 'Trainer'; ?></h6>
                <p class="bodytext"><?php echo $trainer['description']; ?></p>
                <p>
                    <a class="btn btn-secondary" href="trainer_dashboard.php?id=<?php echo $trainer['id']; ?>"
                        role="button">View details »</a>
                </p>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <div class="quote">
        <p class="quoted">
            <q>
                <em>I've seen a remarkable improvement in my child's focus and respect,
                    both at home and in school.
                </em>
            </q>
            <br />
            <span class="qouter">-Shirley, about her daughter Julia (12).</span>
        </p>
    </div>
    <div class="container">
        <div class="row py-lg-5">
            <div class="col-md-7 mx-auto">
                <h3 class="fw-light names">Respect: </h3>
                <h6><em>Qualities we help your child hone</em></h6>
                <p class="lead text-body-tertiary bodytext">
                    We believe in fostering a positive learning environment. Our instructors teach students to be
                    courteous towards their instructors, teammates, and even opponents. This instills valuable life
                    lessons about respect and sportsmanship.
                </p>
            </div>
            <div class="col-md-5">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                    height="500" src="components/self_defense_fund.jpg" role="img" aria-label="Placeholder: 500x500"
                    preserveAspectRatio="xMidYMid slice" focusable="false" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                    height="500" src="components/training2.jpg" role="img" aria-label="Placeholder: 500x500"
                    preserveAspectRatio="xMidYMid slice" focusable="false" />
            </div>
            <div class="col-md-7 mx-auto">
                <h3 class="fw-light names">Confidence: </h3>
                <h6><em>Qualities we help your child hone</em></h6>
                <p class="lead text-body-tertiary bodytext ">
                    Martial arts training empowers young students by equipping them with valuable self-defense skills
                    and a strong foundation in physical fitness. Our instructors celebrate every student's achievements,
                    fostering a sense of accomplishment and building confidence that spills over into other aspects of
                    their lives.
                </p>
            </div>
        </div>
        <div class="row py-lg-5">
            <div class="col-md-7 mx-auto">
                <h3 class="fw-light names">Discipline: </h3>
                <h6><em>Qualities we help your child hone</em></h6>
                <p class="lead text-body-tertiary bodytext">
                    Our instructors cultivate a culture of dedication and focus. They guide young students to
                    consistently attend, actively participate, and persevere through challenges, building a strong work
                    ethic that benefits them on and off the mat.
                </p>
            </div>
            <div class="col-md-5">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                    height="500" src="components/training.webp" role="img" aria-label="Placeholder: 500x500"
                    preserveAspectRatio="xMidYMid slice" focusable="false" />
            </div>
        </div>
    </div>
    <?php include 'footer.html'; ?>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
