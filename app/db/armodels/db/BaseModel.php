<?php
namespace app\db\armodels\db;

/**
 * Базовый AR-класс для таблиц основной БД 
 */
abstract class BaseModel extends \app\db\armodels\BaseModel
{

	public function getDbConnection()
	{
		return \Yii::app()->db;
	}

}
