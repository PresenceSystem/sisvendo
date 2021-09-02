<?php

Yii::import('application.models._base.BaseTMarca');

class TMarca extends BaseTMarca
{
    /**
     * @return TMarca
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Marca|Marcas', $n);
    }

}