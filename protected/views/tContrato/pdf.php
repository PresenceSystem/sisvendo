<!DOCTYPE html>

<html lang="es">
    <head>
        <?php echo'<link rel="stylesheet" type="text/css" href="' . Yii::app()->theme->baseUrl . '/css/bootstrap.min.css" />'; ?>
        <?php echo'<link rel="stylesheet" type="text/css" href="' . Yii::app()->theme->baseUrl . '/css/bootstrap-responsive.min.css" />'; ?>
        <?php echo'<link rel="stylesheet" type="text/css" href="' . Yii::app()->theme->baseUrl . '/css/abound.css" />'; ?>
    </head>
    <body>
        <!--mpdf
         <htmlpageheader name="myheader">        
         <table width="100%"><tr>
         <td width="2px" rowspan="2"><?php echo '<img src="https://scontent.fuio21-1.fna.fbcdn.net/v/t1.0-9/122990820_5099829563392047_4797442835928690831_o.jpg?_nc_cat=109&ccb=2&_nc_sid=0debeb&_nc_eui2=AeElhujyGRS4bjD0VOISpc49AUBesK0eDa8BQF6wrR4Nr8iVI257uv7hNOHx5tx9h00rTouDHmL4ojaRiRLGUFh_&_nc_ohc=HlFHAUkZeHQAX_SfMZq&_nc_ht=scontent.fuio21-1.fna&oh=f81109ee7a1fe4b601657779549f5dc2&oe=5FBDABE2" alt="Stanford">'; ?></td>
        </tr></table>
         </htmlpageheader>         
        <htmlpagefooter name="myfooter">
         <div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
         Página {PAGENO} de {nb}
         </div>
         </htmlpagefooter>         
        <sethtmlpageheader name="myheader" value="on" show-this-page="1" />
         <sethtmlpagefooter name="myfooter" value="on" />        
         mpdf-->        
        <div class="fondoClaro">
            <?php echo "<center><h4>CONTRATO DE CRÉDITO N°: " . CHtml::encode($model->numero) . "</h4></center>"; ?>
        </div>

        <table  border="1" align="center" width="100%">
            <tr>
                <td><h4>Lugar: </h4></td>
                <td><?php echo CHtml::encode($model->lugar); ?> </td>
                <td><h4>Fecha: </h4></td>
                <td><?php echo CHtml::encode($model->fecha_creacion); ?></td>
            </tr>
        </table> 
        <br>
        <h4 class="text-center panel-title alert-success">1. DATOS DEL SOLICITANTE (DEUDOR)</h4>        
        <div class="fondoColor">
            <table  border="1" align="center" width="100%">            
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
                    <tr>
                        <td><?php echo "<b>Lugar de trabajo: </b>" . CHtml::encode($model->idDeudor->trabajo) . "</td><td><b> Cargo: </b>" . CHtml::encode($model->idDeudor->cargo); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo "<b> Tiempo: </b>" . CHtml::encode($model->idDeudor->tiempo) . "</td><td><b> Sueldo: </b>" . CHtml::encode($model->idDeudor->sueldo); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><?php echo "<b>Dirección del trabajo: </b>" . CHtml::encode($model->idDeudor->dir_trabajo); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo "<b> Teléfono: </b>" . CHtml::encode($model->idDeudor->tel_trabajo) . "</td><td><b> Celular: </b>" . CHtml::encode($model->idDeudor->celular); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo "<b>Nombres y Apellidos del Cónyuge: </b>" . CHtml::encode($model->idDeudor->nombre_cony) . "</td><td><b> CI: </b>" . CHtml::encode($model->idDeudor->ci_cony); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo "<b>Lugar de trabajo del Cónyugue: </b>" . CHtml::encode($model->idDeudor->trabajo_cony) . "</td><td><b> Cargo: </b>" . CHtml::encode($model->idDeudor->cargo_cony); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo "<b> Tiempo: </b>" . CHtml::encode($model->idDeudor->tiempo_cony) . "</td><td><b> Sueldo: </b>" . CHtml::encode($model->idDeudor->sueldo_cony); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Vivienda</b> <?php
                            echo CHtml::encode($model->idDeudor->idCasa->casa);
                            if ($model->idDeudor->idCasa->casa > 1) {
                                echo "Tiempo: " . CHtml::encode($model->tiempo_arriendo);
                            }
                            ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h4 class="text-center panel-title alert-success">2. DATOS DEL GARANTE</h4>
        <div class="fondoColor">
            <table  border="1" align="center" width="100%">           
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
                    <?PHP
                    //FIN DE IMPRIMIR DATOS DEL GARANTE
                }
                ?>
                </tbody>
            </table>
        </div>
        <br>
        <div class="fondoColor">
            <h4 class="text-center panel-title alert-success">3. ARTICULO(S) SOLICITADO(S)</h4>            
            <table  border="1" align="center" width="100%">            
                <tbody>
                    <tr>
                        <td><h5 class="text-center panel-title alert-info">N°. </h5></td>
                        <td><h5 class="text-center panel-title alert-info">ARTICULO</h5></td>
                        <td><h5 class="text-center panel-title alert-info">MARCA</h5></td>
                        <td><h5 class="text-center panel-title alert-info">MODELO</h5></td>
                        <td><h5 class="text-center panel-title alert-info">DETALLE/OBSERVACIÓN</h5></td>
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
                        echo '<td>' . $arti->idArticulo->nombre . '</td>';
