<?php
/** @var TPersonaController $this */
/** @var TPersona $model */
$this->breadcrumbs=array(
	'Tpersonas'=>array('index'),
	$model->ci,
);

$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . TPersona::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . TPersona::label(), 'icon' => 'plus', 'url' => array('create')),
	array('label' => Yii::t('AweCrud.app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->ci)),
    array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->ci), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?'))),
    array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <!--<legend><?php  ?> <?php // echo CHtml::encode($model) ?></legend>-->
    <h4 class="alert-info text-center"> DATOS PERSONALES </h4>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
        'ci',
        'nombre',
        array(
			'name'=>'id_sexo',
			'value'=>($model->idSexo !== null) ? CHtml::link($model->idSexo, array('/tSexo/view', 'id_sexo' => $model->idSexo->id_sexo)).' ' : null,
			'type'=>'html',
		),
        array(
			'name'=>'id_estado_civil',
			'value'=>($model->idEstadoCivil !== null) ? CHtml::link($model->idEstadoCivil, array('/tEstadoCivil/view', 'id_estado_civil' => $model->idEstadoCivil->id_estado_civil)).' ' : null,
			'type'=>'html',
		),
        'direccion',
        'referencia',
        'telefono',
        'celular',
              array(
			'name'=>'id_casa',
			'value'=>($model->idCasa !== null) ? CHtml::link($model->idCasa, array('/tCasa/view', 'id_casa' => $model->idCasa->id_casa)).' ' : null,
			'type'=>'html',
		),
       /* 'trabajo',
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
        'ci_digital', */
     //   'fecha',
     //   'id_usuario',
	),
)); ?>
    <h4 class="alert-info text-center"> TRABAJO </h4>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
      
        'trabajo',
        'cargo',
        'tiempo',
        'dir_trabajo',
        'tel_trabajo',
        'cel_trabajo',
        'sueldo'        
	),
)); ?>
    <h4 class="alert-info text-center"> CONYUGUE </h4>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
      
        'trabajo',
        'cargo',
        'tiempo',
        'dir_trabajo',
        'tel_trabajo',
        'cel_trabajo',
        'sueldo',
        'ci_cony',
        'nombre_cony',
      
	),
)); ?>
    <h4 class="alert-info text-center"> TRABAJO - CONYUGUE</h4>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
      
       
        'trabajo_cony',
        'cargo_cony',
        'tiempo_cony',
        'dir_trabajo_cony',
        'tel_trabajo_cony',
        'cel_trabajo_cony',
        'sueldo_cony',      
     //   'fecha',
     //   'id_usuario',
	),
)); ?>
</fieldset>