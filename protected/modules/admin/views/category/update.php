<?php
/*$this->breadcrumbs=array(
	"{$model->translition()}"=>array('list'),
	'Редактирование',
);
*/
$this->menu=array(
	array('label'=>'Список', 'url'=>array('list')),
	array('label'=>'Добавить','url'=>array('create')),
);?>

<h1><?=$model->translition();?> - Редактирование</h1>
<?php echo $this->renderPartial('_update',array('model'=>$model,'attrs'=>$attrs)); ?>