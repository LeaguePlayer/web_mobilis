<?php
$this->breadcrumbs=array(
	'Mobili Structures'=>array('index'),
	$model->name,
);

<h1>View MobiliStructure #<?php echo $model->id; ?></h1>

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
		'settings',
		'parent_id',
		'index',
		'hidden',
	),
)); ?>
