<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css" />
    <title>Главная</title>
</head>
<body class="bod1">
<?php
require_once 'connect.php';
require_once 'headerlog.php';
?>
<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=primer_user_admin', 'root', '');

    $stmt = $pdo->query('SELECT title, adress, discription FROM slider');

    // echo '<h1>Слайдер</h1>';
    echo '<div class="slider">';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="slide">';
        echo '<img src="' . $row['adress'] . '" alt="' . $row['title'] . '">';
        echo '<h2 class="h2">' . $row['title'] . '</h2>';
        echo '<p class="pp">' . $row['discription'] . '</p>';
        echo '</div>';
    }
    echo '</div>';

} catch (PDOException $e) {
    die('Ошибка выполнения запроса: ' . $e->getMessage());
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
<script>
    $(document).ready(function(){
        $('.slider').slick({
            dots: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1900,
            arrows: true
        });
    });
</script>
</body>
</html>
