<?php
/** @var TCuotaController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

<?php echo $form->textFieldRow($model, 'id_cuota', array('class' => 'span5', 'maxlength' => 11)); ?>

<?php echo $form->dropDownListRow($model, 'numero_contrato', CHtml::listData(TContrato::model()->findAll(), 'numero', TContrato::representingColumn())); ?>

<?php echo $form->textFieldRow($model, 'fecha_creacion', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'abono', array('class' => 'span5', 'maxlength' => 7)); ?>

<?php echo $form->textFieldRow($model, 'saldo', array('class' => 'span5', 'maxlength' => 7)); ?>

<?php echo $form->textFieldRow($model, 'observacion', array('class' => 'span5', 'maxlength' => 800)); ?>

<?php echo $form->textFieldRow($model, 'fecha', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'id_usuario', array('class' => 'span5')); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('AweCrud.app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
