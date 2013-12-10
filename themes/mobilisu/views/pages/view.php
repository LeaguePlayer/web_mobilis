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
		$cs = Yii::app()->clientScript;
		$cs->registerScriptFile($this->getAssetsUrl().'/js/script.js', CClientScript::POS_END);
		$cs = Yii::app()->clientScript;
		$cs->registerScriptFile($this->getAssetsUrl().'/js/gallery.js', CClientScript::POS_END);
		$cs->registerScriptFile($this->getAssetsUrl().'/js/jquery.tools.min.js', CClientScript::POS_END);
		$cs->registerCssFile($this->getAssetsUrl().'/css/gallery.css');
		if (!empty($images))
		{
		foreach ($images as $value)
		{
			$data[]=unserialize($value->img_image);
			$data[count($data)-1]['name']=$value->name;
		}

?></div>
<div class="gallery">

        
        <div class="image" style="z-index:99;"><img src="/upload/gallery/nl46881xj-galleryBig-upload.jpg" class="gallery-temp" title="Bounty" style="position: relative; left: 27px; top: 23px;">
			
        </div>

        <div class="title" style="z-index:99;"></div>

        <div class="list">
        	<span class="prev"></span>
        	<span class="next"></span>
        	<div class="scrollable">
        		<div class="items" style="left: -1635px;">
        				<?
		foreach ($data as $img)
		{
			if (strlen($img['resizes']['galleryBig'])>0 && strlen($img['resizes']['galleryList'])>0)
			print_r('<a href="/'.$img['resizes']['galleryBig'].'" ><img src="/'.$img['resizes']['galleryList'].'" alt title="'.$img['name'].'"></a>');
			$i++;
		}
	?>

        		</div>
        	</div>
        </div>
		
</div>
<?}?>
<div class="kitchens">
	<?
		$data=Category::model()->findAll('cat_parent=:cat_parent',array(':cat_parent'=>$model->id));
		print_r($data);
	?>
</div>
