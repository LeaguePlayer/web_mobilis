<?php

/**
* This is the model class for table "{{category}}".
*
* The followings are the available columns in table '{{category}}':
    * @property integer $id
    * @property string $name
    * @property integer $cat_parent
    * @property string $wswg_body
    * @property integer $status
    * @property integer $sort
    * @property integer $create_time
    * @property integer $update_time
*/
class Category extends EActiveRecord
{
    public function tableName()
    {
        return '{{category}}';
    }


    public function rules()
    {
        return array(
            array('cat_parent, status, sort', 'numerical', 'integerOnly'=>true),
            array('name', 'length', 'max'=>255),
            array('wswg_body', 'safe'),
            // The following rule is used by search().
            array('id, name, cat_parent, wswg_body, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
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
            'name' => 'Название категории',
            'alias' => 'Алиас',
            'cat_parent' => 'Родительский раздел',
            'wswg_body' => 'Описание',
            'status' => 'Статус',
            'sort' => 'Вес для сортировки',
            'create_time' => 'Дата создания',
            'update_time' => 'Дата последнего редактирования',
        );
    }




    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
        $criteria->compare('alias',$this->alias,true);
		$criteria->compare('cat_parent',$this->cat_parent);
		$criteria->compare('wswg_body',$this->wswg_body,true);
		$criteria->compare('status',$this->status);
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
        return 'Категории';
    }


}
