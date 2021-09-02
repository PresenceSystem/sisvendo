<?php
/** @var TContratoController $this */
/** @var TContrato $data */
?>
<!--<div class="view">-->
    <?php
    $hoy = date("Y-m-d");
    $fecha = new DateTime($data->fecha_creacion);
    $fecha_aux = new DateTime($data->fecha_creacion);
    $Cont = 0;
    $bandera = 0;
    $valor_deuda = 0;
    $valor_deuda_aux = 0;
    $cantidad_meses = 0;
    do {
        $valor_deuda_aux = $valor_deuda_aux + $data->valor_cuota;
        if ($data->id_formaPago == 2) { //Quincenal
            $fecha->add(new DateInterval('P15D'));
        };
        if ($data->id_formaPago == 1) { //Semanal
            $fecha->add(new DateInterval('P7D'));
        };
        if ($data->id_formaPago == 3) { //Mensual
            $intervalo = new DateInterval('P1M');
            $fecha->add($intervalo);
        };
        $fecha_cuota = $fecha->format('Y-m-d');
        $Cont++;
        // echo 'Cuota N°. ' . $Cont . ': ' . $fecha_cuota . '<br>';
        if ($fecha_cuota >= $hoy and $bandera === 0) {
//                                 echo $fecha_aux.' < '.$hoy . ' and '. $fecha_cuota.' > '.$hoy;
            $fecha_aux = new DateTime($fecha_cuota);
            $bandera = 1;
            $valor_deuda = $valor_deuda_aux;
            $cantidad_meses = $Cont;
        } else {
            
        }
    } while ($Cont < $data->cantidad_cuotas);
    // echo $fecha_cuota;
    ?> 

    <!--LECTURA CUOTAS-->
    <?php
    $cuotas = TCuota::model()->findAllBySql(''
            . 'SELECT * FROM `tCuota` WHERE `numero_contrato` = ' . CHtml::encode($data->numero) . ';');
    $contador_cuotas = 1;
    $suma = 0;
    $cantidad_datos = count($cuotas);
    $contador_datos = 1;
    //echo 'ESTAN= '.$cantidad_datos;
    foreach ($cuotas as $cuo) {
//                    echo '<tr>';
//                    echo '<td>' . $contador_cuotas++ . '</td>';
//                    echo '<td>' . $cuo->fecha_creacion . '</td>';
        $saldo_inicial = $cuo->saldo + $cuo->abono;
//                    echo '<td>' . $saldo_inicial . '</td>';                     
//                    echo '<td>' . $cuo->abono . '</td>';   
        $valor_deuda = $valor_deuda - $cuo->abono;
        $valor_que_debe_pago = $data->valor_cuota - $cuo->abono;
        if ($valor_que_debe_pago == null) {
            $valor_que_debe_pago = 0;
        }
//                    echo '<td>' . $valor_que_debe_pago . '</td>'; 
//                    echo '<td>' . $cuo->saldo . '</td>';  
        if ($cantidad_datos == $contador_datos) {
            $imghtml = CHtml::image(Yii::app()->baseUrl . "/images/pagina/iconos/editar_40x40.png");
//                    echo '<td><center>'.CHtml::link($imghtml, array('tCuota/update', 'id'=>$cuo->id_cuota)).'</td></center>';
        } else {

//                            echo '<td><center>'.'</td></center>';
        }
        $contador_datos = $contador_datos + 1;
//                    echo '</tr>'; 
    }
    ?>
    <!--FIN LECTURA DE CUOTAS-->

    <?php
    if ($valor_deuda > 0) {
        ?>

        <table class="table table-bordered table-condensed">       
            <tr>
                <td width="400px">
                    <?php echo $data->idDeudor->nombre; ?>
                </td>
                <td width="400px">
                    <?php echo $data->idDeudor->ci; ?>
                </td>
                 <td width="400px">
                    <?php echo $data->idDeudor->direccion; ?>
                </td>
                <td width="400px">
                    <?php echo $data->idDeudor->telefono.' / '.$data->idDeudor->celular; ?>
                </td>
                <td width="400px">
                    <?php echo $cantidad_meses - 1; ?>
                </td>
                <td width="400px">
                    <?php echo $valor_deuda; ?>
                </td>

            </tr>
        </table>
        <?php
    };
    ?>
    <?php /* if (!empty($data->lugar)): ?>
      <div class="field">
      <div class="field_name">
      <b><?php echo CHtml::encode($data->getAttributeLabel('lugar')); ?>:</b>
      </div>
      <div class="field_value">
      <?php echo CHtml::encode($data->lugar); ?>
      </div>
      </div>

      <?php endif; ?>

      <?php if (!empty($data->fecha_creacion)): ?>
      <div class="field">
      <div class="field_name">
      <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
      </div>
      <div class="field_value">
      <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->fecha_creacion, 'medium', 'medium'); ?>
      <br/>
      <?php echo date('D, d M y H:i:s', strtotime($data->fecha_creacion)); ?>
      </div>
      </div>

      <?php endif; ?>

      <?php if (!empty($data->idDeudor->nombre)): ?>
      <div class="field">
      <div class="field_name">
      <b><?php echo CHtml::encode($data->getAttributeLabel('id_deudor')); ?>:</b>
      </div>
      <div class="field_value">
      <?php echo CHtml::encode($data->idDeudor->nombre); ?>
      </div>
      </div>

      <?php endif; ?>

      <?php if (!empty($data->idFormaPago->forma_pago)): ?>
      <div class="field">
      <div class="field_name">
      <b><?php echo CHtml::encode($data->getAttributeLabel('id_formaPago')); ?>:</b>
      </div>
      <div class="field_value">
      <?php echo CHtml::encode($data->idFormaPago->forma_pago); ?>
      </div>
      </div>

      <?php endif; ?>

      <?php if (!empty($data->idLugarCobro->descripcion)): ?>
      <div class="field">
      <div class="field_name">
      <b><?php echo CHtml::encode($data->getAttributeLabel('id_lugarCobro')); ?>:</b>
      </div>
      <div class="field_value">
      <?php echo CHtml::encode($data->idLugarCobro->descripcion); ?>
      </div>
      </div>

      <?php endif; ?>

      <?php if (!empty($data->id_empresa)): ?>
      <div class="field">
      <div class="field_name">
      <b><?php echo CHtml::encode($data->getAttributeLabel('id_empresa')); ?>:</b>
      </div>
      <div class="field_value">
      <?php echo CHtml::encode($data->id_empresa); ?>
      </div>
      </div>

      <?php endif; ?>

      <?php if (!empty($data->total)): ?>
      <div class="field">
      <div class="field_name">
      <b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
      </div>
      <div class="field_value">
      <?php echo CHtml::encode($data->total); ?>
      </div>
      </div>

      <?php endif; ?>

      <?php if (!empty($data->cuota_inicial)): ?>
      <div class="field">
      <div class="field_name">
      <b><?php echo CHtml::encode($data->getAttributeLabel('cuota_inicial')); ?>:</b>
      </div>
      <div class="field_value">
      <?php echo CHtml::encode($data->cuota_inicial); ?>
      </div>
      </div>

      <?php endif; ?>

      <?php if (!empty($data->saldo)): ?>
      <div class="field">
      <div class="field_name">
      <b><?php echo CHtml::encode($data->getAttributeLabel('saldo')); ?>:</b>
      </div>
      <div class="field_value">
      <?php echo CHtml::encode($data->saldo); ?>
      </div>
      </div>

      <?php endif; ?>

      <?php if (!empty($data->valor_cuota)): ?>
      <div class="field">
      <div class="field_name">
      <b><?php echo CHtml::encode($data->getAttributeLabel('valor_cuota')); ?>:</b>
      </div>
      <div class="field_value">
      <?php echo CHtml::encode($data->valor_cuota); ?>
      </div>
      </div>

      <?php endif; ?>

      <?php if (!empty($data->cantidad_cuotas)): ?>
      <div class="field">
      <div class="field_name">
      <b><?php echo CHtml::encode($data->getAttributeLabel('cantidad_cuotas')); ?>:</b>
      </div>
      <div class="field_value">
      <?php echo CHtml::encode($data->cantidad_cuotas); ?>
      </div>
      </div>

      <?php endif; ?>

      <?php if (!empty($data->fecha)): ?>
      <div class="field">
      <div class="field_name">
      <b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
      </div>
      <div class="field_value">
      <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->fecha, 'medium', 'medium'); ?>
      <br/>
      <?php echo date('D, d M y H:i:s', strtotime($data->fecha)); ?>
      </div>
      </div>

      <?php endif; ?>

      <?php if (!empty($data->id_usuario)): ?>
      <div class="field">
      <div class="field_name">
      <b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
      </div>
      <div class="field_value">
      <?php echo CHtml::encode($data->id_usuario); ?>
      </div>
      </div>

      <?php endif; */ ?>
<!--</div>-->