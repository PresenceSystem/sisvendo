<?php

Yii::import('application.models._base.BaseTPersona');

class TPersona extends BaseTPersona
{
    /**
     * @return TPersona
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Persona|Personas', $n);
    }

}