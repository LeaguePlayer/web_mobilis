<?php
/* @var $this GoodsAttrValuesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Goods Attr Values',
);

$this->menu=array(
	array('label'=>'Create GoodsAttrValues', 'url'=>array('create')),
	array('label'=>'Manage GoodsAttrValues', 'url'=>array('admin')),
);
?>

<h1>Goods Attr Values</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
