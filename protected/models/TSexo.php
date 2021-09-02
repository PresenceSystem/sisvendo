<?php

Yii::import('application.models._base.BaseTSexo');

class TSexo extends BaseTSexo
{
    /**
     * @return TSexo
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Sexo|Sexos', $n);
    }

}