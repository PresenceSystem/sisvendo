<?php

class TContratoController extends AweController {

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
                'actions' => array('ImprimirExcelPuntuales','ImprimirExcelMorosos','ImprimirExcel','recibo','buscar_cobrar','cobrar'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('pagados','vigentes'),
                //'users'=>array('@'),
                'expression' => '!Yii::app()->user->isGuest && Usuario::model()->findByPk(Yii::app()->user->id)->esAdministradorEmpresarioVendedor()',
            ),
            array('allow',
                'actions' => array('listaPuntualesExcel','listaDeudoresExcel','listaPuntuales','listaDeudores','index', 'view','excel', 'deudores', 'pdf', 'actualizar', 'contrato', 'ingresar', 'create', 'update', 'admin', 'delete'),
                //'users'=>array('admin'),
                'expression' => '!Yii::app()->user->isGuest && Usuario::model()->findByPk(Yii::app()->user->id)->esAdministradorEmpresario()',
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }
 public function actionImprimirExcel()
	{
             //$model = bJUNTA::model()->findByPk($id);
               $contenido=$this->renderPartial("excel", array(),true);
               
                Yii::app()->request->sendFile("Lista de clientes.xls",$contenido);
		
		$this->render('excel', array(
		//	'dataProvider' => $dataProvider,
                //    'model' => $this->loadModel($id),
		));
	}
public function actionImprimirExcelMorosos()
	{
             //$model = bJUNTA::model()->findByPk($id);
               $contenido=$this->renderPartial("listaDeudoresExcel", array(),true);
               
                Yii::app()->request->sendFile("Clientes deudores al ". date('Y-m-d H;i;s').".xls",$contenido);
		
		$this->render('excelMorosos', array(
		//	'dataProvider' => $dataProvider,
                //    'model' => $this->loadModel($id),
		));
	}
    public function actionImprimirExcelPuntuales()
	{
             //$model = bJUNTA::model()->findByPk($id);
               $contenido=$this->renderPartial("listaPuntualesExcel", array(),true);
               
                Yii::app()->request->sendFile("Clientes puntuales al ". date('Y-m-d H;i;s').".xls",$contenido);
		
		$this->render('excelPuntuales', array(
		//	'dataProvider' => $dataProvider,
                //    'model' => $this->loadModel($id),
		));
	}
//    Para excel

    public function behaviors() {
        return array(
            'hzlexportgrid' => array(
                'class' => 'ext.Hzl.exportgrid.HzlExportGridBehavior',
            ),
        );
    }

