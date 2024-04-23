<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="CSS\styles.css">
  <title>LogIn</title>
</head>

<body>
  <?php include 'navbar.php'; ?>
  <div class="container d-flex flex-column flex-lg-row" id="cont">
    <div class="col-lg-6 box d-flex flex-column text-center" id="Left">
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
          <a href="./signup.php"><div id="signup" class="choices">SignUp</div></a>&nbsp;&nbsp;<div id="login" class="choices">LogIn</div>
        </div>
      </div>
      <br>
      <div class="row row-lg-2 justify-content-center">
        <div class="col-lg-8 text-center justify-content-between">
          <a href="https://www.google.com/gmail/" target=_main><img src="Icons/google.png" class="icons" id="google"
              alt="Login With Google"></a>
          <a href="https://www.facebook.com" target=_main><img src="Icons/facebook-app-symbol.png" class="icons"
              alt="Login With Facebook"></a>
          <a href="https://www.twitter.com" target=_main><img src="Icons/twitter.png" class="icons"
              alt="Login With X"></a>
          <a href="https://www.instagram.com" target=_main> <img src="Icons/instagram.png" class="icons"
              alt="Login With Instagram"></a>
        </div>
      </div>
      <br>
      <form action="./login_auth.php" method="post">
        <div class="row row-lg-4 justify-content-center">
          <div class="col-lg-3 align-items-center">
            <Label class="form-label">Email:</Label>
          </div>
          <div class="col-lg-6 m-0">
            <input class="form-control" type="email" name="email" id="" placeholder="your@email.com">
          </div>
        </div>

        <div class="row row-lg-4 justify-content-center">
          <div class="col-lg-3 align-items-center">
            <Label class="form-label">Password:</Label>
          </div>
          <div class="col-lg-6 m-0">
            <input class="form-control" type="password" name="pass" id="" placeholder="Password">
          </div>
        </div>
        <br>
        <div class="row row-lg-4 justify-content-center">
          <div class="col-lg-3 align-items-center">
          </div>
          <div class="col-lg-3 align-items-center" id="stay">
            <input type="checkbox" name="" id=""><em>Keep me logged in</em>
          </div>
          <div class="col-lg-3 m-0 float-right" id="forgotpass">
            <p><strong>&nbsp;&nbsp;Forgot Password?</strong></p>
          </div>
        </div>
        <div class="row row-lg-4 justify-content-center">
          <div class="col-lg-4 m-0">
            <input class="form-control" type="submit" value="Log In!" id="">
            <br><br>
            <div class="row justify-content-center text-center">
              <p class="col">Don't Have an Account? <a href="./signup.php"><strong id="choicelg">Sign In</strong></a></p>
            </div>
            <!-- <div class="row justify-content-center text-center">
              <p class="lead .075em"><em id="terms">Log In as Admin &rarr;</em></p>
            </div> -->
          </div>
        </div>
      </form>
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