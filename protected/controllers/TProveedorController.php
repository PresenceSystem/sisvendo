<?php

class TProveedorController extends AweController
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
				'actions'=>array('nuevo','lista', 'create','update'),
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('admin','delete'),
				//'users'=>array('admin'),
                            'expression' => '!Yii::app()->user->isGuest && Usuario::model()->findByPk(Yii::app()->user->id)->esAdministradorEmpresario()',
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
        $criteria->condition = "LOWER(nombre) like LOWER(:term) or LOWER(ci_ruc) like LOWER(:term)";
        $criteria->params = array(':term' => '%' . $_GET['term'] . '%');
        $criteria->limit = 30;
        $models = TProveedor::model()->findAll($criteria);
        $arr = array();
        foreach ($models as $model) {
            $arr[] = array(
                'label' => ('Nombre:' . $model->nombre . ', CI/RUC: '.$model->ci_ruc), // label for dropdown list
                'value' => $model->nombre, // value for input field                
                'id' => $model->id_proveedor, // return value from autocomplete
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
		$model = new TProveedor;

        $this->performAjaxValidation($model, 'tproveedor-form');

        if(isset($_POST['TProveedor']))
		{
			$model->attributes = $_POST['TProveedor'];
                        $model->id_usuario= Yii::app()->user->id;
			if($model->save()) {
                $this->redirect(array('view', 'id' => $model->id_proveedor));
            }
		}

		$this->render('create',array(
			'model' => $model,
		));
	}
        public function actionNuevo()
	{
		$model = new TProveedor;

        $this->performAjaxValidation($model, 'tproveedor-form');

        if(isset($_POST['TProveedor']))
		{
			$model->attributes = $_POST['TProveedor'];
                        $model->id_usuario= Yii::app()->user->id;
			if($model->save()) {
                //$this->redirect(array('view', 'id' => $model->id_proveedor));
                            echo "<script>javascript:history.go(-2)</script>" ;
            }
		}

		$this->render('nuevo',array(
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

        $this->performAjaxValidation($model, 'tproveedor-form');

		if(isset($_POST['TProveedor']))
		{
			$model->attributes = $_POST['TProveedor'];
                        $model->id_usuario= Yii::app()->user->id;
			if($model->save()) {
				$this->redirect(array('view','id' => $model->id_proveedor));
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
		$dataProvider=new CActiveDataProvider('TProveedor');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new TProveedor('search');
		$model->unsetAttributes(); // clear any default values
		if(isset($_GET['TProveedor']))
			$model->attributes = $_GET['TProveedor'];

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
		$model = TProveedor::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'tproveedor-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
