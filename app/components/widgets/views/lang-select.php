<?php

Yii::app()->getClientScript()->registerScript(
	'lang_sel',
	'
		$(".lang-ch").ddmenu(
			{
				selected : function(event, ui) {
					var langForm = $(".lang-ch-f"),
						langParamInp = langForm.find(".lang-param"),
						curVal = langParamInp.val();
					if (ui != curVal)
					{
						langParamInp.val(ui);
						langForm.submit();
					}
				}
			}
		);
	',
	\CClientScript::POS_READY
);
?>
<form class="lang-ch-f" action="" method="get">
<div class="hidden">
	<?php echo \CHtml::hiddenField($langParam, $activeLang['code'], array('class' => 'lang-param')); ?>
</div>	
<div class="dd-list lang-ch">
	<dl class="dropdown">
		<dt data-value="">
			<span class="flag-icon flag-<?php echo Chtml::encode($activeLang['code']); ?>"></span>
			<?php echo Chtml::encode($activeLang['title']); ?>
		</dt>
		<dd>
		<ul>
			<?php foreach ($langsData as $code => $title) : ?>
			<li data-value="<?php echo Chtml::encode($code); ?>">
				<span class="flag-icon flag-<?php echo Chtml::encode($code); ?>"></span>
				<?php echo Chtml::encode($title); ?>
			</li>
			<?php endforeach; ?>
		</ul>
		</dd>
	</dl>
</div>
</form>
