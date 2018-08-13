<?php
require_once 'db.php';
$login = trim($_POST['login']);
$pwd = trim($_POST['pwd']);
if (!empty($login) && !empty($pwd)) {
	$sql_check = 'SELECT EXISTS(SELECT login FROM teachers WHERE login = :login)';
	$stmt_check = $pdo->prepare($sql_check);
	$stmt_check->execute([':login' => $login]);
	if ($stmt_check->fetchColumn()) {
		die('Пользователь с таким логином уже существует');
	}
	$pwd = password_hash($pwd, PASSWORD_DEFAULT);
	$sql = 'INSERT INTO teachers(login, password) VALUES(:login, :pwd)';
	$param = ['login' => $login, ':pwd' => $pwd];
	$stmt = $pdo->prepare($sql);
	$stmt->execute($param);
	echo 'Вы успешно зарегистрировались!';
}else{
	echo 'Пожалуйста, заполните все поля';
}
?>
<br>
<a href="../signin.php">Страница авторизации</a>