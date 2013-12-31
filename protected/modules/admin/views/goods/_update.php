<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'goods-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); 
	$cs = Yii::app()->clientScript;
	$cs->registerScriptFile($this->getAssetsUrl().'/js/add_row.js', CClientScript::POS_END);
	?>


	<?php echo $form->textFieldControlGroup($model,'name',array('class'=>'span8','maxlength'=>255)); ?>
	<?php echo $form->textFieldControlGroup($model,'price',array('class'=>'span8','maxlength'=>255)); ?>
<?php echo $form->dropDownList($model,'cat_id',CHtml::listData(Category::model()->findAll(),'id','name'),array('class'=>'span8','options'=>array('selected'=>'1'))); ?>
	<?php echo $form->dropDownListControlGroup($model, 'status', Goods::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>
	
	<div class="attrs">
		<table>
			
				<?
					foreach ($model->attrs as $key => $value) {
						$att=CategoryAttrs::model()->findBypk($value->id);
						print('<tr><td width="150">'.$att->name.'</td><td><input type="text" name="attrs['.$value->id.']" value="'.$value->attr_value.'"></td></tr>');
					}
				?>
			
		</table>
	</div>
	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'wswg_desc'); ?>
		<?php $this->widget('appext.ckeditor.CKEditorWidget', array('model' => $model, 'attribute' => 'wswg_desc',
		)); ?>
		<?php echo $form->error($model, 'wswg_desc'); ?>
	</div>
	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'gllr_gallery_id'); ?>
		<?php if ($model->galleryBehaviorGallery_id->getGallery() === null) {
			echo '<p class="help-block">Прежде чем загружать изображения, нужно сохранить текущее состояние</p>';
		} else {
			$this->widget('appext.imagesgallery.GalleryManager', array(
				'gallery' => $model->galleryBehaviorGallery_id->getGallery(),
				'controllerRoute' => '/admin/gallery',
			));
		} ?>
	</div>
<div class="form-actions">
		<?php echo TbHtml::submitButton('Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>        <?php echo TbHtml::linkButton('Отмена', array('url'=>'/admin/goods/list')); ?>
	</div>
<?php $this->endWidget(); ?>
