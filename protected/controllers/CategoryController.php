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
	public function actionView($alias)
	{
		!isset($_GET['id']) ? 
		$model=Category::model()->find("id=:id",array(':id'=>$alias)) :
		$model=Category::model()->find("id=:id",array(':id'=>$_GET['id']));
		$categories=Category::model()->findAll('cat_parent=:id',array(':id'=>$model->id));
		if (!empty($categories))
		{
			$goods=array();
			foreach($categories as $key=>$value)
			{
				$goods+=Goods::model()->findAll('cat_id=:id',array(':id'=>$value->id));
			}
		} else {
				$goods=Goods::model()->findAll('cat_id=:id',array(':id'=>$model->id));
				
			}
			$this->render('cat_list',array(
			'model'=>$model,'goods'=>$goods
			));				
		$this->render('cat_list',array(
			'model'=>$model,
		));
	}
	public function actionIndex()
	{
		$model=Category::model()->find("alias=:alias",array(':alias'=>"kitchen"));
		$images=MobiliGalariesImages::model()->findAll("element_id=:id",array(':id'=>$model->id));
		$pages=Category::model()->findAll();
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
