<?php
namespace app\components\widgets;

use Yii;

class Navigation extends \CWidget
{
	
	public function run()
	{
		$navPages = Yii::app()->navigation->pages;
		if (!is_array($navPages) || empty($navPages))
		{
			return '';
		}
		$curRoute = str_replace(
			Yii::app()->getController()->module->id . '/',
			'',
			Yii::app()->getController()->getRoute()
		);
		echo $this->render('navigation', array(
			'pages' => $navPages,
			'curRoute' => $curRoute,
		));
	}
}