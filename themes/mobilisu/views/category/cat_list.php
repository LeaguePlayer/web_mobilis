<?php
/*$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->name,
);*/

?>
<div class="text">
	<?
		echo '<h1>'.$model->name.'</h1>';
		echo $model->wswg_body;

?></div>
<div class="kitchens">
	<?
	if (isset($data) && $data->getData()){
		$this->widget('zii.widgets.CListView', array(
		    'dataProvider'=>$data,
		    'itemView'=>'kitchen',   // refers to the partial view named '_post'
		    'summaryText' => ''
		    /*'sortableAttributes'=>array(
		        'title',
		        'create_time'=>'Post Time',
		    ),*/
		));
	}
	?>
	<?
		/*$data=$goods;
		if (!empty($data))
		{
			foreach ($data as $key_d=>$value)
			{
				$criteria=new CDbCriteria;
				$criteria->condition='cat_id=:id';
				$criteria->params=array(':id'=>$value->cat_id);
				$criteria->order='name DESC';
				$count=Goods::model()->count($criteria);
				$result=Goods::model()->findAll($criteria);
				$dataProvider=new CArrayDataProvider($result);
				$pages=new CPagination(count($goods));
				$pages->setPageSize(10);
				$pages->applyLimit($criteria);
				$this->widget('zii.widgets.CListView',array(
					'dataProvider'=>$dataProvider,
					'itemView'=>'kitchen',
					'ajaxUpdate'=>'false',
					'enablePagination'=>'false',
					'summaryText'=>'Всего '.$count.' записей',
				));
				$this->widget('CLinkPager',array(
					'header'=>'',
					'frstPageLabel'=>'<<',
					'prevPageLabel'=>'<',
					'nextPageLabel'=>'>',
					'lastPageLabel'=>'>>',
					'pages'=>$pages,
				));
				$dataProvider=new CActiveDataProvider('Post');


			}
		}*/
	?>
</div>