    public function actionGenerarExcel() {
        if ($model->Confirm_Export) {//$model->Confirm_Export just a var in my own code, you can delete this line. Usually, I use this flag to identify whether need export or not)
            //public function toExcel($model = null, $columns = array(), $title = null, $documentDetails = array(), $exportType = 'Excel2007') {
            $this->toExcel(NPIHelper::getGSMAnalysisReport($GSMList), $yourColumnsArray, 'WWSP Web Port - NPI GSM Analysys - ' . yii::app()->user->name . " - " . date('Ymd-His'));

//usually you can set $yourColumnArray in model, and then share to both view and export.  
//You can provide empty ($yourColumnsArray = '' or array() ) here, then it will only render header/odd/even but cannot render body according $yourColumnArray cssClassExpression.
            //or , if you try to customze and change the default settings.
            $this->toExcel(NPIHelper::getGSMAnalysisReport($GSMList), $yourColumnArray, 'WWSP Web Port - NPI GSM Analysys - ' . yii::app()->user->name . " - " . date('Ymd-His'), $domumentDetails = array(
                'maxRow' => 5000, //define how many rows you want export.  Default is 0, means no limit and export all your dataset.
                'freezePane' => 'B2', //default to B2, you can change to D2 or others cell value
                'additionalArg' => //important flag for change default color
                array(
                    'headerColor' => array('color' => 'FFFFFF', 'background' => '519CC6'), //header default cssClass //7CB5D5
                    'headerColumnCssClass' => array(//header columns.  You can set as array() if no plan to customize
                        1 => array('color' => 'FFFFFF', 'background' => 'blue'), //column 1 will set to blue
                        'Region' => array('color' => 'FFFFFF', 'background' => 'blue')//column Region will set to blue too
                    ), //define each column's cssClass for header line only.  
                    'renderCssClass' => true, //turn on /off for body color
                    'cssClass' => //body color
                    array(
                        'pink' => array('color' => '', 'background' => 'FFCCCC'),
                        'green' => array('color' => '', 'background' => 'CCFF99'),
                        'lightgreen' => array('color' => '', 'background' => 'CCFFCC'),
                        'yellow' => array('color' => '', 'background' => 'FFFF99'),
                        'white' => array('color' => '', 'background' => 'FFFFFF'),
                        'grey' => array('color' => 'FFFFFF', 'background' => '808080'),
                        'blue' => array('color' => 'FFFFFF', 'background' => 'blue'),
                        'lightblue' => array('color' => 'FFFFFF', 'background' => '6666FF'),
                        'notice' => array('color' => '514721', 'background' => 'FFF6BF'),
                        'header' => array('color' => 'FFFFFF', 'background' => '519CC6'),
                        //above for customzed columns per your real data css class
                        'odd' => array('color' => '', 'background' => 'E5F1F4'), //for odd row
                        'even' => array('color' => '', 'background' => 'F8F8F8'), //for even row
                    )
                ))//important to customze your own configuration if necessary
            );
        }
    }

//    Fin para excel

