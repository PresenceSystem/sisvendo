<?php

Yii::import('application.models._base.BaseTEmpresa');

class TEmpresa extends BaseTEmpresa
{
    /**
     * @return TEmpresa
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Empresa|Empresas', $n);
    }

}