<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

        <!-- AGREGAR PARA USAR BOOTSTRAP -->
        <?php
        echo Yii::app()->bootstrap->registerAllCss();
        echo Yii::app()->bootstrap->registerCoreScripts();
        ?>
        <!-- FIN PARA AGREGAR PARA USAR BOOTSTRAP -->

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/images/pagina/icono.ico"> </link>
    </head>

    <body>
<!--<a id="skippy" class="sr-only sr-only-focusable" href="#content"><div class="container"><span class="skiplink-text">Saltar al contenido principal</span></div></a>
 Docs page layout 
    <div class="bs-docs-header" id="content">
      <div class="container">
        <h1>Components</h1>
        <p>Over a dozen reusable components built to provide iconography, dropdowns, input groups, navigation, alerts, and much more.</p>
        <div id="carbonads-container"><div class="carbonad"><div id="azcarbon"></div><script>var z = document.createElement("script"); z.async = true; z.src = "http://engine.carbonads.com/z/32341/azcarbon_2_1_0_HORIZ"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(z, s);</script></div></div>

      </div>
    </div>-->
    <!-- Docs master nav -->
    <header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
  <div class="container">
    <div class="navbar-header">
<!--      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">De prueba</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>-->
      <!--<a href="../" class="navbar-brand">Bootstrap</a>-->
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse">
      <ul class="nav navbar-nav">
        <li>
          <a href="../getting-started/">Ingresar cobros</a>
        </li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://expo.getbootstrap.com" onclick="ga('send', 'event', 'Navbar', 'Community links', 'Expo');">PS</a></li>
        
      </ul>
    </nav>
  </div>
