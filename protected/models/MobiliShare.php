<?php

/**
* This is the model class for table "{{mobilishare}}".
*
* The followings are the available columns in table '{{mobilishare}}':
    * @property integer $id
    * @property string $name
    * @property string $discription
    * @property string $condition
    * @property string $img_image
    * @property integer $hidden
*/
class MobiliShare extends CActiveRecord
{
    public function tableName()
    {
        return '{{mobilishare}}';
    }


    public function rules()
    {
        return array(
            array('hidden', 'numerical', 'integerOnly'=>true),
            array('name, condition', 'length', 'max'=>255),
            array('discription, img_image', 'safe'),
            // The following rule is used by search().
            array('id, name, discription, condition, img_image, hidden', 'safe', 'on'=>'search'),
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
            'name' => 'Название',
            'discription' => 'Описание',
            'condition' => 'Условие',
            'img_image' => 'Банер',
            'hidden' => 'Показывать',
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
                        'share' => array(
                            'adaptiveResize' => array(740, 281),
                    ),
				),
			),
        ));
    }


    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('discription',$this->discription,true);
		$criteria->compare('condition',$this->condition,true);
		$criteria->compare('img_image',$this->img_image,true);
		$criteria->compare('hidden',$this->hidden);

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
        return 'Акции';
    }


}
