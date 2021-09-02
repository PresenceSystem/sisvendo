<?php
/** @var TContratoController $this */
/** @var TContrato $model */
$this->breadcrumbs = array(
    'Contratos' => array('index'),
    $model->numero,
);

//$this->menu=array(
//    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . TContrato::label(2), 'icon' => 'list', 'url' => array('index')),
////    array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . TContrato::label(), 'icon' => 'plus', 'url' => array('create')),
////	array('label' => Yii::t('AweCrud.app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->numero)),
////    array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->numero), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?'))),
////    array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
//	array('label' => Yii::t('AweCrud.app', 'PDF'), 'icon' => 'pencil', 'url' => array('pdf', 'id' => $model->numero)),
//);
?>

<fieldset class="span-22">
    <legend><?php //echo Yii::t('AweCrud.app', 'View') . ' ' . TContrato::label();          ?> <?php //echo CHtml::encode($model)          ?></legend>


    <?php /*
      <div class="fondoColor">
      <?php
      //        $this->widget('bootstrap.widgets.TbDetailView', array(
      //            'data' => $model,
      //            'attributes' => array(
      //               // 'numero',
      //                'lugar',
      //                'fecha_creacion',
      //                array(
      //                    'name' => 'id_deudor',
      //                    'value' => ($model->idDeudor !== null) ? CHtml::encode($model->idDeudor, array('/tPersona/view', 'ci' => $model->idDeudor->ci)) . ' ' : null,
      //                    'type' => 'html',
      //                ),
      //                array(
      //                    'name' => 'id_formaPago',
      //                    'value' => ($model->idFormaPago !== null) ? CHtml::encode($model->idFormaPago, array('/tFormaPago/view', 'id_formapago' => $model->idFormaPago->id_formapago)) . ' ' : null,
      //                    'type' => 'html',
      //                ),
      //                array(
      //                    'name' => 'id_lugarCobro',
      //                    'value' => ($model->idLugarCobro !== null) ? CHtml::encode($model->idLugarCobro, array('/tLugarCobro/view', 'id_lugar' => $model->idLugarCobro->id_lugar)) . ' ' : null,
      //                    'type' => 'html',
      //                ),
      //             //   'id_empresa',
      //             //   'total',
      //             //   'cuota_inicial',
      //             //   'saldo',
      //             //   'valor_cuota',
      //             //   'cantidad_cuotas',
      //              //  'fecha',
      //              //  'id_usuario',
      //            ),
      //        ));
      ?>
     * 
     */ ?>

    <div class="fondoColor">
        <?php echo "<center><h4>Contrato a crédito N°: " . CHtml::encode($model->numero) . "</h4></center>"; ?>

        <table>
            <tr>
                <td><h4>Lugar: </h4></td>
                <td><?php echo CHtml::encode($model->lugar); ?> </td>
                <td><h4>Fecha: </h4></td>
                <td><?php echo CHtml::encode($model->fecha_creacion); ?></td>
            </tr>
        </table> 
    </div>
    <div class="fondoColor">
        <table class="table table-bordered table-condensed"> 
            <thead><h4 class="text-center panel-title alert-success">1. DATOS DEL SOLICITANTE (DEUDOR)</h4></thead>        
            <tbody>
                <tr>
                    <td><?php echo "<b>Nombres y Apellidos: </b>" . CHtml::encode($model->idDeudor->nombre, array('/tPersona/update', 'id' => $model->idDeudor->ci)) . "</td><td><b> CI: </b>" . CHtml::encode($model->idDeudor->ci); ?></td>
                </tr>
                <tr>
                    <td><?php echo "<b>Domicilio: </b>" . CHtml::encode($model->idDeudor->direccion) . "</td><td><b> Referencia: </b>" . CHtml::encode($model->idDeudor->referencia); ?></td>
                </tr>
                <tr>
                    <td><?php echo "<b>Teléfono: </b>" . CHtml::encode($model->idDeudor->telefono) . "</td><td><b> Celular: </b>" . CHtml::encode($model->idDeudor->celular); ?></td>
                </tr>
                ...
            </tbody>
        </table>
    </div>

    <?php /*
      <div class="fondoColor">
      <table class="table table-bordered table-condensed">
      <thead><h4 class="text-center panel-title alert-success">2. DATOS DEL GARANTE</h4></thead>
      <tbody>
      <?php
      $garantes = TContratoGarante::model()->findAllBySql(''
      . 'SELECT * FROM `tContratoGarante` WHERE `numero_contrato` =' . CHtml::encode($model->numero));
      //$modelo_deudor->
      $contador_garantes = 1;
      foreach ($garantes as $gar) {
      // IMPRIMIR DATOS DEL GARANTE
      ?>
      <tr>
      <td colspan="2" class="alert-info">
      <center><?php echo 'GARANTE N°. ' . $contador_garantes++; ?></center>
      </td>
      </tr>
      <tr>
      <td><?php echo "<b>Nombres y Apellidos: </b>" . CHtml::encode($gar->idGarante->nombre) . "</td><td><b> CI: </b>" . CHtml::encode($gar->idGarante->ci); ?></td>
      </tr>
      <tr>
      <td><?php echo "<b>Domicilio: </b>" . CHtml::encode($gar->idGarante->direccion) . "</td><td><b> Referencia: </b>" . CHtml::encode($gar->idGarante->referencia); ?></td>
      </tr>
      <tr>
      <td><?php echo "<b>Teléfono: </b>" . CHtml::encode($gar->idGarante->telefono) . "</td><td><b> Celular: </b>" . CHtml::encode($gar->idGarante->celular); ?></td>
      </tr>
      <tr>
      <td><?php echo "<b>Lugar de trabajo: </b>" . CHtml::encode($gar->idGarante->trabajo) . "</td><td><b> Cargo: </b>" . CHtml::encode($gar->idGarante->cargo); ?></td>
      </tr>
      <tr>
      <td><?php echo "<b> Tiempo: </b>" . CHtml::encode($gar->idGarante->tiempo) . "</td><td><b> Sueldo: </b>" . CHtml::encode($gar->idGarante->sueldo); ?></td>
      </tr>
      <tr>
      <td colspan="2"><?php echo "<b>Dirección del trabajo: </b>" . CHtml::encode($gar->idGarante->dir_trabajo); ?></td>
      </tr>
      <tr>
      <td><?php echo "<b> Teléfono: </b>" . CHtml::encode($gar->idGarante->tel_trabajo) . "</td><td><b> Celular: </b>" . CHtml::encode($gar->idGarante->celular); ?></td>
      </tr>
      <tr>
      <td><?php echo "<b>Nombres y Apellidos del Cónyuge: </b>" . CHtml::encode($gar->idGarante->nombre_cony) . "</td><td><b> CI: </b>" . CHtml::encode($gar->idGarante->ci_cony); ?></td>
      </tr>
      <tr>
      <td><?php echo "<b>Lugar de trabajo del Cónyugue: </b>" . CHtml::encode($gar->idGarante->trabajo_cony) . "</td><td><b> Cargo: </b>" . CHtml::encode($gar->idGarante->cargo_cony); ?></td>
      </tr>
      <tr>
      <td><?php echo "<b> Tiempo: </b>" . CHtml::encode($gar->idGarante->tiempo_cony) . "</td><td><b> Sueldo: </b>" . CHtml::encode($gar->idGarante->sueldo_cony); ?></td>
      </tr>
      <tr>
      <?PHP
      //FIN DE IMPRIMIR DATOS DEL GARANTE
      }
      ?>

      <tr>
      <td colspan="2">
      <?php
      <!--@@@@@@@@@@@@@@@@@@@@@@@qq-->

      <?php
      $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
      'id' => 'mymodalBuscar',
      'options' => array(
      'title' => 'Buscar Garante',
      'width' => 560,
      'height' => 370,
      'autoOpen' => false,
      'resizable' => 'true',
      'modal' => 'true',
      'overlay' => array(
      'backgroundColor' => '#000',
      'opacity' => '0.3'
      ),
      ),
      ));

      echo $this->renderPartial('/tContratoGarante/_form_flotante', array(
      'model' => $model_contrato_garante
      ));
      $this->endWidget('zii.widgets.jui.CJuiDialog');
      ?>
      <br> </br>

      <?php echo CHtml::link('Buscar garante', '', array('onclick' => '$("#mymodalBuscar").dialog("open");return false;')); ?>
      <!--Fin añadir nuevo garante-->

      <!--Añadir nuevo garante-->
      <?php
      $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
      'id' => 'mymodal',
      'options' => array(
      'title' => 'Ingresar Garante',
      'width' => 700,
      'height' => 1200,
      'autoOpen' => false,
      'resizable' => 'true',
      'modal' => 'true',
      'overlay' => array(
      'backgroundColor' => '#000',
      'opacity' => '0.3'
      ),
      ),
      ));
      echo "  no c q poner";
      echo $this->renderPartial('/tPersona/_form_flotante', array(
      'model' => $model_garante
      ));
      $this->endWidget('zii.widgets.jui.CJuiDialog');
      ?>


      <br> </br>

      <?php echo CHtml::link('Ingresar nuevo garante', '', array('onclick' => '$("#mymodal").dialog("open");return false;')); ?>
      <!--Fin añadir nuevo garante-->


      </td>
      </tr>
      </tbody>
      </table>
      </div>
      <?php */ ?>

    <div class="fondoColor">
        <table class="table table-bordered table-condensed"> 
            <thead><h4 class="text-center panel-title alert-success">3. ARTICULO(S) SOLICITADO(S)</h4></thead>
            <tbody>
                <tr>
                    <td><h5 class="text-center panel-title alert-info">N°. </h5></td>
                    <td><h5 class="text-center panel-title alert-info">ARTICULO</h5></td>
