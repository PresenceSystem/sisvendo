<?php
/** @var TContratoController $this */
/** @var TContrato $data */
?>
<div class="view">
                    
        <?php if (!empty($data->lugar)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('lugar')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->lugar); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->fecha_creacion)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->fecha_creacion, 'medium', 'medium'); ?>
            <br/>
                 <?php echo date('D, d M y H:i:s', strtotime($data->fecha_creacion)); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->idDeudor->nombre)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id_deudor')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->idDeudor->nombre); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->idFormaPago->forma_pago)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id_formaPago')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->idFormaPago->forma_pago); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->idLugarCobro->descripcion)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id_lugarCobro')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->idLugarCobro->descripcion); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->id_empresa)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id_empresa')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->id_empresa); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->total)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->total); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->cuota_inicial)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('cuota_inicial')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->cuota_inicial); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->saldo)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('saldo')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->saldo); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->valor_cuota)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('valor_cuota')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->valor_cuota); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->cantidad_cuotas)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('cantidad_cuotas')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->cantidad_cuotas); ?>
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