<?php

/**
 * This is the model base class for the table "tLugarCobro".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "TLugarCobro".
 *
 * Columns in table "tLugarCobro" available as properties of the model,
 * followed by relations of table "tLugarCobro" available as properties of the model.
 *
 * @property string $id_lugar
 * @property string $descripcion
 *
 * @property TContrato[] $tContratos
 */
abstract class BaseTLugarCobro extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'tLugarCobro';
    }

    public static function representingColumn() {
        return 'descripcion';
    }

    public function rules() {
        return array(
            array('descripcion', 'length', 'max'=>50),
            array('descripcion', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id_lugar, descripcion', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'tContratos' => array(self::HAS_MANY, 'TContrato', 'id_lugarCobro'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id_lugar' => Yii::t('app', 'Id Lugar'),
                'descripcion' => Yii::t('app', 'Descripcion'),
                'tContratos' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id_lugar', $this->id_lugar, true);
        $criteria->compare('descripcion', $this->descripcion, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}