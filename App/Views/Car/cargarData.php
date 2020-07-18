<?php namespace App\Views\Car;
require '../../../vendor/autoload.php';
require '../../../config.php';
require_once '../../../App/Controllers/carrito.php';
use App\Views\includes\Header as Header;
new Header();
?>


<!--==================CABECERA====================-->


<?php if (!empty($_SESSION['CARRITO']))   {?>
    <br>
    <br>

    <tbody>

        <!--DATOS PARA REGISTRAR-->
         <tr>
             <td colspan="7" ><!--OCUPA TODO ESPACIO-->
                <!------------------------------------------------------------->

                <form id="formAJax" action="<?php echo URL;?>App/Views/Car/confirmaData.php"
                method="POST" class="needs-validation" novalidate  >

                 <div class="alert alert-success">


                 <div class="form-group">
                           <!--INFORMACION BASICA-->
                     <div class="form-row">
                         <div class="form-group col-md-6">
                          <div>
                    <label for="email">Correo Electronico:</label>
                    <input name="email" type="text" class="form-control"  placeholder="Escriba Correo Electronico" value="" id="email1" required>
                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>
                         </div>
                     <div class="form-group col-md-6">
                          <div>
                    <label for="email">Repetir Correo Electronico:</label>
                    <input name="emailDos" type="text" class="form-control"  placeholder="Escriba Correo Electronico" value="" id="email2" required>
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
                      <div class="input-group clockpicker"  data-autoclose="true" >

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
                <div class="form-row">
                <label for="">
                 <input type="radio" name="pago" value="contraentrega" checked="checked">
                 ContraEntrega</label>
                </div>
                <div class="form-row">
                <label for="">
                 <input type="radio" name="pago" value="paypal" >
                    PayPal</label>
                </div>



                 </div>
                 <small  id="emailHelp" class="form-text text-muted" >
                 Los Detalles del Servicio se enviaran a Este Correo.
                </small>

            </div>
                  <div class="row container-fluid">
       <div class="col-6 float-sm-left">
           <a   href="<?php echo URL;?>App/Views/Car/mostrarCarrito.php" class="btn btn-primary"> Atras </a>
       </div>

       <div class="col-6 float-sm-rigth">
           <button class="btn btn-primary btn-lg " type="submit" value="proceder" name="btnAccion" >
                 Sigiente
            </button>
       </div>
     </div>



             </form>

             </td>

         </tr>
    </tbody>





<?php } else{?>
<br>
 <br>
  <div class="alert alert-danger text-center">
     <h3 class="display-6" >Porfavor Agrege Servicio al Carrito.</h3>

     <button class="btn btn-primary">  Atras</button>



  </div>
  <br>
  <br>


    <?php   } ?>


 <!--==================FOOTER====================-->

<!--MIS ARCHIVOS JAVASCRIP-->
<!--<script src="../assets/js/all.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.js"></script>
<!--CODIGO JAVA SCRIPT-->
<script>


//Valida los Campos
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
  <!--==================FOOTER====================-->
    <?php //include('includes/footer.php');
    use App\Views\includes\FooterBasico as FooterB;
    new FooterB();
    ?>
