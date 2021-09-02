<?php

class TPersonaController extends AweController
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
				'actions'=>array(''),
				'users'=>array('*'),
				),
			array('allow', 
				'actions'=>array('buscar_cobrar'),
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('ingresar','index','view', 'lista', 'create','update','buscar','admin','delete'),
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
        $criteria->condition = "LOWER(ci) like LOWER(:term) or LOWER(nombre) like LOWER(:term)";
        $criteria->params = array(':term' => '%' . $_GET['term'] . '%');
        $criteria->limit = 30;
        $models = TPersona::model()->findAll($criteria);
        $arr = array();
        foreach ($models as $model) {
            $arr[] = array(
                'label' => ('' . $model->nombre . ', CI: '.$model->ci.''), // label for dropdown list
                'value' => $model->nombre, // value for input field                
                'id' => $model->ci, // return value from autocomplete
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
		$model = new TPersona;

        $this->performAjaxValidation($model, 'tpersona-form');

        if(isset($_POST['TPersona']))
		{
			$model->attributes = $_POST['TPersona'];
                        /* Codigo para subir ci_digital */
                    $rnd = rand(0, 9999);  // Generamos un numero aleatorio entre 0-9999                    
                $uploadedFile = CUploadedFile::getInstance($model, 'ci_digital');
                if (!empty($uploadedFile)) {  // checkeamos si el archivo subido esta seteado o no
                    $fileName = "{$rnd}-{$uploadedFile}";  // numero aleatorio  + nombre de archivo
                    $model->ci_digital = $fileName;                           
                    if ($model->save()) {   
                        $uploadedFile->saveAs(Yii::app()->basePath . './../images/ci_digital/' . $fileName);  // la imagen se subirá a la carpeta 
//                        $this->redirect(array('admin'));
                            $this->EliminarSesiones();
                                          $this->redirect(array('tContrato/ingresar/', 'id' => $model->ci));
                    }
                }
                else
                {
			if($model->save()) {
                //  $this->redirect(array('view', 'id' => $model->ci));
                              $this->redirect(array('tContrato/ingresar/', 'id' => $model->ci));
                        }
                }
		}

		$this->render('create',array(
			'model' => $model,
		));
	}

        public function actionIngresar()
	{
		$model = new TPersona;

        $this->performAjaxValidation($model, 'tpersona-form');

        if(isset($_POST['TPersona']))
		{
			$model->attributes = $_POST['TPersona'];
                          /* Codigo para subir ci_digital */
                    $rnd = rand(0, 9999);  // Generamos un numero aleatorio entre 0-9999                    
                $uploadedFile = CUploadedFile::getInstance($model, 'ci_digital');
                if (!empty($uploadedFile)) {  // checkeamos si el archivo subido esta seteado o no
                    $fileName = "{$rnd}-{$uploadedFile}";  // numero aleatorio  + nombre de archivo
                    $model->ci_digital = $fileName;                           
                    if ($model->save()) {   
                        $uploadedFile->saveAs(Yii::app()->basePath . './../images/ci_digital/' . $fileName);  // la imagen se subirá a la carpeta 
//                        $this->redirect(array('admin'));
                            $this->EliminarSesiones();
                            $this->redirect(array('tContrato/ingresar/', 'id' => $model->ci));
                    }
                }
                else
                {
			if($model->save()) {
                            $this->redirect(array('tContrato/ingresar/', 'id' => $model->ci));
                        //      $this->redirect(array('tContrato/ingresar/', 'id' => $model->ci));
                    }
                }
		}

		$this->render('ingresar',array(
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

        $this->performAjaxValidation($model, 'tpersona-form');

		if(isset($_POST['TPersona']))
		{
			$model->attributes = $_POST['TPersona'];
			if($model->save()) {
				$this->redirect(array('view','id' => $model->ci));
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
		$dataProvider=new CActiveDataProvider('TPersona');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new TPersona('search');
		$model->unsetAttributes(); // clear any default values
		if(isset($_GET['TPersona']))
			$model->attributes = $_GET['TPersona'];

		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function actionBuscar()
	{
		$model = new TPersona('search');
		$model->unsetAttributes(); // clear any default values
		if(isset($_GET['TPersona']))
			$model->attributes = $_GET['TPersona'];

		$this->render('buscar', array(
			'model' => $model,
		));
	}
        
         public function actionBuscar_cobrar()
	{
		$model = new TPersona('search');
		$model->unsetAttributes(); // clear any default values
		if(isset($_GET['TPersona']))
			$model->attributes = $_GET['TPersona'];

		$this->render('buscar_cobrar', array(
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
		$model = TPersona::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'tpersona-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
