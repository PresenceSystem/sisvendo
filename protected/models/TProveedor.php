<?php

Yii::import('application.models._base.BaseTProveedor');

class TProveedor extends BaseTProveedor
{
    /**
     * @return TProveedor
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Proveedor|Proveedores', $n);
    }

}