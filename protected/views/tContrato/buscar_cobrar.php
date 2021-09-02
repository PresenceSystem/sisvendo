<?php
/** @var TContratoController $this */
/** @var TContrato $model */
$this->breadcrumbs=array(
	'Tcontratos'=>array('index'),
	Yii::t('AweCrud.app', 'Manage'),
);

$this->menu=array(
	array('label' => Yii::t('AweCrud.app', 'List') . ' ' . TContrato::label(2), 'icon' => 'list', 'url' => array('index')),
	array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . TContrato::label(), 'icon' => 'plus', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tcontrato-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
     <legend class="alert-success">
   <center> <b>Buscar cliente por CI, Apellidos, Nombres... etc.     
           <br>y cobrar cuota del crédito </b></center>
    </legend>
<!--<div class="clumn span-1 right">
    <?php // echo CHtml::image(Yii::app()->baseUrl."/images/pagina/cobrar.png"); ?>
    </div>-->
<?php //echo CHtml::link('<i class="icon-search"></i> ' . Yii::t('AweCrud.app', 'Advanced Search'), '#', array('class' => 'search-button btn')) ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id' => 'tcontrato-grid',
    'type' => 'striped condensed',
    'dataProvider' => $model->searchCobrar(),
    'filter' => $model,
    'columns' => array(
      //  'numero',
        'lugar',
     //   'fecha_creacion',
        array(
           'name'=>'deudor_search',
           'value' => '$data->idDeudor->nombre',
        ),
	array(
	'header'=>'CI.',
	'name'=>'id_deudor',
	),
//        array(
//                    'name' => 'id_deudor',
//                    'value' => 'isset($data->idDeudor) ? $data->idDeudor : null',
//                    'filter' => CHtml::listData(TPersona::model()->findAll(), 'ci', TPersona::representingColumn()),
//                ),
//        array(
//                    'name' => 'id_formaPago',
//                    'value' => 'isset($data->idFormaPago) ? $data->idFormaPago : null',
//                    'filter' => CHtml::listData(TFormaPago::model()->findAll(), 'id_formapago', TFormaPago::representingColumn()),
//                ),
        array(
                    'name' => 'id_lugarCobro',
                    'value' => 'isset($data->idLugarCobro) ? $data->idLugarCobro : null',
                    'filter' => CHtml::listData(TLugarCobro::model()->findAll(), 'id_lugar', TLugarCobro::representingColumn()),
                ),
       
//        'id_empresa',
        'total',
//        'cuota_inicial',
        'saldo',
        /* 'valor_cuota',
        'cantidad_cuotas',
        'fecha',
        'id_usuario',
        */
        array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{cobrar}', // {delete}  {update}',
                'buttons' => array
                    (
                      'cobrar' => array(
                        'label' => 'Cobrar',
                        'url' => "CHtml::normalizeUrl(array('tContrato/cobrar', 'id'=>\$data->numero
                         ))",
                          
                        'imageUrl' => Yii::app()->request->baseUrl . '/images/pagina/cobrar_40.png', array("width" => 20),
                        'options' => array('class' => 'cobrar'),
                            ),
                    
                ),
            )
//		array(
//			'class'=>'bootstrap.widgets.TbButtonColumn',
//		),
	),
)); ?>
</fieldset>
