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
                $abono=0; $cont=1;
                 foreach ($model as $cuota) {
                     $abono=$abono+$cuota->abono;
                    echo "<tr>";
                        echo "<td>".$cont++."</td>";
                        echo "<td>".$cuota->numero_contrato."</td>";
                        echo "<td>".$cuota->numeroContrato->idDeudor->nombre."</td>";
						if (isset($cuota->idUsuario->nombres))
							echo "<td>".$cuota->idUsuario->nombres."</td>";
						else
							echo "<td>...</td>";
                        echo "<td>".$cuota->saldo."</td>";
                        echo "<td>".$cuota->fecha."</td>";
                        echo "<td>".$cuota->abono."</td>";
                    echo "</tr>";
                }
                echo "<tr>";
                    echo "<td class='text-info text-right' colspan='6'>";                    
                        ECHO "TOTAL DE INGRESOS EN EL DÍA";
                    echo "</td>";                    
                    echo "<td class='text-info text-left'>";                    
                        echo $abono;
                    echo "</td>";
                echo "</tr>";
                ?>            
        </tbody>
    </table>

</div>