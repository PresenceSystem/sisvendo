<?php
/** @var TArticuloController $this */
/** @var TArticulo $data */
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
                
        <?php if (!empty($data->id_marca)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id_marca')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->id_marca); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->modelo)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('modelo')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->modelo); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->serie)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('serie')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->serie); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->cod_barra)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('cod_barra')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->cod_barra); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->prec_com)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('prec_com')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->prec_com); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->prec_ven_contado)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('prec_ven_contado')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->prec_ven_contado); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->prec_ven_credito)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('prec_ven_credito')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->prec_ven_credito); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->stock)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('stock')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->stock); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->reservados)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('reservados')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->reservados); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->idProveedor->nombre)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id_proveedor')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->idProveedor->nombre); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->fech_exp)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('fech_exp')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->fech_exp, 'medium', 'medium'); ?>
            <br/>
                 <?php echo date('D, d M y H:i:s', strtotime($data->fech_exp)); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->fech_cad)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('fech_cad')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->fech_cad, 'medium', 'medium'); ?>
            <br/>
                 <?php echo date('D, d M y H:i:s', strtotime($data->fech_cad)); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->fech_com)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('fech_com')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->fech_com, 'medium', 'medium'); ?>
            <br/>
                 <?php echo date('D, d M y H:i:s', strtotime($data->fech_com)); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->descripcion)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->descripcion); ?>
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