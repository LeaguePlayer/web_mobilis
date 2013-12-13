<?php

class GoodsController extends AdminController
{
	public function actionAjax($id)
	{
		$data=CHtml::listData(CategoryAttrs::model()->findAll('category_id=:id',array(':id'=>$id)),'id','name');
		if (count($data)>0)
			{
				$select='<ul>';
			foreach ($data as $key => $value) {
				$select.=$value.'<li><input type="text" name="attrs['.$key.']"></li>';
				}
			}
		print($select.'</ul>');
	}
	public function actionCreate()
	{
		$model=new Goods;
		if (isset($_POST['Goods']))
		{
			$model->attributes=$_POST['Goods'];
			if ($model->save())
			{
				if (isset($_POST['attrs']))
				{
					foreach($_POST['attrs'] as $key=>$value)
					{
						$attr=new GoodsAttrValues;
						$attr->goods_id=$model->id;
						$attr->attr_id=$key;
						$attr->attr_value=$value;
						$attr->save();
					}
				}
				$this->redirect('list');
			}
		}
		$this->render('create',array('model'=>$model));
	}
	public function actionUpdate($id)
	{
		$model=Goods::model()->findByPk($id);
		$attrs=GoodsAttrValues::model()->findAll('goods_id=:id',array(':id'=>$model->id));
		if (isset($_POST['Goods']))
		{
			$model->attributes=$_POST['Goods'];
			$model->save();
			if ($model->save())
			{
				foreach($_POST['attrs'] as $key=>$value)
				{
					$attr=GoodsAttrValues::model()->findByPk($key);
					if (empty($attr))
					{
						$attr=new GoodsAttrValues;
					}
						$attr->goods_id=$model->id;
						$attr->attr_id=$key;
						$attr->attr_value=$value;
						$attr->save();
				}
				$this->redirect(array('list'));
			}
		}
		$this->render('update',array('model'=>$model,'attrs'=>$attrs));
	}
}
