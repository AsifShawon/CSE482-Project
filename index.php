<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./CSS/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <title>LearnToProtect</title>
</head>

<body class="main-body">
  
 <?php include 'navbar.php'; ?>
  <!-- Hero section start -->
  <div class="hero-sec">
    <!-- Hero 3 - Bootstrap Brain Component -->
    <section class="py-3 py-lg-5 py-xl-8">
      <div class="container overflow-hidden">
        <div class="row gy-5 gy-lg-0 align-items-lg-center justify-content-lg-between">
          <div class="col-12 col-lg-6 order-1 order-lg-0">
            <h2 class="display-3 fw-bold mb-3">
              Empowerment Starts Here: Your Self-Defense Journey
            </h2>
            <p class="fs-5 mb-5">
              No matter your background or experience level, LearnToProtect equips you with the skills and confidence to
              navigate any situation. Our tailored programs and supportive community empower you to take charge of your
              safety, one step at a time.
            </p>
            <div class="d-grid gap-2 d-sm-flex">
              <button type="button" class="btn btn-dark bsb-btn-2xl rounded-pill btn-1">
                Become A Trainer
              </button>
              <button type="button" class="btn btn-outline-dark bsb-btn-2xl rounded-pill">
                Start Training
              </button>
            </div>
          </div>
          <div class="col-12 col-lg-5 text-center">
            <div class="position-relative">
              <div
                class="bsb-circle border border-4 border-warning position-absolute top-50 start-10 translate-middle z-1">
              </div>
              <div class="bsb-circle bg-primary position-absolute top-50 start-50 translate-middle"
                style="--bsb-cs: 460px"></div>
              <div class="bsb-circle border border-4 border-warning position-absolute top-10 end-0 z-1"
                style="--bsb-cs: 100px"></div>
              <img class="img-fluid position-relative z-2" loading="lazy"
                src="./components/Karate-Training-for-Children.jpeg"
                alt="A Digital Agency Specialized in AI and Web 3.0" />
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- Hero section end -->

  <!-- Course section start -->
  <section class="container carousel-container">
    <div class="row">
      <div class="col-lg-6">
        <div class="carousel-header">
          <h3>Trainers</h3>
          <a href="#">See all</a>
        </div>
        <div id="carousel1" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="card">
                <img src="./components/trainer1.jpg" class="card-img-top " alt="...">
                <div class="card-body">
                  <h5 class="card-title">Trainer 1</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                    <button class="btn btn-dark card-btn">See more</button>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card">
                <img src="./components/trainer2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Trainer 2</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                    <button class="btn btn-dark card-btn">See more</button>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card">
                <img src="./components/trainer3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Trainer 3</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                    <button class="btn btn-dark card-btn">See more</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="carousel-header">
          <h3>Courses</h3>
          <a href="#">See all</a>
        </div>
        <div id="carousel2" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="card">
                <img src="./components/self_defense_fund.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card 4</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                    <button class="btn btn-dark card-btn">Enroll</button>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card">
                <img src="./components/Karate-Training-for-Children.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card 5</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                    <button class="btn btn-dark card-btn">Enroll</button>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card">
                <img src="./components/body_awerness_confidence.avif" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card 6</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                    <button class="btn btn-dark card-btn">Enroll</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Course section end -->

  <?php include 'footer.html' ?>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="./Scripts/script.js"></script>
</body>

</html>