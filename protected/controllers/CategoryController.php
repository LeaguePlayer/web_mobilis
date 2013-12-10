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
		$model=Category::model()->find("id=:id",array(':id'=>$id));
		$this->render('cat_list',array(
			'model'=>$model,
		));
	}
	public function actionIndex()
	{
		$model=Pages::model()->find("alias=:alias",array(':alias'=>"kitchen"));
		$images=MobiliGalariesImages::model()->findAll("element_id=:id",array(':id'=>$model->id));
		$pages=Pages::model()->findAll();
		$this->render('cat_list',array(
			'model'=>$model
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
