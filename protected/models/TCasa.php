<?php

Yii::import('application.models._base.BaseTCasa');

class TCasa extends BaseTCasa
{
    /**
     * @return TCasa
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'TCasa|TCasas', $n);
    }

}