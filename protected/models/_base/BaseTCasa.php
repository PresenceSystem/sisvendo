<?php

/**
 * This is the model base class for the table "tCasa".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "TCasa".
 *
 * Columns in table "tCasa" available as properties of the model,
 * followed by relations of table "tCasa" available as properties of the model.
 *
 * @property string $id_casa
 * @property string $casa
 *
 * @property TPersona[] $tPersonas
 */
abstract class BaseTCasa extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'tCasa';
    }

    public static function representingColumn() {
        return 'casa';
    }

    public function rules() {
        return array(
            array('casa', 'required'),
            array('casa', 'length', 'max'=>50),
            array('id_casa, casa', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'tPersonas' => array(self::HAS_MANY, 'TPersona', 'id_casa'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id_casa' => Yii::t('app', 'Id Casa'),
                'casa' => Yii::t('app', 'Casa'),
                'tPersonas' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id_casa', $this->id_casa, true);
        $criteria->compare('casa', $this->casa, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}