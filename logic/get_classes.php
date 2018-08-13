<?php
$sql = 'SELECT id, class FROM classes';
$result = $pdo->query($sql);
while($row = $result->fetch(PDO::FETCH_OBJ)): ?>
	<option value=<?php echo $row->id; ?>><?php echo $row->class; ?></option>
<?php endwhile; ?>