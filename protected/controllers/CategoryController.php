<?php

class CategoryController extends FrontController
{
	public $layout='//layouts/simple';
	public $Catalogs;
	// public $defaultAction='view';
	
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
		$model=Category::model()->find("alias=:id",array(':id'=>$alias));
		$data = array();
		if($model->childs){
			foreach ($model->childs as $c) {
				foreach ($c->goods as $good) {
					//var_dump((boolean)$good->gallery->galleryPhotos);
					//echo "<br><br><br>";
					if($good->gallery->galleryPhotos) $data[] = $good;
				}
				
			}
			//die();
		}else
		{
			$date=array();
			$dt = $model->goods;
			if (!empty($dt))
			foreach($dt as $key=>$value)
			{
				if ($value->gallery->galleryPhotos)
					$data[]=$value;
			}
		}
		$data = new CArrayDataProvider($data, array(
			'pagination' => array('pageSize' => 5,),
		));
		
		$this->render('cat_list',array(
			'model'=>$model,'data'=>$data
		));		
		/*if (isset($_GET['alias'])){
			$model=Category::model()->find("alias=:id",array(':id'=>$alias));
			if ($modal->cat_parent==0)
			$categories=Category::model()->findAll('cat_parent=:id',array(':id'=>$model->id));
		}	
		if (!empty($categories))
		{
			$goods=array();
			$criteria=new CDbCriteria;
			foreach($categories as $key=>$value)
			{
				$goods+=Goods::model()->findAll('cat_id=:id',array(':id'=>$value->id));
			}
		} else {
				$goods=Goods::model()->findAll('cat_id=:id',array(':id'=>$model->id));	
			}*/

					
		/*$this->render('cat_list',array(
			'model'=>$model,
		));*/
	}
	public function actionIndex()
	{
		$model=Category::model()->find("alias=:alias",array(':alias'=>"kuhni_v_tjumeni"));
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
