<?php
/** @var TContratoController $this */
/** @var TContrato $model */
//$this->breadcrumbs=array(
//	'Tcontratos'=>array('index'),
//	Yii::t('AweCrud.app', 'Manage'),
//);

//$this->menu=array(
//	array('label' => Yii::t('AweCrud.app', 'List') . ' ' . TContrato::label(2), 'icon' => 'list', 'url' => array('index')),
//	array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . TContrato::label(), 'icon' => 'plus', 'url' => array('create')),
//);

//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//	$('.search-form').toggle();
//	return false;
//});
//$('.search-form form').submit(function(){
//	$.fn.yiiGridView.update('tcontrato-grid', {
//		data: $(this).serialize()
//	});
//	return false;
//});
//");
?>

<fieldset class="span-24">
     <legend class="alert-success">
   <center> <b>BUSCAR CONTRATOS PAGADOS</b></center>
    </legend>

<?php //echo CHtml::link('<i class="icon-search"></i> ' . Yii::t('AweCrud.app', 'Advanced Search'), '#', array('class' => 'search-button btn')) ?>
<!--<div class="search-form" style="display:none">-->
<?php /*$this->renderPartial('_search',array(
	'model' => $model,
));*/ ?>
<!--</div> search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id' => 'tcontrato-grid',
    'type' => 'striped condensed',
    'dataProvider' => $model->searchPagados(),
    'filter' => $model,
    'columns' => array(
        'numero',
         array(
           'name'=>'deudor_search',
           'value' => '$data->idDeudor->nombre',
        ),
	'id_deudor',
        'lugar',
        'fecha_creacion',

       /* array(
                    'name' => 'id_deudor',
                    'value' => 'isset($data->idDeudor) ? $data->idDeudor : null',
                    'filter' => CHtml::listData(TPersona::model()->findAll(), 'ci', TPersona::representingColumnCI()),
                ), */
        array(
                    'name' => 'id_formaPago',
                    'value' => 'isset($data->idFormaPago) ? $data->idFormaPago : null',
                    'filter' => CHtml::listData(TFormaPago::model()->findAll(), 'id_formapago', TFormaPago::representingColumn()),
                ),
        array(
                    'name' => 'id_lugarCobro',
                    'value' => 'isset($data->idLugarCobro) ? $data->idLugarCobro : null',
                    'filter' => CHtml::listData(TLugarCobro::model()->findAll(), 'id_lugar', TLugarCobro::representingColumn()),
                ),
        
      //  'id_empresa',
        'total',
        'saldo',
        'valor_cuota',
            /* 'cuota_inicial',
   'cantidad_cuotas',
        'fecha',
        'id_usuario',
        */
        array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{ver}  {delete}', // {delete}  {update}',
                'buttons' => array
                    (
                    'ver' => array
                        (
                        'label' => 'Ver',
                       // 'icon' => 'list white',
                        'url' => 'Yii::app()->createUrl("tContrato/contrato/", array("id"=>$data->numero))',
                       // 'imageUrl' => Yii::app()->request->baseUrl . '/images/ver.jpeg',
                         'imageUrl' => Yii::app()->request->baseUrl . '/images/pagina/iconos/ver_40.png', array("width" => 4),
                        'options' => array(
                            'class' => 'ver',
                        ),
                    ),
                    'actualizar' => array
                        (
                        'label' => 'Actualizar',
                       // 'icon' => 'pencil white',
                        'url' => 'Yii::app()->createUrl("tConductor/update/", array("id"=>$data->id_conductor))',
                          'imageUrl' => Yii::app()->request->baseUrl . '/images/pagina/iconos/actualizar_40.png', array("width" => 4),
                        'options' => array('class' => 'actualizar'), 
                    ),
                ),
            )
//		array(
//			'class'=>'bootstrap.widgets.TbButtonColumn',
//		),
	),
)); ?>
</fieldset>
