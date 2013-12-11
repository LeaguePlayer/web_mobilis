<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'goods-attr-values-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>


	<?php echo $form->textFieldControlGroup($model,'goods_id',array('class'=>'span8')); ?>

	<?php echo $form->textFieldControlGroup($model,'attr_id',array('class'=>'span8')); ?>

	<?php echo $form->textFieldControlGroup($model,'attr_value',array('class'=>'span8','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php echo TbHtml::submitButton('Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>        <?php echo TbHtml::linkButton('Отмена', array('url'=>'/admin/goodsattrvalues/list')); ?>
	</div>

<?php $this->endWidget(); ?>
