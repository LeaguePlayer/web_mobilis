<?php
/* @var $this MobiliNewsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mobili News',
);

$this->menu=array(
	array('label'=>'Create MobiliNews', 'url'=>array('create')),
	array('label'=>'Manage MobiliNews', 'url'=>array('admin')),
);
?>

<h1>Mobili News</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
