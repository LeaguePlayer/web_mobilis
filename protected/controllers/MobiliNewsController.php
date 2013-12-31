<?php

class MobiliNewsController extends FrontController
{
	public $layout='//layouts/news_layout';

	
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
		$model=MobiliNews::model()->findByPk($id);
		$this->render('view',array(
			'model'=>$model,
		));
	}

	
	public function actionIndex()
	{
		
		$criteria=new CDbCriteria;
		$criteria->order='date desc';
		$dataProvider=new CActiveDataProvider('MobiliNews', array(
			'criteria' => $criteria
		));
		// $dataProvider=MobiliNews::model()->findAll($criteria);

		$this->render('news_list',array(
			'dataProvider'=>$dataProvider,
		));
	}
}
