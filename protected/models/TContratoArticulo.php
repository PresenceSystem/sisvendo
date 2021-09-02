<?php

Yii::import('application.models._base.BaseTContratoArticulo');

class TContratoArticulo extends BaseTContratoArticulo
{
    /**
     * @return TContratoArticulo
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Artículo|Artículos', $n);
    }

}