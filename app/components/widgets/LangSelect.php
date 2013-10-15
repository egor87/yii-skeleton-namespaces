<?php

namespace app\components\widgets;

use Yii;
use app\components\resources\Multilang;

class LangSelect extends \CWidget
{
	/**
	 * Данные по языкам
	 * @var array 
	 */
	public $langsData;
	
	/**
	 * Текущий язык
	 * @var string 
	 */
	public $activeLang = NULL;
	
	/**
	 * Параметр в url, отвечающий за язык
	 * @var string 
	 */
	public $langParam = NULL;

	public function run()
	{
		if (is_null($this->langParam))
		{
			$this->langParam = Yii::app()->multilang->urlParam;
		}
		return $this->render('lang-select', array(
			'langsData' => $this->langsData,
			'activeLang' => $this->activeLang,
			'langParam' => $this->langParam,
		));
	}
}