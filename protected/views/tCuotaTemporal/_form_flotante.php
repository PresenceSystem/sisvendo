<div class="form">
    <?php
    /** @var TCuotaController $this */
    /** @var TCuota $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
        'id' => 'tcuota-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span>
    <?php echo Yii::t('AweCrud.app', 'are required') ?>.    </p>

    <?php echo $form->errorSummary($model) ?>

    <?php //echo $form->dropDownListRow($model, 'numero_contrato', CHtml::listData(TContrato::model()->findAll(), 'numero', TContrato::representingColumn())) ?>
    <?php //echo $form->textFieldRow($model, 'fecha_creacion', array('class' => 'span5')) ?>
    <?php
    echo $form->labelEx($model, 'fecha_creacion');
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'fecha_creacion',
        'model' => $model,
        'attribute' => 'fecha_creacion',
        'language' => 'es',
        'htmlOptions' => array('class' => 'span2'), //'htmlOptions' => array('readonly' => "readonly", 'class' => 'span3'),
        'options' => array(
            'autoSize' => true,
            'dateFormat' => 'yy-mm-dd',
            'buttonImage' => Yii::app()->baseUrl . '/images/pagina/calendar1.png',
            'buttonImageOnly' => true,
            'buttonText' => 'SELECCIONAR FECHA',
            'selectOtherMonths' => true,
            'showAnim' => 'slide',
            'showButtonPanel' => true,
            'showOn' => 'button',
            'showOtherMonths' => true,
            'changeMonth' => 'true',
            'changeYear' => 'true',
        ),
            )
    );
    ?>
    <?php echo $form->error($model, 'fecha_creacion'); ?>
    <?php echo $form->textFieldRow($model, 'abono', array('class' => 'span5', 'maxlength' => 7)) ?>
    <?php echo $form->textFieldRow($model, 'saldo', array("OnFocus"=>"this.blur()", 'class' => 'span5', 'maxlength' => 7)) ?>
    <?php //echo '<br><b>Saldo:</b> '.$model->saldo.'<br>'; ?>
    <?php echo $form->textAreaRow($model, 'observacion', array('class' => 'span5', 'maxlength' => 800)) ?>
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