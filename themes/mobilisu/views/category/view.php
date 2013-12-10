<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name,
);
?>
<h1><?php echo $model->name; ?></h1>
<?
 	$items=Goods::model()->findAll('cat_id=:cat_parent',array(':cat_parent'=>$model->id));
 	foreach ($items as $key => $value) {
 		
 	}
?>
