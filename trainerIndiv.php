<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trainer</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="CSS/styless.css" />
  </head>
  <body>
    <?php include 'navbar.php'?>
    <div class="container">
      
      <div class="row trainers" id="trainerinfo">
        <div class="col-lg-4">
          <img
            class="center rounded mx-auto trainerimg"
            src="components/taekwondoIns.avif"
            alt="Generic placeholder image"
            width="320"
            height="320"
          />
        </div>
        <div class="col-lg-8 bio">
          <h1 class="names">Simon Crowell</h1>
          <h4>Taekwondo instructor</h4>
          <p class="bodytext">
            Coach Simon is our expert Taekwondo instructor with over a decade of
            experience in self-defense. Holding a black belt and known for his
            dynamic teaching style, he is passionate about empowering children
            to build confidence, discipline, and resilience. Coach Simon
            believes in the importance of developing a strong, positive mindset
            through martial arts training.
          </p>
          
          
          <div class="buttons">
            <button class="btn btn-outline-primary px-4 btn1">Message</button>
            <button class="btn btn-primary px-4 ms-3 btn2">Contact</button>
          </div>
        </div>
      </div>
      
      <div class="row sec2">
        <div class="col-6 d-flex justify-content-center align-items-center"><q class="tquote"><em>Teaching Taekwondo to kids is incredibly rewarding because I see them transform into confident, resilient individuals who are ready to face any challenge.</em></q></div>
        <div class="col-6"> 
          <img src="components/taekwondoClass.png" class= "img-fluid mx-auto center rounded" alt=""></div>
    </div>

    

    <div class="counter">
      <div class="row">
        <div class="col-6 col-lg-3">
          <div class="count-data text-center">
            <h6 class="count h2" data-to="500" data-speed="500">500</h6>
            <p class="m-0px font-w-600">Empowered Students</p>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="count-data text-center">
            <h6 class="count h2" data-to="50" data-speed="150">150</h6>
            <p class="m-0px font-w-600">Courses Completed</p>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="count-data text-center">
            <h6 class="count h2" data-to="850" data-speed="850">850</h6>
            <p class="m-0px font-w-600">Photos Captured</p>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="count-data text-center">
            <h6 class="count h2" data-to="190" data-speed="190">30</h6>
            <p class="m-0px font-w-600">Private Lessons</p>
          </div>
        </div>
      </div>
    </div>
    <h2 class="courseheader"> Courses With Coach Simon</h2>
    <div class="card">
      <h5 class="card-header"><a href="#" class="badge badge-light">Taekwondo</a>&nbsp;&nbsp;<a href="#" class="badge badge-light">Self-defense</a>
        </h5>
      <div class="card-body">
        <h5 class="card-title">Basic to Advanced Taekwondo Techniques
        </h5>
                  <img src="components/taekwondoIns.avif" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
              <h6 class="mb-0 d-inline">&nbsp;With <em>Simon Crowell</em></h6>
        <br>
        <p class="card-text cdet">Master the fundamentals and progress to advanced techniques, including powerful kicks, punches, and blocks that form the core of Taekwondo.</p>
        <div class="d-flex justify-content-between"><a href="#" class="btn btn-primary btn2 btntxt align-self-center">View Course Details</a><p class="d-inline price">$49.99</p>
        </div>
      </div>
    </div>
    <div class="card">
      <h5 class="card-header"><a href="#" class="badge badge-light">Taekwondo</a>&nbsp;&nbsp;<a href="#" class="badge badge-light">Evasion Techniques</a>&nbsp;&nbsp;<a href="#" class="badge badge-light">Self-defense</a>
        </h5>
      <div class="card-body">
        <h5 class="card-title">Self-Defense and Personal Safety
        </h5>
                  <img src="components/taekwondoIns.avif" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
              <h6 class="mb-0 d-inline">&nbsp;With <em>Simon Crowell</em></h6>
        <br>
        <p class="card-text cdet">Learn practical self-defense skills to protect yourself in various situations, focusing on real-world applications of Taekwondo techniques.</p>
        <div class="d-flex justify-content-between"><a href="#" class="btn btn-primary btn2 btntxt align-self-center">View Course Details</a><p class="d-inline price">$56.99</p>
        </div>
      </div>
    </div>
    <div class="card">
      <h5 class="card-header"><a href="#" class="badge badge-light">Taekwondo</a>&nbsp;&nbsp;<a href="#" class="badge badge-light">Hand-to-hand Combat</a>&nbsp;&nbsp;<a href="#" class="badge badge-light">Self-defense</a>
        </h5>
      <div class="card-body">
        <h5 class="card-title">Forms (Poomsae) and Sparring
        </h5>
                  <img src="components/taekwondoIns.avif" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
              <h6 class="mb-0 d-inline">&nbsp;With <em>Simon Crowell</em></h6>
        <br>
        <p class="card-text cdet">Develop precision and fluidity through the practice of forms (poomsae) while enhancing your combat skills and strategy in controlled sparring sessions.</p>
        <div class="d-flex justify-content-between"><a href="#" class="btn btn-primary btn2 btntxt align-self-center">View Course Details</a><p class="d-inline price">$25.99</p>
        </div>
      </div>
    </div>

    </div>
    <?php include 'footer.html'?>
    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
