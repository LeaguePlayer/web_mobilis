<?php
$this->menu=array(
	array('label'=>'Добавить','url'=>array('create')),
);
?>

<h1>Управление <?php echo $model->translition(); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'pages-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type'=>TbHtml::GRID_TYPE_HOVER,
    'afterAjaxUpdate'=>"function() {sortGrid('pages')}",
    'rowHtmlOptionsExpression'=>'array(
        "id"=>"items[]_".$data->id,
        "class"=>"status_".$data->status,
    )',
	'columns'=>array(
		'name',
		array(
			'name'=>'module',
			'type'=>'raw',
			'value'=>'$data->getModule()',
			'filter'=>TbHtml::activeDropDownList($model,'module', array(''=>'Все')+Pages::getModules()),
		),
		array(
			'name'=>'parent_id',
			'type'=>'raw',
			'value'=>'$data->getParent()',
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>

<?php Yii::app()->clientScript->registerScript('sortGrid', 'sortGrid("pages");', CClientScript::POS_END) ;?>