<!--                    <td><h5 class="text-center panel-title alert-info">MARCA</h5></td>
                    <td><h5 class="text-center panel-title alert-info">MODELO</h5></td>
                    <td><h5 class="text-center panel-title alert-info">DETALLE/OBSERVACIÓN</h5></td>-->
                    <td><h5 class="text-center panel-title alert-info">CANTIDAD</h5></td>
                    <td><h5 class="text-center panel-title alert-info">V/UNITARIO</h5></td>
                    <td><h5 class="text-center panel-title alert-info">V/TOTAL</h5></td>
                </tr>
                <!--LECTURA ARTICULOS AGREGADOS-->
                <?php
                $articulos = TContratoArticulo::model()->findAllBySql(''
                        . 'SELECT * FROM `tContratoArticulo` WHERE `numero_contrato` = ' . CHtml::encode($model->numero));
                $contador_articulos = 1;
                $suma = 0;
                foreach ($articulos as $arti) {
                    echo '<tr>';
                    echo '<td>' . $contador_articulos++ . '</td>';
                    // echo '<td>' . $arti->idArticulo->nombre . '</td>';
                    echo '<td>' . CHtml::link($arti->idArticulo->nombre, array('tContratoArticulo/update/',
                        'id' => $arti->id_detalle)) . '</td>';
//                    echo '<td>' . $arti->idArticulo->idMarca->marca . '</td>';
//                    echo '<td>' . $arti->idArticulo->modelo . '</td>';
//                    echo '<td>' . $arti->observacion . '</td>';
                    echo '<td>' . $arti->cantidad . '</td>';
                    echo '<td>' . $arti->precio . '</td>';
                    $suma = $suma + $arti->precio * $arti->cantidad;
                    echo '<td>' . $arti->precio * $arti->cantidad . '</td>';
                    echo '</tr>';
                }
                ?>
                <!--FIN LECTURA DE ARTICULOS AGREGADOS-->
                <!--Añadir nuevo garante-->
                <?php
