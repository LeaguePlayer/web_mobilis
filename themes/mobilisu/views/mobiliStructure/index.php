<?php
/* @var $this MobiliStructureController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mobili Structures',
);

$this->menu=array(
	array('label'=>'Create MobiliStructure', 'url'=>array('create')),
	array('label'=>'Manage MobiliStructure', 'url'=>array('admin')),
);
?>

<h1>Mobili Structures</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
