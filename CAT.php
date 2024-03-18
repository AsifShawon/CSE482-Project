<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="CSS\styles.css">
    <title>SignUp</title>
</head>

<body>
    <?php include 'navbar.html'; ?>
    <div class="container justify-content-center d-flex flex-column" id="cont">
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
            <div class="d-flex justify-content-around">
                <div><img src="components/medal-.png" alt="" class="icon"></div>
                <div><img src="components/taekwondo.png" alt="" class="icon"></div>
                <div><img src="components/communication.png" alt="" class="icon"></div>
            </div>
            <div class="d-flex justify-content-around">

                <p class="col-4 corefet">Courses provided by 50+ certified expert instructors</p>

                <p class="col-4 corefet">In person classes help learners gain hands on experience</p>


                <p class="col-4 corefet">Amicable online community always ready to provide information and help.</p>
            </div>
            <br>
            <br>
        </div>
        <div>

            <h2 class="CourseDet">Our Courses</h2>
            <br>

            <div class="d-flex flex-sm-row">
                <div class="courses" id="course1">
                    <table class="ct">
                        <img src="components/mma.jpg" alt="Picture of MMA fighters" class="img-thumbnail courseimg">
                        <tr class="trfix">
                            <th>Mixed Martial Arts</th>
                            <th class="right">BDT1000/= Monthly</th>
                        </tr>
                        <tr rowspan="8" class="contfix">
                            <td colspan="2">Our Mixed Martial Arts Group Course is an amazing choice for your child
                                as it engages
                                your child with hand to hand combats, teaching them how to escape tricky situations
                                easily when cornered along with spatial awareness and teach them free falling
                                techniques
                                to help them protect their vital organs.</td>
                        </tr>
                        <tr class="trfix">
                            <td><em>Ages 13-18</em></td>
                            <td align="right"><strong>24 Enrolled</strong></td>
                        </tr>
                    </table>
                    <button button class="Enroll btn btn-outline-dark">Enroll Today!</button>
                </div>
                <div class="courses" id="course2">
                    <table class="ct">
                        <img src="components/karate.avif" alt="Picture of a girl doing karate"
                         class="img-thumbnail courseimg">
                        <tr class="trfix">
                            <th>Karate</th>
                            <th class="right"">BDT750/= Monthly</th>
                        </tr>
                        <tr rowspan="8" class="contfix">
                            <td colspan="2">Our karate courses not only build an amazing foundation for the
                                children's health and defending tactics but also builds character. The competitive
                                environment in this course inspires the children to strive to always do better. Our
                                Karate Masters are always there to help and encourage the little ones to achieve
                                higher order belts and do their best!</td>
                        </tr>
                        <tr class="trfix">
                            <td><em>Ages 4-18</em></td>
                            <td align="right"><strong>35 Enrolled</strong></td>
                        </tr>
                    </table>
                    <button button class="Enroll btn btn-outline-dark">Enroll Today!</button>
                </div>
                <div class="courses" id="course3">
                    <table class="ct">
                        <img src="components/judo.avif" alt="Picture of children in a judo classroom"
                            class="img-thumbnail courseimg">
                        <tr class="trfix">
                            <th>Judo</th>
                            <th class="right">BDT850/= Monthly</th>
                        </tr>
                        <tr rowspan="8" class="contfix">
                            <td colspan="2">A martial art appropiate for people of all ages, judo is especially
                                interesting for your children if they are interested in taking it up as an athletic pursuit. Not only
                                does judo build agility and strength but also the self defense skills of the children, ot to mention awareness. Our experts
                                trainers are their to teach them every small move every step of the way!</td>
                        </tr>
                        <tr class="trfix">
                            <td><em>Ages 6-18</em></td>
                            <td align="right"><strong>30 Enrolled</strong></td>
                        </tr>
                    </table>
                    <button button class="Enroll btn btn-outline-dark">Enroll Today!</button>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.html';?>
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./Scripts/script.js"></script>
</body>

</html>