<?php

class CategoryController extends FrontController
{
	public $layout='//layouts/simple';
	public $Catalogs;
	
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
		$this->render('view',array(
			'model'=>$this->loadModel('Category', $id),
		));
	}

	
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Category');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	public function getCatalogAndItems()
	{
		if (!empty($this->id))
		{
			$aData=$this->findByAttribute(array('cat_parent',$this->id));
			foreach($aData as $key=>$value)
			{
				$result[$key]['items']=Goods::model()->findByAttribute(array('cat_id',$aData->id));
			}
			return $result;
		}
		return null;
	}
}
