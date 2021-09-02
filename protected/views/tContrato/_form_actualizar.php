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
                        <?php //echo $form->dropDownListRow($model, 'id_deudor', CHtml::listData(TPersona::model()->findAll(), 'ci', TPersona::representingColumn()), array('class' => 'span5')) ?>
                        <?php echo $form->dropDownListRow($model, 'id_formaPago', CHtml::listData(TFormaPago::model()->findAll(), 'id_formapago', TFormaPago::representingColumn())) ?>
                        <?php echo $form->dropDownListRow($model, 'id_lugarCobro', CHtml::listData(TLugarCobro::model()->findAll(), 'id_lugar', TLugarCobro::representingColumn())) ?>
                        <?php //echo $form->textFieldRow($model, 'id_empresa', array('class' => 'span5')) ?>
                        <?php //echo $form->textFieldRow($model, 'total', array('class' => 'span5', 'maxlength' => 7)) ?>
                        <?php echo $form->textFieldRow($model, 'cuota_inicial', array('class' => 'span5', 'maxlength' => 7)) ?>
                        <?php //echo $form->textFieldRow($model, 'saldo', array('class' => 'span5', 'maxlength' => 7)) ?>
                        <?php //echo $form->textFieldRow($model, 'valor_cuota', array('class' => 'span5', 'maxlength' => 7)) ?>
                        <?php //echo $form->textFieldRow($model, 'cantidad_cuotas', array('class' => 'span5', 'maxlength' => 7)) ?>
                        <?php echo $form->dropDownListRow($model, 'cantidad_cuotas', array(
                '0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10',
                '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20',
                '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30',
                '31' => '31', '32' => '32', '33' => '33', '34' => '34', '35' => '35', '36' => '36', '37' => '37', '38' => '38', '39' => '39', '40' => '40',
                '41' => '41', '42' => '42', '43' => '43', '44' => '44', '45' => '45', '46' => '46', '47' => '47', '48' => '48', '49' => '49', '50' => '50'
                ), array('class' => 'span1', 'maxlength' => 30)).' <b>cuotas</b>' ?> 
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