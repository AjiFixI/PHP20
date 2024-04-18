<?php

require_once "connect.php";

if (isset($_REQUEST['btn_register']))
{
    $username	= strip_tags($_REQUEST['txt_username']);
    $email		= strip_tags($_REQUEST['txt_email']);
    $password	= strip_tags($_REQUEST['txt_password']);
    $foto       = 'default_foto'; // добавьте значение по умолчанию или получите его из $_REQUEST

    if (empty($username)) {
        $errorMsg[] = "Пожалуйста, введите имя пользователя";
    } else if (empty($email)) {
        $errorMsg[] = "Пожалуйста, введите email";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg[] = "Пожалуйста, введите действительный адрес электронной почты";
    } else if (empty($password)) {
        $errorMsg[] = "Пожалуйста, введите password";
    } else if (strlen($password) < 6) {
        $errorMsg[] = "Пароль должен состоять не менее чем из 6 символов";
    } else {
        try {
            $select_stmt = $pdo->prepare("SELECT username, email FROM tbl_user 
										WHERE username=:uname OR email=:uemail");

            $select_stmt->execute(array(':uname' => $username, ':uemail' => $email));
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

            if (isset($row["username"]) == $username) {
                $errorMsg[] = "Извините, имя пользователя уже существует";
            } else if (isset($row["email"]) == $email) {
                $errorMsg[] = "Извините, email уже существует";
            } else if (!isset($errorMsg))
            {
                $new_password = password_hash($password, PASSWORD_DEFAULT);

                $insert_stmt = $pdo->prepare("INSERT INTO tbl_user (username,email,password,foto) VALUES(:uname,:uemail,:upassword,:ufoto)");

                if ($insert_stmt->execute(array(
                    ':uname'	=> $username,
                    ':uemail'	=> $email,
                    ':upassword' => $new_password,
                    ':ufoto' => $foto
                ))) {

                    $registerMsg = "Зарегистрировались успешно..... Нажмите на Ссылку \"Авторизоваться\"
					<meta http-equiv='refresh' content='5;URL=login.php'>";

                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
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
	<title>Регистрация</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="js/jquery-1.12.4-jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styleMenu.css" />
</head>
<body>
	<?php require_once 'header.php'; ?>
	<div class="wrapper">
		<div class="container">
			<div>
				<?php
				if (isset($errorMsg)) {
					foreach ($errorMsg as $error) {
				?>
						<div class="alert alert-danger">
							<strong>Ошибка! <?php echo $error; ?></strong>
						</div>
					<?php
					}
				}
				if (isset($registerMsg)) {
					?>
					<div class="alert alert-success">
						<strong><?php echo $registerMsg; ?></strong>
					</div>
				<?php
				}
				?>
					<h2 class="HH">Страница регистрации</h2>

				<form method="post" class="form-horizontal ff">
					<div class="form-group">
						<label class="col-sm-3 control-label">Имя пользователя</label>
						<div class="col-sm-6">
							<input type="text" name="txt_username" class="form-control" placeholder="Введите имя" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Email</label>
						<div class="col-sm-6">
							<input type="text" name="txt_email" class="form-control" placeholder="Введите email" />
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
							<input type="submit" name="btn_register" class="but" value="Регистрация">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9 m-t-15">
							У вас есть учетная запись, зарегистрированная здесь? <a href="login.php">
								<p class="text-info">Авторизоваться</p>
							</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>