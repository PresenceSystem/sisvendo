<?php

class TMarcaController extends AweController {

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
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('nueva','lista', 'create', 'update'),
                //'users'=>array('@'),
                'expression' => '!Yii::app()->user->isGuest && Usuario::model()->findByPk(Yii::app()->user->id)->esAdministradorEmpresarioVendedor()',
            ),
            array('allow',
                'actions' => array('admin', 'delete'),
                //'users'=>array('admin'),
                'expression' => '!Yii::app()->user->isGuest && Usuario::model()->findByPk(Yii::app()->user->id)->esAdministradorEmpresarioVendedor()',
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionLista($term) {
        $criteria = new CDbCriteria;
        $criteria->condition = "LOWER(marca) like LOWER(:term) ";
        $criteria->params = array(':term' => '%' . $_GET['term'] . '%');
        $criteria->limit = 30;
        $models = TMarca::model()->findAll($criteria);
        $arr = array();
        foreach ($models as $model) {
            $arr[] = array(
                'label' => ('Marca: ' . $model->marca . ''), // label for dropdown list
                'value' => $model->marca, // value for input field                
                'id' => $model->id_marca, // return value from autocomplete
            );
        }
        echo CJSON::encode($arr);
    }

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new TMarca;

        $this->performAjaxValidation($model, 'tmarca-form');

        if (isset($_POST['TMarca'])) {
            $model->attributes = $_POST['TMarca'];
              $model->id_usuario= Yii::app()->user->id;
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id_marca));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }
     public function actionNueva() {
        $model = new TMarca;

        $this->performAjaxValidation($model, 'tmarca-form');

        if (isset($_POST['TMarca'])) {
            $model->attributes = $_POST['TMarca'];
              $model->id_usuario= Yii::app()->user->id;
            if ($model->save()) {
                //$this->redirect(array('view', 'id' => $model->id_marca));
                echo "<script>javascript:history.go(-2)</script>" ;
            }
        }

        $this->render('nueva', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        $this->performAjaxValidation($model, 'tmarca-form');

        if (isset($_POST['TMarca'])) {
            $model->attributes = $_POST['TMarca'];
            $model->id_usuario= Yii::app()->user->id;
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id_marca));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('TMarca');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new TMarca('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['TMarca']))
            $model->attributes = $_GET['TMarca'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id, $modelClass = __CLASS__) {
        $model = TMarca::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model, $form = null) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'tmarca-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
