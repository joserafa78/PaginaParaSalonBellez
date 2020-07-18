<?php declare(strict_types = 1 );
//_____________NOMBRE DE ESPACIO____________________
namespace App\Views\includes;
//_____________________________________


class  Footer{


//METODOS<
public function __construct(){ ?>

 <div class="row  mt-1 mb-2 "  >
           <!-- Footer -->
<footer class="page-footer font-small unique-color-dark">

  <div style="background-color: fuchsia">
    <div class="container">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <h6 class="mb-0">Desarrollador de soluciones en la Nube: Jose Rafael jimenez!</h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right">

          <!-- Facebook -->

          <a class="fb-ic" href="#">
            <i class="fab fa-facebook-f white-text mr-4"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic" href="#">
            <i class="fab fa-twitter white-text mr-4"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic" href="#">
            <i class="fab fa-google-plus-g white-text mr-4"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic" href="#">
            <i class="fab fa-linkedin-in white-text mr-4"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic" href="#">
            <i class="fab fa-instagram white-text"> </i>
          </a>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row mt-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">Goldnail</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>Soy una Emprendedora que busca solucionar los servicios de belleza en las personas ocupadas llevando a su lugar de trabajo u hogar una atencion Personalizada..</p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Servicios</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="#!">Peluqueria</a>
        </p>
        <p>
          <a href="#!">Estetica</a>
        </p>
        <p>
          <a href="#!">Depilacion</a>
        </p>
        <p>
          <a href="#!">Limpieza de Cuerpo</a>
        </p>

      </div>
      <!-- Grid column -->



      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contacto</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <i class="fas fa-home mr-3"></i> Bogota, Distrito C, Colombia</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> nailulloa@gmail..com</p>
        <p>
          <i class="fas fa-phone mr-3"></i> + 57 313 693 88</p>
        <p>
          <i class="fas fa-print mr-3"></i> + 31 234 567 89</p>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
        </div>
        <!--=============================================-->
    </div>
<script>
$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>
</body>
<!-- JAVASCRIPT -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js
"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<!---->
<scirpt  src="<?php echo URL;?>App/js/iniciaSesion.js" >  </scirpt>

</html>




<?php }} ?>
