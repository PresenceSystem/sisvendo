<?php
/** @var TPersonaController $this */
/** @var TPersona $model */
$this->breadcrumbs=array(
	$model->label(2) => array('index'),
	Yii::t('AweCrud.app', 'Create'),
);

$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List').' '.TPersona::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('AweCrud.app', 'Buscar'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset> 
    <legend><?php // echo Yii::t('AweCrud.app', 'Create') . ' ' . TPersona::label(); ?></legend>
    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>