<div class="item">
	<h1><?=$model->name;?></h1>	
	<? if isset($model->getImageUrl('middle')) {?>
	<img src="<?=$model->getImageUrl('middle')?>">
	<?=$model->text;?>
	<?}?>
</div>