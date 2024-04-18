<?php
require_once 'connect.php';
session_start();


if (!isset($_SESSION['user_login']))
{
    header("location: index.php");
}

$id = $_SESSION['user_login'];
$select_stmt = $pdo->prepare("SELECT * FROM tbl_user WHERE user_id=:uid");
$select_stmt->execute(array(":uid" => $id));

$row = $select_stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_SESSION['user_login'])) {
?>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <ul class="nav navbar-nav">
                <li>
                    <h2>&#9200;&emsp;&emsp;</h2>
                </li>
                <li class="active">
                    <a class="navbar-brand" href="index.php">Главная страница</a>
                </li>
                <li>
                    <a href="about.php">О нас</a>
                </li>
                <li>
                    <a href="contact.php">Контакты</a>
                </li>
                <li>
                    <a href="reviews.php">Отзывы</a>
                </li>
                <li>
                    <a href="profile.php">Профиль</a>
                </li>
                <li>
                    <a href="interes.php">Интерестно</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <p class="privet"><a href="">Привет, <?= $row['username']; ?></a></p>
                    <a href="logout.php">ВЫХОД</a>
                </li>
            </ul>
        </div>
    </nav>
<?php
}
?>
