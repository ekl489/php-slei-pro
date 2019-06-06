<?php
    $title = "Slei.pro";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- includes -->
    <link rel="stylesheet" href="inclues/bootstap/bootstrap.min.css">
    <script src="inclues/bootstap/bootstrap.min.js"></script>
    <link rel="stylesheet" href="includes/bootswatch/bootstrap.min.css">
    <link rel="stylesheet" href="includes/custom/styles.css">

    <title><?php echo $title; ?></title>
</head>
<body>

    <!-- Navbar -->
    <?php include 'views/navbar.view.php'; ?>
    <div style="margin-bottom: 1rem;"></div>

    <!-- Page body -->
    <div class="container">
    <?php
        $request = $_SERVER['REQUEST_URI'];
        if($request == '/' || $request == ''){
            require __DIR__ . '/controllers/home.controller.php';
        } else if(substr($request, 0, 7) == '/forumn'){
            require __DIR__ . '/controllers/forumn.controller.php';
        } else if(substr($request, 0, 5) == '/play') {
            require __DIR__ . '/controllers/play.controller.php';
        } else {
            require __DIR__ . '/controllers/404.controller.php';
        }
    ?>
    </div>
    
</body>
</html>



