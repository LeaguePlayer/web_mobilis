<?php
$this->breadcrumbs=array(
	'Mobili News'=>array('index'),
	$model->name,
);

<h1>View MobiliNews #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
		'img_image',
		'name',
		'announce',
		'text',
		'meta_title',
		'meta_keywords',
		'meta_description',
		'subscribe_sent',
		'element_id',
	),
)); ?>
