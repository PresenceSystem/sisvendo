<?php
/** @var TArticuloController $this */
/** @var TArticulo $model */
$this->breadcrumbs=array(
	'Tarticulos'=>array('index'),
	$model->id_articulo,
);

$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . TArticulo::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . TArticulo::label(), 'icon' => 'plus', 'url' => array('create')),
	array('label' => Yii::t('AweCrud.app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id_articulo)),
    array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_articulo), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?'))),
    array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend><?php echo Yii::t('AweCrud.app', 'View') . ' ' . TArticulo::label(); ?> <?php echo CHtml::encode($model) ?></legend>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
        'id_articulo',
        'nombre',
        //'id_marca',
            array(
			'name'=>'id_marca',
			'value'=>($model->idMarca !== null) ? CHtml::encode($model->idMarca, array('/tMarca/view', 'id_marca' => $model->idMarca->id_marca)).' ' : null,
			'type'=>'html',
		),
        'modelo',
        'serie',
        'cod_barra',
        'prec_com',
        'prec_ven_contado',
        'prec_ven_credito',
        'stock',
        'reservados',
        array(
			'name'=>'id_proveedor',
			'value'=>($model->idProveedor !== null) ? CHtml::encode($model->idProveedor, array('/tProveedor/view', 'id_proveedor' => $model->idProveedor->id_proveedor)).' ' : null,
			'type'=>'html',
		),
        'fech_exp',
        'fech_cad',
        'fech_com',
        'descripcion',
      //  'fecha',
      //  'id_usuario',
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