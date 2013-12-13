<?php
$this->breadcrumbs=array(
	"{$model->translition()}"=>array('list'),
	'Создание',
);
$cs = Yii::app()->clientScript;
$cs->registerScriptFile($this->getAssetsUrl().'/js/add_row.js', CClientScript::POS_END); 
$cs->registerScriptFile($this->getAssetsUrl().'/js/jquery.translate-1.3.9.min.js', CClientScript::POS_END);
$this->menu=array(
	array('label'=>'Список','url'=>array('list')),
);
?>

<h1><?php echo $model->translition(); ?> - Добавление</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>