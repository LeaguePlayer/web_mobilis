<?php

class PagesController extends FrontController
{
	public $array=array();
	public $layout='//layouts/simple';
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionView($alias)
	{
		$model=Pages::model()->find("alias=:alias",array(':alias'=>$alias));
		$images=MobiliGalariesImages::model()->findAll("element_id=:id",array(':id'=>$model->id));
		$categorys=Category::model()->find("name=:name",array(':name'=>$mode->name));
		if (isset($images))
		$this->render('view',array(
			'model'=>$model,
			'images'=>$images,
		));else $this->render('view',array(
			'model'=>$model,
		));
	}
	public function actionIndex()
	{
		$model=Pages::model()->find("alias=:alias",array(':alias'=>"kitchen"));
		$images=MobiliGalariesImages::model()->findAll("element_id=:id",array(':id'=>$model->id));
		$pages=Pages::model()->findAll();
		$this->render('view',array(
			'model'=>$model,
			'images'=>$images,
		));
	}
	public function actionSwapItems()
	{
		$gallerys=MobiliGalariesImages::model()->findAll();
		foreach($gallerys as $key=>$value)
		{
			$goods=new Goods;
			$goods->name=$gallerys[$key]->name;
			$goods->cat_id=$gallerys[$key]->element_id;
			$goods->gllr_gallery_id=$gallerys[$key]->id;
		}
	}
	public function actionSwapCategory()
	{
		//забивает из таблицы pages в category
		if (!empty($pages))
		{
			foreach ($pages as $key => $value) {
				if ($pages[$key]->parent_id==28) {
					 $catalog=new Category;
					 $catalog->name=$pages[$key]->name;
					 $catalog->wswg_body=$pages[$key]->wswg_body;
					 $catalog->cat_parent=0;
					 $catalog->alias=$pages[$key]->alias;
					 $catalog->save();
				}
			}
		}
	}
	public function actionLvl()
	{
		$models=Pages::model()->findAll(array('order'=>'parent_id'));
		for ($i=1;$i<count($models);$i++)
		{
			if ($model[$i]->parent_id!=0)
			{

			}
			$models[$i]->save();
		}
	}
}