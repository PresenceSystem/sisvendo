<?php

class TContratoArticuloController extends AweController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
    
       public function filters() {
        return array(
            'accessControl',
        );
    }

      public function accessRules() {
        return array(
            array('allow',
                'actions' => array('', '', ''),
                'users' => array('*'),
            ),
            array('allow', 
                'actions' => array('','', '', '', '', '', '', '', '', ''),
                'users' => array('@'),
            ), 
            array('allow',
                'actions' => array('admin','create','view','index','update'),
                //'users'=>array('@'),
                'expression' => '!Yii::app()->user->isGuest && Usuario::model()->findByPk(Yii::app()->user->id)->esAdministradorEmpresarioVendedor()',
            ), 
             array('allow',
                'actions' => array('delete'),
                //'users'=>array('@'),
                'expression' => '!Yii::app()->user->isGuest && Usuario::model()->findByPk(Yii::app()->user->id)->esAdministrador()',
            ), 
            array('deny',
                'users' => array('*'),
            ),
        );
    }
    public $layout = '//layouts/column2';

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
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
		$model = new TContratoArticulo;

        $this->performAjaxValidation($model, 'tcontrato-articulo-form');

        if(isset($_POST['TContratoArticulo']))
		{
			$model->attributes = $_POST['TContratoArticulo'];
			if($model->save()) {
                $this->redirect(array('view', 'id' => $model->id_detalle));
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

        $this->performAjaxValidation($model, 'tcontrato-articulo-form');

		if(isset($_POST['TContratoArticulo']))
		{
			$model->attributes = $_POST['TContratoArticulo'];
			if($model->save()) {
				//$this->redirect(array('view','id' => $model->id_detalle));
                             echo "<script>javascript:history.go(-2)</script>" ;
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
			//	$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                            echo "<script>javascript:history.go(-2)</script>" ;
		}
		else
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TContratoArticulo');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new TContratoArticulo('search');
		$model->unsetAttributes(); // clear any default values
		if(isset($_GET['TContratoArticulo']))
			$model->attributes = $_GET['TContratoArticulo'];

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
		$model = TContratoArticulo::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'tcontrato-articulo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
