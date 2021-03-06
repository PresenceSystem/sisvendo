<?php

/**
 * This is the model base class for the table "tMarca".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "TMarca".
 *
 * Columns in table "tMarca" available as properties of the model,
 * and there are no model relations.
 *
 * @property string $id_marca
 * @property string $marca
 * @property string $fecha
 * @property integer $id_usuario
 *
 */
abstract class BaseTMarca extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'tMarca';
    }

    public static function representingColumn() {
        return 'marca';
    }

    public function rules() {
        return array(
            array('marca', 'required'),
            array('id_usuario', 'numerical', 'integerOnly'=>true),
            array('marca', 'length', 'max'=>50),
            array('id_usuario', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id_marca, marca, fecha, id_usuario', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
             'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id_marca' => Yii::t('app', 'Id Marca'),
                'marca' => Yii::t('app', 'Marca'),
                'fecha' => Yii::t('app', 'El: '),
                'id_usuario' => Yii::t('app', 'Modificado por: '),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id_marca', $this->id_marca, true);
        $criteria->compare('marca', $this->marca, true);
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