//                    echo '<td>' . CHtml::link($arti->idArticulo->nombre, array('tContratoArticulo/update/',
//                        'id' => $arti->id_detalle)) . '</td>';
                        echo '<td>' . $arti->idArticulo->idMarca->marca . '</td>';
                        echo '<td>' . $arti->idArticulo->modelo . '</td>';
                        echo '<td>' . $arti->observacion . '</td>';
                        echo '<td>' . $arti->cantidad . '</td>';
                        echo '<td>' . $arti->precio . '</td>';
                        $suma = $suma + $arti->precio * $arti->cantidad;
                        echo '<td>' . $arti->precio * $arti->cantidad . '</td>';
                        echo '</tr>';
                    }
                    ?>
                    <!--FIN LECTURA DE ARTICULOS AGREGADOS-->
                    <tr>
                        <td colspan="7" class="alert-danger">
                            TOTAL:
                        </td>
                        <td class="alert-danger">
                            <?php echo $suma; ?>
                        </td>
                    </tr>                     
                </tbody> 
            </table>
        </div>

        <h4 class="text-center panel-title alert-success">4. FORMA DE PAGO</h4>
        <div class="fondoColor">
            <?php echo 'El contrato fue creado el: ' . $model->fecha_creacion; ?>
            <table  border="1" align="center" width="100%">           
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
                               
                                $model_cuota->fecha_creacion = $fecha->format("Y-m-d");
                                
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
        <h4 class="text-center panel-title alert-success">5. POLÍTICAS DE CONTRATACIÓN</h4>
        <p align="justify">
            "Declaro que los datos consignados en el presente formulario son verídicos 
            y autorizo en forma expresa a Centro Comercial Dinita de G.M.C. a solicitar confirmación de los mismos, 
            en cualquier fuente de información, incluidos los Burós de Crédito. De igual forma autorizo a referir y/o publicar 
            información crediticia a mi nombre o el de mi Representada en los Burós de Crédito legalmente autorizados por la Super Intendencia de Bancos"
        </p>
        <table  align="center" width="100%"> 
            <tr>
                <td align="center" >
                    <br><br><br><br>
                    ____________________________
                    <br> <?php echo $model->idDeudor->nombre . '<br><b>CI.</b> ' . $model->idDeudor->ci . '<br><b>FIRMA DEUDOR</b>'; ?>                     
                </td>
                <td align="center" >
                    <?php if ($model->idDeudor->nombre_cony <> null) {
                        ?>
                        <br><br>
                        ____________________________
                        <br> <?php echo $model->idDeudor->nombre_cony . '<br><b>CI.</b> ' . $model->idDeudor->ci_cony . '<br><b>FIRMA DEUDOR (CONYUGUE)</b>'; ?>  
                    <?php }; ?>
                </td>
            </tr>


            <!--GARANTES-->
            <?php
            $garantes = TContratoGarante::model()->findAllBySql(''
                    . 'SELECT * FROM `tContratoGarante` WHERE `numero_contrato` =' . CHtml::encode($model->numero));
            //$modelo_deudor->
            $contador_garantes = 1;
            foreach ($garantes as $gar) {
                // IMPRIMIR DATOS DEL GARANTE 
                ?>
               
                <tr><td colspan="2"> <center><?php echo 'GARANTE N°. ' . $contador_garantes++; ?></center> </td></tr>

        <tr>
            <td>
                <br><br><br><br>
                ____________________________
                <br>
                <?php echo CHtml::encode($gar->idGarante->nombre) . "<br><b>CI: </b>" . CHtml::encode($gar->idGarante->ci) . "<br> <b>FIRMA GARANTE</b>"; ?> 
            </td>
            <td> 
                <br><br><br><br>
                ____________________________
                <br>
                <?php echo CHtml::encode($gar->idGarante->nombre_cony) . "<br><b>CI: </b>" . CHtml::encode($gar->idGarante->ci_cony) . "<br> <b>FIRMA GARANTE (CONYUGUE)</b>"; ?> 
            </td>
        </tr>
    <?php }; ?>
    <!--FIN GARANTES-->


</table>

<?php
?>
</body>
</html> 