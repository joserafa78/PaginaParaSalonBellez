<?php namespace App\Views\Car;

require '../../../vendor/autoload.php';
require '../../../config.php';
require_once '../../../App/Controllers/carrito.php';
use App\Views\includes\Header as Header;
use App\Views\includes\Footer as Footer;
new Header();
use App\Models\Services as Services;
use App\ServiceSql\HumanBodyPartsServiceSql as PartesSql;
$Part = new PartesSql();
use App\ServiceSql\ServicesServiceSql as ServiceSql;

$MisServicios = new ServiceSql();




if (isset($_GET['id'])) {

    $SqlService = new ServiceSql();
    $obj=new Services();
    $obj=$SqlService->get($_GET['id']);

     $id_s=$obj->id;
     $nombre_s=$obj->name;
     $cuerpo_s=$obj->id_body_parts;
     $cuerpo_name_s=$obj->name_body_parts;
     $promocion_s=$obj->promotion;
     $descripcion_s=$obj->description;
     $precio_s=$obj->price;
     $tiempo_s=$obj->time;
     $imagen_s=$obj->image;
     $imagenDos_s=$obj->image_two;
    //echo " <script> alert('$nombre'); </script>";

}

?>


<!------------------------------------------------>
        <br>
        <br>
        <br>
       <div class="container ">
        <div class="row">
            <div class="col-lg-12">
            <div class="card shadow-lg p-3 mb-5 bg-white ">
        <div class="card-header text-center"> <h3> Editar Servicios </h3> </div>
        <div class="card-body">
        <form id="formAJax" action="<?php echo URL.'App/Controllers/ServicesController.php'; ?> " method="POST" class="needs-validation  " novalidate enctype="multipart/form-data" >

                  <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label for="id">Identificador </label>
                      <input name="id" type="text" class="form-control bg-info" id="id" placeholder="" value="<?php echo $id_s ?>" readonly >

                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="id_cuerpo">  </label>
                      <input name="id_cuerpo" type="hidden" class="form-control" id="id_cuerpo" placeholder="" value=""  disabled>

                    </div>
                  </div>

                   <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label for="nombre">Nombre del Servicio</label>
                      <input name="nombre" type="text" class="form-control" id="nombre" placeholder="" value="<?php echo $nombre_s ?>"  required>
                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>

                    <div class="col-md-4 mb-3  ">
                      <label for="id_cuerpo">Area del Cuerpo</label>
                      <select name="id_cuerpo" id="id_cuerpo" class="form-control" required>

                    <option  value="<?php echo $cuerpo_s ;?>" > <?php echo $cuerpo_name_s;?></option>
                        <!--CODIGO PHP -->
                                 <?php

             $result = $Part->getAll();
             foreach($result as $index=>$valor) { //Recorre Servicio por Servicio
                    foreach($valor as $ind => $val) {//Recorre los Campo de C/Servi.
                            $identifica=$ind;
                        if ($identifica==="id")  $id=$val ;//Cara cada Valor en su Variable.
                        if ($identifica==="name") $nombre= $val ;

                 }?>




                         <!--CARGA CADA UNO-->
                    <option  value="<?php echo $id;?>" > <?php echo $nombre;?></option>

                    <?php } ?>
                    </select>
                      <div class="justify-content-center" >
                       <butoon class="btn btn-info" >+</butoon>
                       </div>
                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>
                  </div>

                   <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label for="descripcion">Una Breve descripcion del Servicio </label>
                      <input type="text" name="descripcion" id="descripcion" cols="50" rows="5"  class="form-control" value="<?php echo $descripcion_s ?>" required>

                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>

                    <div class="col-md-4 mb-3">
                   <label for="id"> Promosion (Si/No)  </label>
                      <select name="promocion" id="promocion" value="" class="form-control" required>
                       <option  value="<?php echo $promocion_s ?>" > <?php echo $promocion_s ?></option>
                        <option  value="No" > No</option>
                         <option  value="Si" > Si</option>
                     </select>

                     <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>
                  </div>

                    <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label for="tiempo">Duracion En Minutos</label>
                      <input name="tiempo" type="number" class="form-control" id="tiempo" placeholder="" value="<?php echo $tiempo_s ?>" required>
                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="precio">Precio A Cobrar</label>
                      <input name="precio" type="number" class="form-control" id="precio" placeholder="" value="<?php echo $precio_s ?>" required>
                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>
                  </div>

                  <div class="form-row">  <!--IMAGENES-->
                  <div class="col-md-4 mb-3">
                  <label for="imagen1">Imagen Uno</label>
                  <img class="d-block w-100" src="../img/<?php echo $imagen_s ?>"    data-content="Imagen Uno."
                    height="130px" width="90px">
                    </div>

                    <div class="col-md-4 mb-3">
                   <label for="imagen2">Imagen Dos</label>
                  <img class="d-block w-100" src="../img/<?php echo $imagenDos_s?>"    data-content="Imagen Dos."
                    height="130px" width="90px">
                    </div>

                  </div>

                  <div class="form-row">

                    <div class="col-md-4 mb-3">
                      <label for="imagenUno">Cargar Nueva Imagen Uno</label>
                    <input  class="form-control" name="imagenUno" id="imagenUno" type="file" >


                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="imagenDos">Cargar Nueva Imagen Dos</label>
                      <input  class="form-control" name="imagenDos" id="imagenDos" type="file" >

                    </div>

                  </div>

                  <button class="btn btn-primary" type="submit" id="btn_guardar" name="Accion" value="Actualizar"> Actualizar </button>
                </form>
        </div>
    </div>
            </div>
        </div>
       </div> <!--FIN FORMULARIO-->


    <!--=============================================================-->




</body>
<!--MIS ARCHIVOS JAVASCRIP-->
<script src="../assets/js/all.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.js"></script>

<!--CODIGO JAVA SCRIPT-->
<script type="text/javascript"> //Valida los Campos
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
</script>

</html>
<?php  new Footer();  ?>

