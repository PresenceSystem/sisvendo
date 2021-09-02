<?php

Yii::import('application.models._base.BaseTContratoGarante');

class TContratoGarante extends BaseTContratoGarante
{
    /**
     * @return TContratoGarante
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Garante|Garantes', $n);
    }

}