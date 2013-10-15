<?php
namespace app\db\armodels\db2;

/**
 * Базовый AR-класс для таблиц БД db2
 */
abstract class BaseModel extends \app\db\armodels\BaseModel
{

	public function getDbConnection()
	{
		return \Yii::app()->db2;
	}

}
