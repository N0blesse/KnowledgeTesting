<header>
	<nav>
		<?php if(isset($_SESSION['user_login'])): ?>
			<a href="index.php">Главная</a>
			<a href="tests.php">Тесты</a>
			<a href="control.php">Добавить тест</a>
		<?php else: ?>
			<a href="signin.php">Авторизоваться</a>
			<a href="signup.php">Зарегистрироваться</a>
		<?php endif; ?>
	</nav>
</header>
<hr>