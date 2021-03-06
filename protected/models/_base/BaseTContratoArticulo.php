<?php

/**
 * This is the model base class for the table "tContratoArticulo".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "TContratoArticulo".
 *
 * Columns in table "tContratoArticulo" available as properties of the model,
 * followed by relations of table "tContratoArticulo" available as properties of the model.
 *
 * @property string $id_detalle
 * @property string $numero_contrato
 * @property string $id_articulo
 * @property string $cantidad
 * @property string $precio
 * @property string $observacion
 * @property string $fecha
 * @property integer $id_usuario
 * @property integer $cantidad_temporal
 * @property TArticulo $idArticulo
 * @property TContrato $numeroContrato
 */
abstract class BaseTContratoArticulo extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'tContratoArticulo';
    }

    public static function representingColumn() {
        return 'fecha';
    }

    public function rules() {
        return array(
            array('numero_contrato, id_articulo', 'required'),
            array('id_usuario, cantidad_temporal', 'numerical', 'integerOnly'=>true),
            array('numero_contrato, id_articulo', 'length', 'max'=>11),
            array('cantidad', 'length', 'max'=>4),
            array('precio', 'length', 'max'=>7),
            array('observacion', 'length', 'max'=>100),
            array('cantidad, precio, observacion, id_usuario', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id_detalle, numero_contrato, id_articulo, cantidad, precio, observacion, fecha, id_usuario, cantidad_temporal', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'idArticulo' => array(self::BELONGS_TO, 'TArticulo', 'id_articulo'),
            'numeroContrato' => array(self::BELONGS_TO, 'TContrato', 'numero_contrato'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id_detalle' => Yii::t('app', 'Id Detalle'),
                'numero_contrato' => Yii::t('app', 'Contrato N??'),
                'id_articulo' => Yii::t('app', 'Articulo'),
                'cantidad' => Yii::t('app', 'Cantidad'),
                'precio' => Yii::t('app', 'Precio'),
                'observacion' => Yii::t('app', 'Observaci??n'),
                'fecha' => Yii::t('app', 'Modificado el'),
                'id_usuario' => Yii::t('app', 'Modificado por'),
                'idArticulo' => null,
                'numeroContrato' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id_detalle', $this->id_detalle, true);
        $criteria->compare('numero_contrato', $this->numero_contrato);
        $criteria->compare('id_articulo', $this->id_articulo);
        $criteria->compare('cantidad', $this->cantidad, true);
        $criteria->compare('precio', $this->precio, true);
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