<div class="form">
    <?php
    /** @var TPersonaController $this */
    /** @var TPersona $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
        'id' => 'tpersona-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'), //NO TE OLVIDES DE ASIGNAR ESTO PARA LA foto
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span>
        <?php echo Yii::t('AweCrud.app', 'are required') ?>.    </p>

    <?php echo $form->errorSummary($model) ?>

    <div class="panel-group span10" id="accordion">

        <div class="panel">
            <div class="panel-warning text-center">
                <h3 class="panel-title alert-success">DATOS PERSONALES</h3>
            </div>

            <div class="panel-body">
                <?php echo $form->textFieldRow($model, 'ci', array('class' => 'span2')) ?>
                <?php echo $form->textFieldRow($model, 'nombre', array('class' => 'span5', 'maxlength' => 60)) ?>
                <?php echo $form->dropDownListRow($model, 'id_sexo', CHtml::listData(TSexo::model()->findAll(), 'id_sexo', TSexo::representingColumn()), array('prompt' => Yii::t('AweApp', 'None'))) ?>
                <?php echo $form->dropDownListRow($model, 'id_estado_civil', CHtml::listData(TEstadoCivil::model()->findAll(), 'id_estado_civil', TEstadoCivil::representingColumn()), array('prompt' => Yii::t('AweApp', 'None'))) ?>
                <?php echo $form->textFieldRow($model, 'direccion', array('class' => 'span5', 'maxlength' => 60)) ?>
                <?php echo $form->textFieldRow($model, 'referencia', array('class' => 'span5', 'maxlength' => 150)) ?>
                <?php echo $form->textFieldRow($model, 'telefono', array('class' => 'span2')) ?>
                <?php echo $form->textFieldRow($model, 'celular', array('class' => 'span2')) ?>
                <?php echo $form->dropDownListRow($model, 'id_casa', CHtml::listData(TCasa::model()->findAll(), 'id_casa', TCasa::representingColumn()), array('prompt' => Yii::t('AweApp', 'Seleccionar:'))) ?>
                <?php echo $form->textFieldRow($model, 'tiempo_arriendo', array('class' => 'span5', 'maxlength' => 25)) ?>
                <?php //echo $form->textFieldRow($model, 'ci_digital', array('class' => 'span5', 'maxlength' => 100))  ?>
                <div class="row">
                    <!-- Código para subir ficha en digital -->
                    <br>
                    <div class="row">
                        <?php echo $form->labelEx($model, 'ci_digital'); ?>
                        <?php echo CHtml::activeFileField($model, 'ci_digital'); //con esto levantamos la imagen    ?>  
                        <?php echo $form->error($model, 'ci_digital'); ?>
                    </div>
                    <?php if ($model->isNewRecord != '1') { ?>
                        <div class="row">
                            <?php
                            //echo CHtml::image(Yii::app()->request->baseUrl . '/images/documentos_transportes/' . $model->documentos_pdf, "documentos_pdf", array("width" => 200)); // La Imagen se muestra aquí si la página es la página de actualización    
                            echo '<b>Archivo actual: </b>' . $model->ci_digital . '';
                            ?>
                        </div>
                    <?php } ?>
                    <!-- Termina código para subir ficha en digital -->

                </div>
                <?php //echo $form->textFieldRow($model, 'fecha', array('class' => 'span5'))  ?>
                <?php //echo $form->textFieldRow($model, 'id_usuario', array('class' => 'span5'))  ?>
            </div>

        </div>

        <a data-toggle="collapse" data-parent="#accordion" href="#collapseGrupoA">  <h4 class="panel-title alert-success"><br>INGRESAR DATOS DEL TRABAJO<br></h4> </a>
        <div id="collapseGrupoA" class="panel-collapse collapse">
            <?php echo $form->textFieldRow($model, 'trabajo', array('class' => 'span5', 'maxlength' => 150)) ?>
            <?php echo $form->textFieldRow($model, 'cargo', array('class' => 'span5', 'maxlength' => 150)) ?>
            <?php echo $form->textFieldRow($model, 'tiempo', array('class' => 'span5', 'maxlength' => 50)) ?>
            <?php echo $form->textFieldRow($model, 'dir_trabajo', array('class' => 'span5', 'maxlength' => 150)) ?>
            <?php echo $form->textFieldRow($model, 'tel_trabajo', array('class' => 'span5')) ?>
            <?php echo $form->textFieldRow($model, 'cel_trabajo', array('class' => 'span5')) ?>
            <?php echo $form->textFieldRow($model, 'sueldo', array('class' => 'span5')) ?>
        </div>
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseGrupoB">  <h4 class="panel-title alert-success"><br>DATOS DEL CÓNYUGE</h4></a>
        <div id="collapseGrupoB" class="panel-collapse collapse">
            <?php echo $form->textFieldRow($model, 'ci_cony', array('class' => 'span5')) ?>
            <?php echo $form->textFieldRow($model, 'nombre_cony', array('class' => 'span5', 'maxlength' => 60)) ?>
            <?php echo $form->textFieldRow($model, 'trabajo_cony', array('class' => 'span5', 'maxlength' => 150)) ?>
            <?php echo $form->textFieldRow($model, 'cargo_cony', array('class' => 'span5', 'maxlength' => 150)) ?>
            <?php echo $form->textFieldRow($model, 'tiempo_cony', array('class' => 'span5', 'maxlength' => 50)) ?>
            <?php echo $form->textFieldRow($model, 'dir_trabajo_cony', array('class' => 'span5', 'maxlength' => 150)) ?>
            <?php echo $form->textFieldRow($model, 'tel_trabajo_cony', array('class' => 'span5')) ?>
            <?php echo $form->textFieldRow($model, 'cel_trabajo_cony', array('class' => 'span5')) ?>
            <?php echo $form->textFieldRow($model, 'sueldo_cony', array('class' => 'span5')) ?>
        </div>

    </div>
    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Siguiente') : Yii::t('AweCrud.app', 'Save'),
        ));
        ?>
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            //'buttonType'=>'submit',
            'label' => Yii::t('AweCrud.app', 'Cancel'),
            'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>
</div>