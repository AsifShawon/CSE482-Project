<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="CSS/signup.css">
  <title>SignUp</title>
</head>

<body>
  <?php include 'navbar.php'; ?>
  <div class="container signupboxes" id="cont">
    <div class="row" >
    <div class="col-lg-6 d-flex flex-column d-flex align-items-center justify-content-center text-center" id="left">
      <div>
        <h3 id="ready">Are You Ready To Empower Your Children?</h3>
      </div>
      <div class="">
        <img class="" src="components/Signup.png" alt="">
      </div>
      <div class="join">
        <p>Join us in creating a safer future for your child, where your child feels stronger, empowered
          and confident in their own abilities. With more than 50+ instructors catered to your best child's possible
          interests, let us be the beacon your child follows to success! </p>
      </div>
    </div>
    <div class="col-lg-6" id="right">
      <div class="">
        <div class="text-center">
            <div class="indentedchoice">SignUp</div><div class="choices login">LogIn</div><br><br>
        </div>
      </div>
      <form action="./signup_auth.php" method="post">

        <div class="">
          <div class="">
            <Label class="form-label">Your Full Name Here:</Label>
          </div>
          <div class="">
            <input class="form-control" type="text" name="first_name" id="" placeholder="First Name">
          </div>
          <div class="">
            <input class="form-control" type="text" name="last_name" id="" placeholder="Last Name">
          </div>
        </div>

        <div class="">
          <div class="">
            <Label class="">Your Email Here:</Label>
          </div>
          <div class="">
            <input class="form-control" type="email" name="email" id="" placeholder="your@email.com">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
        </div>
        <div class="">
          <div class="">
            <Label class="form-label">Your Phone Number Here:</Label>
          </div>
          <div class="">
            <input class="form-control" type="number" name="phone_num" id="" placeholder="01234567810">
            <div id="emailHelp" class="form-text">We'll never share your number with anyone else.</div>
          </div>
        </div>

        <div class="">
          <div class="">
            <Label class="form-label">Your Password Here:</Label>
          </div>
          <div class="">
            <input class="form-control" type="password" name="password" id="" placeholder="Password">
          </div>
          <div class="">
            <label class="form-label"><strong>Select User Type</strong></label>
            <select name="usertypes" id="utype">
              <option value="3" selected>Guardian</option>
              <option value="2">Trainer</option>
            </select>
          </div>
        </div>
        <br>
        <div class="">
          <div class="">
            <input class="form-control" type="submit" name="" id="" value="Confirm">
          </div>
          <div class=""><input class="form-control" type="reset" name="" id="" value="Clear all"></div>
        </div>
      </form>
      <br><br>
      <div class="text-center">
        <p class="">Already Have An Account? <strong class="login" id="choicelg">Log In</strong></p>
      </div>
      <div class="text-center">
        <p class=""> By signing up I accept LearnToProtectOrg's <em id="terms">Terms and Conditions</em></p>
      </div>
    </div>
</div>


  </div>

  <div class="container loginboxes invisible" id="cont">
    <div class="row" >
    <div class="col-lg-6" id="left">
      <div class="">
        <div class="text-center">
          <div class="indentedchoice">LogIn</div><div class="choices signup">SignUp</div>
        </div>
    </div>
    <div class="d-flex justify-content-center p-4">
        <div class="">
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
        <div class="">
          <div class="">
            <Label class="form-label">Email:</Label>
          </div>
          <div class="">
            <input class="form-control" type="email" name="email" id="" placeholder="your@email.com">
          </div>
        </div>

        <div class="">
          <div class="">
            <Label class="form-label">Password:</Label>
          </div>
          <div class="">
            <input class="form-control" type="password" name="pass" id="" placeholder="Password">
          </div>
        </div>
        <br>
        <div class="">
          <div class="">
          </div>
          <!-- <div class="" id="stay">
            <input type="checkbox" name="" id=""><em>Keep me logged in</em>
          </div> -->
          <div class="" id="forgotpass">
            <p><strong>&nbsp;&nbsp;Forgot Password?</strong></p>
          </div>
        </div>
        <div class="">
          <div class="">
            <input class="form-control" type="submit" value="Log In!" id="">
            <br><br>
            <div class="text-center">
              <p class="col">Don't Have an Account? <!--<a href="./signup.php" class="signinbutton signup">--><strong class="signup" id="choicelg">Sign In</strong></a></p>
            </div>
            <!-- <div class="row justify-content-center text-center">
              <p class="lead .075em"><em id="terms">Log In as Admin &rarr;</em></p>
            </div> -->
          </div>
        </div>
      </form>
    </div>

    <div class="col-lg-6 d-flex flex-column d-flex align-items-center justify-content-center text-center" id="right">
      <div>
        <h3 id="ready">Are You Ready To Empower Your Children?</h3>
      </div>
      <div class="">
        <img class="" src="components/Signup.png" alt="">
      </div>
      <div class="join">
        <p>Join us in creating a safer future for your child, where your child feels stronger, empowered
          and confident in their own abilities. With more than 50+ instructors catered to your best child's possible
          interests, let us be the beacon your child follows to success! </p>
      </div>
    </div>
    </div>
    </div>

  <?php include 'footer.html'; ?>
  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="./Scripts/signup.js"></script>
</body>

</html>