<?php

Yii::import('application.models._base.BaseTArticulo');

class TArticulo extends BaseTArticulo
{
    /**
     * @return TArticulo
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