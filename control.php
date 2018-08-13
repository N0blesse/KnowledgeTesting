<?php require_once 'logic/db.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<?php require_once 'parts/head.php'; ?>
</head>
<body>
	<?php include_once 'parts/header.php'; ?>
	<?php if(isset($_SESSION['user_login'])): ?>
		<h1>Добавить тест</h1>
		<form name="newTest">
			<label>Название дисциплины</label>
			<input type="text" name="newTest__title" value="">
			<br>
			<label>Количество вопросов</label>
			<input type="number" name="newTest__quantity" value="">
			<br>
			<label>Тестируемые группы</label>
			<select name="newTest__classes[]" multiple>
				<?php include_once 'logic/get_classes.php'; ?>
			</select>
			<br>
			<button type="submit">Добавить</button>
		</form>
	<?php else: ?>
		<?php include_once 'parts/not_auth.php'; ?>
	<?php endif; ?>
	<?php include_once 'parts/footer.php'; ?>
</body>
</html>