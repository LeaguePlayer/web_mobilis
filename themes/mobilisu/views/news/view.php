<?php

<h1>View News #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'img_image',
		'text',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