//                $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
//                    'id' => 'mymodal_articulo',
//                    'options' => array(
//                        'title' => 'Ingresar Artículo',
//                        'width' => 700,
//                        'height' => 600,
//                        'autoOpen' => false,
//                        'resizable' => 'true',
//                        'modal' => 'true',
//                        'overlay' => array(
//                            'backgroundColor' => '#000',
//                            'opacity' => '0.3'
//                        ),
//                    ),
//                ));
//
//                echo $this->renderPartial('/tContratoArticulo/_form_flotante', array(
//                    'model' => $model_contrato_articulo
//                ));
//                $this->endWidget('zii.widgets.jui.CJuiDialog');
                ?>
                <tr>
                    <td colspan="4" class="alert-danger">
                        TOTAL:
                    </td>
                    <td class="alert-danger">
                        <?php echo $suma; ?>
                    </td>
                </tr> 
                <tr>                   
                </tr>       
            </tbody> 
        </table>
    </div>

    <div class="fondoColor">
        <?php //  echo 'El contrato fue creado el: ' . $model->fecha_creacion; ?>
        <table class="table table-bordered table-condensed"> 
            <thead><h4 class="text-center panel-title alert-success">4. FORMA DE PAGO</h4></thead>
            <tbody>
                <tr>
                    <td><b>TOTAL: $ </b> 
                    </td>
                    <td>
                        <?php
