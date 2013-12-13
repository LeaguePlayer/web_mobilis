<?php

/**
* This is the model class for table "{{goods}}".
*
* The followings are the available columns in table '{{goods}}':
    * @property integer $id
    * @property string $name
    * @property string $wswg_desc
    * @property integer $gllr_gallery_id
    * @property integer $cat_id
    * @property integer $status
    * @property integer $sort
    * @property string $create_time
    * @property string $update_time
*/
class Goods extends EActiveRecord
{
    public function tableName()
    {
        return '{{goods}}';
    }


    public function rules()
    {
        return array(
            //array('create_time', 'required'),
            array('gllr_gallery_id, cat_id, status, sort, price', 'numerical', 'integerOnly'=>true),
            array('name', 'length', 'max'=>255),
            array('wswg_desc', 'safe'),
            // The following rule is used by search().
            array('id, name, wswg_desc, gllr_gallery_id, cat_id, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
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
            'name' => 'Название товара',
            'price' => 'Цена',
            'wswg_desc' => 'Описание',
            'gllr_gallery_id' => 'Галерея',
            'cat_id' => 'Категория',
            'status' => 'Статус',
            'sort' => 'Вес для сортировки',
            'create_time' => 'Дата создания',
            'update_time' => 'Дата последнего редактирования',
        );
    }


    public function behaviors()
    {
        return CMap::mergeArray(parent::behaviors(), array(
        			'galleryBehaviorGallery_id' => array(
				'class' => 'appext.imagesgallery.GalleryBehavior',
				'idAttribute' => 'gllr_gallery_id',
				'versions' => array(
					'small' => array(
						'adaptiveResize' => array(90, 90),
					),
					'medium' => array(
						'resize' => array(600, 500),
					),
                    'cat_list_large' => array(
                        'resize' => array(323, 216),
                    ),
                    'cat_list_small' => array(
                        'resize' => array(57, 39),
                    ),
				),
				'name' => true,
				'description' => true,
			),
        ));
    }


    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('wswg_desc',$this->wswg_desc,true);
		$criteria->compare('gllr_gallery_id',$this->gllr_gallery_id);
		$criteria->compare('cat_id',$this->cat_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
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
        return 'Товары';
    }


}
