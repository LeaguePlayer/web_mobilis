<?php

/**
* This is the model class for table "{{mobili_galaries_images}}".
*
* The followings are the available columns in table '{{mobili_galaries_images}}':
    * @property integer $id
    * @property string $name
    * @property string $img_image
    * @property string $index
    * @property string $gallery_id
    * @property string $element_id
*/
class MobiliGalariesImages extends EActiveRecord
{
    public function tableName()
    {
        return '{{mobili_galaries_images}}';
    }


    public function rules()
    {
        return array(
            array('name, img_image', 'length', 'max'=>255),
            array('index, gallery_id, element_id', 'length', 'max'=>20),
            // The following rule is used by search().
            array('id, name, img_image, index, gallery_id, element_id', 'safe', 'on'=>'search'),
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
            'name' => 'Наименование',
            'img_image' => 'Изображение',
            'index' => 'Индекс',
            'gallery_id' => 'Галерея',
            'element_id' => 'Елемент',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('img_image',$this->img_image,true);
		$criteria->compare('index',$this->index,true);
		$criteria->compare('gallery_id',$this->gallery_id,true);
		$criteria->compare('element_id',$this->element_id,true);
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
        return 'Галерея';
    }


}
