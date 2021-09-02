<?php
/** @var TProveedorController $this */
/** @var TProveedor $data */
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
                
        <?php if (!empty($data->tel_fij_prov)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('tel_fij_prov')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->tel_fij_prov); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->tel_mov_prov)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('tel_mov_prov')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->tel_mov_prov); ?>
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
                
        <?php if (!empty($data->cue_banc_prov)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('cue_banc_prov')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->cue_banc_prov); ?>
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