<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'pages-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>


	<?php echo $form->textFieldControlGroup($model,'name',array('class'=>'span8','maxlength'=>255)); ?>
	<?php echo $form->dropDownList($model,'module',$model->getModules(),array('class'=>'span8','maxlength'=>255)); ?>
	<?php echo $form->textFieldControlGroup($model,'alias',array('class'=>'span8','maxlength'=>255)); ?>
	<?php echo $form->dropDownListControlGroup($model, 'status', Pages::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>
	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'wswg_body');?>
		<?php $this->widget('appext.ckeditor.CKEditorWidget', array('model' => $model, 'attribute' => 'wswg_body',
		)); ?>
		<?php echo $form->error($model, 'wswg_body'); ?>
	</div>
	<?php echo $form->dropDownListControlGroup($model,'parent_id',$model->getTreeListData(),array('class'=>'span8')); ?>
	<div class="seo">
		<h2>СЕО</h2>
	<?php echo $form->textAreaControlGroup($model,'meta_title',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'meta_keywords',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'meta_description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
	</div>

	<div class="form-actions">
		<?php echo TbHtml::submitButton('Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>        <?php echo TbHtml::linkButton('Отмена', array('url'=>'/admin/pages/list')); ?>
	</div>

<?php $this->endWidget(); 
$cs = Yii::app()->clientScript;
$cs->registerScriptFile($this->getAssetsUrl().'/js/admin.script.js', CClientScript::POS_END);
?>

