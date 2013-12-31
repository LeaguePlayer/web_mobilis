<?php
$this->menu=array(
	array('label'=>'Добавить','url'=>array('create')),
);
?>

<h1>Управление <?php echo $model->translition(); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'goods-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type'=>TbHtml::GRID_TYPE_HOVER,
    'afterAjaxUpdate'=>"function() {sortGrid('goods')}",
    'rowHtmlOptionsExpression'=>'array(
        "id"=>"items[]_".$data->id,
        "class"=>"status_".$data->status,
    )',
	'columns'=>array(
		'name',
		'gllr_gallery_id',
		array(
			'name'=>'cat_id',
			'type'=>'raw',
			'value'=>'$data->category->name'
		),
		array(
			'name'=>'status',
			'type'=>'raw',
			'value'=>'Goods::getStatusAliases($data->status)',
			'filter'=>Goods::getStatusAliases()
		),
		'sort',
		array(
			'name'=>'create_time',
			'type'=>'raw',
			'value'=>'SiteHelper::russianDate($data->create_time).\' в \'.date(\'H:i\', strtotime($data->create_time))'
		),
		array(
			'name'=>'update_time',
			'type'=>'raw',
			'value'=>'SiteHelper::russianDate($data->update_time).\' в \'.date(\'H:i\', strtotime($data->update_time))'
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>

<?php Yii::app()->clientScript->registerScript('sortGrid', 'sortGrid("goods");', CClientScript::POS_END) ;?>