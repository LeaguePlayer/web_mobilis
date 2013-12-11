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
			foreach ($data as $key_d=>$value)
			{
				$images=$data[$key_d]->getGallery()->galleryPhotos;	
				print('<div class="kitchen"><div class="view"><img style="width=323;height=216;	" src="/'.$images[0]['galleryDir'].'/'.$images[0]['rank'].'cat_list_large.'.$images[0]['ext'].'" ></div><div class="thumbs"><a href=""><img src="/'.$images[0]['galleryDir'].'/'.$images[0]['rank'].'cat_list_small.'.$images[0]['ext'].'" ></a>');
				foreach($images as $key=>$img)
				{
					print('<a href=""><img src="/'.$img['galleryDir'].'/'.$img['rank'].'cat_list_small.'.$img['ext'].'" ></a>');
				}
				print('</div></div>');
			}
		}
	?>
</div>
