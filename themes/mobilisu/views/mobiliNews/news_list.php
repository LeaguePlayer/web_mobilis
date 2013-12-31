<h1>Новости</h1>

<div class="news-list">
	<?
	$this->widget('zii.widgets.CListView', array(
	    'dataProvider'=>$dataProvider,
	    'itemView'=>'_news',   // refers to the partial view named '_post'
	    'summaryText' => '',
	    'pagerCssClass' => 'pagination',
	    'pager' => array(
            'prevPageLabel' => '',
            'firstPageLabel' => '',
            'nextPageLabel' => '',
            'lastPageLabel' => '',
            'header' => '',
            'cssFile' => false,
        ),
	    // 'sortableAttributes'=>array(
	    //     'title',
	    //     'create_time'=>'Post Time',
	    // ),
	));
	?>
</div>
<?/*<div class="text">
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
</div>*/?>