    public function actionExcel() {
        $objPHPExcel = new PHPExcel();

        // Set document properties
        $objPHPExcel->getProperties()->setCreator("K'iin Balam")
                ->setLastModifiedBy("K'iin Balam")
                ->setTitle("YiiExcel Test Document")
                ->setSubject("YiiExcel Test Document")
                ->setDescription("Test document for YiiExcel, generated using PHP classes.")
                ->setKeywords("office PHPExcel php YiiExcel UPNFM")
                ->setCategory("Test result file");

        // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Hello')
                ->setCellValue('B2', 'world!')
                ->setCellValue('C1', 'Hello')
                ->setCellValue('D2', 'world!');

        // Miscellaneous glyphs, UTF-8
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A4', 'Miscellaneous glyphs')
                ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('YiiExcel');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // Save a xls file
        $filename = 'YiiExcel';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

        $objWriter->save('php://output');
        unset($this->objWriter);
        unset($this->objWorksheet);
        unset($this->objReader);
        unset($this->objPHPExcel);
        exit();
    }

//fin del método actionExcel

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }
    public function actionRecibo($id) {
        $this->layout = 'imprimir';
        $cantidad_cuotas=0;
        $valor=0;
        $saldo=0;
        $cobrador=new Usuario();
        $fecha=0;
        
      $cuotas = TCuota::model()->findAll('numero_contrato='.$id);               
                  foreach ($cuotas as $cuota) {
                      $cantidad_cuotas++;
                    $abono=$cuota->abono;
                    $saldo=$cuota->saldo;
                    $cobrador =  Usuario::model()->findByPk($cuota->id_usuario);
                    $fecha=$cuota->fecha;
                }
              //Se redirige al contrato mismo
               //$this->redirect(array('cobrar', 'id' => $id)); 
        $this->render('recibo', array(
            'model' => $this->loadModel($id),
              'cantidad_cuotas' => $cantidad_cuotas,
            'abono' => $abono,
            'saldo' => $saldo,
            'cobrador' => $cobrador,
            'fecha' => $fecha,
        ));
    } 
    

    public function actionPdf($id) {

        $model = $this->loadModel($id);
         $model_cuota = new TCuota();
        $model_cuota->id_usuario = Yii::app()->getSession()->get('id_usu_sisvendo');
        $mpdf = Yii::app()->ePdf->mpdf('utf-8', 'A4', '', '', 15, 15, 26, 25, 9, 9, 'P'); 
        $mpdf->useOnlyCoreFonts = true;
        $mpdf->SetTitle("Contrato a crédito");
        $mpdf->SetAuthor("Presence System");
        $mpdf->SetWatermarkText("``www.presencesystem.com.ec``");
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($this->renderPartial('pdf', array(
                    'model' => $this->loadModel($id),
//                    'model_garante' => $model_garante,
//                    'model_contrato_garante' => $model_contrato_garante,
//                    'model_contrato_articulo' => $model_contrato_articulo,
                    'model_cuota' => $model_cuota,
//            'model8'=>$this->loadModelCasoChilds($id),
                        ), true));
        $mpdf->Output('Contrato N°' . $id . ' consultado el ' . date('YmdHis'), 'I');

        //$mpdf->Output('Ficha-'.$model->run.'-('.date(Y.'-'.m.'-'.d).').pdf','I');
        exit;
    }
 public function actionCobrar($id) {
//     Se cambia el $id de la CI al codigo del ultimo contrato
    // $cedula_cobrar=$id;
     $saldo_inicial=null;
      $contratos = TContrato::model()->findAllBySql(''
                        . 'SELECT numero, saldo FROM tContrato WHERE numero = "'.$id.'" limit 1');               
                foreach ($contratos as $cont) {
                    $id=$cont->numero;
                    $saldo_inicial=$cont->saldo;
                }
                if($saldo_inicial == null)
                {
                   $contrato = TContrato::model()->findAllBySql(''
                            . 'SELECT saldo FROM tContrato WHERE numero = "'.$id.'" limit 1');               
                    foreach ($contrato as $cont) {
                        //$id=$cont->numero;
                        $saldo_inicial=$cont->saldo;
                    } 
                }
                
//          CUOTAS
           $model_cuota = new TCuota();
        $model_cuota->id_usuario = Yii::app()->getSession()->get('id_usu_sisvendo');
        //Guardar cuota
  if (isset($_POST['TCuota'])) {
            $model_cuota->attributes = $_POST['TCuota'];
             $model_cuota->saldo=$saldo_inicial;
            $model_cuota->numero_contrato = $id;
            $model_cuota->saldo = $saldo_inicial - $model_cuota->abono;
			$model_cuota->id_usuario = Yii::app()->user->id;
           // $model_cuota->fecha_creacion = getdate();
            if ($model_cuota->save()) {
                $model_cuota = new TCuota();
              //  $this->redirect(array('cobrar', 'id' => $cedula_cobrar));
                $this->redirect(array('recibo', 'id' => $id));
              //  echo "<script>javascript:history.go(-1)</script>";
            }
        } 
//      FIN CUOTAS
                
                
        $this->render('cobrar', array(
            'model' => $this->loadModel($id),
              'model_cuota' => $model_cuota,
            
        ));
    } 
      
    
   
    
    public function actionContrato($id) {
        $model_garante = new TPersona();
        $model_contrato_garante = new TContratoGarante();
        $model_contrato_garante->numero_contrato = $id;
        $model_contrato_garante->id_usuario = Yii::app()->getSession()->get('id_usu_sisvendo');

        $model_contrato_articulo = new TContratoArticulo();
        $model_contrato_articulo->numero_contrato = $id;
        $model_contrato_articulo->id_usuario = Yii::app()->getSession()->get('id_usu_sisvendo');

        $model_cuota = new TCuota();
        $model_cuota->id_usuario = Yii::app()->getSession()->get('id_usu_sisvendo');

        //  $model_cuota->fecha_creacion=$model->fecha_creacion;
//         $hoy=date("Y-m-d");
//         $fecha = new DateTime($model->fecha_creacion);
//         $fecha_aux=$hoy;
//         do {            
//                $model_cuota->fecha_creacion=$fecha_aux;
//                        if ($model->id_formaPago == 2) { //Quincenal
//                            $fecha->add(new DateInterval('P15D'));
//                        };
//                        if ($model->id_formaPago == 1) { //Semanal
//                            $fecha->add(new DateInterval('P7D'));
//                        };
//                        if ($model->id_formaPago == 3) { //Mensual
//                            $intervalo = new DateInterval('P1M');
//                            $fecha->add($intervalo);
//                        };
//                       $fecha_aux = $fecha->format('Y-m-d');
//                 
//            } while ($fecha_aux > $hoy);
//        $model_cuota->abono=$model->valor_cuota;
//        $model_cuota->saldo=$model->saldo;


        if (isset($_POST['TCuota'])) {
            $model_cuota->attributes = $_POST['TCuota'];
            //$model_cuota->saldo=$model->saldo;
            $model_cuota->numero_contrato = $id;
            $model_cuota->saldo = $model_cuota->saldo - $model_cuota->abono;
			$model_cuota->id_usuario = Yii::app()->user->id;
            if ($model_cuota->save()) {
                $model_cuota = new TCuota();
                //  $this->redirect(array('view', 'id' => $id));
                echo "<script>javascript:history.go(-1)</script>";
            }
        }

        if (isset($_POST['TPersona'])) {
            $model_garante->attributes = $_POST['TPersona'];
            //  $model_poligono->save();
            // $model_poligono=NULL();
            if ($model_garante->save()) {
                //                ASIGNAR AUTOMATICAMENTE A ESTA PERSONA COMO GARANTE EN ESTE CONTRATO
                $garante = new TContratoGarante();
                $garante->numero_contrato = $id;
                $garante->id_garante = $model_garante->ci;
                $garante->save();
                //               FIN ASIGNAR AUTOMATICAMENTE A ESTA PERSONA COMO GARANTE EN ESTE CONTRATO
                $model_garante = new TPersona();
                //  $this->redirect(array('view', 'id' => $id));
                echo "<script>javascript:history.go(-1)</script>";
            }
        }

        if (isset($_POST['TContratoArticulo'])) {
            $model_contrato_articulo->attributes = $_POST['TContratoArticulo'];
            $model_contrato_articulo->numero_contrato = $id;
            if ($model_contrato_articulo->precio == null) { // Si no ingresa el precio manualmente  //se asigna automaticamente el precio de venta a credito
                $model_contrato_articulo->precio = $model_contrato_articulo->idArticulo->prec_ven_credito;
            }
            //  $model_poligono->save();
            // $model_poligono=NULL();
            if ($model_contrato_articulo->save()) {
                $model_contrato_articulo = new TContratoArticulo();
                //  $this->redirect(array('view', 'id' => $id));
                echo "<script>javascript:history.go(-1)</script>";
            }
        }

        if (isset($_POST['TContratoGarante'])) {
            $model_contrato_garante->attributes = $_POST['TContratoGarante'];
            $model_contrato_garante->numero_contrato = $id;
            //  $model_poligono->save();
            // $model_poligono=NULL();
            if ($model_contrato_garante->save()) {
                $model_contrato_garante = new TContratoGarante();
                //    $this->redirect(array('view', 'id' => $id));
                echo "<script>javascript:history.go(-1)</script>";
            } 
           
        }


        $this->render('contrato', array(
            'model' => $this->loadModel($id),
            'model_garante' => $model_garante,
            'model_contrato_garante' => $model_contrato_garante,
            'model_contrato_articulo' => $model_contrato_articulo,
            'model_cuota' => $model_cuota,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new TContrato;

        $this->performAjaxValidation($model, 'tcontrato-form');

        if (isset($_POST['TContrato'])) {
            $model->attributes = $_POST['TContrato'];
            $model->id_usuario = Yii::app()->user->id;
            $model->id_empresa = Yii::app()->getSession()->get('id_empresa_sisvendo');
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->numero));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionIngresar($id) {
        $model = new TContrato;
        $model->id_deudor = $id;
        $model->fecha_creacion = date("Y-m-d");
       // $this->performAjaxValidation($model, 'tcontrato-form');

        /*
        if (isset($_POST['TContrato'])) {
            $model->attributes = $_POST['TContrato'];
            $model->id_usuario = Yii::app()->user->id;
            $model->id_empresa = Yii::app()->getSession()->get('id_empresa_sisvendo');
            if ($model->save()) {
                $this->redirect(array('contrato', 'id' => $model->numero));
            }
        }
         * Automàticamente se va al contrato
         */
        
            $model->id_usuario = Yii::app()->user->id;
            $model->id_empresa = Yii::app()->getSession()->get('id_empresa_sisvendo');
            $model->id_formaPago=1;
            $model->id_lugarCobro=1;
            $model->total=0;
            if ($model->save()) {
                $this->redirect(array('contrato', 'id' => $model->numero));
            }

        $this->render('ingresar', array(
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

        $this->performAjaxValidation($model, 'tcontrato-form');

        if (isset($_POST['TContrato'])) {
            $model->attributes = $_POST['TContrato'];
            $model->id_usuario = Yii::app()->user->id;
            $model->id_empresa = Yii::app()->getSession()->get('id_empresa_sisvendo');

            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->numero));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionActualizar($id) {
        $model = $this->loadModel($id);

        $this->performAjaxValidation($model, 'tcontrato-form');

        if (isset($_POST['TContrato'])) {
            $model->attributes = $_POST['TContrato'];
            $model->id_usuario = Yii::app()->user->id;
            $model->id_empresa = Yii::app()->getSession()->get('id_empresa_sisvendo');
            if ($model->cuota_inicial == null) {
                $model->cuota_inicial = 0;
            };
            $model->saldo = $model->total - $model->cuota_inicial;
            if ($model->saldo == null) {
                $model->saldo = 0;
            }
            if ($model->cantidad_cuotas == null) {
                $model->cantidad_cuotas = 1;
            }
            $valor_cuota = $model->saldo / $model->cantidad_cuotas;
            $model->valor_cuota = round($valor_cuota, 2);

            if ($model->save()) {
                $this->redirect(array('contrato', 'id' => $model->numero));
            }
        }

        $this->render('actualizar', array(
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
        $dataProvider = new CActiveDataProvider('TContrato');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

//    public function actionDeudores() {
//        $dataProvider = new CActiveDataProvider('TContrato');
//        $this->render('deudores', array(
//            'dataProvider' => $dataProvider,
//        ));
//    }

     public function actionDeudores() {
        $model = new TContrato('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['TContrato']))
            $model->attributes = $_GET['TContrato'];

        $this->render('deudores', array(
            'model' => $model,
        ));
    }
    
     public function actionListaDeudores() {
        $model = new TContrato('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['TContrato']))
            $model->attributes = $_GET['TContrato'];

        $this->render('listaDeudores', array(
            'model' => $model,
        ));
    }
    
    public function actionListaPuntuales() {
        $model = new TContrato('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['TContrato']))
            $model->attributes = $_GET['TContrato'];

        $this->render('listaPuntuales', array(
            'model' => $model,
        ));
    }
    
    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new TContrato('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['TContrato']))
            $model->attributes = $_GET['TContrato'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }
       public function actionVigentes() {
        $model = new TContrato('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['TContrato']))
            $model->attributes = $_GET['TContrato'];

        $this->render('vigentes', array(
            'model' => $model,
        ));
    }
       public function actionPagados() {
        $model = new TContrato('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['TContrato']))
            $model->attributes = $_GET['TContrato'];

        $this->render('pagados', array(
            'model' => $model,
        ));
    }
     public function actionBuscar_cobrar() {
        $model = new TContrato('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['TContrato']))
            $model->attributes = $_GET['TContrato'];

        $this->render('buscar_cobrar', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id, $modelClass = __CLASS__) {
        $model = TContrato::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model, $form = null) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'tcontrato-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
