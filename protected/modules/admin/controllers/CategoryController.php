<?php

class CategoryController extends AdminController
{
	public function actionCreate()
	{
		$model=new Category;
		if (isset($_POST['Category']))
		{
			$model->attributes=$_POST['Category'];
			if (empty($model->cat_parent))
				$model->cat_parent=0;
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
	public function actionUpdate($id)
	{
		$model=Category::model()->findByPk($id);
		$attrs=CategoryAttrs::model()->findAll('category_id=:id',array(':id'=>$model->id));
		if (isset($_POST['Category']))
		{
			if (empty($model->cat_parent))
				$model->cat_parent=0;
			$model->attributes=$_POST['Category'];
			$model->alias=$_POST['Category']['alias'];
			empty($model->cat_parent) ? $model->cat_parent=0 : false;
			$model->save();
			if (!empty($_POST['attr']))
			{
				foreach ($_POST['attr'] as $key => $value) {
					if ($value!="")
					{

						$attr=CategoryAttrs::model()->findByPk($key);
						empty($attr) ? $attr=new CategoryAttrs: false;
						$attr->name=$_POST['attr'][$key];
						$attr->category_id=$model->id;
						$attr->save();
						$attrsId[]=$attr->id;
					}
				}
				$attrsId = implode(', ', $attrsId);
    				GoodsAttrValues::model()->deleteAll('attr_id not IN (' . $attrsId . ')');
			}
			$this->redirect(array('list'));
		}
		$this->render('update',array('model'=>$model,'attrs'=>$attrs));
	}

	public function actionAttrDelete()
	{
		if(isset($_POST['attr_id'])){
			CategoryAttrs::model()->deleteByPk($_POST['attr_id']);
			GoodsAttrValues::model()->find('attr_id=:a_id', array(':a_id' => $_POST['attr_id']))->delete();
		}

		Yii::app()->end();
	}
}
