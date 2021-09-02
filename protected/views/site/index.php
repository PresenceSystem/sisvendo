<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
if (Yii::app()->user->id > 0) {
    $this->redirect(array('indexAutenticado'));
}else
{
     $this->redirect(array('autenticar'));
}
;
?>
<?php //echo 'Fila_B: '.Yii::app()->getSession()->get('Fila_B');  ?>
<?php //echo 'Columna_B: '.Yii::app()->getSession()->get('Columna_B');  ?>
<!--<marquee Behavior='scroll'> 
  <img  src="/metodoRULA/images/pagina/RULA.jpg" width="100%"> 
  <img  src="/metodoRULA/images/pagina/RULA_bajado.png" width="100%"> 
  
</marquee>-->
<div class="text-center">
    <!--<img  src="/metodoRULA/images/pagina/RULA.jpg" width="100%">--> 
    <br>
    <br>
    <br>
    <div class="row text-center">

        <div class="column text-center">
            <b> SisVendo.- </b> Sistema de ventas a crédito, 
            <br> un servicio que te brinda <a href="www.presencesystem.com.ec">Presence System </a>
            <br>  por ser nuestro cliente, te permitirá 
            <br>  controlar a tus ajentes de venta con exactitud 
            <br>  los valores de ventas y cobros día tras día, 
            <br>  nuestro sistema es facil, confiable y seguro.
            <center>
                <a href="/metodoRULA/index.php/site/login">
                    <img  src="/sisvendo/images/pagina/Login1.png" onmouseover="this.src = '/sisvendo/images/pagina/Login2.png';" onmouseout="this.src = '/sisvendo/images/pagina/Login1.png';" width="150px"/>  
                </a>   
            </center>
        </div>
        <div class="column">
            <img  src=<?php echo Yii::app()->baseUrl . "/images/pagina/fact.jpg"; ?>  width="350px"/>  
        </div>
    </div>
    <br><br>
    <br><br>
    <br><br>
    <br>

</div>
<!--  <img  src="/sispromaV0/images/pagina/12.jpg" width="160px">  -->



