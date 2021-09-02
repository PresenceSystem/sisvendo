<?php
/** @var TEmpresaController $this */
/** @var TEmpresa $model */
$this->breadcrumbs=array(
	'Tempresas'=>array('index'),
	$model->id_empresa,
);

$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . TEmpresa::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . TEmpresa::label(), 'icon' => 'plus', 'url' => array('create')),
	array('label' => Yii::t('AweCrud.app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id_empresa)),
    array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_empresa), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?'))),
    array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend><?php echo Yii::t('AweCrud.app', 'View') . ' ' . TEmpresa::label(); ?> <?php echo CHtml::encode($model) ?></legend>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
        'id_empresa',
        'empresa',
        'ruc',
        'nombre_responsable',
        'cioruc_responsable',
        'direccion',
        'telefono',
        'celular',
        array(
                'name'=>'email',
                'type'=>'email'
            ),
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