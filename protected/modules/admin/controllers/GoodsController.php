<?php

class GoodsController extends AdminController
{
	public function actionAjax($item,$action,$id)
	{
		
			$values=GoodsAttrValues::model()->findAll('goods_id=:id',array(':id'=>$id));
			if (!empty($values))
			{
				$model=Goods::model()->findByPk($id);
				$data=CHtml::listData(CategoryAttrs::model()->findAll('category_id=:id',array(':id'=>$model->cat_id)),'id','name');
				if (count($data)>0)
				{
					$select='<table>';
				foreach ($data as $key => $value) {
					$select.='<tr><td>'.$value.'</td><td><input type="text" name="attrs['.$key.']" value="'.$values[$key]->attr_value.'"></td></tr>';
					}
				}
			} else {
				$data=CHtml::listData(CategoryAttrs::model()->findAll('category_id=:id',array(':id'=>$item)),'id','name');
			if (count($data)>0)
				{
					$select='<table>';
				foreach ($data as $key => $value) {
					$select.='<tr><td>'.$value.'</td><td><input type="text" name="attrs['.$key.']"></td></tr></li>';
					}
				}
			print($select.'</table>');
			}
	}
	public function actionCreate()
	{
		$model=new Goods;
		if (isset($_POST['Goods']))
		{
			$model->attributes=$_POST['Goods'];
			if ($model->save())
			{
				GoodsAttrValues::model()->deleteAll('goods_id=:id',array(':id'=>$model->id));
				if (!empty($_POST['attrs']))
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
				if (!empty($_POST['attrs']))
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
							$attrsId[]=$attr->id;
					}
					$attrsId = implode(', ', $attrsId);
					print_r($attrsId);die();
    				GoodsAttrValues::model()->deleteAll('category_id not IN (' . $memberIds . ')');
				}
				$this->redirect(array('list'));
			}
		}
		$this->render('update',array('model'=>$model,'attrs'=>$attrs));
	}
}
