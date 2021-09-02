<?php
/** @var TPersonaController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

<?php echo $form->textFieldRow($model, 'ci', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'nombre', array('class' => 'span5', 'maxlength' => 60)); ?>

<?php echo $form->dropDownListRow($model, 'id_sexo', CHtml::listData(TSexo::model()->findAll(), 'id_sexo', TSexo::representingColumn()), array('prompt' => Yii::t('AweApp', 'None'))); ?>

<?php echo $form->dropDownListRow($model, 'id_estado_civil', CHtml::listData(TEstadoCivil::model()->findAll(), 'id_estado_civil', TEstadoCivil::representingColumn()), array('prompt' => Yii::t('AweApp', 'None'))); ?>

<?php echo $form->textFieldRow($model, 'direccion', array('class' => 'span5', 'maxlength' => 60)); ?>

<?php echo $form->textFieldRow($model, 'referencia', array('class' => 'span5', 'maxlength' => 150)); ?>

<?php echo $form->textFieldRow($model, 'telefono', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'celular', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'trabajo', array('class' => 'span5', 'maxlength' => 150)); ?>

<?php echo $form->textFieldRow($model, 'cargo', array('class' => 'span5', 'maxlength' => 150)); ?>

<?php echo $form->textFieldRow($model, 'tiempo', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'dir_trabajo', array('class' => 'span5', 'maxlength' => 150)); ?>

<?php echo $form->textFieldRow($model, 'tel_trabajo', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'cel_trabajo', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'sueldo', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'ci_cony', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'nombre_cony', array('class' => 'span5', 'maxlength' => 60)); ?>

<?php echo $form->textFieldRow($model, 'trabajo_cony', array('class' => 'span5', 'maxlength' => 150)); ?>

<?php echo $form->textFieldRow($model, 'cargo_cony', array('class' => 'span5', 'maxlength' => 150)); ?>

<?php echo $form->textFieldRow($model, 'tiempo_cony', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'dir_trabajo_cony', array('class' => 'span5', 'maxlength' => 150)); ?>

<?php echo $form->textFieldRow($model, 'tel_trabajo_cony', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'cel_trabajo_cony', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'sueldo_cony', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'id_casa', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'tiempo_arriendo', array('class' => 'span5', 'maxlength' => 25)); ?>

<?php echo $form->textFieldRow($model, 'ci_digital', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'fecha', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'id_usuario', array('class' => 'span5')); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('AweCrud.app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
