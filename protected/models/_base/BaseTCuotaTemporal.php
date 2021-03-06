<?php

/**
 * This is the model base class for the table "tCuota".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "TCuota".
 *
 * Columns in table "tCuota" available as properties of the model,
 * followed by relations of table "tCuota" available as properties of the model.
 *
 * @property string $id_cuota
 * @property string $numero_contrato
 * @property string $fecha_creacion
 * @property string $abono
 * @property string $saldo
 * @property string $observacion
 * @property string $fecha
 * @property integer $id_usuario
 *
 * @property TContrato $numeroContrato
 */
abstract class BaseTCuotaTemporal extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'tCuotaTemporal'; 
    }

    public static function representingColumn() {
        return 'fecha';
    }

    public function rules() {
        return array(
            array('numero_contrato', 'required'),
            array('id_usuario', 'numerical', 'integerOnly'=>true),
            array('numero_contrato', 'length', 'max'=>11),
            array('abono, saldo', 'length', 'max'=>7),
            array('observacion', 'length', 'max'=>800),
            array('fecha_creacion', 'safe'),
            array('fecha_creacion, abono, saldo, observacion, id_usuario', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id_cuota, numero_contrato, fecha_creacion, abono, saldo, observacion, fecha, id_usuario', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'numeroContrato' => array(self::BELONGS_TO, 'TContrato', 'numero_contrato'),
            'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() { 
        return array(
                'id_cuota' => Yii::t('app', 'Cuota N??'),
                'numero_contrato' => Yii::t('app', 'Numero del contrato'),
                'fecha_creacion' => Yii::t('app', 'Fecha de Creaci??n'),        
                'abono' => Yii::t('app', 'Abono'),
                'saldo' => Yii::t('app', 'Saldo'),
                'observacion' => Yii::t('app', 'Observaci??n'),
                'fecha' => Yii::t('app', 'Modificado el'),
                'id_usuario' => Yii::t('app', 'Modificado por '),
                'numeroContrato' => null, 
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id_cuota', $this->id_cuota, true);
        $criteria->compare('numero_contrato', $this->numero_contrato);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('abono', $this->abono, true);
        $criteria->compare('saldo', $this->saldo, true);
        $criteria->compare('observacion', $this->observacion, true);
        $criteria->compare('fecha', $this->fecha, true);
        $criteria->compare('id_usuario', $this->id_usuario);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}