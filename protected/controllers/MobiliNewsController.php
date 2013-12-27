<?php

class MobiliNewsController extends FrontController
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

	
	public function actionView($id)
	{
		
		$model=MobiliNews::model()->find($criteria);
		$this->render('view',array(
			'model'=>$model,
		));
	}

	
	public function actionIndex()
	{
		
		$criteria=new CDbCriteria;
		$criteria->order='date desc';
		$dataProvider=MobiliNews::model()->findAll($criteria);
		$this->render('news_list',array(
			'dataProvider'=>$dataProvider,
		));
	}
}
