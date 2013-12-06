<?php
$this->breadcrumbs=array(
	'Goods'=>array('index'),
	$model->name,
);

<h1>View Goods #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'wswg_desc',
		'gllr_gallery_id',
		'cat_id',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
