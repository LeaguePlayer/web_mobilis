<?php

class PagesController extends FrontController
{
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
		$alias=substr($alias,0,strpos($alias,'.'));
		$model=Pages::model()->find("alias=:alias",array(':alias'=>$alias));
		$images=MobiliGalariesImages::model()->findAll("element_id=:id",array(':id'=>$model->id));
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
		$this->render('view',array(
			'model'=>$model,
			'images'=>$images,
		));
	}
}