<?php
/** @var TContratoController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

<?php echo $form->textFieldRow($model, 'numero', array('class' => 'span5', 'maxlength' => 11)); ?>

<?php echo $form->textFieldRow($model, 'lugar', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'fecha_creacion', array('class' => 'span5')); ?>

<?php echo $form->dropDownListRow($model, 'id_deudor', CHtml::listData(TPersona::model()->findAll(), 'ci', TPersona::representingColumn())); ?>

<?php echo $form->dropDownListRow($model, 'id_formaPago', CHtml::listData(TFormaPago::model()->findAll(), 'id_formapago', TFormaPago::representingColumn())); ?>

<?php echo $form->dropDownListRow($model, 'id_lugarCobro', CHtml::listData(TLugarCobro::model()->findAll(), 'id_lugar', TLugarCobro::representingColumn())); ?>

<?php echo $form->textFieldRow($model, 'id_empresa', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'total', array('class' => 'span5', 'maxlength' => 7)); ?>

<?php echo $form->textFieldRow($model, 'cuota_inicial', array('class' => 'span5', 'maxlength' => 7)); ?>

<?php echo $form->textFieldRow($model, 'saldo', array('class' => 'span5', 'maxlength' => 7)); ?>

<?php echo $form->textFieldRow($model, 'valor_cuota', array('class' => 'span5', 'maxlength' => 7)); ?>

<?php echo $form->textFieldRow($model, 'cantidad_cuotas', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'fecha', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'id_usuario', array('class' => 'span5')); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('AweCrud.app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
