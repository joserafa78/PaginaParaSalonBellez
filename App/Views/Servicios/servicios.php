<?php namespace App\Views\Car;

require '../../../vendor/autoload.php';
require '../../../config.php';
require_once '../../../App/Controllers/carrito.php';
use App\Views\includes\Header as Header;
use App\Views\includes\Footer as Footer;
new Header();
use App\ServiceSql\HumanBodyPartsServiceSql as PartesSql;
$Part = new PartesSql();
use App\ServiceSql\ServicesServiceSql as ServiceSql;
use App\ServiceSql\Services as Services;
$MisServicios = new ServiceSql();
?>




        <br>
        <br>
        <br>
       <div class="container ">
        <div class="row">
            <div class="col-lg-12">
            <div class="card shadow-lg p-3 mb-5 bg-white ">
        <div class="card-header text-center"> <h3> Cargar Mis Servicios </h3> </div>
        <div class="card-body">
        <form id="formAJax" action="<?php echo URL.'App/Controllers/ServicesController.php'; ?> " method="POST" class="needs-validation  " novalidate enctype="multipart/form-data" >

                  <!--<div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label for="id">  </label>
                      <input name="id" type="text" class="form-control" id="id" placeholder="" value="" disabled disabled>

                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="id_cuerpo">  </label>
                      <input name="id_cuerpo" type="text" class="form-control" id="id_cuerpo" placeholder="" value=""  disabled>

                    </div>
                  </div>-->

                   <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label for="nombre">Nombre del Servicio</label>
                      <input name="nombre" type="text" class="form-control" id="nombre" placeholder="" value=""  required>
                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>

                    <div class="col-md-4 mb-3  ">
                      <label for="id_cuerpo">Area del Cuerpo</label>
                      <select name="id_cuerpo" id="id_cuerpo" class="form-control" required>


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
                      <input type="text" name="descripcion" id="descripcion" cols="50" rows="5"  class="form-control" value="" required>

                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>

                    <div class="col-md-4 mb-3">
                   <label for="id"> Promosion (Si/No)  </label>
                      <select name="promocion" id="promocion" class="form-control" required>
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
                      <input name="tiempo" type="number" class="form-control" id="tiempo" placeholder="" value="" required>
                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="precio">Precio A Cobrar</label>
                      <input name="precio" type="number" class="form-control" id="precio" placeholder="" value="" required>
                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>
                  </div>


                  <div class="form-row">

                    <div class="col-md-4 mb-3">
                      <label for="imagenUno">Imagen uno</label>
                    <input type="file" class="form-control" name="imagenUno" id="imagenUno" required>

                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="imagenDos">Imagen Dos</label>
                      <input type="file" class="form-control" name="imagenDos" id="imagenDos"  required>
                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>





                  </div>

                  <button class="btn btn-primary" type="submit" id="btn_guardar" name="Accion" value="Guarda"> Guardar </button>
                </form>
        </div>
    </div>
            </div>
        </div>
       </div> <!--FIN FORMULARIO-->





    <div class="row " > <!--EMPIEZA TABLA PARAMOSTRAR-->
    <div class="col-lg-12">
     <div class="card shadow-lg p-3 mb-5 bg-white ">
    <div class="card-header text-center"> <h3>Listado de  Servicios Cargados</h3> </div>
        <div class="card-body">



	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h5 class="panel-title">   </h5>
	  </div>
	  <div class="panel-body">
	    <table class="table table-striped table-hover ">
		  <thead>
		    <tr>
		      <th class="text-center">Imagen</th>
		      <th class="text-center">Promo</th>
		      <th class="text-center">Nombre</th>
		      <th class="text-center">Cuerpo</th>
		      <th class="text-center">Tiempo</th>
		      <th class="text-center">Precio</th>
		      <th class="text-center">Botones</th>
		    </tr>
		  </thead>

		  <tbody>

 <!--CODIGO PHP PARA MOSTRAR LOS SERVICIOS LISTOS--->

    <?php
             $result = $MisServicios->getAll();
             foreach($result as $index=>$valor) { //Recorre Servicio por Servicio
                    foreach($valor as $ind => $val) {//Recorre los Campo de C/Servi.
                            $identifica=$ind;
                        if ($identifica==="id")  $id=$val ;//Cara cada Valor en
                        if ($identifica==="name") $nombre= $val ;
                        if ($identifica==="promotion") $promocion= $val ;
                        if ($identifica==="name_body_parts")  $nombre_Part=$val ;
                        if ($identifica==="time")  $tiempo=$val ;
                        if ($identifica==="price")  $precio=$val ;
                        if ($identifica==="image")  $imagen=$val ;

                 }?>


		  <tr>
            <td class="text-center">
            <img src=" <?php echo URL.'App/Views/img/'.$imagen ; ?> "
            alt="" style=" widght:50px; height:50px; " >  </td>
            <td class="text-center"> <?php echo  $promocion  ; ?> </td>
            <td class="text-center"> <?php echo  $nombre   ; ?> </td>
            <td class="text-center"> <?php echo  $nombre_Part   ; ?></td>
            <td class="text-center"> <?php echo  $tiempo   ; ?></td>
            <td class="text-center"> <?php echo  $precio   ; ?></td>
            <td class="text-center">

               <form action="<?php echo URL.'App/Controllers/ServicesController.php'; ?>" method="POST" >
                <input type="hidden"
                name="id" id="<?php echo  $id   ; ?>"
                value="<?php echo  $id; ?>">
                <button class="btn btn-danger far fa-trash-alt"
                type="submit"
                name="Accion"
                value="Eliminar">
                </button>

                 <a href="actualizaServicios.php?id=<?php echo  $id   ; ?>" class="btn btn-success">
                <i class="fas fa-marker"></i>
              </a>

               </form>




              </td>
         </tr>


    <?php }?>
		  </tbody>

		</table>
	  </div>

	</div>
       </div>

        </div>
         </div>
          </div>  <!--FIN TABLA-->



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

<!--METODO AJAX-PARA MOSTRAR SERVICIO POR ID-->
<script type="text/javascript" >

  function ConsultarPorId(ident) {

    $.ajax({
        url: "<?php echo URL.'App/Controllers/ServicesController.php'; ?>",
        data: {
            "id": ident,
            "Accion": "Consulatar_id"
        },
        type: 'POST',
        datatype: 'json'

    }).done(function (response) {

        //document.getElemenById('id').value = "9090909090";
        var nombre= response.name;
        $('#id').attr("value",nombre)
        /*document.getElemenById('id_cuerpo').value = response.name_body_parts;
        document.getElemenById('nombre').value = response.name;
        document.getElemenById('promocion').value = response.promotion;
        document.getElemenById('descripcion').value = response.description;
        document.getElemenById('tiempo').value = response.time;
         document.getElemenById('precio').value = response.price;*/
        //document.getElemenById('imagenUno').value = response.image;
        //document.getElemenById('imagenDos').value = response.image_two;
          //$a=new Services();

           console.log("Valor es:  ",response->name);




    }).fail(function (response) {
        console.log(response);
    });

}

</script>
