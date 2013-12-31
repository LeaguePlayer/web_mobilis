<?php

/**
* This is the model class for table "{{mobili_news}}".
*
* The followings are the available columns in table '{{mobili_news}}':
    * @property integer $id
    * @property string $date
    * @property string $img_image
    * @property string $name
    * @property string $announce
    * @property string $text
    * @property string $meta_title
    * @property string $meta_keywords
    * @property string $meta_description
    * @property string $subscribe_sent
    * @property string $element_id
*/
class MobiliNews extends CActiveRecord
{
    public function tableName()
    {
        return '{{mobili_news}}';
    }


    public function rules()
    {
        return array(
            array('img_image, name', 'length', 'max'=>255),
            array('element_id', 'length', 'max'=>20),
            array('date, announce, text, meta_title, meta_keywords, meta_description, subscribe_sent', 'safe'),
            // The following rule is used by search().
            array('id, date, img_image, name, announce, text, meta_title, meta_keywords, meta_description, subscribe_sent, element_id', 'safe', 'on'=>'search'),
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
            'date' => 'Дата',
            'img_image' => 'Изображение',
            'name' => 'Имя',
            'announce' => 'Анонс',
            'text' => 'Текст',
            'meta_title' => 'Статус',
            'meta_keywords' => 'Вес для сортировки',
            'meta_description' => 'Дата создания',
            'subscribe_sent' => 'subscribe_sent',
            'element_id' => 'Ид елемента',
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
                    ),
                    'middle' => array(
                        'resize' => array(300, 270),
                    )
				),
			),
        ));
    }


    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('img_image',$this->img_image,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('announce',$this->announce,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('subscribe_sent',$this->subscribe_sent,true);
		$criteria->compare('element_id',$this->element_id,true);
        //$criteria->order = 'sort';

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
