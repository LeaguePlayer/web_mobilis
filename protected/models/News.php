<?php

/**
* This is the model class for table "{{news}}".
*
* The followings are the available columns in table '{{news}}':
    * @property integer $id
    * @property string $title
    * @property string $img_image
    * @property string $text
    * @property integer $sort
    * @property integer $create_time
    * @property integer $update_time
*/
class News extends EActiveRecord
{
    public function tableName()
    {
        return '{{news}}';
    }


    public function rules()
    {
        return array(
            array('sort, create_time, update_time', 'numerical', 'integerOnly'=>true),
            array('title, img_image', 'length', 'max'=>255),
            array('text', 'safe'),
            // The following rule is used by search().
            array('id, title, img_image, text, sort, create_time, update_time', 'safe', 'on'=>'search'),
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
            'title' => 'Заголовок',
            'img_image' => 'Изображение',
            'text' => 'Описание новости',
            'sort' => 'Вес для сортировки',
            'create_time' => 'Дата создания',
            'update_time' => 'Дата последнего редактирования',
        );
    }


    public function behaviors()
    {
        return CMap::mergeArray(parent::behaviors(), array(
        	'imgBehaviorImage' => array(
				'class' => 'application.behaviors.UploadableImageBehavior',
				'attributeName' => 'img_image',
				'versions' => array(
					'icon' => array(
						'centeredpreview' => array(90, 90),
					),
					'small' => array(
						'resize' => array(200, 180),
					)
				),
			),
        ));
    }


    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('img_image',$this->img_image,true);
		$criteria->compare('text',$this->text,true);
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
        return 'Новости';
    }


}
