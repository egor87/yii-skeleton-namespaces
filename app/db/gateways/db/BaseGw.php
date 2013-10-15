<?php
namespace app\db\gateways\db;

/**
 * Базовый класс шлюза для таблиц основной БД 
 */
class BaseGw extends \app\db\gateways\BaseGw
{
	/**
	 * Название используемого соединения с БД
	 * @var string 
	 */
	protected $_dbConnName = 'db';
}
