<div class="form fondoLogin">
    <?php
    /** @var TContratoController $this */
    /** @var TContrato $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'id' => 'tcontrato-form',
    'enableAjaxValidation' => true,
    'enableClientValidation'=> false,
    )); ?>

    <p class="note">
        <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span>
        <?php echo Yii::t('AweCrud.app', 'are required') ?>.    </p>

    <?php echo $form->errorSummary($model) ?>

                            <?php echo $form->textFieldRow($model, 'lugar', array('class' => 'span5', 'maxlength' => 50)) ?>
                        <?php // echo $form->textFieldRow($model, 'fecha_creacion', array('class' => 'span5')) ?>
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
                        <?php echo $form->dropDownListRow($model, 'id_deudor', CHtml::listData(TPersona::model()->findAll(), 'ci', TPersona::representingColumn()), array('class' => 'span5')) ?>
                        <?php echo $form->dropDownListRow($model, 'id_formaPago', CHtml::listData(TFormaPago::model()->findAll(), 'id_formapago', TFormaPago::representingColumn())) ?>
                        <?php echo $form->dropDownListRow($model, 'id_lugarCobro', CHtml::listData(TLugarCobro::model()->findAll(), 'id_lugar', TLugarCobro::representingColumn())) ?>
                        <?php //echo $form->textFieldRow($model, 'id_empresa', array('class' => 'span5')) ?>
                        <?php //echo $form->textFieldRow($model, 'total', array('class' => 'span5', 'maxlength' => 7)) ?>
                        <?php //echo $form->textFieldRow($model, 'cuota_inicial', array('class' => 'span5', 'maxlength' => 7)) ?>
                        <?php //echo $form->textFieldRow($model, 'saldo', array('class' => 'span5', 'maxlength' => 7)) ?>
                        <?php //echo $form->textFieldRow($model, 'valor_cuota', array('class' => 'span5', 'maxlength' => 7)) ?>
                        <?php //echo $form->textFieldRow($model, 'cantidad_cuotas', array('class' => 'span5')) ?>
                        <?php //echo $form->textFieldRow($model, 'fecha', array('class' => 'span5')) ?>
                        <?php //echo $form->textFieldRow($model, 'id_usuario', array('class' => 'span5')) ?>
                <div class="form-actions">
                <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('AweCrud.app', 'Siguiente') : Yii::t('AweCrud.app', 'Save'),
		)); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			//'buttonType'=>'submit',
			'label'=> Yii::t('AweCrud.app', 'Cancel'),
			'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
		)); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>