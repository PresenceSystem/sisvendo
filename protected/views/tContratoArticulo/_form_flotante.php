<div class="form">
    <?php
    /** @var TContratoArticuloController $this */
    /** @var TContratoArticulo $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
        'id' => 'tcontrato-articulo-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span>
        <?php echo Yii::t('AweCrud.app', 'are required') ?>.    </p>

    <?php echo $form->errorSummary($model) ?>

    <?php //echo $form->dropDownListRow($model, 'numero_contrato', CHtml::listData(TContrato::model()->findAll(), 'numero', TContrato::representingColumn())) ?>
    <?php //echo $form->textFieldRow($model, 'numero_contrato', array('class' => 'span1'));  ?>
    <?php //echo $form->dropDownListRow($model, 'id_articulo', CHtml::listData(TArticulo::model()->findAll(), 'id_articulo', TArticulo::representingColumn())) ?>
    <?php //echo $form->textFieldRow($model, 'id_articulo', array('class' => 'span5'))  ?>
    <div class="row">        
        <?php echo $form->labelEx($model, 'id_articulo'); ?>        
        <br>         
        <?php
        if ($model->id_articulo) {
            $value = $model->idArticulo->nombre;
        } else {
            // $value = '';
            $value = '';
        }
        echo $form->hiddenField($model, 'id_articulo', array());
        // echo '<input type="hidden" id="autocomplete" name="autocomplete" value="0" />';
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name' => 'id_articulo',
            'model' => $model,
            'value' => $value,
            'sourceUrl' => $this->createUrl('tArticulo/lista'),
            'options' => array(
                'minLength' => '1',
                'showAnim' => 'fold',
                'select' => 'js:function(event, ui)
                                                                       { jQuery("#TContratoArticulo_id_articulo").val(ui.item.id); }',
            //                'search' => 'js:function(event, ui)
            // { jQuery("#COD_VERTICE").val(1); }'
            ),
            'htmlOptions' => array(
                'style' => "font-size: 13px; font-family: Arial,Helvetica,sans-serif; line-height: 28px; height: 20px; width: 40%;"
            ),
        ));
        echo $form->error($model, 'id_articulo');
        ?>
    </div>
    <?php echo $form->textFieldRow($model, 'cantidad', array('class' => 'span1', 'maxlength' => 4)) ?>
    <?php echo $form->textFieldRow($model, 'precio', array('class' => 'span1', 'maxlength' => 7)); ?>
    <?php echo $form->textAreaRow($model, 'observacion', array('class' => 'span5', 'maxlength' => 100)) ?>
    <?php //echo $form->textFieldRow($model, 'fecha', array('class' => 'span5')) ?>
    <?php //echo $form->textFieldRow($model, 'id_usuario', array('class' => 'span5'))  ?>
    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
        ));
        ?>
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            //'buttonType'=>'submit',
            'label' => Yii::t('AweCrud.app', 'Cancel'),
            'htmlOptions' => array('onclick' => 'javascript:history.go(0)')
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>
</div>