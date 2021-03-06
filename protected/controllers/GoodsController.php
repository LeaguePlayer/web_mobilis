<?php

class GoodsController extends FrontController
{
	public $layout='//layouts/simple';
	public $defaultAction='view';
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
	public function actionChange()
	{
	}
	public function actionView($alias)
	{
		$model=Goods::model()->find("name=:id",array(':id'=>$alias));
		$this->title=$model->name;
		$this->render('view',array('model'=>$model));
	}
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Goods');
		$this->title=$model->name;
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
}
