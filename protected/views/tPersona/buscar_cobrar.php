<?php
/** @var TPersonaController $this */
/** @var TPersona $model */
$this->breadcrumbs=array(
	'Tpersonas'=>array(''),
	Yii::t('AweCrud.app', 'Buscar para cobrar'),
);

//$this->menu=array(
//	//array('label' => Yii::t('AweCrud.app', 'List') . ' ' . TPersona::label(2), 'icon' => 'list', 'url' => array('index')),
//	array('label' => 'Nuevo cliente', 'icon' => 'plus', 'url' => array('create')),
//);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tpersona-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
     <legend class="alert-success">
   <center> <b>Buscar cliente por CI, Apellidos, Nombres... etc.
       <?php //echo CHtml::link('ingresar cliente nuevo',array('tPersona/create')); ?> 
           y cobrar cuota del crédito </b></center>
    </legend>

<?php //echo CHtml::link('<i class="icon-search"></i> ' . Yii::t('AweCrud.app', 'Advanced Search'), '#', array('class' => 'search-button btn')) ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

</fieldset>
<div class="row">
<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id' => 'tpersona-grid',
    'type' => 'striped condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'ci',
        'nombre',
//        array(
//                    'name' => 'id_sexo',
//                    'value' => 'isset($data->idSexo) ? $data->idSexo : null',
//                    'filter' => CHtml::listData(TSexo::model()->findAll(), 'id_sexo', TSexo::representingColumn()),
//                ),
//        array(
//                    'name' => 'id_estado_civil',
//                    'value' => 'isset($data->idEstadoCivil) ? $data->idEstadoCivil : null',
//                    'filter' => CHtml::listData(TEstadoCivil::model()->findAll(), 'id_estado_civil', TEstadoCivil::representingColumn()),
//                ),
//        'direccion',
//        'referencia',
        /*
        'telefono',
        'celular',
        'trabajo',
        'cargo',
        'tiempo',
        'dir_trabajo',
        'tel_trabajo',
        'cel_trabajo',
        'sueldo',
        'ci_cony',
        'nombre_cony',
        'trabajo_cony',
        'cargo_cony',
        'tiempo_cony',
        'dir_trabajo_cony',
        'tel_trabajo_cony',
        'cel_trabajo_cony',
        'sueldo_cony',
        'id_casa',
        'tiempo_arriendo',
        'ci_digital',
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
                        'url' => "CHtml::normalizeUrl(array('tContrato/cobrar', 'id'=>\$data->ci
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
</div>