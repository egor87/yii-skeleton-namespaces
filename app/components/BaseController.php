<?php
namespace app\components;

use Yii;

/**
 * Базовый контроллер приложения
 */
class BaseController extends \CController
{
	public function init()
	{
		parent::init();
		$this->_iePlug();
	}
	
	protected function _iePlug()
	{
		if(Yii::app()->browser->isBrowser(\Browser::BROWSER_IE)
			&& (Yii::app()->browser->getVersion() == '6.0' || Yii::app()->browser->getVersion() == '5.5'))
		{
			header ('Location: /ie6/ie6.html');
		}
	}
	
	/**
	 * Выдача результата в json
	 * @param array $data
	 * @param int $status
	 * @param array $messages 
	 */
	protected function _jsonOutput(array $data, $status = 1, $msgs = array(), $mergeMsgs = TRUE)
	{
		// При необходимости объединяем сообщения об оишибках для всех полей формы
		if (is_array($msgs) && !empty($msgs) && $mergeMsgs == TRUE)
		{
			$mergedMsgs = array();
			foreach ($msgs as $fieldMsgs)
			{
				if (!is_array($fieldMsgs) || empty($fieldMsgs))
				{
					continue;
				}
				foreach ($fieldMsgs as $fieldMsg)
				{
					$mergedMsgs[] = $fieldMsg;
				}
			}
			$msgs = $mergedMsgs;
		}
		// Выдаём ответ в json
		$result = array(
			'data' => $data,
			'status' => $status,
			'msgs' => $msgs,
		);
		header('Content-type: application/json');
		echo \CJSON::encode($result);
		Yii::app()->end();
	}
	
	/**
	 * Установка 404 ошибки
	 */
	protected function _set404()
	{
		if ($this->_isAjax())
		{
			$this->_jsonOutput(array(), 0, $this->module->t('Возникла ошибка при выполнении операции'));
		}
		else
		{
			throw new \CHttpException(404);
		}
	}
	
	protected function _isAjax()
	{
		return Yii::app()->request->isAjaxRequest;
	}
}