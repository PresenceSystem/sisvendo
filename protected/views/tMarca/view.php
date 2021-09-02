<?php
/** @var TMarcaController $this */
/** @var TMarca $model */
$this->breadcrumbs=array(
	'Tmarcas'=>array('index'),
	$model->id_marca,
);

$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . TMarca::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . TMarca::label(), 'icon' => 'plus', 'url' => array('create')),
	array('label' => Yii::t('AweCrud.app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id_marca)),
    array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_marca), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?'))),
    array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend><?php echo Yii::t('AweCrud.app', 'View') . ' ' . TMarca::label(); ?> <?php echo CHtml::encode($model) ?></legend>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
        'id_marca',
        'marca',
       // 'fecha',
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