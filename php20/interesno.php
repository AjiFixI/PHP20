<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Интересно</title>
</head>
<body>

<?php
require_once 'connect.php';
require_once 'headerlog.php';

$pdo = new PDO('mysql:host=localhost;dbname=primer_user_admin', 'root', '');

$stmt = $pdo->query('SELECT title, adress, discription FROM slider');
echo '<h2 class="HH">ИНТЕРЕСНО</h2>';

?>
</body>
</html>