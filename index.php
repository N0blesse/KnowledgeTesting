<?php require_once 'logic/db.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<?php require_once 'parts/head.php'; ?>
</head>
<body>
	<div>
		<?php include_once 'parts/header.php'; ?>
		<?php if(isset($_SESSION['user_login'])): ?>
			<h1>Добро пожаловать, <?php echo $_SESSION['user_login']; ?></h1>
			<a href="logic/logout.php">Выйти из аккаунта</a>
			<br>
			<h3>Последний добавленый тест:</h3>
			<?php include_once 'logic/last_test.php'; ?>
			<hr>
			<button type="button" id="showMore">Показать ещё</button>
		<?php else: ?>
			<?php include_once 'parts/not_auth.php'; ?>
		<?php endif; ?>
	</div>
	<?php include_once 'parts/footer.php'; ?>
</body>
</html>