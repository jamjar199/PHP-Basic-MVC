<?php require('partials/header.php'); ?>

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

<?php require('partials/footer.php'); ?>