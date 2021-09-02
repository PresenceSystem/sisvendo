<?php
/** @var TContratoArticuloController $this */
/** @var TContratoArticulo $model */
$this->breadcrumbs=array(
	'Tcontrato Articulos'=>array('index'),
	Yii::t('AweCrud.app', 'Manage'),
);

$this->menu=array(
	array('label' => Yii::t('AweCrud.app', 'List') . ' ' . TContratoArticulo::label(2), 'icon' => 'list', 'url' => array('index')),
	array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . TContratoArticulo::label(), 'icon' => 'plus', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tcontrato-articulo-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
    <legend>
        <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo TContratoArticulo::label(2) ?>    </legend>

<?php echo CHtml::link('<i class="icon-search"></i> ' . Yii::t('AweCrud.app', 'Advanced Search'), '#', array('class' => 'search-button btn')) ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id' => 'tcontrato-articulo-grid',
    'type' => 'striped condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id_detalle',
        array(
                    'name' => 'numero_contrato',
                    'value' => 'isset($data->numeroContrato) ? $data->numeroContrato : null',
                    'filter' => CHtml::listData(TContrato::model()->findAll(), 'numero', TContrato::representingColumn()),
                ),
        array(
                    'name' => 'id_articulo',
                    'value' => 'isset($data->idArticulo) ? $data->idArticulo : null',
                    'filter' => CHtml::listData(TArticulo::model()->findAll(), 'id_articulo', TArticulo::representingColumn()),
                ),
        'cantidad',
        'precio',
        'observacion',
        /*
        'fecha',
        'id_usuario',
        */
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
</fieldset>