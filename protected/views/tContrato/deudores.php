<?php
/** @var TContratoController $this */
/** @var TContrato $model */
$this->breadcrumbs = array(
    'Contratos',
);

//$this->menu = array(
//    array('label' => Yii::t('AweCrud.app', 'Exportar a excel') . ' ', 'icon' => 'plus', 'url' => array('imprimirExcel')),
////    array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
//);


 $this->widget('bootstrap.widgets.TbButtonGroup', array(
                                        'type' => 'success', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                        'size' => '50px',
                                        'buttons' => array(
                                            //  array('label'=>'Modificar', 'items'=>array(
                                            // array('label' => 'Salir', 'icon' => 'tag', 'url' => array('/tbBalance/view', 'id' => 1))
                                           //array('label' => 'Salir (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                                            array('label' => Yii::t('AweCrud.app', 'Exportar a excel') . ' ', 'icon' => 'book', 'url' => array('imprimirExcel')),
                                        //  array('label'=>'...', 'icon' => 'user', 'url'=>'#'), 
                                        //      )
                                        ),
                                    ));
?>

<!--<div class="fondoClaro span-24">
    <fieldset>
        <legend>
<?php // echo Yii::t('AweCrud.app', 'Deudores') ?> <?php // echo TContrato::label(2) ?>    </legend>-->
<div class="fondoMenu span">
    <table class= "table table-bordered table-condensed"> 
        <tr>
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
            echo '<tr class="badge-info">';
            foreach (range('A', 'R') as $letra) {
                echo '<td class="alert-sucess">' . $row[$letra] . '</td>';
            }
            echo '</tr>'; 
        };
        ?>
    </table>
</div>
