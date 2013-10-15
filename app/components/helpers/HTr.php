<?php
namespace app\components\helpers;

use Yii;

class HTr
{
	public static function logMissTr(\CMissingTranslationEvent $e)
	{
		Yii::log($e->message, 'error', $e->category);
	}
}