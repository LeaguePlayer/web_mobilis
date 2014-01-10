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
		$criteria = new CDbCriteria;
        $criteria->compare('goods_id', $model->id);
        $criteria->order = 'id';
		$attr=GoodsAttrValues::model()->findAll('goods_id=:id',array(':id'=>$model->id));

		if (!empty($images)){
			print('<div class="kitchen">');
			// print('<p >Наименование: '.$model->name);
			// print ('</p>');
			print('<div class="view"><a href="/'.$images[0]['galleryDir'].'/'.$images[0]['rank'].'medium.'.$images[0]['ext'].'" rel="1"><img style="width=323;height=216;	" src="/'.$images[0]['galleryDir'].'/'.$images[0]['rank'].'cat_list_large.'.$images[0]['ext'].'" ></a>');
				print('</div><div class="thumbs">');
			foreach($images as $key=>$img)
			{
				if ($key!=0)
				print('<a rel="1" href="/'.$img['galleryDir'].'/'.$img['rank'].'medium.'.$img['ext'].'"><img src="/'.$img['galleryDir'].'/'.$img['rank'].'cat_list_small.'.$img['ext'].'" ></a>');
			}
			print('</div></div>');
			}?>
			<div class="attrs">
				<p>
				<?
					print('Характеристики:<br>');
					foreach($attr as $key=>$value)
					{
						if ($value->attr_value)
						{
							$data=CategoryAttrs::model()->find('id=:id',array(':id'=>$value->id));
							print($data->name." ".$value->attr_value.'<br>');	
						}
					}
				?>
			</p>
			</div>
			<p class="kprice"><? if ($model->price>0) print('Цена:'.$model->price.'руб.')?></p>
			<div style="clear: both;"></div>
			<div class="desc">
				<?=$model->wswg_desc?>
			</div>
</div>
