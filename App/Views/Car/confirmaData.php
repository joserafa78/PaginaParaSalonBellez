<?php namespace App\Views\Car;
require '../../../vendor/autoload.php';
require '../../../config.php';
require_once '../../../App/Controllers/carrito.php';
use App\Views\includes\Header as Header;
new Header();

if($_POST){
    $total=0;
    $total_tiempo=0;
    $SID= session_id(); //Para la Variable de Sesion. una Clave.
      $detalle = array();
    foreach($_SESSION['CARRITO'] as $indice=>$servicio){


        $total=$total+($servicio['PRECIO']*$servicio['CANTIDAD']);
        $total_tiempo=$total_tiempo+($servicio['TIEMPO']*$servicio['CANTIDAD']);


    }


    //DATOS CAPTURADOS

    //------CLENTE-----------

    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $telefono =$_POST['telefono'];
    $correo=$_POST['email'];//
    $correoDos=$_POST['emailDos'];
     $fecha=$_POST['fecha_dom'];
    $hora=$_POST['hora_dom'];
    $direccion=$_POST['direccion']; //
    $f_pago=$_POST['pago']; //



    if($correoDos!==$correo){
       muestraError("Los correos no Coinciden");
    }else if(filter_var($correo,FILTER_VALIDATE_EMAIL ) ){
       muestraData($nombre,$apellido,$correo,$telefono,$fecha,$hora,$direccion,$total_tiempo,$total,$f_pago);
    }else{
       muestraError("Problemas con Tu Direccion de correo");
    }



}
?>

<?php
function muestraData($nombre,$apellido,$correo,$telefono,$fecha,$hora,$direccion,$total_tiempo,$total,$f_pago){ ?>
<div class="jumbotrom text-center ">
   <br/>
   <br/>
   <br/>
    <h1 class="display-4"> ¡Confirmar Datos! </h1>
    <hr class="my-4">
    <p class="lead" >

        <div >
        <label for="">Nombre completo:</label><br>

          <?php echo $nombre." ".$apellido;?>   <br>

        <label for="">Correo Electronico:</label><br>
          <?php echo $correo ;?> <br>

        <label for="">Telefono:</label><br>
          <?php echo $telefono ;?> <br>

        <label for="">Fecha Domicio:</label>
           <?php echo $fecha ;?><br>

        <label for="">Hora Domicilio:</label>
          <?php echo $hora ;?> <br>

        <label for="">Direccion del Domicilio:</label><br>
          <?php echo $direccion ;?><br>

        <label for="">Duracion en Minutos:</label><br>
           <?php echo $total_tiempo ;?><br>

         <label for="">Foma de Pago:</label> <br>
        <?php echo $f_pago ;?><br>

        <label for="">Toatal A Pagar:</label> <br>
        <b><?php echo $total ;?></b><br>

        </div>


</div>
     <br/>
   <br/>

     <div class="row container-fluid">

       <div class="col-6 float-sm-left">
           <a   href="<?php echo URL;?>App/Views/Car/cargarData.php" class="btn btn-primary"> Atras </a>
       </div>

       <div class="col-6 float-sm-rigth">
           <form action="<?php echo URL;?>App/Controllers/reserva.php" method="POST" >
            <!--IMPUT-->
             <input name="email_A" type="hidden"  value="<?php echo $correo ; ?>"  required>
             <input name="nombre_A" type="hidden"  value="<?php echo $nombre ; ?>"  required>
             <input name="apellido_A" type="hidden"  value="<?php echo $apellido; ?>"  required>
             <input name="fecha_dom_A" type="hidden"  value="<?php echo $fecha; ?>"  required>
             <input name="hora_dom_A" type="hidden"  value="<?php echo $hora; ?>"  required>
             <input name="telefono_A" type="hidden"  value="<?php echo $telefono; ?>"  required>
             <input name="direccion_A" type="hidden"  value="<?php echo $direccion; ?>"  required>
             <input name="pago" type="hidden"  value="<?php echo $f_pago; ?>"  required>



            <button class="btn btn-primary" type="submit" value="reservar" name="btnAccion" >
                 Sigiente
                   </button>
           </form>

       </div>
     </div>

<?php } ?>

<?php
function muestraError($msj){  ?>

 <br>
 <br>
 <br>

<div class="jumbotrom text-center ">
   <br/>
   <br/>
   <br/>
    <h1 class="display-4"> ¡<?php echo $msj; ?>! </h1>
    <hr class="my-4">
    <p class="lead" >




</div>
        <div class="row container-fluid">
       <div class="col-6 float-sm-center">
           <a   href="<?php echo URL;?>App/Views/Car/cargarData.php" class="btn btn-primary"> Atras </a>
       </div>

     </div>
<?php } ?>


  <!--==================FOOTER====================-->
    <?php //include('includes/footer.php');
    use App\Views\includes\FooterBasico as FooterB;
    new FooterB();
    ?>
