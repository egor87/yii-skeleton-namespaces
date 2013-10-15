<?php
namespace app\db\gateways\db2;

/**
 * Базовый класс шлюза для таблиц БД db2
 */
class BaseGw extends \app\db\gateways\BaseGw
{
	/**
	 * Название используемого соединения с БД
	 * @var string 
	 */
	protected $_dbConnName = 'db2';
}
