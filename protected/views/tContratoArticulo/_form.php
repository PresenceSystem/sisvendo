<div class="form">
    <?php
    /** @var TContratoArticuloController $this */
    /** @var TContratoArticulo $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'id' => 'tcontrato-articulo-form',
    'enableAjaxValidation' => true,
    'enableClientValidation'=> false,
    )); ?>

    <p class="note">
        <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span>
        <?php echo Yii::t('AweCrud.app', 'are required') ?>.    </p>

    <?php echo $form->errorSummary($model) ?>

                            <?php echo $form->dropDownListRow($model, 'numero_contrato', CHtml::listData(TContrato::model()->findAll(), 'numero', TContrato::representingColumn())) ?>
                        <?php echo $form->dropDownListRow($model, 'id_articulo', CHtml::listData(TArticulo::model()->findAll(), 'id_articulo', TArticulo::representingColumn())) ?>
                        <?php echo $form->textFieldRow($model, 'cantidad', array('class' => 'span5', 'maxlength' => 4)) ?>
                        <?php echo $form->textFieldRow($model, 'precio', array('class' => 'span5', 'maxlength' => 7)) ?>
                        <?php echo $form->textAreaRow($model, 'observacion', array('class' => 'span5', 'maxlength' => 100)) ?>
                        <?php //echo $form->textFieldRow($model, 'fecha', array('class' => 'span5')) ?>
                        <?php //echo $form->textFieldRow($model, 'id_usuario', array('class' => 'span5')) ?>
                <div class="form-actions">
                <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
		)); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			//'buttonType'=>'submit',
			'label'=> Yii::t('AweCrud.app', 'Cancel'),
			'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
		)); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>