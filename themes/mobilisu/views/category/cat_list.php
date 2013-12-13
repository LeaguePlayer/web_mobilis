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
		$data=$goods;
		if (!empty($data))
		{
			foreach ($data as $key_d=>$value)
			{
				$images=$data[$key_d]->getGallery()->galleryPhotos;	
				if($images[0]['rank'])
				{
					print('<div class="kitchen"><div class="view"><a href="/'.$images[0]['galleryDir'].'/'.$images[0]['rank'].'cat_list_large.'.$images[0]['ext'].'"><img style="width=323;height=216;	" src="/'.$images[0]['galleryDir'].'/'.$images[0]['rank'].'cat_list_large.'.$images[0]['ext'].'" ></a></div><div class="thumbs">');
					foreach($images as $key=>$img)
					{
						if (!empty($img['rank'])){
							print('<a href="/'.$img['galleryDir'].'/'.$img['rank'].'cat_list_small.'.$img['ext'].'" rel="'.$key.'"><img src="/'.$img['galleryDir'].'/'.$img['rank'].'cat_list_small.'.$img['ext'].'" ></a>');
						}
						
					}
				print('</div>');
				print('<p class="kname">'.$value->name.'</p>');
				print('<p class="kprice">'.$value->price.'</p></div>');
				}
			}
		}
	?>
</div>
