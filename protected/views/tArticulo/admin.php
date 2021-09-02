<?php
/** @var TArticuloController $this */
/** @var TArticulo $model */
$this->breadcrumbs=array(
	'Tarticulos'=>array('index'),
	Yii::t('AweCrud.app', 'Manage'),
);

$this->menu=array(
	array('label' => Yii::t('AweCrud.app', 'List') . ' ' . TArticulo::label(2), 'icon' => 'list', 'url' => array('index')),
	array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . TArticulo::label(), 'icon' => 'plus', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tarticulo-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
    <legend class="alert-success">
   <center> <b>BUSCAR ARTÍCULOS </b></center>
    </legend>

<?php //echo CHtml::link('<i class="icon-search"></i> ' . Yii::t('AweCrud.app', 'Advanced Search'), '#', array('class' => 'search-button btn')) ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id' => 'tarticulo-grid',
    'type' => 'striped condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
      //  'id_articulo',
        'nombre',
       // 'id_marca',
          array(
                    'name' => 'id_marca',
                    'value' => 'isset($data->idMarca) ? $data->idMarca : null',
                    'filter' => CHtml::listData(TMarca::model()->findAll(), 'id_marca', TMarca::representingColumn()),
                ),
        'modelo',
        'serie',
        'cod_barra',
        /*
        'prec_com',
        'prec_ven_contado',
        'prec_ven_credito', */
        'stock',
        /* 'reservados',
        array(
                    'name' => 'id_proveedor',
                    'value' => 'isset($data->idProveedor) ? $data->idProveedor : null',
                    'filter' => CHtml::listData(TProveedor::model()->findAll(), 'id_proveedor', TProveedor::representingColumn()),
                ),
        'fech_exp',
        'fech_cad',
        'fech_com',
        'descripcion',
        'fecha',
        'id_usuario',
        */
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
</fieldset>