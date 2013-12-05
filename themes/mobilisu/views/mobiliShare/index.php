<?php
/* @var $this MobiliShareController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mobili Shares',
);

$this->menu=array(
	array('label'=>'Create MobiliShare', 'url'=>array('create')),
	array('label'=>'Manage MobiliShare', 'url'=>array('admin')),
);
?>

<h1>Mobili Shares</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
