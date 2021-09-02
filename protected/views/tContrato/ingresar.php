<?php
/** @var TContratoController $this */
/** @var TContrato $model */
//$this->breadcrumbs=array(
//	$model->label(2) => array('index'),
//	Yii::t('AweCrud.app', 'Create'),
//);
//
//$this->menu=array(
//    //array('label' => Yii::t('AweCrud.app', 'List').' '.TContrato::label(2), 'icon' => 'list', 'url' => array('index')),
//    array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
//);
?>

<fieldset>
    <legend> CONTRATO DE CRÉDITO<?php // echo Yii::t('AweCrud.app', 'Create') . ' ' . TContrato::label(); ?></legend>
    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>