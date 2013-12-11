<?php
/* @var $this CategoryAttrsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Category Attrs',
);

$this->menu=array(
	array('label'=>'Create CategoryAttrs', 'url'=>array('create')),
	array('label'=>'Manage CategoryAttrs', 'url'=>array('admin')),
);
?>

<h1>Category Attrs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
