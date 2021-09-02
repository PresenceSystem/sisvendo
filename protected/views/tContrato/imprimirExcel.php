<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<table width="100%" border="1px" style="font-size:12px"> 
        <tr bgcolor='#94F0C8'>
            <td class="alert-danger">
                COD_TIPO_ID 
            </td> 
            <td class="alert-danger">
                COD_ID_SUJETO
            </td>
            <td class="alert-danger">
                NOM_SUJETO
            </td>
            <td class="alert-danger">
                DIRECCION
            </td>
            <td class="alert-danger">
                CIUDAD
            </td>
            <td class="alert-danger">
                TELEFONO
            </td>
            <td class="alert-danger">
                ACREEDOR
            </td>
            <td class="alert-danger">
                FEC_CORTE_SALDO
            </td>
            <td class="alert-danger">
                TIPO_DEUDOR
            </td>
            <td class="alert-danger">
                NUM_OPERACION
            </td>
            <td class="alert-danger">
                FEC_CONCESION
            </td>
            <td class="alert-danger">
                VAL_OPERACION
            </td>
            <td class="alert-danger">
                VAL_TOTAL
            </td>
            <td class="alert-danger">
                VAL_XVENCER
            </td>
            <td class="alert-danger">
                VAL_VENCIDO
            </td>
            <td class="alert-danger">
                VAL_DEM_JUDICIAL
            </td>
            <td class="alert-danger">
                VAL_CART_CASTIGADA
            </td>
            <td class="alert-danger">
                NUM_DIAS_VENCIDO
            </td>
        </tr>
        <?php
        $connection = Yii::app()->db;
        $sql = 'SELECT  
                    "C" AS A,
                    pers.`ci` AS B,
                    pers.nombre AS C,  
                    pers.direccion AS D,
                    cont.`lugar` AS E,  
                    pers.`telefono` AS F,  
                    "COMERCIAL DINITA/GERARDO MALAN" AS G,
                    Ultimo_dia_mes_anterior() AS H,
                      "TITULAR" AS I,
                      CONCAT("FACT-",cont.numero) AS J,
                    cont.`fecha_creacion` AS K,
                    cont.`total` AS L,  
                    cont.`saldo` AS M,
                    cont.valor_cuota AS N,
                    Val_vencido(cont.numero)  AS O,
                    "0" AS P,
                    "0" AS Q,
                    Num_dias_vencidos(cont.numero) AS R
                  FROM `tContrato` AS cont
                  INNER JOIN `tPersona` AS pers 
                  ON pers.ci = cont.`id_deudor`;';
        $command = $connection->createCommand($sql);
        $rows = $command->execute();
        $rows = $command->queryAll();

        foreach ($rows as $row) {
            echo '<tr>';
            foreach (range('A', 'R') as $letra) {
                echo '<td class="alert-sucess">' . $row[$letra] . '</td>';
            }
            echo '</tr>';
        };
        ?>
    </table>

