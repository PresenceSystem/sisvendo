<?php

Yii::import('application.models._base.BaseTFormaPago');

class TFormaPago extends BaseTFormaPago
{
    /**
     * @return TFormaPago
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Forma de pago|Formas de pago', $n);
    }

}