<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - V1';
$this->breadcrumbs = array(
    'Autenticar',
);
?>


<center>
    <div class="span-1"></div>
<div class="fondoLogin span4 column">
   
   Complete el siguiente formulario con sus datos de acceso:


    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>

    <!--<p class="note">Los campos que lleven <span class="required">*</span> se requieren.</p>-->

    <div class="row-fluid  text-right">
        <?php //echo $form->labelEx($model, 'Usuario'); ?>
        <?php echo '<b>Usuario: </b>'.$form->textField($model, 'username'); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>
<br>
    <div class="row-fluid text-right">
        <?php //echo $form->labelEx($model, 'Clave'); ?>
        <?php echo '<b>   Clave: </b>'.$form->passwordField($model, 'password'); ?>
        <?php echo $form->error($model, 'password'); ?> 
        <p class="hint">
            <!-- Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.-->
        </p>
    </div>

    <div class="row-fluid rememberMe">
        <?php echo $form->checkBox($model, 'rememberMe'); ?>
        <?php echo $form->label($model, 'Recordar'); ?>
        <?php echo $form->error($model, 'rememberMe'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Autenticar', array("class" => "btn btn-primary")); ?>
    </div>

    <?php $this->endWidget(); ?>    
    
</div><!-- form -->
<div class="column span6">    
     <img src="<?php echo Yii::app()->baseUrl; ?>/images/pagina/login.png" width="60%">
</div><!-- form -->
<?php /*
<div class="column span6">

    <center>
        <?php
        $this->widget(
                'bootstrap.widgets.TbCarousel', array(
            'items' => array(
                array(
                    'image' => '../../images/carousel/presentacion/1.jpg',
                    'label' => 'ORIENTOIL',
                // 'caption' => 'Nuestros sistemas no tienen lìmites, ahora para la empresa ORIENTOIL'
                ),
                array(
                    'image' => '../../images/carousel/presentacion/2.jpg',
                    'label' => 'ORIENTOIL',
                // 'caption' => 'Nuestros sistemas no tienen lìmites, ahora para la empresa ORIENTOIL'
                ),
                array(
                    'image' => '../../images/carousel/presentacion/3.jpg',
                    'label' => 'ORIENTOIL',
                // 'caption' => 'Nuestros sistemas no tienen lìmites, ahora para la empresa ORIENTOIL'
                ),
                array(
                    'image' => '../../images/carousel/presentacion/4.jpg',
                    'label' => 'ORIENTOIL',
                // 'caption' => 'Nuestros sistemas no tienen lìmites, ahora para la empresa ORIENTOIL'
                ),
                array(
                    'image' => '../../images/carousel/presentacion/5.jpg',
                    'label' => 'ORIENTOIL',
                // 'caption' => 'Nuestros sistemas no tienen lìmites, ahora para la empresa ORIENTOIL'
                ),
                array(
                    'image' => '../../images/carousel/presentacion/6.jpg',
                    'label' => 'ORIENTOIL',
                // 'caption' => 'Nuestros sistemas no tienen lìmites, ahora para la empresa ORIENTOIL'
                ),
                array(
                    'image' => '../../images/carousel/presentacion/7.jpg',
                    'label' => 'ORIENTOIL',
                // 'caption' => 'Nuestros sistemas no tienen lìmites, ahora para la empresa ORIENTOIL'
                ),
                array(
                    'image' => '../../images/carousel/presentacion/8.jpg',
                    'label' => 'ORIENTOIL',
                // 'caption' => 'Nuestros sistemas no tienen lìmites, ahora para la empresa ORIENTOIL'
                ),
                array(
                    'image' => '../../images/carousel/presentacion/9.jpg',
                    'label' => 'ORIENTOIL',
                // 'caption' => 'Nuestros sistemas no tienen lìmites, ahora para la empresa ORIENTOIL'
                ),
//                 array(
//                    'image' => '../../images/carousel/presentacion/10.png',
//                    'label' => 'ORIENTOIL',
//                   // 'caption' => 'Nuestros sistemas no tienen lìmites, ahora para la empresa ORIENTOIL'
//                ),
//                 array(
//                    'image' => '../../images/carousel/presentacion/11.png',
//                    'label' => 'ORIENTOIL',
//                   // 'caption' => 'Nuestros sistemas no tienen lìmites, ahora para la empresa ORIENTOIL'
//                ),
//                
//                array(
//                    'image' => '../../images/carousel/2.jpg',
//                    'label' => 'ORIENTOIL',
//                    'caption' => 'sistema de mantenimiento programado y correctivo'
//                ),
//                array(
//                    'image' => '../../images/carousel/cabezal.jpg',
//                    'label' => 'ORIENTOIL',
//                    'caption' => 'Mejorando el proceso de mantenimiento de vehiculos y maquinaria pesada'
//                ),
            ),
                )
        );
        ?>
    </center>

</div>
<?php /* ?>
<div class="">
    <center><h3> POLÍTICA DE SALUD Y SEGURIDAD OCUPACIONAL</h3></center>

 
            <b>ORIENTOIL S.A.</b>, es una compañía al amparo de las leyes Ecuatorianas,  
            dedicado a al prestación de Servicios Petroleros como,  
            alquiler de tanques, camper, compresores generadores 
            y en servicios de transporte (cama  alta, cama baja, tanqueros, auto-tanques, Vacuum), 
            ríos, se compromete a través de sus más altas autoridades a desarrollar sus actividades 
            definiendo y ampliado una Política de Seguridad y Salud en el trabajo que se inscribe 
            la  maquinaria pesada brindando soluciones precisas, apoyando al desarrollo 
            de cada una de las empresas que solicitan  nuestro servicio, 
            quien realiza un trabajo responsable especialmente para la industria del petróleo 
            buscando la satisfacción de sus clientes y sus colaboradores, con puntualidad y calidad. 
            <br><br>
            Con este fin, <b>ORIENTOIL  S.A.</b> se compromete a:
            <br>
            <ul>
                <li type="disc">
                    Cumplir con la legislación vigente ecuatoriana  en materia de Seguridad, Salud y Ambiente, así como con los compromisos adquiridos con las partes interesadas.
                </li>
                <li type="disc">
                    Gestionar y prevenir los riesgos laborales, de salud, ambientales y de calidad que se generan como parte de las actividades del trabajo ejecutado.
                </li>
                <li type="disc">
                    Promover  la creación de una cultura basada en el compromiso de Seguridad, Salud y Ambiente, mediante la continua información y supervisión de las tareas propias de la ejecución de los trabajadores solicitados.
                </li>
                <li type="disc">
                    Comunicar y promover la adopción de estos compromisos a sus Trabajadores.
                </li>
                <li type="disc">
                    Compromiso de optimizar los recursos económicos, técnicos y humanos
                </li>
                <li type="disc">
                    Compromiso permanente de la empresa en la mejora continua del sistema integrado de gestión en todas las áreas de la empresa
                </li>
                <li type="disc">
                    Mejora continua en seguridad, salud de los trabajadores
                </li>
                <li type="disc">
                    Cumplir con la legislación vigente en Seguridad y Salud.
                </li>
                <li type="disc">
                    Inducir el entrenamiento  de cada empleado el conocimiento y habilidad necesaria para trabajar de manera segura.
                </li>
                <li type="disc">
                    Establecer programas de salud, servicios médicos e higiene que protejan la salud de sus empleados, considerando los riesgos propios de sus áreas de trabajo.
                </li>
                <li type="disc">
                    Efectuar planes de respuestas a emergencias y contingencias, así como también campañas de concientización en cuanto a la prevención y cuidado del ambiente
                </li>
                <li type="disc">
                    Hacer cumplir la correcta aplicación de esta política por medio de inspecciones, controles y auditorías internas. 
                </li>
            </ul>

            <center>
            <br>
            <b>ES RESPONSABLE DE TODOS LOS EMPLEADOS DE ORIENTOIL S.A </b>
            <br><br><br>
              <!--<img src="/sisplamV1/images/pagina/OrientOil_SA.jpg" width="250px">-->
            <br><br>
            <br>ROSMEL FRANCISTO BALCAZAR CAMPOVERDE  
            <br><b>GERENTE GENERAL
            <br>ORIENTOIL S.A</b>
            </center>
            </div> <?php */ ?>
</center>