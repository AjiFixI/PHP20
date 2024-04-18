<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добро пожаловать!</title>
</head>
<body class="bod">

<?php
    require_once 'connect.php';
    require_once 'headerlog.php';
    
    $pdo = new PDO('mysql:host=localhost;dbname=primer_user_admin', 'root', '');
  
    $stmt = $pdo->query('SELECT title, adress, discription FROM slider'); 
    echo '<h2 class="HH">Добро пожаловать!</h2>';

    echo '<hr>';

    echo '<div class="cards">';
    $i = 1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {  
        echo '<div class="c card'.$i.'">';
        echo '<h2 class="h2">' . $row['title'] . '</h2>';  
        echo '<img src="' . $row['adress'] . '" alt="' . $row['title'] . '">';
        echo '<p class="pp">' . $row['discription'] . '</p>';  
        echo '</div>';
        $i++;
    }  
    echo '</div>';  
?>
</body>
</html>