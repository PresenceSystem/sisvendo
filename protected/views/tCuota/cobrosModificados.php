<?php
/** @var TCuotaController $this */
/** @var TCuota $model */
$this->breadcrumbs = array(
	'Tcuotas',
);

//$this->menu = array(
//    //array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . TCuota::label(), 'icon' => 'plus', 'url' => array('create')),
//    array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
//);
?>

<div class="span11">
    <legend>
        <?php //echo Yii::t('AweCrud.app', 'List') ?> <?php //echo TCuota::label(2) ?>    </legend>

    <table class="table table-bordered table-hover">      
        <thead>
            <th>
                N°.
            </th>
            <th>
                CONTRATO
            </th>
            <th>
                DEUDOR
            </th>
            <th>
                COBRADOR
            </th>            
            <th>
                SALDO
            </th>
            <th>
                FECHA DEL COBRO
            </th>
            <th>
                ABONO
            </th>
        </thead>
        <tbody>
                <?php 
                 $cont=1;
                 foreach ($model as $cuota) {
                 $cuotasmodificadas = TCuotaTemporal::model()->findAll(''
                        . 'id_cuota = ' . $cuota->id_cuota.' and fecha>=(SELECT CONCAT(CURDATE()," 00:00:00")) order by fecha desc');                
                $cont_cuotas=1;
                foreach ($cuotasmodificadas as $cuo) {
                    $cont_cuotas++;
                }     
                    if($cont_cuotas>1)
                    {
                        echo "<tr class='text-success'>";
                            echo "<td>".$cont."</td>";
                            echo "<td>".$cuota->numero_contrato."</td>";
                            echo "<td>".$cuota->numeroContrato->idDeudor->nombre."</td>";
                            echo "<td>".$cuota->idUsuario->nombres."</td>";
                            echo "<td>".$cuota->saldo."</td>";
                            echo "<td>".$cuota->fecha."</td>";
                            echo "<td>".$cuota->abono."</td>";
                        echo "</tr>";
                        $cont_cuotas=1;
                        foreach ($cuotasmodificadas as $cuo) {
                        echo "<tr>";
                            echo "<td>".$cont.".".$cont_cuotas++."</td>";
                            echo "<td>".$cuo->numero_contrato."</td>";
                            echo "<td>".$cuo->numeroContrato->idDeudor->nombre."</td>";
                            echo "<td>".$cuo->idUsuario->nombres."</td>";
                            echo "<td>".$cuo->saldo."</td>";
                            echo "<td>".$cuo->fecha."</td>";
                            echo "<td>".$cuo->abono."</td>";
                        echo "</tr>";    
                        } //fin de imprimir las modificaciones
                        $cont++;
                    } //fin de cuotas modificadas
                }
                
                ?>            
        </tbody>
    </table>

</div>