<?php

/**
* This is the model class for table "{{pages}}".
*
* The followings are the available columns in table '{{pages}}':
    * @property integer $id
    * @property string $name
    * @property string $module
    * @property string $alias
    * @property string $meta_title
    * @property string $meta_keywords
    * @property string $meta_description
    * @property string $wswg_body
    * @property integer $parent_id
    * @property integer $status
    * @property integer $sort
    * @property string $create_time
    * @property string $update_time
*/
class Pages extends EActiveRecord
{

    public static function getModules()
    {
        return array('content_page'=>'Страница контента','feedback'=>'Обратная связь',
            'homepage'=>'Домашняя страница','gallery_page'=>'Страница галереи','news'=>'Новости');
    }
    public function getTreeListData(){
        $this->setTree(0);
        unset($this->_treeOptions[$this->id]);
        return $this->_treeOptions;
    }

    private function setTree($parent, $level=0) { 
        $models = self::model()->findAll('parent_id=:parent_id', array(':parent_id'=>$parent));
        foreach ($models as $key) {
            $this->_treeOptions[$key->id] = str_repeat(' — ', $level) . $key->name;
            $this->setTree($key->id, $level+1);
        }
        //print_r($models);die();
    }
    private $_treeOptions = array();
    public function tableName()
    {
        return '{{pages}}';
    }
    public function rules()
    {
        return array(
            array('parent_id, status, sort', 'numerical', 'integerOnly'=>true),
            array('name, module, alias', 'length', 'max'=>255),
            array('meta_title, meta_keywords, meta_description, wswg_body, update_time', 'safe'),
            // The following rule is used by search().
            array('id, name, module, alias, meta_title, meta_keywords, meta_description, wswg_body, parent_id, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
        );
    }
    public function relations()
    {
        return array(
            'childs'=>array(self::HAS_MANY, get_class($this), 'parent_id'),
            'parent'=>array(self::BELONGS_TO, get_class($this), 'parent_id'),
        );
    }
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Заголовок',
            'module' => 'Модуль',
            'alias' => 'Алиас',
            'meta_title' => 'Заголовок',
            'meta_keywords' => 'Ключ',
            'meta_description' => 'Описание',
            'wswg_body' => 'Контент',
            'parent_id' => 'Родительский раздел',
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
		$criteria->compare('module',$this->module,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('wswg_body',$this->wswg_body,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('sort',$this->sort);
		/*$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);*/
        $criteria->order = 'sort';

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination'=>array('pageSize'=>10000)
        ));
    }
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    public function setLvl()
    {

    }
    public function translition()
    {
        return 'Страницы';
    }
    public static function findByAlias($param)
    {
        return self::model()->FindByAttributes(array('alias'=>$param));
    }
    public function getParent()
    {
        $model= $this->find('parent_id='.$this->id);
        return !empty($model) ? $model->name : "радительский элемент не найден";
    }
    public function getModule()
    {
        $var=$this->getModules();
        return $var[$this->module];
    }
    public function mySort($f1,$f2)
    {
      if($f1->tagname < $f2->tagname) return -1;
      elseif($f1->tagname > $f2->tagname) return 1;
      else return 0;
    }
}
