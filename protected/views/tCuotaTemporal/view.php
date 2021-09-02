<?php
/** @var TCuotaController $this */
/** @var TCuota $model */
$this->breadcrumbs=array(
	'Tcuotas'=>array('index'),
	$model->id_cuota,
);

$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . TCuotaTemporal::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . TCuotaTemporal::label(), 'icon' => 'plus', 'url' => array('create')),
	array('label' => Yii::t('AweCrud.app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id_cuota)),
    array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_cuota), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?'))),
    array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend><?php echo Yii::t('AweCrud.app', 'View') . ' ' . TCuotaTemporal::label(); ?> <?php echo CHtml::encode($model) ?></legend>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
        'id_cuota',
        array(
			'name'=>'numero_contrato',
			'value'=>($model->numeroContrato !== null) ? CHtml::link($model->numeroContrato, array('/tContrato/view', 'numero' => $model->numeroContrato->numero)).' ' : null,
			'type'=>'html',
		),
        'fecha_creacion',
        'abono',
        'saldo',
        'observacion',
        'fecha',
        'id_usuario',
	),
)); ?>
</fieldset>