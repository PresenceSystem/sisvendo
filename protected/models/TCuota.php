<?php

Yii::import('application.models._base.BaseTCuota');

class TCuota extends BaseTCuota
{
    /**
     * @return TCuota
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