//                        echo CHtml::link($model->total, array('tContrato/actualizar/',
//                            'id' => $model->numero));
                        echo CHtml::encode($model->total);
                        ?> 
                    </td>
                </tr>
                <tr>
                    <td> 
                        <b>CUOTA INICIAL: $ </b> 
                    </td>
                    <td>
                        <?php echo CHtml::encode($model->cuota_inicial); ?> 
                    </td>
                </tr>
                <tr>
                    <td><b>SALDO: $ </b></td><td> <?php echo CHtml::encode($model->saldo); ?> </td>
                </tr>
                <tr>
                    <td><b>NÚMERO DE CUOTAS: </b></td><td> <?php echo CHtml::encode($model->cantidad_cuotas); ?> </td>
                </tr>
                <tr>
                    <td><b>FORMA DE PAGO: </b></td><td> <?php echo CHtml::encode($model->idFormaPago->forma_pago); ?> </td>
                </tr>
                <tr>
                    <td><b>LUGAR DE COBRO: </b></td><td> <?php echo CHtml::encode($model->idLugarCobro->descripcion); ?> </td>
                </tr>
                <tr>
                    <td>
                        <b>VALOR DE CUOTA: </b>
                    </td>
                    <td>
                        <?php echo CHtml::encode($model->valor_cuota); ?>
                    </td>
                </tr>
                <tr>   
                    <td>
                        <b>FECHAS DE PAGO: </b>
                    </td>
                    <td>
                        <?php
//                        $fecha = $model->fecha_creacion;
//                        if ($model->id_formaPago == 2) { //Quincenal
//                            $fecha->add(new DateInterval('P15D'));
//                        };
//                        if ($model->id_formaPago == 1) { //Semanal
//                            $fecha->add(new DateInterval('P7D'));
//                        };
//                        if ($model->id_formaPago == 3) { //Mensual
//                            $intervalo = new DateInterval('P1M');
//                            $fecha->add($intervalo);
//                        };
//
//                        echo $fecha->format('Y-m-d') . "\n";

                        $hoy = date("Y-m-d");
                        $fecha = new DateTime($model->fecha_creacion);
                        $fecha_aux = new DateTime($model->fecha_creacion);
                        $Cont = 0;
                        $bandera = 0;
                        $valor_deuda = 0;
                        $valor_deuda_aux = 0;
                        do {
                            $valor_deuda_aux = $valor_deuda_aux + $model->valor_cuota;
                            if ($model->id_formaPago == 2) { //Quincenal
                                $fecha->add(new DateInterval('P15D'));
                            };
                            if ($model->id_formaPago == 1) { //Semanal
                                $fecha->add(new DateInterval('P7D'));
                            };
                            if ($model->id_formaPago == 3) { //Mensual
                                $intervalo = new DateInterval('P1M');
                                $fecha->add($intervalo);
                            };
                            $model_cuota->fecha_creacion = $fecha->format('Y-m-d');
                            $Cont++;
                            echo 'Cuota N°. ' . $Cont . ': ' . $model_cuota->fecha_creacion . '<br>';
                            if ($model_cuota->fecha_creacion >= $hoy and $bandera === 0) {
//                                 echo $fecha_aux.' < '.$hoy . ' and '. $model_cuota->fecha_creacion.' > '.$hoy;
                                $fecha_aux = new DateTime($model_cuota->fecha_creacion);
                                $bandera = 1;
                                $valor_deuda = $valor_deuda_aux;
                            } else {
                                
                            }
                        } while ($Cont < $model->cantidad_cuotas);
                        // echo $model_cuota->fecha_creacion;
                        ?> 
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="fondoColor">
        <table class="table table-bordered table-condensed"> 
            <thead><h4 class="text-center panel-title alert-success">COBROS</h4></thead>
            <tbody>
                <tr>
                    <td><h5 class="text-center panel-title alert-info">N°. </h5></td>
                    <td><h5 class="text-center panel-title alert-info">FECHA</h5></td>
                    <!--<td><h5 class="text-center panel-title alert-info">SALDO INICIAL</h5></td>-->
                    <td><h5 class="text-center panel-title alert-info">ABONO</h5></td>
                    <td><h5 class="text-center panel-title alert-info">RECARGO PARA EL PROXIMO MES</h5></td>
                    <td><h5 class="text-center panel-title alert-info">SALDO FINAL</h5></td>
                    <td><h5 class="text-center panel-title alert-info">OBSERVACIONES</h5></td>
                    <td><h5 class="text-center panel-title alert-info">EDITAR</h5></td>
                </tr>

                <!--LECTURA ARTICULOS AGREGADOS-->
                <?php
                $cuotas = TCuota::model()->findAllBySql(''
                        . 'SELECT * FROM `tCuota` WHERE `numero_contrato` = ' . CHtml::encode($model->numero) . ';');
                $contador_cuotas = 1;
                $suma = 0;
                $cantidad_datos = count($cuotas);
                $contador_datos = 1;
                //echo 'ESTAN= '.$cantidad_datos;
                foreach ($cuotas as $cuo) {
                    echo '<tr>';
                    echo '<td>' . $contador_cuotas++ . '</td>';
                    echo '<td>' . $cuo->fecha_creacion . '</td>';
                    $saldo_inicial = $cuo->saldo + $cuo->abono;
                    //echo '<td>' . $saldo_inicial ."aqui". '</td>';
                    echo '<td>' . $cuo->abono . '</td>';
                    $valor_deuda = $valor_deuda - $cuo->abono;
                    $valor_que_debe_pago = round($model->valor_cuota - $cuo->abono, 2);
                    if ($valor_que_debe_pago == null or $valor_que_debe_pago < 0) {
                        $valor_que_debe_pago = 0;
                    }
                    echo '<td>' . $valor_que_debe_pago . '</td>';
                    //if ($valor_deuda > 0) {
                         echo '<td>' . $cuo->saldo . '</td>';
//                    }
//                    else
//                    {
//                        echo '<td>0</td>';
//                    };
                    
                    echo '<td>' . $cuo->observacion . '</td>';
                    $id_usuario=Yii::app()->user->id;
                    $date = new DateTime($cuo->fecha_creacion);  
                    if ( ($cantidad_datos == $contador_datos and !Yii::app()->user->isGuest && Usuario::model()->findByPk(Yii::app()->user->id)->esAdministradorEmpresario())
                         or ($cantidad_datos == $contador_datos and $cuo->id_usuario == $id_usuario and $date->format('Y-m-d') == $hoy)
                        ) {
                        $imghtml = CHtml::image(Yii::app()->baseUrl . "/images/pagina/iconos/editar_40x40.png");
                        echo '<td><center>' . CHtml::link($imghtml, array('tCuota/update', 'id' => $cuo->id_cuota)) . '</td></center>';
                    } else {

                        echo '<td><center>' . '</td></center>';
                    }
                    $contador_datos = $contador_datos + 1;
                    echo '</tr>';
                }
                ?>
                <!--FIN LECTURA DE ARTICULOS AGREGADOS-->
            </tbody>
        </table>

        <marquee direction="up" behavior="alternate" scrolldelay="300">  
            <center>
                <h3 class="alert-danger">
