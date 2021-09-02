<?php
/** @var TContratoArticuloController $this */
/** @var TContratoArticulo $model */
$this->breadcrumbs=array(
	'Tcontrato Articulos'=>array('index'),
	$model->id_detalle,
);

$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . TContratoArticulo::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . TContratoArticulo::label(), 'icon' => 'plus', 'url' => array('create')),
	array('label' => Yii::t('AweCrud.app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id_detalle)),
    array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_detalle), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?'))),
    array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend><?php echo Yii::t('AweCrud.app', 'View') . ' ' . TContratoArticulo::label(); ?> <?php echo CHtml::encode($model) ?></legend>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
        'id_detalle',
        array(
			'name'=>'numero_contrato',
			'value'=>($model->numeroContrato !== null) ? CHtml::link($model->numeroContrato, array('/tContrato/view', 'numero' => $model->numeroContrato->numero)).' ' : null,
			'type'=>'html',
		),
        array(
			'name'=>'id_articulo',
			'value'=>($model->idArticulo !== null) ? CHtml::link($model->idArticulo, array('/tArticulo/view', 'id_articulo' => $model->idArticulo->id_articulo)).' ' : null,
			'type'=>'html',
		),
        'cantidad',
        'precio',
        'observacion',
        'fecha',
        'id_usuario',
	),
)); ?>
</fieldset>