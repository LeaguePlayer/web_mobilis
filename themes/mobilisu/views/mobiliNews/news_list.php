<div class="text">
	<h2>Новости</h2>
	<?
	foreach ($dataProvider as $key=>$value)
	{?>
	<?
		if (!empty($value->name))
		{
	?>
	<div class="data">
		<div class="date"><?=$value->date;?></div>
		<div class="title">
			<?='<a href="/mobiliNews/view/'.$value->id.'">'.$value->name.'</a>';?>
		</div>
		<div class="announce"><?=$value->announce;?></div>
	</div>
	<?
		}
	}
	?>
</div>