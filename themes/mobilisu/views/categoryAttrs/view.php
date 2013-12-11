<?php
$this->breadcrumbs=array(
	'Category Attrs'=>array('index'),
	$model->name,
);

<h1>View CategoryAttrs #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_id',
		'name',
		'discription',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
