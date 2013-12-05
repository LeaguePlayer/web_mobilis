<div class="carusel">
	<?
		if (!empty($model))
		{
		foreach($model as $item)
		{
			print('<img src="/upload/share_banner/'.$item->img_image.'">');
		}		
	}
	?>
</div>