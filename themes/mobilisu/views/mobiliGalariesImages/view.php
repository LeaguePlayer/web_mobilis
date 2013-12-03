<?php
$this->breadcrumbs=array(
	'Mobili Galaries Images'=>array('index'),
	$model->name,
);

<h1>View MobiliGalariesImages #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'img_image',
		'index',
		'gallery_id',
		'element_id',
	),
)); ?>
