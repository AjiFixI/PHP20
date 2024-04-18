<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (!isset($_SESSION["menuUser"]) || $_SESSION["menuUser"] == "false")
        require_once "menu.php";
    else
        require_once "menuuser.php";
    ?>
    <div class="container">
        <div class="col-lg-12 text-center">
            <h1>О НАС</h1>
        </div>
    </div>
</body>
</html>