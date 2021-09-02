<?php

class TArticuloController extends AweController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
    public $layout = '//layouts/column2';

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('index','view'),
				'users'=>array('*'),
				),
			array('allow', 
				'actions'=>array('lista', 'create','update'),
				//'users'=>array('@'),
                            'expression' => '!Yii::app()->user->isGuest && Usuario::model()->findByPk(Yii::app()->user->id)->esAdministradorEmpresarioVendedor()',
				),
			array('allow', 
				'actions'=>array('admin','delete'),
				//'users'=>array('admin'),
                            'expression' => '!Yii::app()->user->isGuest && Usuario::model()->findByPk(Yii::app()->user->id)->esAdministradorEmpresarioVendedor()',
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */

          public function actionLista($term) {
        $criteria = new CDbCriteria;
        $criteria->condition = "stock>0 and( LOWER(nombre) like LOWER(:term) or LOWER(modelo) like LOWER(:term) or LOWER(serie) like LOWER(:term) or LOWER(cod_barra) like LOWER(:term) or LOWER(descripcion) like LOWER(:term) )";
        $criteria->params = array(':term' => '%' . $_GET['term'] . '%');
        $criteria->limit = 30;
        $models = TArticulo::model()->findAll($criteria);
        $arr = array();
        foreach ($models as $model) {
            $arr[] = array(
                'label' => ('' . $model->nombre.', Marca:'.$model->idMarca->marca . ', en stock: '.$model->stock.', PV/crédito: '.$model->prec_ven_credito.', PV/contado: '.$model->prec_ven_contado), // label for dropdown list
                'value' => $model->nombre, // value for input field                
                'id' => $model->id_articulo, // return value from autocomplete
            );
        }
        echo CJSON::encode($arr);
    }


	public function actionView($id)
	{
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new TArticulo;

        $this->performAjaxValidation($model, 'tarticulo-form');

        if(isset($_POST['TArticulo']))
		{
			$model->attributes = $_POST['TArticulo'];
                        $model->id_usuario= Yii::app()->user->id;
                        
                        if ($model->contado_porcentaje > 0)
                        {
                        $model->prec_ven_contado=$model->prec_com+($model->contado_porcentaje*$model->prec_com)/100;
                        $model->prec_ven_contado = round($model->prec_ven_contado, 2);
                        };
                        if ($model->credito_porcentaje > 0)
                        {
                        $model->prec_ven_credito=$model->prec_com+($model->credito_porcentaje*$model->prec_com)/100;
                         $model->prec_ven_credito = round($model->prec_ven_credito, 2);
                        };
                        if ($model->fech_cad == "") {
                            $model->fech_cad = "0000-00-00";
                        }
			if($model->save()) {
                $this->redirect(array('view', 'id' => $model->id_articulo));
            }
		}

		$this->render('create',array(
			'model' => $model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

        $this->performAjaxValidation($model, 'tarticulo-form');

		if(isset($_POST['TArticulo']))
		{
			$model->attributes = $_POST['TArticulo'];
                        $model->id_usuario= Yii::app()->user->id;
                         if ($model->contado_porcentaje > 0)
                        {
                        $model->prec_ven_contado=$model->prec_com+($model->contado_porcentaje*$model->prec_com)/100;
                         $model->prec_ven_contado = round($model->prec_ven_contado, 2);
                        };
                        if ($model->credito_porcentaje > 0)
                        {
                        $model->prec_ven_credito=$model->prec_com+($model->credito_porcentaje*$model->prec_com)/100;
                         $model->prec_ven_credito = round($model->prec_ven_credito, 2);
                        };
                        
                        
			if($model->save()) {
				$this->redirect(array('view','id' => $model->id_articulo));
            }
		}

		$this->render('update',array(
			'model' => $model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TArticulo');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new TArticulo('search');
		$model->unsetAttributes(); // clear any default values
		if(isset($_GET['TArticulo']))
			$model->attributes = $_GET['TArticulo'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id, $modelClass=__CLASS__)
	{
		$model = TArticulo::model()->findByPk($id);
		if($model === null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model, $form=null)
	{
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'tarticulo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
