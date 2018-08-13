<?php 
require_once 'db.php';
$test_quantity = getNakedInput($_POST['newTest__quantity']);
$test_title = getNakedInput($_POST['newTest__title']);
if (empty($test_quantity) || empty($test_title) || !isset($_POST['newTest__classes'])) {
	die('Пожалуйста, заполните все поля');
}
try{
	$pdo->beginTransaction();
	$sql_test = 'INSERT INTO tests(title, quantity) VALUES(:title, :quantity)';
	$params = [
		':title' => $test_title,
		':quantity' => $test_quantity
	];
	$stmt_test = $pdo->prepare($sql_test);
	$stmt_test->execute($params);
	$last_id = $pdo->lastInsertId();
	$class_param = [];
	$rows = [];
	foreach ($_POST['newTest__classes'] as $class) {
		array_push($class_param, $last_id, $class);
		$str = '(?, ?)';
		array_push($rows, $str);
	}
	$sql_classes = 'INSERT INTO tests_classes(test_id, class_id) VALUES' . implode($rows, ',');
	$stmt_classes = $pdo->prepare($sql_classes);
	$stmt_classes->execute($class_param);
	$pdo->commit();
	echo 'Новый тест успешно добавлен!';
}catch(PDOException $e){
	echo 'Во время добавления теста произошла ошибка: ' . $e->getMessage();
	$pdo->rollBack();
}
function getNakedInput($input){
	return htmlentities(trim($input));
}