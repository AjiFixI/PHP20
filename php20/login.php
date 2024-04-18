<?php
require_once 'connect.php';

session_start();

// $_SESSION["menuUser"] = 'false';
// if (isset($_SESSION["user_login"]))
// {
//     header("location: welcome.php");
// }

if (isset($_REQUEST['btn_login']))
{
    $username = strip_tags($_REQUEST["txt_username_email"]); 
    $email = strip_tags($_REQUEST["txt_username_email"]);
    $password = strip_tags($_REQUEST["txt_password"]);  

    if (empty($username)) {
        $errorMsg[] = "Пожалуйста, введите имя пользователя или адрес электронной почты";   
    } else if (empty($email)) {
        $errorMsg[] = "Пожалуйста, введите имя пользователя или адрес электронной почты";
    } else if (empty($password)) {
        $errorMsg[] = "Пожалуйста, введите password";  
    } else {
        try {
            $select_stmt = $pdo->prepare("SELECT * FROM tbl_user WHERE username=:uname OR email=:uemail"); 
            $select_stmt->execute(array(':uname' => $username, ':uemail' => $email));
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);


            if ($select_stmt->rowCount() > 0)  
            {
                if ($username == $row["username"] or $email == $row["email"]) 
                {
                    if (password_verify($password, $row["password"])) 
                    {
                        $_SESSION["user_login"] = $row["user_id"];  
                        $loginMsg = "Вы успешно вошли в систему.";
                        header("refresh:2; welcome.php");        
                    } else {
                        $errorMsg[] = "Неверный пароль!";
                    }
                } else {
                    $errorMsg[] = "Неправильное имя пользователя или адрес электронной почты";
                }
            } else {
                $errorMsg[] = "Неправильное имя пользователя или адрес электронной почты";
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
    <title>Сайт регистрации и авторизации</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="js/jquery-1.12.4-jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styleMenu.css" />
</head>
<body>
    <?php require_once 'header.php'; ?>
    <div class="wrapper">
        <div class="container">
            <div class="col-lg-12">
                <?php
                if (isset($errorMsg)) {
                    foreach ($errorMsg as $error) {
                ?>
                        <div class="alert alert-danger">
                            <h1 id = "alert"><strong><?php echo $error; ?></strong></h3>
                        </div>
                    <?php
                    }
                }
                if (isset($loginMsg)) {
                    ?>
                    <div class="alert alert-success">
                        <h1 id = "alert"><strong><?php echo $loginMsg; ?></strong></h1>
                    </div>
                <?php
                }
                ?>
                    <h2 class="HH">Страница входа</h2>
                <form method="post" class="form-horizontal ff">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Введите имя или Email</label>
                        <div class="col-sm-6">
                            <input type="text" name="txt_username_email" class="form-control" placeholder="Введите имя или email" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-6">
                            <input type="password" name="txt_password" class="form-control" placeholder="Введите passowrd" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9 m-t-15">
                            <input type="submit" name="btn_login" class="btn btn-success but" value="Войти">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9 m-t-15">
                            У вас нет учетной записи, зарегистрированной здесь? <a href="register.php">
                                <p class="text-info">Зарегистрировать учетную запись</p>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>