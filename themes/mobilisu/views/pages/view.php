<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->name,
);

<h1>View Pages #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'module',
		'alias',
		'meta_title',
		'meta_keywords',
		'meta_description',
		'wswg_body',
		'parent_id',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
