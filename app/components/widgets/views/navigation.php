<ul class="navigation">
	<?php foreach ($pages as $page) : ?>
	<?php
	($page['route'] == $curRoute) ? $active = TRUE : $active = FALSE;
	$title =Yii::app()->controller->module->t($page['title']);
	?>
	<li<?php if ($active) echo ' class="active"'; ?>>
		<?php if ($active) : ?>
			<div><span><?php echo $title; ?></span></div>
		<?php else : ?>
			<a href="<?php echo Yii::app()->controller->createUrl($page['route']); ?>">
				<span><?php echo $title; ?></span>
			</a>
		<?php endif; ?>
	</li>
	<?php endforeach;  ?>
</ul>