</header>
     
        
        <!--#################################################-->
        <!--    <div class="navbar navbar-inverse navbar-fixed-top">    INMOVILIZA EL TOP-->

        <div class=" navbar "> 
            <div class="navbar-inner">
                                         <div class="banner" align='center'>
                                     <img src="<?php echo  Yii::app()->baseUrl ?>/images/pagina/banner_2015.jpg" width="100%"></img>                    
                                </div>


                <div class="">
                    <!--<button type="button" class="btn btn-navbar" data-toogle="collapse" data-target=".nav-collapse">-->
                                <div class="btn-navbar  " role='navigation'>
                                   <span class="icon-bar"></span>
                                </div>
                                <!--</button>-->
                                
                                    <a class="brand" href="<?php echo Yii::app()->homeUrl; ?>">
                                        <?php echo CHtml::encode(Yii::app()->name); ?>  
                                    </a>
                                
                                <?php
                                //PARA ACCESO PÚBLICO                     
                                //PARA RSTRINGIR  EL ACCESO SOLO A LOS ADMINISTRADORES
                                if (!Yii::app()->user->isGuest && Usuario::model()->findByPk(Yii::app()->user->id)->esAdministrador()) {
                                    $this->widget('bootstrap.widgets.TbButtonGroup', array(
                                        'type' => 'info', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                        //  'icon'=>'book',        
                                        'size' => '50px',
                                        'buttons' => array(
                                            array('label' => 'Ingresar', 'items' => array(
                                                      array('label' => 'Marca', 'icon' => 'bookmark', 'url' => array('/tMarca/create')),
                                                    array('label' => 'Proveedor', 'icon' => 'cog', 'url' => array('/tProveedor/create')),
                                                    array('label' => 'Articulo', 'icon' => 'check', 'url' => array('/tArticulo/create')),
                                                    array('label' => 'Cliente', 'icon' => 'random', 'url' => array('/tPersona/ingresar')),
                                                    array('label' => 'Contrato', 'icon' => 'random', 'url' => array('/tPersona/buscar')),
                                                    //array('label' => 'Balance de producción', 'icon' => 'tag', 'url' => array('/tbBalance/create')),
                                                    '---',
                                                    array('label' => 'Usuario', 'icon' => 'user', 'url' => array('/usuario/create')),
                                                ))
                                        )
                                    ));
                                    $this->widget('bootstrap.widgets.TbButtonGroup', array(
                                        'type' => 'info', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                        //  'icon'=>'book',        
                                        'size' => '50px',
                                        'buttons' => array(
                                            array('label' => 'Buscar', 'items' => array(
                                                    array('label' => 'Marca', 'icon' => 'bookmark', 'url' => array('/tMarca/admin')),
                                                    array('label' => 'Proveedor', 'icon' => 'cog', 'url' => array('/tProveedor/admin')),
                                                    array('label' => 'Articulo', 'icon' => 'check', 'url' => array('/tArticulo/admin')),
                                                    array('label' => 'Cliente', 'icon' => 'random', 'url' => array('/tPersona/admin')),
                                                   // array('label' => 'Contrato', 'icon' => 'random', 'url' => array('/tContrato/admin')),
                                                    array('label' => 'Contratos', 'items' => array(
                                                        array('label' => 'Vigentes', 'icon' => 'list', 'url' => array('/tContrato/vigentes')),
                                                        array('label' => 'Pagados', 'icon' => 'check', 'url' => array('/tContrato/pagados')),
                                                        )),
                                                    //array('label' => 'Balance de producción', 'icon' => 'tag', 'url' => array('/tbBalance/create')),
                                                    '---',
                                                    array('label' => 'Usuario', 'icon' => 'user', 'url' => array('/usuario/admin')),
                                                ))
                                        )
                                    ));

                                     $this->widget('bootstrap.widgets.TbButtonGroup', array(
                                        'type' => 'info', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                        //  'icon'=>'book',        
                                        'size' => '50px',
                                        'buttons' => array(
                                          //  array('label' => 'Contáctenos', 'url' => array('/site/contact')),
                                                            // array('label' => ':::', 'url' => '#'),
                                            array('label' => 'Acerca de', 'url' => array('/site/presenceSystem')),
                                        ),
                                    ));
                                    $this->widget('bootstrap.widgets.TbButtonGroup', array(
                                        'type' => 'success', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                        //  'icon'=>'book',        
                                        'size' => '50px',
                                        'buttons' => array(
                                            //  array('label'=>'Modificar', 'items'=>array(
                                            // array('label' => 'Salir', 'icon' => 'tag', 'url' => array('/tbBalance/view', 'id' => 1))
                                            array('label' => 'Salir (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                                        //  array('label'=>'...', 'icon' => 'user', 'url'=>'#'), 
                                        //      )
                                        ),
                                    ));
                                };
                                
                                    if (!Yii::app()->user->isGuest && Usuario::model()->findByPk(Yii::app()->user->id)->esAdministradorEmpresario()) {
                                        $this->widget('bootstrap.widgets.TbButtonGroup', array(
                                        'type' => 'info', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                        //  'icon'=>'book',        
                                        'size' => '50px',
                                        'buttons' => array(
                                            array('label' => 'Ingresar', 'items' => array(
                                                      array('label' => 'Marca', 'icon' => 'bookmark', 'url' => array('/tMarca/create')),
                                                    array('label' => 'Proveedor', 'icon' => 'cog', 'url' => array('/tProveedor/create')),
                                                    array('label' => 'Articulo', 'icon' => 'check', 'url' => array('/tArticulo/create')),
                                                    array('label' => 'Cliente', 'icon' => 'random', 'url' => array('/tPersona/ingresar')),
                                                    array('label' => 'Contrato', 'icon' => 'random', 'url' => array('/tPersona/buscar')),
                                                    //array('label' => 'Balance de producción', 'icon' => 'tag', 'url' => array('/tbBalance/create')),
                                                    '---',
                                                  //  array('label' => 'Usuario', 'icon' => 'user', 'url' => array('/usuario/create')),
                                                ))
                                        )
                                    ));
                                    $this->widget('bootstrap.widgets.TbButtonGroup', array(
                                        'type' => 'info', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                        //  'icon'=>'book',        
                                        'size' => '50px',
                                        'buttons' => array(
                                            array('label' => 'Buscar', 'items' => array(
                                                    array('label' => 'Marcas', 'icon' => 'bookmark', 'url' => array('/tMarca/admin')),
                                                    array('label' => 'Proveedores', 'icon' => 'cog', 'url' => array('/tProveedor/admin')),
                                                    array('label' => 'Articulos', 'icon' => 'check', 'url' => array('/tArticulo/admin')),
                                                    array('label' => 'Clientes & Garantes', 'icon' => 'random', 'url' => array('/tPersona/admin')),
                                                   // array('label' => 'Contratos', 'icon' => 'random', 'url' => array('/tContrato/admin')),
                                                   array('label' => 'Contratos', 'items' => array(
                                                        array('label' => 'Vigentes', 'icon' => 'list', 'url' => array('/tContrato/vigentes')),
                                                        array('label' => 'Pagados', 'icon' => 'check', 'url' => array('/tContrato/pagados')),
                                                        )),
                                                    //array('label' => 'Balance de producción', 'icon' => 'tag', 'url' => array('/tbBalance/create')),
                                                    '---',
                                                 //   array('label' => 'Usuario', 'icon' => 'user', 'url' => array('/usuario/admin')),
                                                ))
                                        )
                                    ));
                                    $this->widget('bootstrap.widgets.TbButtonGroup', array(
                                        'type' => 'info', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                        //  'icon'=>'book',        
                                        'size' => '50px',
                                        'buttons' => array(
                                            array('label' => 'Reportes', 'items' => array(
                                                    //array('label' => 'Marcas', 'icon' => 'bookmark', 'url' => array('/tMarca/admin')),
                                                    //array('label' => 'Proveedores', 'icon' => 'cog', 'url' => array('/tProveedor/admin')),
                                                    //array('label' => 'Articulos', 'icon' => 'check', 'url' => array('/tArticulo/admin')),
                                                    //array('label' => 'Clientes & Garantes', 'icon' => 'random', 'url' => array('/tPersona/admin')),
                                                array('label' => 'Clientes morosos ', 'icon' => 'random', 'url' => array('/tContrato/listaDeudores')),
                                                array('label' => 'Clientes puntuales ', 'icon' => 'random', 'url' => array('/tContrato/listaPuntuales')),
                                                array('label' => 'Deudores para central de riesgo', 'icon' => 'signal', 'url' => array('/tContrato/deudores')),
                                                array('label' => 'Cobros del día', 'icon' => 'pencil', 'url' => array('/tCuota/cobros')),
                                                array('label' => 'Cobros modificados en el día', 'icon' => 'pencil', 'url' => array('/tCuota/cobrosModificados')),
                                                    //array('label' => 'Balance de producción', 'icon' => 'tag', 'url' => array('/tbBalance/create')),
                                                    '---',
                                                 //   array('label' => 'Usuario', 'icon' => 'user', 'url' => array('/usuario/admin')),
                                                ))
                                        )
                                    ));

                                     $this->widget('bootstrap.widgets.TbButtonGroup', array(
                                        'type' => 'info', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                        //  'icon'=>'book',        
                                        'size' => '50px',
                                        'buttons' => array(
                                          //  array('label' => 'Contáctenos', 'url' => array('/site/contact')),
                                                            // array('label' => ':::', 'url' => '#'),
                                            array('label' => 'Acerca de', 'url' => array('/site/presenceSystem')),
                                        ),
                                    ));
                                    
                                     $this->widget('bootstrap.widgets.TbButtonGroup', array(
                                        'type' => 'success', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                        //  'icon'=>'book',        
                                        'size' => '50px',
                                        'buttons' => array(
                                            //  array('label'=>'Modificar', 'items'=>array(
                                             array('label' => 'Vender', 'icon' => 'tag', 'url' => array('/tPersona/buscar'))
                                           // array('label' => 'Salir (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                                        //  array('label'=>'...', 'icon' => 'user', 'url'=>'#'), 
                                        //      )
                                        ),
                                    ));
                                     $this->widget('bootstrap.widgets.TbButtonGroup', array(
                                        'type' => 'success', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                        //  'icon'=>'book',        
                                        'size' => '50px',
                                        'buttons' => array(
                                            //  array('label'=>'Modificar', 'items'=>array(
                                             array('label' => 'Cobrar', 'icon' => 'tag', 'url' => array('/tContrato/buscar_cobrar'))
                                         //   array('label' => 'Salir (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                                        //  array('label'=>'...', 'icon' => 'user', 'url'=>'#'), 
                                        //      )
                                        ),
                                    ));
                                     
                                     
                                     $this->widget('bootstrap.widgets.TbButtonGroup', array(
                                        'type' => 'success', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                        //  'icon'=>'book',        
                                        'size' => '50px',
                                        'buttons' => array(
                                            //  array('label'=>'Modificar', 'items'=>array(
                                            // array('label' => 'Salir', 'icon' => 'tag', 'url' => array('/tbBalance/view', 'id' => 1))
                                            array('label' => 'Salir (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                                        //  array('label'=>'...', 'icon' => 'user', 'url'=>'#'), 
                                        //      )
                                        ),
                                    ));
                                    
                                    }
                                    
                                    if (!Yii::app()->user->isGuest && Usuario::model()->findByPk(Yii::app()->user->id)->esAdministradorCobrador()) {
                                        $this->widget('bootstrap.widgets.TbMenu', array(
                                                        'type' => '',
                                                        'items' => array(
                //                                            array('label' => 'Inicio', 'url' => array('/site/index')),
                                                            // array('label' => ':::', 'url' => '#'),
                                                           // array('label' => 'Contáctenos', 'url' => array('/site/contact')),
                                                            // array('label' => ':::', 'url' => '#'),
                                                              array('label' => 'Cobrar', 'icon' => 'tag', 'url' => array('/tContrato/buscar_cobrar')),
                                                           // array('label' => 'Acerca de', 'url' => array('/site/presenceSystem')),
                                                            // array('label' => ':::', 'url' => '#'),
                //                                            array('label' => 'Autenticar', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                                                            array('label' => 'Salir (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                                                        ),
                                                    ));
                                        }
                                        
                                        if (!Yii::app()->user->isGuest && Usuario::model()->findByPk(Yii::app()->user->id)->esVendedor()) {
                                              $this->widget('bootstrap.widgets.TbMenu', array(
                                                        'type' => '',
                                                        'items' => array(                
                                                              array('label' => 'Cobrar', 'icon' => 'tag', 'url' => array('/tContrato/buscar_cobrar')),                                                           
                                                            array('label' => 'Salir (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                                                        ),
                                                    ));
                                        }
                                         $this->widget('bootstrap.widgets.TbButtonGroup', array(
                                        'type' => 'info', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                        //  'icon'=>'book',        
                                        'size' => '50px',
                                        'buttons' => array(
                                            array('label' => 'Reportes', 'items' => array(
                                                    //array('label' => 'Marcas', 'icon' => 'bookmark', 'url' => array('/tMarca/admin')),
                                                    //array('label' => 'Proveedores', 'icon' => 'cog', 'url' => array('/tProveedor/admin')),
                                                    //array('label' => 'Articulos', 'icon' => 'check', 'url' => array('/tArticulo/admin')),
                                                    //array('label' => 'Clientes & Garantes', 'icon' => 'random', 'url' => array('/tPersona/admin')),
                                                array('label' => 'Clientes morosos ', 'icon' => 'random', 'url' => array('/tContrato/listaDeudores')),
                                                array('label' => 'Clientes puntuales ', 'icon' => 'random', 'url' => array('/tContrato/listaPuntuales')),
                                                array('label' => 'Deudores para central de riesgo', 'icon' => 'signal', 'url' => array('/tContrato/deudores')),
                                                array('label' => 'Cobros del día', 'icon' => 'pencil', 'url' => array('/tCuota/cobros')),
                                                array('label' => 'Cobros modificados en el día', 'icon' => 'pencil', 'url' => array('/tCuota/cobrosModificados')),
                                                    //array('label' => 'Balance de producción', 'icon' => 'tag', 'url' => array('/tbBalance/create')),
                                                    '---',
                                                 //   array('label' => 'Usuario', 'icon' => 'user', 'url' => array('/usuario/admin')),
                                                ))
                                        )
                                    ));
                                       
//                                        if (Yii::app()->user->isGuest) {
//                                       $this->widget('bootstrap.widgets.TbMenu', array(
//                                                        'type' => '',
//                                                        'items' => array(
//                //                                            array('label' => 'Inicio', 'url' => array('/site/index')),
//                                                            // array('label' => ':::', 'url' => '#'),
//                                                           // array('label' => 'Contáctenos', 'url' => array('/site/contact')),
//                                                            // array('label' => ':::', 'url' => '#'),
//                                                            array('label' => 'Acerca de', 'url' => array('/site/presenceSystem')),
//                                                            // array('label' => ':::', 'url' => '#'),
//                //                                            array('label' => 'Autenticar', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
//                                                            array('label' => 'Salir (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
//                                                        ),
//                                                    ));
//                                        };
                                    
                                
                                
                                
                                ?>

                                </div>
                                </div>
                                </div><!-- mainmenu -->

                                <div class="container">
                                    <!--<div class="page-header">-->
                                        
                                        <?php // if (isset($this->breadcrumbs)):  ?>
                                        <?php
//                        $this->widget('zii.widgets.CBreadcrumbs', array(
//                            'links' => $this->breadcrumbs,
//                        ));
                                        ?> <!--breadcrumbs -->
                                        <?php // endif ?>
                                    <!--</div>-->

                                    <div class="container fondoColor"> 
                                        <?php echo $content; ?>
                                    </div>
                                    <!--Despues del contentido-->
                                    <!--BOTONES ANTERIOR Y SIGUIENTE-->
                                    <ul class="pager in">
                                        <li class="previous">
                                            <a href="javascript:history.back()">&larr; Anterior</a>
                                        </li>
                                        <li class="next">
                                            <a href="javascript:history.forward()">Siguiente &rarr;</a>
                                        </li>
                                    </ul>
                                    <br></br>
                                    <br><br>
                                            <div class="footer text-center">

                                                Copyright &copy; <?php echo gmdate('Y'); ?> JT<br/>
                                                Todos los derechos reservados.<br/>
                                                <?php echo "Diseñado por   "; ?><a href="www.presencesystem.com.ec"> "PRESENCE SYSTEM"</a>
                                            </div><!-- footer -->
                                            </div>

                                            <!--</div> page -->
                                            </body>
                                            </html>
