<?php
/** @var TPersonaController $this */
/** @var TPersona $data */
?>
<div class="view">
                    
        <?php if (!empty($data->nombre)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->nombre); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->idSexo->descripcion)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id_sexo')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->idSexo->descripcion); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->idEstadoCivil->descripcion)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id_estado_civil')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->idEstadoCivil->descripcion); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->direccion)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->direccion); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->referencia)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('referencia')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->referencia); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->telefono)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->telefono); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->celular)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('celular')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->celular); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->trabajo)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('trabajo')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->trabajo); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->cargo)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('cargo')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->cargo); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->tiempo)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('tiempo')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->tiempo); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->dir_trabajo)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('dir_trabajo')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->dir_trabajo); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->tel_trabajo)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('tel_trabajo')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->tel_trabajo); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->cel_trabajo)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('cel_trabajo')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->cel_trabajo); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->sueldo)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('sueldo')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->sueldo); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->ci_cony)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('ci_cony')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->ci_cony); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->nombre_cony)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('nombre_cony')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->nombre_cony); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->trabajo_cony)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('trabajo_cony')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->trabajo_cony); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->cargo_cony)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('cargo_cony')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->cargo_cony); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->tiempo_cony)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('tiempo_cony')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->tiempo_cony); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->dir_trabajo_cony)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('dir_trabajo_cony')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->dir_trabajo_cony); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->tel_trabajo_cony)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('tel_trabajo_cony')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->tel_trabajo_cony); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->cel_trabajo_cony)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('cel_trabajo_cony')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->cel_trabajo_cony); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->sueldo_cony)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('sueldo_cony')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->sueldo_cony); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->id_casa)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id_casa')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->idCasa->casa); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->tiempo_arriendo)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('tiempo_arriendo')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->tiempo_arriendo); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->ci_digital)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('ci_digital')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->ci_digital); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php /*if (!empty($data->fecha)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->fecha, 'medium', 'medium'); ?>
            <br/>
                 <?php echo date('D, d M y H:i:s', strtotime($data->fecha)); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->id_usuario)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->id_usuario); ?>
            </div>
        </div>

        <?php endif; */ ?>
    </div>