<?php
/** @var TContratoGaranteController $this */
/** @var TContratoGarante $data */
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
                
        <?php if (!empty($data->idGarante->nombre)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id_garante')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->idGarante->nombre); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->tipo)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->tipo); ?>
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