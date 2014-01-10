<? if (isset($data->announce)) {?>
<div class="news-item">
	<div class="clearfix">
		<div class="image">
			<?$img=$data->getImageUrl('small'); if (isset($img)) {?>
			<a href="http://www.mobilisu.ru/news/item/30">
				<img src="<?=$data->getImageUrl('small')?>" alt="" title="" />
			</a>
			<?}?>
		</div>
		<div class="data">
			<div class="date"><?=date('j', strtotime($data->date)).' '.SiteHelper::russianMonth(date('n', strtotime($data->date))).' '.date('Y', strtotime($data->date));?></div>
			<div class="title">
				<a href="<?=$this->createUrl('view', array('id' => $data->id))?>"><?=CHtml::encode($data->name)?></a>
			</div>
			<div class="announce">
				<?=$data->announce;?>
			</div>
		</div>
	</div>
</div>
<?}?>