<?php
if ($valor_deuda < 0) {
    $valor_deuda = 0;
}
?>
                    <?php if ($valor_deuda != 0) {?>
                    El próximo pago es de <?php echo $valor_deuda; ?> USD , debe realizar antes del: <?php echo $fecha_aux->format('Y-m-d'); ?> 
                    <?php }; ?>
                </h3> 
            </center>
        </marquee>
        <!--Añadir nueva cuota-->

<?php
//Agregar datos de proxima cuota
$model_cuota->fecha_creacion = $fecha_aux->format('Y-m-d');
$model_cuota->abono = $model->valor_cuota;
$model_cuota->saldo = $model->saldo;
//            $model_cuota->observacion = $model->saldo;
//            echo $model->saldo;
// Agregar datos de proxima cuota

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'mymodal_cuota',
    'options' => array(
        'title' => 'Ingresar Cuota',
        'width' => 600,
        'height' => 500,
        'autoOpen' => false,
        'resizable' => 'true',
        'modal' => 'true',
        'overlay' => array(
            'backgroundColor' => '#000',
            'opacity' => '0.3'
        ),
    ),
));

echo $this->renderPartial('/tCuota/_form_flotante_cobrador', array(
    'model' => $model_cuota
));
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

        <!--<br><br><br>-->
        <?php echo CHtml::button('Añadir nueva cuota', array('onclick' => '$("#mymodal_cuota").dialog("open");return false;'));
        ?>
        <!--Fin añadir nueva cuota-->
    </div>

        <?php
//$this->widget('bootstrap.widgets.TbButton',array(
//    'buttonType'=>'link',
//    'icon' => 'icon-user icon-white',
//    'type'=>'info',
//    'label'=>'COBRAR',
//    'url'=>'javascript:switchChat();',
//    'id'=>'chatPopup'
//    )); 
        ?>