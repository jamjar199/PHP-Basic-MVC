<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>To-Do List</title>
</head>
<body>
	<h1>My Tasks</h1>

	<?php foreach ($data as $task) : ?>
		<li>
			<?php if ($task->completed) : ?>
				<strike><?= $task->title; ?></strike>
			<?php else : ?>
				<?= $task->title; ?>
			<?php endif; ?>
		</li>
	<?php endforeach; ?>


</body>
</html>