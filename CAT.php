<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="CSS\styles.css">
    <title>Choose Appropiate Training</title>
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
                specially crafter and curated for your child not only will equip them with the necessary skills of self
                defense, but also will be a great way for them to get introduced to physical exercise as an athletic
                pursuit/a self- defense mechanism. With 50+ experts with tons of experience, we have a wide array of
                courses you can choose from to make your child's experience a great, enlighteing and fun one.</p>
            <br>
            <br>
        </div>

        <div>
            <h2 class="CourseDet">Our Features</h2>
            <br><br>
            <div class="d-flex  flex-wrap flex-lg-nowrap justify-content-evenly">
                <div class="d-flex flex-column align-items-center"><img src="components/medal-.png" alt=""
                        class="icon"><br>
                    <p class="corefet">Courses provided by 50+ certified expert instructors</p>
                </div>
                <div class="d-flex flex-column align-items-center"><img src="components/taekwondo.png" alt=""
                        class="icon"><br>
                    <p class="corefet">In person classes help learners gain hands on experience</p>
                </div>
                <div class="d-flex flex-column align-items-center "><img src="components/communication.png" alt=""
                        class="icon"><br>
                    <p class="corefet">Online community always ready to provide information.</p>
                </div>
            </div>
            <br>
            <br>
        </div>
        <div>

            <h2 class="CourseDet">Our Courses</h2>
            <br>
            <div class="d-flex flex-wrap flex-lg-nowrap">
                <?php include 'connection.php';
                $query = "SELECT * FROM course";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='courses' id='course" . $row['courseID'] . "'>
                        <table class='ct'>
                            <img src='components/" . $row['image'] . "' class='img-fluid' alt='Picture of MMA fighters'
                                class='img-thumbnail courseimg'>
                            <tr class='trfix'>
                                <th>" . $row['Course_name'] . "</th>
                                <th class='right'>BDT" . $row['fees'] . "/= Monthly</th>
                            </tr>
                            <tr rowspan='8' class='contfix'>
                                <td colspan='2'>" . $row['Course_description'] . "</td>
                            </tr>
                            <tr class='trfix'>
                                <td><em>Ages " . $row['MinAge'] . "-" . $row['MaxAge'] . "</em></td>
                                <td align='right'><strong>" . $row['Enrolled'] . " Enrolled</strong></td>
                            </tr>
                        </table>
                        <button button class='Enroll btn btn-outline-dark'>Enroll Today!</button>
                    </div>";
                    }
                }

                ?>
            </div>


        </div>
    </div>

    <?php include 'footer.html'; ?>
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./Scripts/script.js"></script>
</body>

</html>