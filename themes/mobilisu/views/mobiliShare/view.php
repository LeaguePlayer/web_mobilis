<?php
$this->breadcrumbs=array(
	'Mobili Shares'=>array('index'),
	$model->name,
);

<h1>View MobiliShare #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'discription',
		'condition',
		'img_image',
		'hidden',
	),
)); ?>
