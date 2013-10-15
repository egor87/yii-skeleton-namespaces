<?php
namespace app\db\armodels\db3;

/**
 * Базовый AR-класс для таблиц БД db3 
 */
class BaseModel extends \app\db\armodels\BaseModel
{
	public function getDbConnection()
	{
		return \Yii::app()->db3;
	}
}
