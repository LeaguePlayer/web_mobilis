<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mobili-galaries-images-form',
	'enableAjaxValidation'=>false,
		'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<?php echo $form->errorSummary($model); ?>


	<?php echo $form->textFieldControlGroup($model,'name',array('class'=>'span8','maxlength'=>255)); ?>

	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'img_image'); ?>
		<?php echo $form->fileField($model,'img_image', array('class'=>'span3')); ?>
		<div class='img_preview'>
			<?php if ( !empty($model->img_image) ) echo TbHtml::imageRounded( $model->imgBehaviorImage->getImageUrl('small') ) ; ?>
			<span class='deletePhoto btn btn-danger btn-mini' data-modelname='MobiliGalariesImages' data-attributename='Image' <?php if(empty($model->img_image)) echo "style='display:none;'"; ?>><i class='icon-remove icon-white'></i></span>
		</div>
		<?php echo $form->error($model, 'img_image'); ?>
	</div>

	<?php echo $form->textFieldControlGroup($model,'index',array('class'=>'span8','maxlength'=>20)); ?>

	<?php echo $form->textFieldControlGroup($model,'gallery_id',array('class'=>'span8','maxlength'=>20)); ?>

	<?php echo $form->textFieldControlGroup($model,'element_id',array('class'=>'span8','maxlength'=>20)); ?>

	<div class="form-actions">
		<?php echo TbHtml::submitButton('Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>        <?php echo TbHtml::linkButton('Отмена', array('url'=>'/admin/mobiligalariesimages/list')); ?>
	</div>

<?php $this->endWidget(); ?>
