<?php
/* @var $this MobiliGalariesImagesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mobili Galaries Images',
);

$this->menu=array(
	array('label'=>'Create MobiliGalariesImages', 'url'=>array('create')),
	array('label'=>'Manage MobiliGalariesImages', 'url'=>array('admin')),
);
?>

<h1>Mobili Galaries Images</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
