<?php
require_once 'db.php';
$sql = 'SELECT id, title FROM tests ORDER BY id DESC LIMIT 1';
$result = $pdo->query($sql);
$test = $result->fetch(PDO::FETCH_OBJ);
?>
<h4>
	<a href=<?php echo 'tests.php#test_' . $test->id; ?>><?php echo $test->title; ?></a>
</h4>