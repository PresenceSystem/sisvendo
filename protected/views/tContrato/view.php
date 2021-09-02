<?php
/** @var TContratoController $this */
/** @var TContrato $model */
$this->breadcrumbs=array(
	'Tcontratos'=>array('index'),
	$model->numero,
);

$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . TContrato::label(2), 'icon' => 'list', 'url' => array('index')),
    //array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . TContrato::label(), 'icon' => 'plus', 'url' => array('create')),
	//array('label' => Yii::t('Editar'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->numero)),
    array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->numero), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?'))),
    //array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend><?php echo Yii::t('AweCrud.app', '') . ' ' . TContrato::label(); ?> <?php echo 'N°. '.CHtml::encode($model->numero) ?></legend>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
        //'numero',
        'lugar',
        'fecha_creacion',
        array(
			'name'=>'id_deudor',
			'value'=>($model->idDeudor !== null) ? CHtml::link($model->idDeudor, array('/tPersona/view', 'ci' => $model->idDeudor->ci)).' ' : null,
			'type'=>'html',
		),
        array(
			'name'=>'id_formaPago',
			'value'=>($model->idFormaPago !== null) ? CHtml::link($model->idFormaPago, array('/tFormaPago/view', 'id_formapago' => $model->idFormaPago->id_formapago)).' ' : null,
			'type'=>'html',
		),
        array(
			'name'=>'id_lugarCobro',
			'value'=>($model->idLugarCobro !== null) ? CHtml::link($model->idLugarCobro, array('/tLugarCobro/view', 'id_lugar' => $model->idLugarCobro->id_lugar)).' ' : null,
			'type'=>'html',
		),
        //'id_empresa',
        'total',
        'cuota_inicial',
        'saldo',
        'valor_cuota',
        'cantidad_cuotas',
        //'fecha',
       // 'id_usuario',
	),
)); ?>
    
    
     <?php
                $this->widget('bootstrap.widgets.TbDetailView', array(
                    'data' => $model,
                    'attributes' => array(
                                                array(
                            'name' => 'id_usuario',
                            'value' => ($model->idUsuario !== null) ? CHtml::encode($model->idUsuario->nombres) . '' : null,
                            'type' => 'html',
                        ),
                        'fecha',
                        ), 
                    )); ?>
</fieldset>