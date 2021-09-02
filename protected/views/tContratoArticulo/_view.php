<?php
/** @var TContratoArticuloController $this */
/** @var TContratoArticulo $data */
?>
<div class="view">
                    
        <?php if (!empty($data->numeroContrato->lugar)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('numero_contrato')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->numeroContrato->lugar); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->idArticulo->nombre)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id_articulo')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->idArticulo->nombre); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->cantidad)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->cantidad); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->precio)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('precio')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->precio); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->observacion)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('observacion')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->observacion); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->fecha)): ?>
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

        <?php endif; ?>
    </div>