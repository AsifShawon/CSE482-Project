<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Dashboard</title>
    <link rel="stylesheet" href="./CSS/trainers.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php include 'navbar.html';?>
    <div class="container mt-5">
        <h1>Trainer Dashboard</h1>
        <div id="trainerList" class="trainer-list" >
            <!-- Trainer cards will be dynamically loaded here -->
        </div>
    </div>
   
    <?php include 'footer.html';?>
    <script src="./Scripts/trainers.js">
        // Load trainer data from JSON file

    </script>
</body>
</html>
