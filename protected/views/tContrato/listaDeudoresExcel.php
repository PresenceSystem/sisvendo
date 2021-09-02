<?php
header('Content-Type: text/html; charset=ISO-8859-1');
/** @var TContratoController $this */
/** @var TContrato $model */
$this->breadcrumbs = array(
    'Contratos',
);

//$this->menu = array(
//    array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . TContrato::label(), 'icon' => 'plus', 'url' => array('create')),
//    array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
//);
?>
<!--<div class=" span-24">
    <fieldset>
        <legend>
<?php // echo Yii::t('AweCrud.app', 'Deudores') ?> <?php // echo TContrato::label(2) ?>    </legend>-->
<!--<div class="span-24">-->
    <h2 class="alert-danger text-center span10">CLIENTES MOROSOS </h2>
    <table  width="100%" border="1px" style="text-align:right;"> 
        <tr class="alert-success">
            <td >
                N.
            </td>
            <td  WIDTH="30%">
                NOMBRE
            </td>
            <td>
                DIRECCION
            </td>
            <td>
                CIUDAD
            </td>
            <td>
                TELEFONO/CELULAR
            </td>            
            <td>
                CONTRATO
            </td>
            <td>
                FECHA DE VENTA
            </td>
            <td>
                VALOR TOTAL
            </td>
            <td>
                SALDO
            </td>
<!--            <td>
                VALOR C/CUOTA
            </td>-->
            <td>
                CANTIDAD VENCIDA
            </td>
<!--            <td class="alert-danger">
                PROXIMO PAGO
            </td>-->


        </tr>
        <?php
        $connection = Yii::app()->db;
        $sql = 'SELECT  
                    cont.numero as numero,
                    pers.nombre AS A,  
                    pers.direccion AS B,
                    cont.`lugar` AS C,  
                    pers.`telefono` AS D,  
                    pers.`celular` AS I, 
                      CONCAT("NUM: ",cont.numero) AS E,  
                      cont.`fecha_creacion` AS F,
                    cont.`total` AS G,  
                    cont.`saldo` AS H
                  
                  FROM `tContrato` AS cont
                  INNER JOIN `tPersona` AS pers
                  ON pers.ci = cont.`id_deudor` 
                  where cont.saldo>0
                  order by cont.lugar, pers.nombre';
        $command = $connection->createCommand($sql);
        $rows = $command->execute();
        $rows = $command->queryAll();
        $contador = 1;
        $suma_saldo = 0;
        $suma_morosos = 0;
        foreach ($rows as $row) {
            /*             * ******************CALCULOS NECESARIOS************************ */
            //1.  CREAR CONTRATO DE CADA UNO QUE RETORNA PARA USAR EN LOS CALCULOS SIGUIENTES
            //$model=$model_cuota = TTransporte::model()->findAllBySql('');
            $numero_de_contrato = $row['numero'];
            $model = TContrato::model()->findByPk($numero_de_contrato);
            /* 2. CREADO PARA CALCULAR TABLA DE PAGOS */
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
                $model->fecha_creacion = $fecha->format('Y-m-d');
                $Cont++;
                // echo 'Cuota N°. ' . $Cont . ': ' . $model->fecha_creacion . '<br>';
                if ($model->fecha_creacion >= $hoy and $bandera === 0) {
                    //echo $fecha_aux.' < '.$hoy . ' and '. $model->fecha_creacion.' > '.$hoy;
                    $fecha_aux = new DateTime($model->fecha_creacion);
                    $bandera = 1;
                    $valor_deuda = $valor_deuda_aux;
                } else {
                    
                }
            } while ($Cont < $model->cantidad_cuotas);
            /* FIN CREADO PARA CALCULAR TABLA DE PAGOS */
            /* 4. Menoro las cuotas depositadas */
            $model_cuota = TCuota::model()->findAllBySql('SELECT * FROM `tCuota` where numero_contrato=' . $numero_de_contrato);
            $suma_de_cuotas = 0;
            foreach ($model_cuota as $cuota) {
                $suma_de_cuotas = $suma_de_cuotas + $cuota->abono;
            }
            $deuda = $valor_deuda - $suma_de_cuotas;
            /* Fin de 4 */
            /*             * ********* FIN DE CALCULOS NECESARIOS ************************ */
            $moroso_con = $deuda - $model->valor_cuota;
            if ($moroso_con >= $model->valor_cuota) { //esta en deuda
                echo '<tr class="">';
                echo '<td class="">' . $contador++ . '</td>';
                foreach (range('A', 'H') as $letra) {
                    
                    if ($letra == 'H') {
                        $suma_saldo = $suma_saldo + $row[$letra];
                    }
                    if ($letra=='F')
                    {
                        
                        setlocale(LC_TIME,"spanish"); 
                    //$hoy=strftime("%A, %d de %B de %Y"); 
                    echo '<td class="">' .(strftime("%A, %d de %B de %Y",strtotime($row[$letra]))). '</td>';
                    }
                    else //imprime todos menos la fecha
                    {
                        
                        if($letra=="D") //Es el teléfono
                        {
                            echo '<td class="">' . $row[$letra] ." - ".$row['I']. '</td>';
                        }
                        else
                        {
                            echo '<td class="">' . $row[$letra] . '</td>';
                        }
                    }
                    
                }
//                echo '<td class="">' . $model->valor_cuota . '</td>';

                // $moroso_con=  round($moroso_con);
                echo '<td class="">' . $moroso_con . '</td>';
                $suma_morosos = $suma_morosos + $moroso_con;
                //   echo '<td class="alert-info">' . $fecha_aux->format('Y-m-d') . '</td>';
                echo '</tr>';
            } //termina de imprimir los que estan en deuda
        };
        ?> 
        <tr>
            <td colspan="8" class="alert-info text-right">
                TOTAL
            </td>
            <td class="alert-info text-right">
<?php echo $suma_saldo; ?>
            </td>
            <td class="alert-danger text-right">
<?php echo $suma_morosos; ?>
            </td>
        </tr>
    </table>
</div>

