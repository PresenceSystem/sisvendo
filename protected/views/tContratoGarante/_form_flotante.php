
<div class="form">
    <?php
    /** @var TContratoGaranteController $this */
    /** @var TContratoGarante $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
        'id' => 'tcontrato-garante-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span>
        <?php echo Yii::t('AweCrud.app', 'are required') ?>.    </p>

    <?php echo $form->errorSummary($model) ?> 

    <?php //echo $form->dropDownListRow($model, 'numero_contrato', CHtml::listData(TContrato::model()->findAll(), 'numero', TContrato::representingColumn())) ?>
    <?php //echo $form->dropDownListRow($model, 'id_garante', CHtml::listData(TPersona::model()->findAll(), 'ci', TPersona::representingColumn()))  ?>
    <div>
        <?php echo $form->labelEx($model, 'id_garante'); ?>        
        <br>         
        <?php 
        if ($model->id_garante) {
            $value = $model->idGarante->nombre;
        } else {
            // $value = '';
            $value = '';
        }
        echo $form->hiddenField($model, 'id_garante', array());
        // echo '<input type="hidden" id="autocomplete" name="autocomplete" value="0" />';
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name' => 'id_garante',
            'model' => $model,
            'value' => $value,
            'sourceUrl' => $this->createUrl('tPersona/lista'),
            'options' => array(
                'minLength' => '1',
                'showAnim' => 'fold',
                'select' => 'js:function(event, ui)
                                                                       { jQuery("#TContratoGarante_id_garante").val(ui.item.id); }',
            //                'search' => 'js:function(event, ui)
            // { jQuery("#COD_VERTICE").val(1); }'
            ),
            'htmlOptions' => array(
                'style' => "font-size: 13px; font-family: Arial,Helvetica,sans-serif; line-height: 28px; height: 20px; width: 40%;"
            ),
        ));
         echo $form->error($model, 'id_garante'); 
        ?>
    </div>
    <?php echo $form->textFieldRow($model, 'tipo', array('class' => 'span5', 'maxlength' => 25)) ?>   
    <?php // echo $form->textFieldRow($model, 'fecha', array('class' => 'span5')) ?>
    <?php // echo $form->textFieldRow($model, 'id_usuario', array('class' => 'span5')) ?>
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