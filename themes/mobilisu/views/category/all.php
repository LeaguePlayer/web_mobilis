<?
	$catalogs=Category::model()->findAll('cat_parent=:cat_parent',array(':cat_parent'=>$model->id));
	foreach ($catalogs as $key => $value) {
		
	}
?>