<?php
namespace app\components\resources;

use Yii;
use app\modules\main\MainModule;

/**
 * Компонент, отвечающий за навигацию
 */
class Navigation extends \CComponent
{
	
	/**
	 * Данные о доступных страницах
	 * @var array 
	 */
	protected $_pages = array(
		'page1' => array(
			'route' => 'controller/action',
			'title' => 'Page 1',
		)
	);
	
	public function init()
	{
		
	}

	/**
	 * Получить данные по страницам
	 */
	public function getPages()
	{
		return $this->_pages;
	}
}
