<?php

Yii::import('application.models._base.BaseTCuotaTemporal');

class TCuotaTemporal extends BaseTCuotaTemporal
{
    /**
     * @return TCuotaTemporal 
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Cuota|Cuotas', $n);
    }

}