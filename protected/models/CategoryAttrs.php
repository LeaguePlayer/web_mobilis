<?php

/**
* This is the model class for table "{{category_attrs}}".
*
* The followings are the available columns in table '{{category_attrs}}':
    * @property integer $id
    * @property integer $category_id
    * @property string $name
    * @property string $discription
    * @property integer $sort
    * @property integer $create_time
    * @property integer $update_time
*/
class CategoryAttrs extends EActiveRecord
{
    public function tableName()
    {
        return '{{category_attrs}}';
    }


    public function rules()
    {
        return array(
            array('category_id, sort, create_time, update_time', 'numerical', 'integerOnly'=>true),
            array('name, discription', 'length', 'max'=>255),
            // The following rule is used by search().
            array('id, category_id, name, discription, sort, create_time, update_time', 'safe', 'on'=>'search'),
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
            'category_id' => 'Комментарий',
            'name' => 'Название',
            'discription' => 'Описание',
            'sort' => 'Вес для сортировки',
            'create_time' => 'Дата создания',
            'update_time' => 'Дата последнего редактирования',
        );
    }




    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('discription',$this->discription,true);
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
        return 'Атрибуты Категорий';
    }


}
