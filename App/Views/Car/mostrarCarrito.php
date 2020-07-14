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

<table class="table table-ligth table-bordered">
    <tbody>
        <tr>
            <th width="40%"class="text-center"> Descripicon </th>
            <th width="15%"class="text-center">Cantidad </th>
            <th width="20%"class="text-center"> Tiempo</th>
            <th width="20%"class="text-center">Total Tiempo </th>
            <th width="20%"class="text-center"> Precio</th>
            <th width="20%"class="text-center">Total a Pagar</th>
            <th width="5%"class="text-center"> --</th>
        </tr>
        <?php $total=0; $total_tiempo=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$servicio) { ?>
        <tr>
            <td class="text-center"> <?php echo $servicio['NOMBRE'] ; ?></td>
            <td class="text-center"> <?php echo $servicio['CANTIDAD'] ; ?></td>
            <td class="text-center"> <?php echo $servicio['TIEMPO'] ; ?></td>
            <td class="text-center"> <?php echo number_format($servicio['CANTIDAD']*$servicio['TIEMPO'],1) ; ?></td>
            <td class="text-center">
            <?php echo number_format($servicio['PRECIO'],1) ; ?></td>
            <td class="text-center"> <?php echo number_format($servicio['CANTIDAD']*$servicio['PRECIO'],1) ; ?></td>
            <td class="text-center">

            <form action="" method="POST" >
            <input type="hidden"
               name="id" id="id"
                value="<?php echo openssl_encrypt($servicio['ID'],COD,KEY); ?>">
                <button class="btn btn-danger"
                type="submit"
                name="btnAccion"
                value="Eliminar"

                >
                Eliminar</button>
            </form>



            </td>
        </tr>
        <?php $total= $total+($servicio['CANTIDAD']*$servicio['PRECIO']);
              $total_tiempo= $total_tiempo+($servicio['CANTIDAD']*$servicio['TIEMPO']);
        ?>
     <?php } ?>

        <tr>
            <td colspan="5" align="right" > <h4>Total a Pagar del Servicio:</h4>  </td>
            <td align="right" class="text-center" ><h3> <?php echo number_format($total,1); ?> </h3>  </td>
        </tr>

           <tr>
            <td colspan="3" align="right" ><h3>Duracion en Minutos:</h3>  </td>
            <td align="right" class="text-center"><h4><?php echo $total_tiempo; ?> </h4>  </td>
        </tr>
        <!--DATOS PARA REGISTRAR-->
         <tr>
             <td colspan="7" ><!--OCUPA TODO ESPACIO-->

                <form id="formAJax" action="../../Controllers/reserva.php"
                method="POST" class="needs-validation" novalidate  >

                 <div class="alert alert-success">


                 <div class="form-group">
                           <!--INFORMACION BASICA-->
                     <div class="form-row">
                         <div class="form-group col-md-6">
                          <div>
                    <label for="email">Correo Electronico:</label>
                    <input name="email" type="text" class="form-control"  placeholder="Escriba Correo Electronico" value=""  required>
                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>
                         </div>
                     <div class="form-group col-md-6">
                          <div>
                    <label for="email">Repetir Correo Electronico:</label>
                    <input name="emailDos" type="text" class="form-control"  placeholder="Escriba Correo Electronico" value=""  required>
                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>
                         </div>
                          </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                     <div >
                      <label for="nombre">Nombre Completo</label>
                      <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Escriba su Nombre Completo" value=""  required>
                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>
                 </div>
                  <div class="form-group col-md-6">
                    <div>
                     <label for="apellido">Apellido Completo:</label>
                  <input name="apellido" type="text" class="form-control" id="apellido" placeholder="Escriba su Apellido Completo" value=""  required>
                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>
                </div>
                </div>




                    <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="my-input">Fecha del Domicilio</label>
                    <input class="form-control" id="fecha_dom" name= "fecha_dom" type="date"
                    placeholder="Escribe la Fecha" required >
                     <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                     </div>

                     <div class="form-group col-md-6">
                      <label for="my-input">Hora del Domicilio</label>
                      <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true" >

                    <input class="form-control" id="hora_dom" name= "hora_dom" type="text"
                    placeholder="Escribe la Fecha"  required >
                    </div>
                     <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>
                    </div>

                         <div class="form-row">
                <div class="form-group col-md-6">
                    <div>
                     <label for="telefono">Telefono Celular Activo:</label>
                   <input name="telefono" type="number" class="form-control" id="telefono" placeholder="Escriba su Telefono" value=""  required>
                    <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                      <div>
                    <label for="direccion">Direccion :</label>
                     <input name="direccion" type="text" class="form-control" id="direccion" placeholder="Direccion donde ser hara el Domicilio" value=""  required>
                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>
                </div>
                   </div>



                 </div>
                 <small  id="emailHelp" class="form-text text-muted" >
                 Los Detalles del Servicio se enviaran a Este Correo.
                </small>

            </div>
                 <button class="btn btn-primary btn-lg btn-block" type="submit" value="proceder" name="btnAccion" >
                 Reserva Online
                   </button>
             </form>

             </td>

         </tr>
    </tbody>


</table>
<?php } else{?>
<br>
 <br>
  <div class="alert alert-danger text-center">
     <h3 class="display-6" >No ha Agregado Ningun Servicio al Carrito.</h3>

  </div>
  <br>
  <br>


    <?php   } ?>


 <!--==================FOOTER====================-->
    <?php //include('App/Views/includes/footer.php');
   //use App\Views\includes\Footer as Footer;
    //new Footer();
?>
<!--MIS ARCHIVOS JAVASCRIP-->
<script src="../assets/js/all.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.js"></script>
<!--CODIGO JAVA SCRIPT-->
<script> //Valida los Campos
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
//Prara el Reloj
$('.clockpicker').clockpicker();

</script>
