<?php
namespace modMain\controllers;

use Yii;

class CommonController extends \modMain\components\MainController
{
	/**
	 * Сообщение об ошибке 
	 */
	public function actionError()
	{
		if (Yii::app()->user->isGuest)
		{
			$this->layout = 'login';
		}
		// Нужно для корректного отображения файлов темы
		$baseUrl = (\Yii::app()->theme ? \Yii::app()->theme->baseUrl : \Yii::app()->request->baseUrl);
		$this->_baseUrl = $baseUrl;
		if($error = \Yii::app()->errorHandler->error)
		{
			switch ($error['code'])
			{
				case 404 : $msg = 'Страница не найдена'; break;	
				default : $msg = 'Ошибка приложений'; break;
			}
			$this->pageTitle = $this->module->t('Произошла ошибка');
			$this->render('error', array('error' => $error, 'msg' => $msg));
		}
	}
}
