<?php 
require_once 'db.php';
$sql = 'SELECT tests.id, tests.title, tests.quantity, GROUP_CONCAT(classes.class SEPARATOR ", ") AS classes FROM tests INNER JOIN tests_classes ON tests.id = tests_classes.test_id INNER JOIN classes ON tests_classes.class_id = classes.id GROUP BY tests.id, tests.title, tests.quantity';
$result = $pdo->query($sql);
while ($test = $result->fetch(PDO::FETCH_OBJ)): ?>
	<div class="test__container" id=<?php echo 'test_' . $test->id; ?> data-test-id=<?php echo $test->id; ?>>
		<h3 class="test__title"><?php echo $test->title; ?></h3>
		<h4 class="test__class"><?php echo $test->classes; ?></h4>
		<h4 class="test__quantity">Количество вопросов: <?php echo $test->quantity; ?></h4>
		<?php if (isset($_COOKIE['watched']) && array_key_exists($test->id, $_COOKIE['watched'])): ?>
			<button class="test__watched test__watched_active">(Прошёл)</button>
		<?php else: ?>
			<button class="test__watched">(Не прошёл)</button>
		<?php endif; ?>
		<button type="button" class="test__del">Удалить</button>
	</div>
	<hr>
<?php endwhile; ?>