<div class="form">
    <?php
    /** @var TEmpresaController $this */
    /** @var TEmpresa $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'id' => 'tempresa-form',
    'enableAjaxValidation' => true,
    'enableClientValidation'=> false,
    )); ?>

    <p class="note">
        <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span>
        <?php echo Yii::t('AweCrud.app', 'are required') ?>.    </p>

    <?php echo $form->errorSummary($model) ?>

                            <?php echo $form->textFieldRow($model, 'empresa', array('class' => 'span5', 'maxlength' => 75)) ?>
                        <?php echo $form->textFieldRow($model, 'ruc', array('class' => 'span5', 'maxlength' => 75)) ?>
                        <?php echo $form->textFieldRow($model, 'nombre_responsable', array('class' => 'span5', 'maxlength' => 75)) ?>
                        <?php echo $form->textFieldRow($model, 'cioruc_responsable', array('class' => 'span5', 'maxlength' => 75)) ?>
                        <?php echo $form->textAreaRow($model, 'direccion', array('class' => 'span5', 'maxlength' => 200)) ?>
                        <?php echo $form->textFieldRow($model, 'telefono', array('class' => 'span5', 'maxlength' => 200)) ?>
                        <?php echo $form->textFieldRow($model, 'celular', array('class' => 'span5', 'maxlength' => 200)) ?>
                        <?php echo $form->textFieldRow($model, 'email', array('class' => 'span5', 'maxlength' => 200)) ?>
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