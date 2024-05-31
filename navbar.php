<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>

<head>
  <link rel="stylesheet" href="./CSS/navbar.css" />
</head>

<body>
  <div class="nav-container">
    <!-- Navbar Starts -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-3 custom-nav">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="./components/logo.png" alt="" class="logo" />LearnToProtect</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link mx-2" aria-current="page" href="./index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" href="./QnA.php">QnA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" href="./CAT.php">Courses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" href="./trainerpage.php">Trainers</a>
            </li>
            <!-- <li class="nav-item dropdown">
              <a
                class="nav-link mx-2 dropdown-toggle"
                href="#"
                id="navbarDropdownMenuLink"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Company
              </a>
              <ul
                class="dropdown-menu"
                aria-labelledby="navbarDropdownMenuLink"
              >
                <li><a class="dropdown-item" href="#">Blog</a></li>
                <li><a class="dropdown-item" href="#">About Us</a></li>
                <li><a class="dropdown-item" href="#">Contact us</a></li>
              </ul>
            </li> -->
            <?php
            include ('connection.php');
            if (!isset($_SESSION['username'])) {
              echo '<a class="btn btn-secondary" type="button" href="./signup.php">Login</a>';
            } else {
              $username = $_SESSION['username'];
              $role_id = $_SESSION['role_id'];
              $url;

              if ($role_id == 1) {
                $url = "./admin.php";
              } else if ($role_id == 2) {
                $url = "./trainer_dashboard.php";
              } else if ($role_id == 3) {
                $url = "./guardian_dashboard.php";
              } else {
                echo "<script>console.log('Error in role_id');</script>";
              }
              echo "<script>console.log('Username: $username');</script>";
              $query = "SELECT first_name from users where email = '$username'";
              $result = mysqli_query($conn, $query);
              if ($result) {
                $row = mysqli_fetch_assoc($result);
                echo '<div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="profileBtn" data-bs-toggle="dropdown" aria-expanded="false">'
                  . $row["first_name"] .
                  '</button>
                <ul class="dropdown-menu" aria-labelledby="profileBtn">
                  <li><a class="dropdown-item" href=' . $url . '>Profile</a></li>
                  <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                </ul>
              </div>';
              } else {
                echo "<script>Error in fetching data</script>";
              }
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <!-- Navbar ends -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      const toggler = $(".navbar-toggler");
      const sidebar = $(".navbar-collapse");
      const overlay = $("<div>").addClass("overlay");

      toggler.click(function () {
        sidebar.toggleClass("show");
        overlay.toggleClass("show");
        if (overlay.hasClass("show")) {
          $("body").append(overlay);
        } else {
          overlay.remove();
        }
      });

      $(document).on("click", ".overlay", function () {
        sidebar.removeClass("show");
        overlay.removeClass("show");
        overlay.remove();
      });


      var path = window.location.pathname.split("/").pop();
      // console.log(path);

      if (path === "") {
        path = "index.php";
      }

      $(".navbar-nav a[href='./" + path + "']").addClass("active");
    });
  </script>
</body>