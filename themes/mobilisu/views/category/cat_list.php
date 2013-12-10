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
		$data=Goods::model()->findAll('cat_id=:id',array(':id'=>$model->id));
		if (!empty($data))
		{
			$images=$data[0]->getGallery()->galleryPhotos;
			print_r($images);
			foreach ($data as $key_d=>$value)
			{
				foreach($images as $key=>$img)
				{

					print('<div class="view"><img src="/'.$img['galleryDir'].'/'.$img['rank'].'medium.'.$img['ext'].'" ></div>');
				}
			}
		}
	?>
</div>
