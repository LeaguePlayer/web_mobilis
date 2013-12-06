<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name,
);

<h1>View Category #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'cat_parent',
		'wswg_body',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
