<div class="form">
    <?php
    /** @var TArticuloController $this */
    /** @var TArticulo $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
        'id' => 'tarticulo-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span>
        <?php echo Yii::t('AweCrud.app', 'are required') ?>.    </p>

    <?php echo $form->errorSummary($model) ?>
    <?php //echo $form->textFieldRow($model, 'id_marca', array('class' => 'span5')) ?>
    <div class="row">        
        <?php echo $form->labelEx($model, 'id_marca'); ?>        
        <br>         
        <?php
        if ($model->id_marca) {
            $value = $model->idMarca->marca;
        } else {
            // $value = '';
            $value = '';
        }
        echo $form->hiddenField($model, 'id_marca', array());
        // echo '<input type="hidden" id="autocomplete" name="autocomplete" value="0" />';
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name' => 'id_marca',
            'model' => $model,
            'value' => $value,            
            'sourceUrl' => $this->createUrl('tMarca/lista'),
            'options' => array(
                'minLength' => '1',
                'showAnim' => 'fold',
                'select' => 'js:function(event, ui)
                                                                       { jQuery("#TArticulo_id_marca").val(ui.item.id); }',
            //                'search' => 'js:function(event, ui)
            // { jQuery("#COD_VERTICE").val(1); }'
            ),
            'htmlOptions' => array(
                'style' => "font-size: 13px; font-family: Arial,Helvetica,sans-serif; line-height: 28px; height: 20px; width: 40%;"
            ),
        ));
        ?>
        
        <?php
        //Nuevo
                                                             $this->widget(
                                                                           'bootstrap.widgets.TbButton',
                                                                           array(
                                                                           'label' => 'Ingresar nueva marca',                                    
                                                                                'url'=> Yii::app()->homeUrl.'/tMarca/nueva',
                                                                               'icon'=>'bookmark',
                                                                           )
                                                                           );
        ?>
    </div>
    <?php //echo $form->dropDownListRow($model, 'id_proveedor', CHtml::listData(TProveedor::model()->findAll(), 'id_proveedor', TProveedor::representingColumn())) ?>
    <div class="row">        
        <?php echo $form->labelEx($model, 'id_proveedor'); ?>        
        <br>         
        <?php
        if ($model->id_proveedor) {
            $value = $model->idProveedor->nombre;
        } else {
            // $value = '';
            $value = '';
        }
        echo $form->hiddenField($model, 'id_proveedor', array());        
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name' => 'id_proveedor',
            'model' => $model,
            'value' => $value,            
            'sourceUrl' => $this->createUrl('tProveedor/lista'),
            'options' => array(
                'minLength' => '1',
                'showAnim' => 'fold',
                'select' => 'js:function(event, ui)
                                                                       { jQuery("#TArticulo_id_proveedor").val(ui.item.id); }',
            //                'search' => 'js:function(event, ui)
            // { jQuery("#COD_VERTICE").val(1); }'
            ),
            'htmlOptions' => array(
                'style' => "font-size: 13px; font-family: Arial,Helvetica,sans-serif; line-height: 28px; height: 20px; width: 40%;"
            ),
        ));
        ?>
        
        <?php
        //Nuevo
                                                             $this->widget(
                                                                           'bootstrap.widgets.TbButton',
                                                                           array(
                                                                           'label' => 'Nuevo proveedor',                                    
                                                                                'url'=> Yii::app()->homeUrl.'/tProveedor/nuevo',
                                                                               'icon'=>'folder-close',
                                                                           )
                                                                           );
        ?>
    </div>
    <?php echo $form->textFieldRow($model, 'nombre', array('class' => 'span5', 'maxlength' => 50)) ?>                        
    <?php echo $form->textFieldRow($model, 'modelo', array('class' => 'span5', 'maxlength' => 100)) ?>
    <?php echo $form->textFieldRow($model, 'serie', array('class' => 'span5', 'maxlength' => 100)) ?>
    <?php echo $form->textFieldRow($model, 'cod_barra', array('class' => 'span5', 'maxlength' => 100)) ?>
    <table  class="table-bordered table table-hover fondoLogin">
        <tr>
            <td rowspan="2"> <?php echo $form->textFieldRow($model, 'prec_com', array('class' => 'span2', 'maxlength' => 7)) ?> </td>
            <td><?php
                echo $form->dropDownListRow($model, 'contado_porcentaje', array(
                    '0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10',
                    '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20',
                    '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30',
                    '31' => '31', '32' => '32', '33' => '33', '34' => '34', '35' => '35', '36' => '36', '37' => '37', '38' => '38', '39' => '39', '40' => '40',
                    '41' => '41', '42' => '42', '43' => '43', '44' => '44', '45' => '45', '46' => '46', '47' => '47', '48' => '48', '49' => '49', '50' => '50',
                       '51' => '51', '52' => '52', '53' => '53', '54' => '54', '55' => '55', '56' => '56', '57' => '57', '58' => '58', '59' => '59', '60' => '60',
                     '61' => '61', '62' => '62', '63' => '63', '64' => '64', '65' => '65', '66' => '66', '67' => '67', '68' => '68', '69' => '69', '70' => '70',
                     '71' => '71', '72' => '72', '73' => '73', '74' => '74', '75' => '75', '76' => '76', '77' => '77', '78' => '78', '79' => '79', '80' => '80',
                     '81' => '81', '82' => '82', '83' => '83', '84' => '84', '85' => '85', '86' => '86', '87' => '87', '88' => '88', '89' => '89', '90' => '90',
                     '91' => '91', '92' => '92', '93' => '93', '94' => '94', '95' => '95', '96' => '96', '97' => '97', '98' => '98', '99' => '99', '100' => '100'
                        ), array('class' => 'span1', 'maxlength' => 30)) . ' <b>%</b>'
                ?>    
            </td>
            <td><?php
                echo $form->dropDownListRow($model, 'credito_porcentaje', array(
                    '0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10',
                    '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20',
                    '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30',
                    '31' => '31', '32' => '32', '33' => '33', '34' => '34', '35' => '35', '36' => '36', '37' => '37', '38' => '38', '39' => '39', '40' => '40',
                    '41' => '41', '42' => '42', '43' => '43', '44' => '44', '45' => '45', '46' => '46', '47' => '47', '48' => '48', '49' => '49', '50' => '50',
                     '51' => '51', '52' => '52', '53' => '53', '54' => '54', '55' => '55', '56' => '56', '57' => '57', '58' => '58', '59' => '59', '60' => '60',
                     '61' => '61', '62' => '62', '63' => '63', '64' => '64', '65' => '65', '66' => '66', '67' => '67', '68' => '68', '69' => '69', '70' => '70',
                     '71' => '71', '72' => '72', '73' => '73', '74' => '74', '75' => '75', '76' => '76', '77' => '77', '78' => '78', '79' => '79', '80' => '80',
                     '81' => '81', '82' => '82', '83' => '83', '84' => '84', '85' => '85', '86' => '86', '87' => '87', '88' => '88', '89' => '89', '90' => '90',
                     '91' => '91', '92' => '92', '93' => '93', '94' => '94', '95' => '95', '96' => '96', '97' => '97', '98' => '98', '99' => '99', '100' => '100'
                    
                        ), array('class' => 'span1', 'maxlength' => 30)) . ' <b>%</b>'
                ?> </td>
        </tr>
        <tr>
          
            <td> <?php echo $form->textFieldRow($model, 'prec_ven_contado', array('class' => 'span2', 'maxlength' => 7)) ?> </td>
            <td> <?php echo $form->textFieldRow($model, 'prec_ven_credito', array('class' => 'span2', 'maxlength' => 7)) ?> </td>
        </tr>
    </table>

    <?php echo $form->textFieldRow($model, 'stock', array('class' => 'span2')) ?>
    <?php //echo $form->textFieldRow($model, 'reservados', array('class' => 'span2'))  ?>

    <?php //echo $form->textFieldRow($model, 'fech_exp', array('prepend' => '<i class="icon-calendar"></i>')) ?>
    <?php
    /* echo $form->labelEx($model, 'fech_exp');
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'fech_exp',
        'model' => $model,
        'attribute' => 'fech_exp',
        'language' => 'es',
        'htmlOptions' => array('class' => 'span2'), //'htmlOptions' => array('readonly' => "readonly", 'class' => 'span3'),
        'options' => array(
            'autoSize' => true,
            'dateFormat' => 'yy-mm-dd',
            'buttonImage' => Yii::app()->baseUrl . '/images/pagina/calendar1.png',
            'buttonImageOnly' => true,
            'buttonText' => 'SELECCIONAR FECHA DE EXPEDICIÓN O ELABORACIÓN',
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
    <?php echo $form->error($model, 'fech_exp'); ?>
    <?php //echo $form->textFieldRow($model, 'fech_cad', array('prepend' => '<i class="icon-calendar"></i>')) ?>
    <?php
    echo $form->labelEx($model, 'fech_cad');
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'fech_cad',
        'model' => $model,
        'attribute' => 'fech_cad',
        'language' => 'es',
        'htmlOptions' => array('class' => 'span2'), //'htmlOptions' => array('readonly' => "readonly", 'class' => 'span3'),
        'options' => array(
            'autoSize' => true,
            'dateFormat' => 'yy-mm-dd',
            'buttonImage' => Yii::app()->baseUrl . '/images/pagina/calendar1.png',
            'buttonImageOnly' => true,
            'buttonText' => 'SELECCIONAR FECHA DE CADUCIDAD',
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
    <?php echo $form->error($model, 'fech_cad'); ?>
    <?php //echo $form->textFieldRow($model, 'fech_com', array('prepend' => '<i class="icon-calendar"></i>')) ?>
    <?php /*
    echo $form->labelEx($model, 'fech_com');
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'fech_com',
        'model' => $model,
        'attribute' => 'fech_com',
        'language' => 'es',
        'htmlOptions' => array('class' => 'span2'), //'htmlOptions' => array('readonly' => "readonly", 'class' => 'span3'),
        'options' => array(
            'autoSize' => true,
            'dateFormat' => 'yy-mm-dd',
            'buttonImage' => Yii::app()->baseUrl . '/images/pagina/calendar1.png',
            'buttonImageOnly' => true,
            'buttonText' => 'SELECCIONAR FECHA DE EXPEDICIÓN O ELABORACIÓN',
            'selectOtherMonths' => true,
            'showAnim' => 'slide',
            'showButtonPanel' => true,
            'showOn' => 'button',
            'showOtherMonths' => true,
            'changeMonth' => 'true',
            'changeYear' => 'true',
        ),
            )
    ); */
    ?>
    <?php echo $form->error($model, 'fech_com'); ?>
    <?php echo $form->textAreaRow($model, 'descripcion', array('class' => 'span5', 'maxlength' => 500)) ?>
    <?php // echo $form->textFieldRow($model, 'fecha', array('class' => 'span5')) ?>
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
            'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>
</div>