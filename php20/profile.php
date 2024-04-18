<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    <style>
        main{
            display: flex;
            justify-content: center;
        }
        .profile{
            display: flex;
            flex-direction: row;
            gap: 15px;
            padding: 15px;
            height: auto;
        }
        .pr1{
            display: flex;
            flex-direction: column;
            gap: 15px;
            background-color: lightpink;
            padding: 15px;
            border-radius: 15px;
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.5);
            transition: all 0.5s;
        }
        .pr1:hover{
            transform: scale(105%);
        }
        form{
            display: flex;
            flex-direction: row;
            gap: 15px;
        }
        .pr2{
            display: flex;
            flex-direction: column;
            gap: 15px;
            background-color: lightblue;
            padding: 15px;
            border-radius: 15px;
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.5);
            transition: all 0.5s;
        }
        .pr2:hover{
            transform: scale(105%);
        }
        .pr3{
            display: flex;
            flex-direction: column;
            gap: 15px;
            background-color: lightgreen;
            padding: 15px;
            border-radius: 15px;
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.5);
            transition: all 0.5s;
        }
        .pr3:hover{
            transform: scale(105%);
        }
        .flex{
            display: flex;
            gap: 15px;
        }
        #avatare{
            border-radius: 15px;
            width: 300px;
        }
    </style>
</head>
<body>

<?php
require_once 'connect.php';
require_once 'headerlog.php';
$text2 = "";
$text3 = "";
$pdo = new PDO('mysql:host=localhost;dbname=primer_user_admin', 'root', '');

$stmt = $pdo->query('SELECT * FROM tbl_user');
while ($row = $stmt->fetch())
{
    $username = $row['username'];
    $email = $row['email'];
    $foto = $row['foto'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['new_foto']) && $_FILES['new_foto']['size'] > 0) {
        $file_info = pathinfo($_FILES['new_foto']['name']);
        $new_filename = uniqid() . '.' . $file_info['extension'];
        move_uploaded_file($_FILES['new_foto']['tmp_name'], 'image/imgUser/' . $new_filename);
        $stmt = $pdo->prepare("UPDATE tbl_user SET foto = ? WHERE username = ?");
        $stmt->execute([$new_filename, $username]);
    }
    if (isset($_POST['new_username'], $_POST['new_email'])) {
        $new_username = $_POST['new_username'];
        $new_email = $_POST['new_email'];
        $text2 = "";
        $text3 = "";
        if (!empty($new_username) && !empty($new_email)) {
            $stmt = $pdo->prepare("UPDATE tbl_user SET username = ?, email = ? WHERE username = ?");
            $stmt->execute([$new_username, $new_email, $username]);
            $username = $new_username;
            $email = $new_email;
            $text2 = "Вы успешно изменили данные!";
            $text3 = "";
        }
    }
    if (isset($_POST['old_password'], $_POST['new_password'], $_POST['confirm_password'])) {
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        $text2 = "";
        $text3 = "";

        $stmt = $pdo->prepare("SELECT password FROM tbl_user WHERE username = ?");
        $stmt->execute([$username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $hashed_password = $row['password'];

        if (password_verify($old_password, $hashed_password)) {
            if (!empty($new_password) && strlen($new_password) >= 6) {
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

                $stmt = $pdo->prepare("UPDATE tbl_user SET password = ? WHERE username = ?");
                $stmt->execute([$hashed_new_password, $username]);
                $text2 = "";
                $text3 = "Вы успешно изменили пароль!";
            }
            else {
                $text2 = "";
                $text3 = "Пароль не должен содержать менее 6 символов";
            }
        } else {
            $text2 = "";
            $text3 = "Старый пароль не совпадает";
        }
    }
}
?>
<h2 class="HH">ПРОФИЛЬ</h2>
<hr>
<main>
    <div class="profile">
        <div class="d pr1">
            <h1 style="text-align: center">Ваши данные</h1>
            <p>Имя: <?= $username ?></p>
            <p>Почта: <?= $email ?></p>
            <p>Фото: <br> <img id="avatare" src="image/imgUser/<?= $foto ?>" alt="default_foto"></p>
        </div>
        <form method="post" enctype="multipart/form-data">
            <div class="d pr2">
                <h1 style="text-align: center">Редактировать профиль</h1>
                <div class="flex">
                    <p>Имя:</p>
                    <input type="text" name = "new_username">
                </div>
                <div class="flex">
                    <p>Почта:</p>
                    <input type="text" name = "new_email">
                </div>
                <p>Фото:</p>
                <img id="avatare" src="image/imgUser/<?= $foto ?>" alt="foto">
                <input type="file" id="new_foto" name="new_foto" />
                <h1 id = "alert"><strong><?php echo $text2; ?></strong></h3>
                    <button class="but">Изменить</button>
            </div>
        </form>
        <form method="post" enctype="multipart/form-data">
        <div class="d pr3">
                <h1 style="text-align: center">Изменить пароль</h1>
                <div class="flex">
                    <p>Старый пароль</p>
                    <input type="password" name="old_password">
                </div>
                <div class="flex">
                    <p>Новый пароль</p>
                    <input type="password" name="new_password">
                </div>
                <div class="flex">
                    <p>Повторите пароль</p>
                    <input type="password" name="confirm_password">
                </div>
                <br>
                <br>
                <h1 id = "alert"><strong><?php echo $text3; ?></strong></h3>
                <button class="but">Изменить пароль</button>
            </div>
        </form>
    </div>
</main>
</body>
</html>
