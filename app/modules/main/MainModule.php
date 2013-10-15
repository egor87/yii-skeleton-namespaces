<?php
namespace app\modules\main;

use Yii;
use app\components\helpers\HCookie;

class MainModule extends \CWebModule
{
	
	public $controllerNamespace = 'modMain\controllers';
	
	/**
	 *  Категория перевода для модуля по умолчанию 
	 */
	const DEF_TRANSLATE_CAT = 'app\modules\main\MainModule.main';
	
	/**
	 * Параметр, отвечающий за тему 
	 */
	const THEME_PARAM = 'theme';
	
	/**
	 * Время жизни куки с темой 
	 */
	const THEME_COOKIE_LF = 864000; // 10 days
	
	/**
	 * Параметр, отвечающий за режим "Версия для печати"
	 */
	const PRINT_PARAM = 'print';

	/**
	 * Используемый шаблон
	 * @var string 
	 */
	public $layout = 'main';
	
	/**
	 * Preload components
	 * @var array  
	 */
	public $preload = array('multilang');
	
	/**
	 * Включён ли режим "Версия для печати"
	 * @var bool 
	 */
	public $printVer = FALSE;

	/**
	 * Набор возможных тем для модуля
	 * @var array 
	 */
	protected static $_avThemes = array('default');

	public function init()
	{
		$n = $this->name;
		// Имопорт необходимых классов
		Yii::app()->setImport(array(
			$n . '.models.*',
			$n . '.components.*',
			$n . '.forms.*',
		));
		// Конфигурация компонентов
		Yii::app()->setComponents(array(
			// Реализация мультиязычности
			'multilang' => array(
				'class' => 'app\components\resources\Multilang',
				'defLang' => 'ru',
			),
			// Навигация
			'navigation' => array(
				'class' => 'app\components\resources\Navigation',
			),
		));
		// Иницализация компонентов
		foreach ($this->preload as $preload)
		{
			Yii::app()->preload[] = $preload;
		}
		Yii::app()->preloadComponents();
		// Устанавливаем тему
		$this->_setTheme();
		// Параметры, связанные с печатью
		$this->_processPrintParam();
		// Специальный заголовок для ie для корректной работы с cookie
		header('P3P: CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
	}
	
	/**
	 * Перевод сообщения
	 * @see YiiBase::t()
	 */
	public static function t($message, array $params=array(), string $source=NULL, string $language=NULL, $category = NULL)
	{
		if (is_null($category))
		{
			$category = self::DEF_TRANSLATE_CAT;
		}
		return Yii::t($category, $message, $params, $source, $language);
	}

	/**
	 * Установка темы приложения
	 */
	protected function _setTheme()
	{
		$curTheme = NULL;
		// Определяем наличие темы в различных местах
		$paramTheme = Yii::app()->request->getParam(self::THEME_PARAM);
		$cookieTheme = Yii::app()->request->cookies[self::THEME_PARAM];
		// Если тема передана в параметре
		if (!is_null($paramTheme))
		{
			$curTheme = $paramTheme;
		}
		// Если тема есть в сессии
		elseif (!is_null(Yii::app()->session[self::THEME_PARAM])) 
		{
			$curTheme = Yii::app()->session[self::THEME_PARAM];
		}
		// Если тема есть в куке
		elseif (!is_null($cookieTheme))
		{
			$curTheme = $cookieTheme->value;
		}
		// Устанавливаем тему приложения
		if (is_null($curTheme) || $curTheme == '' || !in_array($curTheme, self::$_avThemes))
		{
			$curTheme = 'default';
		}
		Yii::app()->setTheme($curTheme);
		// Сохраняем тему в сессию
		Yii::app()->session[self::THEME_PARAM] = $curTheme;
		// Сохраняем тему в куку
		HCookie::setCookie(
			self::THEME_PARAM, $curTheme, self::THEME_COOKIE_LF
		);
	}
	
	/*
	 * Обработка параметра, связанного с режимом печати страницы, установка стилей
	 */
	protected function _processPrintParam()
	{
		$this->printVer = (bool) Yii::app()->request->getParam(self::PRINT_PARAM);
		$clSc  = Yii::app()->getClientScript();
		$media = 'print';
		if ($this->printVer)
		{
			$media = 'all';
			$clSc->registerCss('print','#print-controls {display: block; }', 'screen');
		}
		$clSc->registerCssFile('/css/app/print.css', $media);
	}
	
}
