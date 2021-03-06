<?php

/**
 * This is the model base class for the table "tArticulo".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "TArticulo".
 *
 * Columns in table "tArticulo" available as properties of the model,
 * followed by relations of table "tArticulo" available as properties of the model.
 *
 * @property string $id_articulo
 * @property string $nombre
 * @property integer $id_marca
 * @property string $modelo
 * @property string $serie
 * @property string $cod_barra
 * @property string $prec_com
 * @property string $contado_porcentaje
 * @property string $prec_ven_contado
 * @property string $credito_porcentaje
 * @property string $prec_ven_credito
 * @property integer $stock
 * @property integer $reservados
 * @property integer $id_proveedor
 * @property string $fech_exp
 * @property string $fech_cad
 * @property string $fech_com
 * @property string $descripcion
 * @property string $fecha
 * @property integer $id_usuario
 *
 * @property TProveedor $idProveedor
 * @property TContratoArticulo[] $tContratoArticulos
 */
abstract class BaseTArticulo extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'tArticulo';
    }

    public static function representingColumn() {
        return 'nombre';
    }

    public function rules() {
        return array(
            array('nombre, id_marca, prec_com, prec_ven_contado, prec_ven_credito, stock, id_proveedor', 'required'),
            array('id_marca, stock, reservados, id_proveedor, id_usuario, contado_porcentaje, credito_porcentaje', 'numerical', 'integerOnly'=>true),
            array('nombre', 'length', 'max'=>50),
            array('modelo, serie, cod_barra', 'length', 'max'=>100),
            array('prec_com, prec_ven_contado, prec_ven_credito', 'length', 'max'=>7),
            array('descripcion', 'length', 'max'=>500),
            array('fech_exp, fech_com, fecha', 'safe'),
            array('modelo, serie, cod_barra, reservados, fech_exp, fech_com, descripcion, fecha, id_usuario', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id_articulo, nombre, id_marca, modelo, serie, cod_barra, prec_com, prec_ven_contado, prec_ven_credito, stock, reservados, id_proveedor, fech_exp, fech_cad, fech_com, descripcion, fecha, id_usuario', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'idProveedor' => array(self::BELONGS_TO, 'TProveedor', 'id_proveedor'),
            'idMarca' => array(self::BELONGS_TO, 'TMarca', 'id_marca'),
            'tContratoArticulos' => array(self::HAS_MANY, 'TContratoArticulo', 'id_articulo'),
            
            'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id_articulo' => Yii::t('app', 'N??mero'),
                'nombre' => Yii::t('app', 'Art??culo'),
                'id_marca' => Yii::t('app', 'Marca'),
                'modelo' => Yii::t('app', 'Modelo'),
                'serie' => Yii::t('app', 'Serie'),
                'cod_barra' => Yii::t('app', 'Codigo de barra'),
                'prec_com' => Yii::t('app', 'Precio de compra'),
            'contado_porcentaje' => Yii::t('app', 'Ganancia al contado'),
                'prec_ven_contado' => Yii::t('app', 'Precio al contado'),
            'credito_porcentaje' => Yii::t('app', 'Ganancia a cr??dito'),
                'prec_ven_credito' => Yii::t('app', 'Precio a Credito'),
                'stock' => Yii::t('app', 'Stock'),
                'reservados' => Yii::t('app', 'Reservados'),
                'id_proveedor' => Yii::t('app', 'Proveedor'),
                'fech_exp' => Yii::t('app', 'Fecha de expedici??n'),
                'fech_cad' => Yii::t('app', 'Fecha de caducidad'),
                'fech_com' => Yii::t('app', 'Fecha de compra'),
                'descripcion' => Yii::t('app', 'Descripcion'),
                'fecha' => Yii::t('app', 'El: '),
                'id_usuario' => Yii::t('app', 'Modificado por: '),
                'idProveedor' => null,
                'tContratoArticulos' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id_articulo', $this->id_articulo, true);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('id_marca', $this->id_marca);
        $criteria->compare('modelo', $this->modelo, true);
        $criteria->compare('serie', $this->serie, true);
        $criteria->compare('cod_barra', $this->cod_barra, true);
        $criteria->compare('prec_com', $this->prec_com, true);
        $criteria->compare('prec_ven_contado', $this->prec_ven_contado, true);
        $criteria->compare('prec_ven_credito', $this->prec_ven_credito, true);
        $criteria->compare('stock', $this->stock);
        $criteria->compare('reservados', $this->reservados);
        $criteria->compare('id_proveedor', $this->id_proveedor);
        $criteria->compare('fech_exp', $this->fech_exp, true);
        $criteria->compare('fech_cad', $this->fech_cad, true);
        $criteria->compare('fech_com', $this->fech_com, true);
        $criteria->compare('descripcion', $this->descripcion, true);
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