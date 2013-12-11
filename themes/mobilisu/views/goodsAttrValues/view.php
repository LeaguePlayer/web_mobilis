<?php
$this->breadcrumbs=array(
	'Goods Attr Values'=>array('index'),
	$model->id,
);

<h1>View GoodsAttrValues #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'goods_id',
		'attr_id',
		'attr_value',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
