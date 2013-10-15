<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--[if IE 7]>     <html xmlns="https://www.w3.org/1999/xhtml" class="ie ie7 lte9 lte8 lte7"> <![endif]-->
<!--[if IE 8]>     <html xmlns="https://www.w3.org/1999/xhtml" class="ie ie8 lte9 lte8 gte8"> <![endif]-->
<!--[if IE 9]>     <html xmlns="https://www.w3.org/1999/xhtml" class="ie ie9 lte9"> <![endif]-->
<!--[if gt IE 9]>  <html xmlns="https://www.w3.org/1999/xhtml"> <![endif]-->
<!--[if !IE]><!--> <html xmlns="https://www.w3.org/1999/xhtml"><!--<![endif]-->
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--[if lte IE 6 ]><script type="text/javascript">window.location.href="ie6_close/index_ru.html";</script><![endif]-->
<!--[if IE]><script type="text/javascript" src="/js/lib/html5.js"></script><![endif]-->
<!--[if lte IE 7]> <script type="text/javascript" src="/js/lib/json2.js"></script><![endif]-->
<?php
echo CHtml::tag('title', array(), $this->module->t($this->pageTitle));
$clSc  = Yii::app()->getClientScript();
$baseUrl = Yii::app()->baseUrl;
// Подключаем js
// Libs
$jsLibsPath = $baseUrl . '/js/lib/';
$clSc->registerScriptFile($jsLibsPath . 'jquery-1.9.1.min.js');
// App main objects
$jsAppPath = $baseUrl . '/js/app/';
$clSc->registerScriptFile($jsAppPath . 'main.js');
// Sections includes
$jsInclPath = $baseUrl . '/js/app/main/';
$clSc->registerScriptFile($jsInclPath . 'section.js')
// Подключаем css
$cssLibsPath = $baseUrl . '/css/lib/';
$cssAppPath = $baseUrl . '/css/app/';
$clSc->registerCssFile($cssLibsPath . 'reset.css');
// Sections includes
$cssInclPath = $baseUrl . '/css/app/main/';
$clSc->registerCssFile($cssInclPath . 'section.css');
// Стили темы
if (!is_null(Yii::app()->theme))
{
	$clSc->registerCssFile($this->_baseUrl . '/css/main/theme.css');
}
// Стили для ie
$clSc->registerCssFile($cssAppPath . 'ie.css');
?>
</head>
