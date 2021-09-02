<?php

Yii::import('application.models._base.BaseTLugarCobro');

class TLugarCobro extends BaseTLugarCobro
{
    /**
     * @return TLugarCobro
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Lugar de cobro|Lugares de cobros', $n);
    }

}