<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
if (!Yii::app()->user->isGuest && Usuario::model()->findByPk(Yii::app()->user->id)->esAdministradorCobrador()) {
?>
<div> 
    
   
        <h4>
            <center>           
            <!--<br><br>-->
         <!--<img src="/sismedant/images/virtual.jpg" width="20%"/>--> 
       
        <!--<br><br><br><br>-->
        <MARQUEE BGCOLOR="#000"><h3> <font color="#FFF"> Bienvenid@ <?php echo Yii::app()->getSession()->get('nombre_usuario_sisvendo');?> al menú de administración "SISVENDO"</font></h3></MARQUEE>
                   <br>   Un sistema web moderno e innovador para gestionar ventas a crédito.
                    <br>
        
        <?php //echo CHtml::image(Yii::app()->request->baseUrl . '/images/fotos/' . $model->foto, "...", array("width" => 100)); ?>
      
                    <a href="../tContrato/buscar_cobrar">   
            <div class="fondoLogin span3 text-center">
       <?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/pagina/cobrar.png', "...", array("width" => '100%')); ?>
             COBRAR
            </div>
        </a>
                    
<!--        <a href="/sismedant/index.php/estudiante/create">
            
        <img src="/sismedant/images/pagina/Ficha.png" onmouseover="this.src='/sismedant/images/pagina/Ficha3.png';" onmouseout="this.src='/sismedant/images/pagina/Ficha.png';" width="300px"/>  
        </a>           
             <a href="/sismedant/index.php/resultado/create">
        <img src="/sismedant/images/pagina/Informe0.png" onmouseover="this.src='/sismedant/images/pagina/Informe1.png';" onmouseout="this.src='/sismedant/images/pagina/Informe0.png';" width="300px"/>
        </a>-->

            <img src="/sisvendo/images/pagina/vendedora.png" width="20%">  </b><br>
    </center>
    </h4>
</div>

<?php }
else
{    ?>
       <div>
    
    <!--<h2>Bienvenido al sistema de administración: <br> <i><?php //echo CHtml::encode(Yii::app()->name);  ?></i></h2>-->
       <center> 
<!--           <h2>SISMEDANT</h2> -->
       </center>

        <h4>
            <center>           
            <!--<br><br>-->
         <!--<img src="/sismedant/images/virtual.jpg" width="20%"/>--> 
       
        <!--<br><br><br><br>-->
        <MARQUEE BGCOLOR="#000"><h2> <font color="#FFF"> Bienvenid@ <?php echo Yii::app()->getSession()->get('nombre_usuario_sisvendo');?> al menú de administración "SISVENDO"</font></h2></MARQUEE>
        <div class='fondo2'>
           <br>   Un sistema web moderno e innovador para gestionar ventas a crédito.
        <br>
        
        
<!--        <a href="/sismedant/index.php/site/login">
            
        <img dynsrc="/sismedant/images/pagina/Minutos.mid" Loop=1 controls start=mouseover src="/sismedant/images/pagina/Login1.png" onmouseover="this.src='/sismedant/images/pagina/Login2.png';" onmouseout="this.src='/sismedant/images/pagina/Login1.png';" width="250px"/>  
        </a> -->
<!--        <a href="/sismedant/index.php/estudiante/create">
            
        <img src="/sismedant/images/pagina/Ficha.png" onmouseover="this.src='/sismedant/images/pagina/Ficha3.png';" onmouseout="this.src='/sismedant/images/pagina/Ficha.png';" width="300px"/>  
        </a>           
             <a href="/sismedant/index.php/resultado/create">
        <img src="/sismedant/images/pagina/Informe0.png" onmouseover="this.src='/sismedant/images/pagina/Informe1.png';" onmouseout="this.src='/sismedant/images/pagina/Informe0.png';" width="300px"/>
        </a>-->

            <img src="/sisvendo/images/pagina/vendedora.png" width="30%">  </b><br>
    </center>
    </h4>
</div> 
<?php } ?>
