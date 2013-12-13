<?php

class MobiliShareController extends FrontController
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
		$model=MobiliShare::model()->find('id=:id',array(':id'=>$id));
		$this->render('view',array('model'=>$model));
	}
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('MobiliShare');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
}
