<!--=================CABECERA===================-->
<?php

//include('includes/header.php');
    use App\Views\includes\Header as Header;
    new Header();
require_once 'App/Controllers/carrito.php';
$AltoImgCarrusel=370;
$AltoImgCarruselServi=330;


?>
<!--CARGA CABECERA-->

<!--=================CARRUSEL===================-->
<div class="container ">
   <br>
    <div class="row justify-content-center mb-1 mt-5">
        <!--Carousel Wrapper-->
        <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
            <!--Indicators-->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-2" data-slide-to="1"></li>
                <li data-target="#carousel-example-2" data-slide-to="2"></li>
                <li data-target="#carousel-example-2" data-slide-to="3"></li>
                <li data-target="#carousel-example-2" data-slide-to="4"></li>
            </ol>
            <!--/.Indicators-->
            <!--Slides-->
            <div class="carousel-inner" role="listbox">

                <div class="carousel-item active">
                    <div class="view">
                        <img src="App/Views/img/Portada1.jpg" alt="First slide" height="<?php echo $AltoImgCarrusel; ?>px" class="w-100 ">
                        <div class="mask rgba-black-light"></div>
                    </div>
                    <div class="carousel-caption">
                        <h3 class="h3-responsive">Naila Gold</h3>
                        <p>Servicio Profesional</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view">
                        <img src="App/Views/img/Portada2.jpg" alt="Second slide" height="<?php echo $AltoImgCarrusel; ?>px" class="w-100 ">
                        <div class="mask rgba-black-strong"></div>
                    </div>
                    <div class="carousel-caption">
                        <h3 class="h3-responsive">Servicios</h3>
                        <p>Añade al Carrito tu Servicio</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view">
                        <img src="App/Views/img/Portada3.jpg" alt="Third slide" height="<?php echo $AltoImgCarrusel; ?>px" class="w-100 ">
                        <div class="mask rgba-black-slight"></div>
                    </div>
                    <div class="carousel-caption">
                        <h3 class="h3-responsive">Previa Cita</h3>
                        <p>Agenda tu Cita</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view">
                        <img src="App/Views/img/Portada4.jpg" alt="fourth slide" height="<?php echo $AltoImgCarrusel; ?>px" class="w-100 ">
                        <div class="mask rgba-black-slight"></div>
                    </div>
                    <div class="carousel-caption">
                        <h3 class="h3-responsive">Ahorra Dinero</h3>
                        <p>Totaliza el Monto Total a Pagar</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view">
                        <img src="App/Views/img/Portada5.jpg" alt="fifth slide" height="<?php echo $AltoImgCarrusel; ?>px" class="w-100 ">
                        <div class="mask rgba-black-slight"></div>
                    </div>
                    <div class="carousel-caption">
                        <h3 class="h3-responsive">Ahorra Tiempo</h3>
                        <p>Chekea la duracion del Servicio</p>
                    </div>
                </div>

            </div>
            <!--/.Slides-->
            <!--Controls-->
            <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!--/.Controls-->
        </div>
        <!--/.Carousel Wrapper-->
    </div>
    <!--=================TRES DIV===================-->
    <!--=========MINU IZQUIERDO=============-->
    <div class="row  ">
        <div class="col-3  col-sm-3   col-md-3 col-lg-2 col-xl-2 d-none d-lg-block   ">

            <table class="table ">
                <thead>
                    <tr>
                        <th>Categorias</th>
                    </tr>
                </thead>
                <tbody>
                    <ul class="list-group">


                      <tr>
                            <td>
                                <form  method="post">
                                    <li class="list-group-item">



                                    <button type="submit" name="btnAccion" class="btn btn-outline-primary" value="Categoria"> Todos</button>

                                       </li>
                                    <input name="id_categoria" type="hidden" value="0">
                                  </form>
                            </td>
                        </tr>

                        <?php
            use App\ServiceSql\HumanBodyPartsServiceSql as Categ;
            $Categorias = new Categ();
            $result = $Categorias->getAll();
             foreach($result as $index => $valor) { ?>
                        <!--Recorre Area del Categorias-->

                        <tr>
                            <td>
                                <?php
                    foreach($valor as $ind => $val) {//Recorre los Campo de c/CAtegoria.
                            $identifica=$ind;
                        if ($identifica==="id")  $iden=$val ;//Cara cada Valor en su Variable.
                        if ($identifica==="name") $nombre= $val ;
                        if ($identifica==="description") $descripcion =$val ;
                        if ($identifica==="image") $imagen =$val ;
                ?>

                                <?php }?>





                            <form  method="post">
                                <li class="list-group-item">

                           <!-- <a href="<?php echo $iden ?>" type="submit" name="btnAccion" value="Categoria" >
                                        <?php echo $nombre; ?></a> -->

                            <button type="submit" name="btnAccion" class="btn btn-outline-primary" value="Categoria"> <?php echo $nombre; ?></button>

                                         </li>
                            <input name="id_categoria" type="hidden" value="<?php echo $iden ?>">
                              </form>

                            </td>
                        </tr>

                        <?php } ?>

                    </ul>
                </tbody>
            </table>
 </form>





        </div>

        <!--=========CENTRO - SERVICIOS=============-->
        <div class="col-12 col-sm-12  col-md-12 col-lg-10 col-xl-10  w-100" id="centro">

            <?php if(isset($_SESSION['message'] )){?>
            <!--ALERTA-->
            <div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                <?php //echo $mensaje; ?>
                <?php  //print_r($_POST); ?>
                <?php echo $_SESSION['message']; ?>
                <a href="<?php echo URL;?>App/Views/Car/mostrarCarrito.php" class="badge gebge-success ">Ver Carrito</a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php  }?>
            <!----------->




            <div class="row ">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                           <!--SWINCH PAR MOSTAR TEXTO-->
                           <?php
                            $textoP="";
                                   switch ($_SESSION['mostrar'])
                {
                    case 'categoria':
                        $textoP = "Servicios por Categoria";
                        break;
                    case 'buscar':

                       $data = true;//$Serv->Sharh($_SESSION['contenido']);
                        if ($data)
                        {
                            $textoP = "Servicio(s) Encontrado(s)";

                        }else{
                            $textoP = "Lo Siento No se Encontro Servicio";
                        }
                        break;

                    default:
                     $textoP = "Todos Nestros Servicio";
                        break;
                }

                            ?>

                            <th ><?php echo $textoP;?></th>
                        </tr>
                    </thead>
                    <!--  <tbody>-->
                </table>
                <?php
            use App\ServiceSql\ServicesServiceSql as ServSql;
            $Serv = new ServSql();

                $result;
                switch ($_SESSION['mostrar'])
                {
                    case 'categoria':
                        $result = $Serv->getAllCategoria($_SESSION['contenido']);
                        break;
                    case 'buscar':
                        $a=$_SESSION['contenido'];
                       $data = $Serv->Sharh($_SESSION['contenido']);
                        if ($data)
                        {
                            $_SESSION['messageBusqueda']="Se Encontraron Servicios";
                            $result=$data;

                        }else{
                            $_SESSION['messageBusqueda']="Lo Siento No Hay Servicios";
                            $result = $Serv->getAll();
                        }
                        break;

                    default:
                    $result = $Serv->getAll();
                        break;
                }




                $c=0;
             foreach($result as $index => $valor) { //Recorre Servicio por Servicio
              ?>
                <!-- <tr>-->
                <!--    <td>-->
                <?php
                 $c++;
                    foreach($valor as $ind => $val) {//Recorre los Campo de C/Servi.
                            $identifica=$ind;
                        if ($identifica==="id")  $iden=$val ;//Cara cada Valor en su Variable.
                        if ($identifica==="name") $nombre= $val ;
                        if ($identifica==="description") $descripcion =$val ;
                        if ($identifica==="price") $precio =$val ;
                        if ($identifica==="name_body_parts") $categoria =$val ;
                        if ($identifica==="time") $tiempo =$val ;
                        if ($identifica==="image") $imagen =$val ;
                        if ($identifica==="image_two") $imagen_dos =$val ;
                        if ($identifica==="promotion") $promo =$val ;
                ?>

                <?php }?>

                <!-- Caja de servicios. -->
                <div class="form-row d-block">
                    <div class="product-block text-center  p-md-3 p-2 rounded trsn col-12 ">

                        <!--#################CARUSEL#####################-->
                        <div class="card  shadow-sm">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-bold"><?php echo $categoria ?></h4>
                            </div>

                            <style type="text/css">
                                .imgT {
                                    height: 100%;
                                    width: 250px
                                }

                            </style>

                            <div class="card-body">
                                <img src="App/Views/img/<?php echo $imagen ?>" class="card-img-top imgT" width="100px">
                                <h1 class="card-title pricing-card-title precio"> <span class="">
                                        <h4><a href="#"><?php echo $nombre; ?></a></h4>

                                    </span></h1>

                                <ul class="list-unstyled mt-3 mb-4">
                                    <li></li>
                                    <li>
                                        <span class="product-block-list">
                                            <span class="badge badge-info"> <?php echo $tiempo; ?> </span> Minutos</span>

                                    </li>
                                    <li>
                                        <span class="product-block-list">
                                            <span class="badge badge-warning"> <?php echo number_format($precio,1); ?> </span> <?php echo MONEDA; ?></span>
                                    </li>
                                    <li>
                                        <?php if ($promo=="Si") {?>
                        <span class="badge badge-success"  >
                                   <h5> -Oferta- </h5>

                        </span>
                                <?php }?>


                                    </li>
                                </ul>
                                <!--BOTON------------------>
                            </div>
                            <form  method="post" enctype="multipart/form-data" name="buy">
                                <div class="row adc-form no-gutters product-stock product-available">

                                    <div class="col-70 mx-auto">

                                        <!--BOTON ENVIAR A CARRITO-->
                                        <button type="submit" name="btnAccion" class="adc btn btn-adc btn-block btn-primary" value="Agregar"><i class="fas fa-cart-plus"></i> Carrito</button>
                                        <br>

                                    </div> <!--hidden-->

                                    <input type="hidden" name="id"  value="<?php echo openssl_encrypt($iden,COD,KEY); ?>">
                                    <input type="hidden" name="nombre"  value="<?php echo openssl_encrypt($nombre,COD,KEY) ; ?>">
                                    <input type="hidden" name="precio"  value="<?php echo openssl_encrypt($precio,COD,KEY); ?>">
                                    <input type="hidden" name="tiempo"  value="<?php echo openssl_encrypt($tiempo,COD,KEY); ?>">
                                    <input type="hidden" name="cantidad"  value="<?php echo openssl_encrypt(1,COD,KEY); ?>">


                                </div>
                            </form>

                            <!--FIN--BOTON-------------->

                        </div>

                        <!--=============================================-->

                        <!--###############FIN-DE-CARUSEL#################-->

                        <div class="caption">





                            <div>

                                <!--inicio form--Boton-->

                                <!--inicio form--Boton-->

                            </div>

                        </div>
                    </div>

                </div>
                <!--Fin. Caja de servicios. -->




                <!--  </td>-->
                <!--  </tr>-->

                <?php } ?>

                </tbody>
                <!--  </table>-->
            </div>


        </div>


    </div>


    <!--==================FOOTER====================-->
    <?php //include('includes/footer.php');
    use App\Views\includes\Footer as Footer;
    new Footer();
    ?>
