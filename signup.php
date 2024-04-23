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
  <?php include 'navbar.php'; ?>
  <div class="container d-flex flex-column flex-lg-row" id="cont">
    <div class="col-lg-6 box2 d-flex flex-column text-center" id="Left">
      <div>
        <h3 class="col" id="ready">Are You Ready To Empower Your Children?</h3>
      </div>
      <div class="row">
        <img class="col" src="components/Untitled_design-removebg-preview.png" alt="">
      </div>
      <div class="row">
        <p>Join us in creating a safer future for your child, where your child feels stronger, empowered
          and confident in their own abilities. With more than 50+ instructors catered to your best child's possible
          interests, let us be the beacon your child follows to success! </p>
      </div>
    </div>
    <div class="col box3 id=" Right">
      <div class="row row-lg-2 justify-content-center">
        <div class="col-lg-6 text-center">
          <div id="signup" class="choices">SignUp</div>&nbsp;&nbsp;<div id="login" class="choices">LogIn</div><br><br>
        </div>
      </div>
      <form action="./signup_auth.php" method="post">

        <div class="row row-lg-4 justify-content-center">
          <div class="col-lg-3 align-items-center">
            <Label class="form-label">Your Full Name Here:</Label>
          </div>
          <div class="col-lg-3 m-0">
            <input class="form-control" type="text" name="first_name" id="" placeholder="First Name">
          </div>
          <div class="col-lg-3 m-0">
            <input class="form-control" type="text" name="last_name" id="" placeholder="Last Name">
          </div>
        </div>

        <div class="row row-lg-4 justify-content-center">
          <div class="col-lg-3 align-items-center">
            <Label class="form-label">Your Email Here:</Label>
          </div>
          <div class="col-lg-6 m-0">
            <input class="form-control" type="email" name="email" id="" placeholder="your@email.com">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
        </div>
        <div class="row row-lg-4 justify-content-center">
          <div class="col-lg-3 align-items-center">
            <Label class="form-label">Your Phone Number Here:</Label>
          </div>
          <div class="col-lg-6 m-0">
            <input class="form-control" type="number" name="phone_num" id="" placeholder="01234567810">
            <div id="emailHelp" class="form-text">We'll never share your number with anyone else.</div>
          </div>
        </div>

        <div class="row row-lg-4 justify-content-center">
          <div class="col-lg-3 align-items-center">
            <Label class="form-label">Your Password Here:</Label>
          </div>
          <div class="col-lg-6 m-0">
            <input class="form-control" type="password" name="password" id="" placeholder="Password">
          </div>
          <div class="col-lg-6 m-0">
            <label class="form-label"><strong>Select User Type</strong></label>
            <select name="usertypes" id="utype">
              <option value="3" selected>Guardian</option>
              <option value="2">Trainer</option>
            </select>
          </div>
        </div>
        <br>
        <div class="row row-lg-4 justify-content-center">
          <div class="col-lg-2 m-0">
            <input class="form-control" type="submit" name="" id="" value="Confirm">
          </div>
          <div class="col-lg-2 m-0"><input class="form-control" type="reset" name="" id="" value="Clear all"></div>
        </div>
      </form>
      <br><br>
      <div class="row justify-content-center text-center">
        <p class="col">Already Have An Account? <strong id="choicelg">Log In</strong></p>
      </div>
      <div class="row justify-content-center text-center">
        <p class="lead .75em"> By signing up I accept LearnToProtectOrg's <em id="terms">Terms and Conditions</em></p>
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