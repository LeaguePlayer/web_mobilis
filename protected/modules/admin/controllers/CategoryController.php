<?php

class CategoryController extends AdminController
{
	public function actionCreate()
	{
		$model=new Category;
		if (isset($_POST['Category']))
		{
			$model->attributes=$_POST['Category'];
			$model->alias=$_POST['Category']['alias'];
			$model->save();
			foreach ($_POST['attr'] as $key => $value) {
				if ($value!="")
				{
					$attr=new CategoryAttrs;
					$attr->name=$_POST['attr'][$key];
					$attr->category_id=$model->id;
					$attr->save();
				}
			}
			$this->redirect('list');
		}
		$this->render('create',array('model'=>$model));
	}
}
