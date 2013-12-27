<?php
/* @var $this MobiliNewsController */
/* @var $dataProvider CActiveDataProvider */

$this->menu=array(
	array('label'=>'Create MobiliNews', 'url'=>array('create')),
	array('label'=>'Manage MobiliNews', 'url'=>array('admin')),
);
?>

<h1>Новости1</h1>
<div>
<?

	foreach($dataProvider as $key=>$value)
	{?>
		<div class="text">
	<h2>Новости</h2>
	<?
	foreach ($dataProvider as $key=>$value)
	{?>
	<div class="data">
		<div><?$value->date;?></div>
		<div class="title">
			<?='<a href="/mobiliNews/view/'.$value->id.'">'.$value->name.'</a>';?>
		</div>
		<div><?$value->announce;?></div>
	</div>
	<?}?>
</div>
	}
?>
</div>