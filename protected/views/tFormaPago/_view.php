<?php
/** @var TFormaPagoController $this */
/** @var TFormaPago $data */
?>
<div class="view">
                    
        <?php if (!empty($data->forma_pago)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('forma_pago')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->forma_pago); ?>
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
    </div>