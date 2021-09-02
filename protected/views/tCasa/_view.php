<?php
/** @var TCasaController $this */
/** @var TCasa $data */
?>
<div class="view">
                    
        <?php if (!empty($data->casa)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('casa')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->casa); ?>
            </div>
        </div>

        <?php endif; ?>
    </div>