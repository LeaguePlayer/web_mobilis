<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>


	<?php echo $form->textFieldControlGroup($model,'name',array('class'=>'span8','maxlength'=>255)); ?>
	<?php echo $form->textFieldControlGroup($model,'alias',array('class'=>'span8','maxlength'=>255)); ?>
	<?php echo CHtml::label('Родительский элемент',''); ?>
	<?php echo $form->dropDownList($model,'cat_parent',CHtml::listData(Category::model()->findAll(),'id','name'),array('class'=>'span8','selected'=>$selected,'empty'=>'Не задано')); ?>
	<div class="attrs">
		<?=CHtml::button($label='Добавить Характеристику',array('id'=>'add','class'=>'add_cat_btn'))?>
		<?if (isset($attrs)) {?>
		<ul>
			
				<?
					foreach($attrs as $key=>$value)
					{
						print('<li>'.CHtml::TextField('attr['.$value->id.']',$value->name).'<a class="del_btn" href="#" data-cat="'.$model->id.'" data-attr="'.$value->id.'" ></a></li>');
					}
				?>
			
		</ul>	
		<?}?>
	</div>
	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'wswg_body'); ?>
		<?php $this->widget('appext.ckeditor.CKEditorWidget', array('model' => $model, 'attribute' => 'wswg_body',
		)); ?>
		<?php echo $form->error($model, 'wswg_body'); ?>
	</div>
	
	<?php echo $form->dropDownListControlGroup($model, 'status', Category::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>
	<div class="form-actions">
		<?php echo TbHtml::submitButton('Сохранить', array('url'=>'/admin/category/list'),array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>        <?php echo TbHtml::linkButton('Отмена', array('url'=>'/admin/category/list')); ?>
	</div>
<?php $this->endWidget(); ?>
