<?php
/** @var TArticuloController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

<?php echo $form->textFieldRow($model, 'id_articulo', array('class' => 'span5', 'maxlength' => 11)); ?>

<?php echo $form->textFieldRow($model, 'nombre', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'id_marca', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'modelo', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'serie', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'cod_barra', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'prec_com', array('class' => 'span5', 'maxlength' => 7)); ?>

<?php echo $form->textFieldRow($model, 'prec_ven_contado', array('class' => 'span5', 'maxlength' => 7)); ?>

<?php echo $form->textFieldRow($model, 'prec_ven_credito', array('class' => 'span5', 'maxlength' => 7)); ?>

<?php echo $form->textFieldRow($model, 'stock', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'reservados', array('class' => 'span5')); ?>

<?php echo $form->dropDownListRow($model, 'id_proveedor', CHtml::listData(TProveedor::model()->findAll(), 'id_proveedor', TProveedor::representingColumn())); ?>

<?php echo $form->textFieldRow($model, 'fech_exp', array('prepend'=>'<i class="icon-calendar"></i>')); ?>

<?php echo $form->textFieldRow($model, 'fech_cad', array('prepend'=>'<i class="icon-calendar"></i>')); ?>

<?php echo $form->textFieldRow($model, 'fech_com', array('prepend'=>'<i class="icon-calendar"></i>')); ?>

<?php echo $form->textFieldRow($model, 'descripcion', array('class' => 'span5', 'maxlength' => 500)); ?>

<?php echo $form->textFieldRow($model, 'fecha', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'id_usuario', array('class' => 'span5')); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('AweCrud.app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
