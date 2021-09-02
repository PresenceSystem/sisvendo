<?php
/** @var TContratoGaranteController $this */
/** @var TContratoGarante $model */
$this->breadcrumbs=array(
	'Tcontrato Garantes'=>array('index'),
	$model->id_cont_garante,
);

$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . TContratoGarante::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . TContratoGarante::label(), 'icon' => 'plus', 'url' => array('create')),
	array('label' => Yii::t('AweCrud.app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id_cont_garante)),
    array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_cont_garante), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?'))),
    array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend><?php echo Yii::t('AweCrud.app', 'View') . ' ' . TContratoGarante::label(); ?> <?php echo CHtml::encode($model) ?></legend>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
        'id_cont_garante',
        array(
			'name'=>'numero_contrato',
			'value'=>($model->numeroContrato !== null) ? CHtml::link($model->numeroContrato, array('/tContrato/view', 'numero' => $model->numeroContrato->numero)).' ' : null,
			'type'=>'html',
		),
        array(
			'name'=>'id_garante',
			'value'=>($model->idGarante !== null) ? CHtml::link($model->idGarante, array('/tPersona/view', 'ci' => $model->idGarante->ci)).' ' : null,
			'type'=>'html',
		),
        'tipo',
        'fecha',
        'id_usuario',
	),
)); ?>
</fieldset>