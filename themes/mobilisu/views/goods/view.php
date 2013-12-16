<?php
$this->breadcrumbs=array(
	'Goods'=>array('index'),
	$model->name,
);
?>
<h1><?php echo $model->name; ?></h1>
<div class="kitchens">
	<?
		$images=$model->getGallery()->galleryPhotos;
		$attr=GoodsAttrValues::model()->findAll('goods_id=:id',array(':id'=>$model->id));
		if (!empty($images)){
			print('<div class="kitchen">');
			print('<p >Наименование: '.$model->name);
			print ('</p>');
			print('<div class="view"><img style="width=323;height=216;	" src="/'.$images[0]['galleryDir'].'/'.$images[0]['rank'].'cat_list_large.'.$images[0]['ext'].'" >');
				print('</div><div class="thumbs">');
			foreach($images as $key=>$img)
			{
				print('<a href="/'.$img['galleryDir'].'/'.$img['rank'].'cat_list_large.'.$img['ext'].'"><img src="/'.$img['galleryDir'].'/'.$img['rank'].'cat_list_small.'.$img['ext'].'" ></a>');
			}
			print('</div></div>');
			}?>
			<div class="attrs">
				<p><br>
				<?
					print('Характеристики:<br>');
					foreach($attr as $key=>$value)
					{
						$data=CategoryAttrs::model()->find('id=:id',array(':id'=>$value->id));
						print($data->name." ".$value->attr_value.'<br>');	
					}
				?>
			</p>
			</div>
			<p class="kprice">Цена: <?=$model->price;?></p>
</div>
