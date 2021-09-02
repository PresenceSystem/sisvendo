<?php
/** @var TContratoController $this */
/** @var TContrato $model */
?>

<fieldset>
    <legend><?php echo Yii::t('AweCrud.app', '') . ' ' . TCuota::label(); ?> <?php echo 'N°. '.CHtml::encode($cantidad_cuotas) ?></legend>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
       
        array(
			'name'=>'id_deudor',
                    'label'=>'DEUDOR:',
			'value'=>($model->idDeudor !== null) ? CHtml::encode($model->idDeudor, array('/tPersona/view', 'ci' => $model->idDeudor->ci)).' ' : null,
			'type'=>'html',
		),     
	),
));

echo "<b>TOTAL DEL CONTRATO:</b> ".$model->total.'<br>';
echo "<b>ABONO:</b> ".$abono.'<br>';
echo "<b>SALDO:</b> ".$saldo.'<br>';
echo "<b>COBRO REALIZADO POR:</b> ".$cobrador->nombres.'<br>';  
echo "<b>FECHA:</b> ".$fecha.'<br>';
?>
<meta http-equiv="Refresh" content="0;url=../buscar_cobrar">
    
     <?php
//                $this->widget('bootstrap.widgets.TbDetailView', array(
//                    'data' => $model,
//                    'attributes' => array(
//                                                array(
//                            'name' => 'id_usuario',
//                            'value' => ($model->idUsuario !== null) ? CHtml::encode($model->idUsuario->nombres) . '' : null,
//                            'type' => 'html',
//                        ),
//                        'fecha',
//                        ), 
//                    )); ?>
</fieldset>