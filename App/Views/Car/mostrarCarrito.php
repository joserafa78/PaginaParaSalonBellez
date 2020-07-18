<?php namespace App\Views\Car;
require '../../../vendor/autoload.php';
require '../../../config.php';
require_once '../../../App/Controllers/carrito.php';
use App\Views\includes\Header as Header;
new Header();
?>


<!--==================CABECERA====================-->
<br>
<h3>Lista de Carrito</h3>

<?php if (!empty($_SESSION['CARRITO']))   {?>




    <tbody>



         <div class="row">
        <tr>
           <div class="col-6  col-sm-6   col-md-6 col-lg-4 col-xl-4      d-lg-block">
            <th width="40%"class="text-center"> <b>Descripicon</b> </th>
           </div>
           <div class="col-0  col-sm-0   col-md-0 col-lg-1 col-xl-1 d-none d-lg-block">
            <th width="15%"class="text-center"><b>Cantidad </b></th>
            </div>
            <div class="col-0  col-sm-0   col-md-0 col-lg-1 col-xl-1 d-none d-lg-block">
            <th width="20%"class="text-center"> <b>Tiempo</b></th>
            </div>
            <div class="col-0  col-sm-0   col-md-0 col-lg-1 col-xl-1 d-none d-lg-block">
            <th width="20%"class="text-center"><b>T.Tiempo</b> </th>
            </div>
            <div class="col-0  col-sm-0   col-md-0 col-lg-1 col-xl-1 d-none d-lg-block">
            <th width="20%"class="text-center"> <b>Precio</b></th>
            </div>
            <div class="col-2  col-sm-2   col-md-2 col-lg-1 col-xl-1        d-lg-block ">
            <th width="20%"class="text-center"><b>Pagar</b></th>
            </div>
            <div class="col-2  col-sm-2   col-md-2 col-lg-2 col-xl-2        d-lg-block">
            <th width="5%"class="text-center"> Opcion</th>
            </div>

        </tr>
           </div>
        <hr class="my-4">
        <div class="row"> <hr color="red"> </div>

        <?php $total=0; $total_tiempo=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$servicio) { ?>
        <div class="row">
        <tr>
           <div class="col-6  col-sm-6   col-md-6 col-lg-4 col-xl-4 d-lg-block mt-10">
            <td class="text-center"> <?php echo $servicio['NOMBRE'] ; ?></td>
            </div>
            <div class="col-0  col-sm-0   col-md-0 col-lg-1 col-xl-1 d-none d-lg-block">
            <td class="text-center"> <?php echo $servicio['CANTIDAD'] ; ?></td>
            </div>
            <div class="col-0  col-sm-0   col-md-0 col-lg-1 col-xl-1 d-none d-lg-block">
            <td class="text-center"> <?php echo $servicio['TIEMPO'] ; ?></td>
            </div>
            <div class="col-0  col-sm-0   col-md-0 col-lg-1 col-xl-1 d-none d-lg-block">
            <td class="text-center"> <?php echo number_format($servicio['CANTIDAD']*$servicio['TIEMPO'],1) ; ?></td>
            </div>
            <div class="col-0  col-sm-0   col-md-0 col-lg-1 col-xl-1 d-none d-lg-block">
            <td class="text-center">
            <?php echo number_format($servicio['PRECIO'],1) ; ?></td>
            </div>
            <div class="col-2  col-sm-2   col-md-2 col-lg-1 col-xl-1        d-lg-block ">
            <td class="text-center"> <?php echo number_format($servicio['CANTIDAD']*$servicio['PRECIO'],1) ; ?></td>
            </div>
            <div class="col-2  col-sm-2   col-md-2 col-lg-2 col-xl-2    d-lg-block ">
            <td class="text-center">

            <form action="" method="POST" >
            <input type="hidden"
               name="id"
                value="<?php echo openssl_encrypt($servicio['ID'],COD,KEY); ?>">
                <button class="btn btn-danger"
                type="submit"
                name="btnAccion"
                value="Eliminar"

                >
                Eliminar</button>
            </form>



            </td>
            </div>

        </tr>
           </div>
        <div class="row"> <hr color="red"> </div>
        <div class="row"> <hr color="red"> </div>



        <?php $total= $total+($servicio['CANTIDAD']*$servicio['PRECIO']);
              $total_tiempo= $total_tiempo+($servicio['CANTIDAD']*$servicio['TIEMPO']);
        ?>
     <?php } ?>
  <div class="row justify-content-center">
        <tr>
            <td colspan="5" align="right" > <h4>Total a Pagar:  </h4>  </td>
            <td align="right" class="text-center" ><h3> <?php echo "  ".number_format($total,1); ?> </h3>  </td>
        </tr>
        </div>
<div class="row justify-content-center">

           <tr>
            <td colspan="3" align="right" ><h3>Duracion:</h3>  </td>
            <td align="right" class="text-center"><h4><?php echo $total_tiempo; ?> </h4>  </td>
        </tr>

    </div>
     <div class="row container-fluid">
       <div class="col-6 float-sm-left">
           <a   href="<?php echo URL;?>" class="btn btn-primary"> Atras </a>
       </div>

       <div class="col-6 float-sm-rigth">
           <a  href="<?php echo URL;?>App/Views/Car/cargarData.php" class="btn btn-primary">Sigiente </a>
       </div>
     </div>
        <!--DATOS PARA REGISTRAR-->

    </tbody>





<?php } else{?>
<br>
 <br>
  <div class="alert alert-danger text-center">
     <h3 class="display-6" >No ha Agregado Ningun Servicio al Carrito.</h3>
     <button class="btn btn-primary">  Atras</button>



  </div>
  <br>
  <br>


    <?php   } ?>


 <!--==================FOOTER====================-->

<!--MIS ARCHIVOS JAVASCRIP-->
<script src="../assets/js/all.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.js"></script>
<!--CODIGO JAVA SCRIPT-->

  <!--==================FOOTER====================-->
    <?php //include('includes/footer.php');
    use App\Views\includes\FooterBasico as FooterB;
    new FooterB();
    ?>
