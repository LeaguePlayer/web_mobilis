<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<section class="center" style="min-height: 500px;">
	<div class="col-left">
        <div class="clearfix">
            <div class="c-left">
                <div class="clearfix">
                    <div class="inner content">
                        <div class="news-list news-list-custom">
                            <div class="news-item first">
                                <div class="clearfix">
                                    <?
                                        if (!isset($_GET['alias'])) $_GET['alias']='kuhni_v_tjumeni';
                                        if ($this->id=="category" || $this->id=="goods")
                                        {
                                            $alias=$_GET['alias'];
                                            if ($this->id=="goods")
                                            {
                                                $model=Goods::model()->find('name=:id',array(':id'=>$alias));
                                                $model=Category::model()->find('id=:id',array(':id'=>$model->cat_id));
                                                $alias=$model->alias;
                                            }
                                            $model=Category::model()->find('alias=:id',array(':id'=>$alias));
                                            $criteria = new CDbCriteria;
                                            if ($model->cat_parent!=0)
                                                {
                                                    $model=$model->find('id=:id',array(':id'=>$model->cat_parent));
                                                    $alias=$model->alias;
                                                } else $alias=$_GET['alias'];
                                            $criteria->compare('alias', $alias);
                                            $criteria->order = 'name';
                                            $data=Category::model()->find($criteria); 
                                            $data=Category::model()->findAll('cat_parent=:id',array(':id'=>$data->id)); 
                                            foreach ($data as $key => $value) {
                                                $crit = new CDbCriteria;
                                                $crit->compare('cat_id', $value->id);
                                                $crit->order = 't.name';
                                                $items=Goods::model()->onlyWithImages()->findAll($crit);

                                                if(!$items) continue;
                                                $parent=Category::model()->find('id=:id',array(':id'=>$value->cat_parent));
                                                print ('<div class="k-type">');
                                                print('<h5><a href="/'.$value->alias.'">'.$value->name.'</a></h5>');
                                                
                                                
                                                print('<ul>');
                                                foreach ($items as $key_r => $value_r) {
                                                    if($value_r->gallery->galleryPhotos){
                                                        $path='/goods/'.urldecode($value_r->name);
                                                        print('<li><a href="'.$path.'">'.$value_r->name.'</a></li>');
                                                    }
                                                }
                                                print('</ul></div>');
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="c-right">
                <div class="clearfix">
                    <div class="inner content">
                        <div class="inner content">
                            <?php echo $content;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->endContent(); ?>