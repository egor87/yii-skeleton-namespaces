<?php
namespace app\db\gateways\db3;

/**
 * Базовый класс шлюза для таблиц БД db3 
 */
abstract class BaseGw extends \app\db\gateways\BaseGw
{
	/**
	 * Название используемого соединения с БД
	 * @var string 
	 */
	protected $_dbConnName = 'db3';
	
}
