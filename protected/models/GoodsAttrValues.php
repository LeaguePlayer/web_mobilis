<?php

/**
* This is the model class for table "{{goods_attr_values}}".
*
* The followings are the available columns in table '{{goods_attr_values}}':
    * @property integer $id
    * @property integer $goods_id
    * @property integer $attr_id
    * @property string $attr_value
    * @property integer $sort
    * @property integer $create_time
    * @property integer $update_time
*/
class GoodsAttrValues extends EActiveRecord
{
    public function tableName()
    {
        return '{{goods_attr_values}}';
    }


    public function rules()
    {
        return array(
            array('goods_id, attr_id, sort, create_time, update_time', 'numerical', 'integerOnly'=>true),
            array('attr_value', 'length', 'max'=>255),
            // The following rule is used by search().
            array('id, goods_id, attr_id, attr_value, sort, create_time, update_time', 'safe', 'on'=>'search'),
        );
    }


    public function relations()
    {
        return array(
        );
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'goods_id' => 'Товар',
            'attr_id' => 'Категория',
            'attr_value' => 'Значение',
            'sort' => 'Вес для сортировки',
            'create_time' => 'Дата создания',
            'update_time' => 'Дата последнего редактирования',
        );
    }




    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('goods_id',$this->goods_id);
		$criteria->compare('attr_id',$this->attr_id);
		$criteria->compare('attr_value',$this->attr_value,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_time',$this->update_time);
        $criteria->order = 'sort';

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function translition()
    {
        return 'Атрибуты товара';
    }


}
