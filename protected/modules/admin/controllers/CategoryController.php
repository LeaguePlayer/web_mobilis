<?php

class CategoryController extends AdminController
{
	public function actionCreate()
	{
		$model=new Category;
		$model->attributes=$_POST['Category'];
		$model->save();
		foreach ($_POST['attr'] as $key => $value) {
			$attr=new CategoryAttrs;
			$attr->name=$_POST['attr'][$key];
			$attr->category_id=$model->id;
			$attr->save();
		}
		$this->render('list');
	}
}
