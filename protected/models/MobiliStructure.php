<?php

/**
* This is the model class for table "{{mobili_structure}}".
*
* The followings are the available columns in table '{{mobili_structure}}':
    * @property integer $id
    * @property string $name
    * @property string $module
    * @property string $alias
    * @property string $meta_title
    * @property string $meta_keywords
    * @property string $meta_description
    * @property string $settings
    * @property string $parent_id
    * @property string $index
    * @property integer $hidden
*/
class MobiliStructure extends EActiveRecord
{
    public function tableName()
    {
        return '{{mobili_structure}}';
    }
    public function rules()
    {
        return array(
            array('hidden', 'numerical', 'integerOnly'=>true),
            array('name, module, alias', 'length', 'max'=>255),
            array('parent_id, index', 'length', 'max'=>20),
            array('meta_title, meta_keywords, meta_description, settings', 'safe'),
            // The following rule is used by search().
            array('id, name, module, alias, meta_title, meta_keywords, meta_description, settings, parent_id, index, hidden', 'safe', 'on'=>'search'),
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
            'module' => 'Модуль',
            'alias' => 'Алиас',
            'meta_title' => 'Мета_заголовок',
            'meta_keywords' => 'Мета слова',
            'meta_description' => 'Мета описание',
            'settings' => 'Настройки',
            'parent_id' => 'Родитель',
            'index' => 'Дата последнего редактирования',
            'hidden' => 'Видимость',
        );
    }




    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('module',$this->module,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('settings',$this->settings,true);
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('index',$this->index,true);
		$criteria->compare('hidden',$this->hidden);
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
        return 'Структура';
    }


}
