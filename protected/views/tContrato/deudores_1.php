<?php
/** @var TContratoController $this */
/** @var TContrato $model */
$this->breadcrumbs = array(
    'Tcontratos',
);

//$this->menu = array(
//    array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . TContrato::label(), 'icon' => 'plus', 'url' => array('create')),
//    array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
//);
?>
<div class="fondoClaro span-24">
    <fieldset>
        <legend>
            <?php echo Yii::t('AweCrud.app', 'Deudores') ?> <?php echo TContrato::label(2) ?>    </legend>

        <table class="table table-bordered"> 
            <tr>
                <td width="400">
                    Deudor 
                </td>
                <td width="400">
                    CI
                </td>
                <td width="400">
                    Dirección
                </td>
                <td width="400">
                    Teléfono / Celular
                </td>
                <td width="400">
                    Meses en deuda
                </td>
                <td width="400">
                    Valor
                </td>
            </tr>
        </table>
        <?php
        $this->widget('bootstrap.widgets.TbListView', array(
            
            'dataProvider' => $dataProvider,
            'itemView' => '_deben',
            'itemsTagName'=>'table',
            'itemsCssClass'=>'items table table-striped table-condensed',
            'template' => "{sorter}\n{items}\n{pager}",
        ));
        ?>
    </fieldset>
</div>