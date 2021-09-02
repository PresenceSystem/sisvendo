<?php

Yii::import('application.models._base.BaseTEstadoCivil');

class TEstadoCivil extends BaseTEstadoCivil
{
    /**
     * @return TEstadoCivil
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Estado civil|Estados Civiles', $n);
    }

}