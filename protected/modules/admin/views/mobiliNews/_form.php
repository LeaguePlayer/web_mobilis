<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mobili-news-form',
	'enableAjaxValidation'=>false,
		'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldControlGroup($model,'name',array('class'=>'span8','maxlength'=>255)); ?>
		<?$model->date=date("Y-m-d H:i:s");?>

		<?php echo $form->textFieldControlGroup($model,'date',array('class'=>'span8')); ?>
	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'img_image'); ?>
		<?php echo $form->fileField($model,'img_image', array('class'=>'span3')); ?>
		<div class='img_preview'>
			<?php if ( !empty($model->img_image) ) echo TbHtml::imageRounded( $model->imgBehaviorImage->getImageUrl('small') ) ; ?>
			<span class='deletePhoto btn btn-danger btn-mini' data-modelname='MobiliNews' data-attributename='Image' <?php if(empty($model->img_image)) echo "style='display:none;'"; ?>><i class='icon-remove icon-white'></i></span>
		</div>
		<?php echo $form->error($model, 'img_image'); ?>
	</div>
	<?php echo $form->textAreaControlGroup($model,'announce',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo CHtml::activeLabelEx($model, 'text'); ?>
		<?php $this->widget('appext.ckeditor.CKEditorWidget', array('model' => $model, 'attribute' => 'text'
		)); ?>

	<?php echo $form->textFieldControlGroup($model,'meta_title',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldControlGroup($model,'meta_keywords',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldControlGroup($model,'meta_description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php echo TbHtml::submitButton('Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>        <?php echo TbHtml::linkButton('Отмена', array('url'=>'/admin/mobilinews/list')); ?>
	</div>

<?php $this->endWidget(); ?>
