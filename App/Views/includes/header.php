<?php declare(strict_types = 1 );
//_____________NOMBRE DE ESPACIO____________________
namespace App\Views\includes;
//_____________________________________


class  Header{


//METODOS<
public function __construct(){

 if(!isset($_SESSION['mostrar'])){//Chekea que Variable Este Definida
     $_SESSION['mostrar']="todo";  //Sino la Crea.
 }

?>



<!-------------------------------------->
<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Domicilios de Belleza" />
    <meta name="author" content="Jose Rafael Jimenez Serna">
    <title>Tienda de la Belleza | Agenda en línea tus servicios de Domicilio</title>
    <meta name="description" content="Domiciolo, uñas, cabello, depilacion, tintes, mascarillas. Todos los servicios en Colombia." />

    <!--  JQUERY-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>
    <!--ESTILOS CSS BOOTSTRAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!--  PAGINA PARA CARGAR ICONOS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">

    <!--CALENDARIO AGENDA CSS-->
    <link rel='stylesheet' type='text/css' href='<?php echo URL;?>App/css/fullcalendar.css' />
    <!--CALENDARIO AGENDA JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!--css y js-->
    <script type='text/javascript' src='<?php echo URL;?>App/js/moment.min.js'></script>
    <script type='text/javascript' src='<?php echo URL;?>App/js/fullcalendar.min.js'></script>
    <script type='text/javascript' src='<?php echo URL;?>App/js/locale/es.js'></script>


    <!--RELOJO-->
    <script src="<?php echo URL;?>App/js/bootstrap-clockpicker.js"></script>
    <link rel="stylesheet" href="<?php echo URL;?>App/css/bootstrap-clockpicker.css">



</head>

<body>

    <!--==================BARRA NAV===================-->
    <div class="row ">
        <div class="col ">
            <nav class="navbar navbar-expand-sm navbar-light fixed-top " style="background-color: fuchsia">

                <a href="#" class="navbar-drand"> <img src="<?php echo URL;?>App/Views/img/logo1.png" style="width: 50px;"> </a>

                <button class="navbar-toggler" data-target="#menu" data-toggle="collapse" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item"> <a id="linkInicio" href="<?php echo URL;?>" class="nav-link"> Inicio </a> </li>

                        <li class="nav-item"> <a href="#" class="nav-link"> Servicios </a> </li>

                        <li class="nav-item"> <a href="<?php echo URL;?>App/Views/Agenda/AgendaPrincipal.php" class="nav-link"> Agenda </a> </li>

                        <li class="nav-item">
                            <a href="<?php echo URL;?>App/Views/Car/mostrarCarrito.php" class="nav-link"> Carrito(<?php
                             echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']) ;

                                ?>). </a> </li>


                        <li class="nav-item" id="li-Entra"> <a id="linkEntra" href="#" class="nav-link " data-target="#ventanamodal" data-toggle="modal"> Iniciar Sesion </a>
                        </li>

                    </ul>

                    <form method="post" class="form-inline">
                        <input type="text" name="textBusca" placeholder="Busca tu Servicio" class="form-control mr-sm-2">

                        <!--BOTON ENVIAR A CARRITO-->
                        <button type="submit" name="btnAccion" class="btn btn-success" value="BuscarServicio"> Buscar</button>

                        <!--SOLO PARA ASIGNAR LA URL-->
                        <input type="hidden" id="url" value="<?php echo URL;?>">
                    </form>

                </div>

            </nav>


            <!--VENTANA MODAL PARA ENTRAR -->
            <div id="ventanamodal" class="modal fade" tabindex="-1" role="dialog" arial-labelledby="tituloventana" area-hidden="true">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <!--cabecera-->
                        <div class="modal-header">
                            <h4 id="tituloventana" class="modal-title"> </h4>
                            <button type="button" class="close" data-dismiss="modal" arial-label="Cerrar">
                                <span aria-hidden="true"> &times;</span>
                            </button>
                        </div>
                        <!--cuerpo-->
                        <div class="modal-body">

                            <form class="formularioR">
                                <h1>Iniciar Secion </h1>
                                <div class="contenedor">
                                    <div class="input-contenedor">
                                        <i class="fas fa-envelope icon"></i>
                                        <!--Carga icono del la pagina-->
                                        <input id="email" name="email" type="text" placeholder="Correo" value="">
                                    </div>
                                    <div class="input-contenedor">
                                        <i class="fas fa-key icon"></i>
                                        <!--Carga icono del la pagina-->
                                        <input type="password" id="password" name="password" placeholder="Clave" value="">
                                    </div>

                                    <div id="msjLabel"> </div>
                                </div>
                            </form>

                        </div>
                        <!--pie-->
                        <div class="modal-body">
                            <button class="btn btn-info " type="button" data-dismiss="modal">Cerar</button>
                            <!--botones- clikeado-->

                            <input type="button" id="btnEntrar"  value="Entrar" class="btn btn-primary">
                            <p>Al Registrarte, aceptas nuestras condiciones de uso y Politicas de privacidad.</p>
                            <p>¿No tienes Cuenta? <a href="#" class="link" data-target="#ventanamodalR222" data-toggle="modal"> Regístrate. </a> </p>


                        </div>
                    </div>
                </div>

            </div>
            <!---FIN VENTANA MODAL ENTRAR----->
            <!--############################CODIGO SCRIPT############################# -->
            <script type="text/javascript">
       $( document ).ready(function() {

                chekeaSesionAbiertas(); //Chekea que exita un Moderador con la cuenta Abiert

                var datos;
                var url = $('#url').val();




                //-----EVENTOS DE LOS BOTONOES---->


              var botonEntrar = document.getElementById("btnEntrar");
              botonEntrar.addEventListener("click", EntrarProceso, false);



                function EntrarProceso() {//JavaScript Nativo.
                    recolectarDatos(); //llama function
                    enviarInformacion('entrar', datos, false);

                }



                $('#linkCerar').click(function() { //Funcion Clic.

                    alert('Cerrando Sesion..');
                    sessionStorage.setItem('usuarioModerador', '');

                });
                $("#password").keypress(function(e) {
                    var code = (e.keyCode ? e.keyCode : e.which);
                    if (code == 13) {
                        recolectarDatos(); //llama function
                        enviarInformacion('entrar', datos, false); //Envia tipo pOST.
                        return false;
                    }
                });



                function recolectarDatos() {
                    var correo = $('#email').val().toLowerCase();
                    var clave = $('#password').val();
                    datos = "correo=" + correo + "&password=" + clave; //Simbolo (&)Separa
                }

                function creaSesionLocalModerador(dato) {
                    if (typeof(Storage) !== undefined) { //Chekea que el Navg use Storage
                        //Ejecuta el codigo si es compatible.
                        sessionStorage.setItem('usuarioModerador', dato);
                        chekeaSesionAbiertas();

                    } else {
                        //No es compatible
                    }

                }

                function opcionesDelModerador(data) { //Nail Moderador
                    var url = $('#url').val();
                    var css1 = {
                        'color': 'blue',
                        'text-transform': 'capitalize',
                        'font-size': '18px'
                    };

                    var l_Servi = url + "App/Views/Servicios/servicios.php";
                    var l_Agen = url + "App/Views/Agenda/Miagenda.php"
                    var html = "";
                    html += '<a id="linkEntra" href="#" class="nav-link dorpdown-toggle "  data-toggle="dropdown">Iniciar Sesion</a>';
                    html += '<div class= "dropdown-menu">';
                    html += '<a href="" class="dropdown-item">Perfil</a>';
                    html += '<a href="" class="dropdown-item">Notificaciones</a>';
                    html += '<a href="' + l_Servi + '" class="dropdown-item">Mis Servicios</a>';
                    html += '<a href="" class="dropdown-item">Mis Clientes</a>';
                    html += '<a href="' + l_Agen + '" class="dropdown-item">Mi Agenda</a>';
                    html += '<a href="'+url+'" id="linkCerar" class="dropdown-item">Cerrar Sesion</a>';
                    html += '</div>';

                    $('#li-Entra').html(html);

                    //__________________
                    $('#linkEntra').text(data);
                    $('#linkEntra').css(css1);
                    $('#li-Entra').addClass("dropdown");
                    $('#linkEntra').addClass("dropdown-toggle");
                    $('#linkEntra').attr('data-toggle', 'dropdown');

                }

                function opcionesDeClientes() { //Nail Moderador


                    var color = $('#linkInicio').css('color');
                    var tamano = $('#linkInicio').css('font-size');
                    var css1 = {
                        'color': color,
                        'font-size': tamano
                    };
                    //____________________________
                    var html = "";
                    html += '<a id="linkEntra" href="#" class="nav-link " data-target="#ventanamodal" data-toggle="modal"> Iniciar Sesion. </a>';

                    $('#li-Entra').html(html);

                    //----------------------------------
                    $('#li-Entra').removeAttr("class");
                    $('#li-Entra').addClass("nav-item");
                    $('#linkEntra').text('Iniciar Sesion');
                    $('#linkEntra').css(css1);


                }

                function chekeaSesionAbiertas() {
                    var data = sessionStorage.getItem('usuarioModerador');


                    if (data === null) {
                        opcionesDeClientes();
                    } else {

                        if (data !== "") {
                            opcionesDelModerador(data);
                        } else {
                            opcionesDeClientes();
                        }

                    }


                }

                //función creación del objeto XMLHttpRequest.
                function creaObjetoAjax() { //Mayoría de navegadores
                    var obj;
                    if (window.XMLHttpRequest) {
                        obj = new XMLHttpRequest();
                    } else { //para IE 5 y IE 6
                        obj = new ActiveXObject(Microsoft.XMLHTTP);
                    }
                    return obj;
                }
                var c = 0;
                function enviarInformacion(accion, misdatos, modal) {

                    Url = url + 'App/Controllers/validarUserControllers.php?accion=' + accion;
                    //Objeto XMLHttpRequest creado por la función.
                    objetoAjax = creaObjetoAjax();
                    //Preparar el envio  con Open
                    objetoAjax.open("POST", Url, true);
                    //Enviar cabeceras para que acepte POST:
                    objetoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    objetoAjax.setRequestHeader("Content-type", misdatos.length);
                    //============================
                    objetoAjax.onreadystatechange = recogeDatos;
                    objetoAjax.send(misdatos);
                    function recogeDatos() {
                        if (objetoAjax.readyState == 4 && objetoAjax.status == 200) {
                            //return objetoAjax.responseText;
                            respuesta = objetoAjax.responseText;

                            //=====RESPUESTA-------
                            if (respuesta == 'false') {
                                c++;
                                $('#msjLabel').addClass('text-danger');
                                $('#msjLabel').text('..Error..n:('+c+')')


                            } else { //acepta y carga

                                result = jQuery.parseJSON(respuesta);
                                for (var i=0; i<result.length;i++){
                                   nombre=result[i].first_name;
                                    apellido=result[i].last_name;
                                }


                                nombrecompleto = nombre + " " + apellido;


                                creaSesionLocalModerador(nombrecompleto);
                                $('#ventanamodal').modal('toggle'); //Ciera modal modal
                            }

                            //====================
                        }

                    }

                }
           } );


            </script>



            <!--VENTANA MODAL PARA GREGISTRO -->
            <div id="ventanamodalR" class="modal fade" tabindex="-1" role="dialog" arial-labelledby="tituloventanaR" area-hidden="true">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <!--cabecera-->
                        <div class="modal-header">
                            <h4 id="tituloventanaR" class="modal-title"> </h4>
                            <button type="button" class="close" data-dismiss="modal" arial-label="Cerrar">
                                <span aria-hidden="true"> &times;</span>
                            </button>
                        </div>
                        <!--cuerpo-->
                        <div class="modal-body">

                            <form class="formularioR">
                                <h1>Registrate</h1>
                                <div class="contenedor">




                                    <div class="input-contenedor">
                                        <i class="fas fa-user icon"></i>
                                        <!--Carga icono del la pagina-->
                                        <input type="text" placeholder="Nombre Completo">
                                    </div>

                                    <div class="input-contenedor">
                                        <i class="fas fa-user icon"></i>
                                        <!--Carga icono del la pagina-->
                                        <input type="text" placeholder="Apellido Completo">
                                    </div>

                                    <div class="input-contenedor">
                                        <i class="fas fa-phone-square icon"></i>
                                        <!--Carga icono del la pagina-->
                                        <input type="text" placeholder="Telefono Celular">
                                    </div>


                                    <div class="input-contenedor">
                                        <i class="fas fa-envelope icon"></i>
                                        <!--Carga icono del la pagina-->
                                        <input type="text" placeholder="Correo Electronico">
                                    </div>

                                    <div class="input-contenedor">
                                        <i class="fas fa-key icon"></i>
                                        <!--Carga icono del la pagina-->
                                        <input type="password" placeholder="Clave">
                                    </div>


                                </div>

                            </form>

                        </div>
                        <!--pie-->
                        <div class="modal-body">
                            <button class="btn btn-info " type="button" data-dismiss="modal">Cerar</button>
                            <!--botones-->
                            <input type="submit" value="Registrate" class="btn btn-primary">
                            <p>Al Registrarte, aceptas nuestras condiciones de uso y Politicas de privacidad.</p>
                            <p>¿No tienes Cuenta?<a class="link" href="#"> Iniciar Sesion</a></p>

                        </div>
                    </div>
                </div>

            </div>
            <!---FIN VENTANA MODAL ENTRAR----->



        </div>
    </div>


    <?php }}

  //=====CODIGO POST PARA LA BUQUEDA =====
if( isset($_POST['btnAccion'])){//Valida que exista un POST

    switch($_POST['btnAccion']){
        case 'BuscarServicio':

            if ($_POST['textBusca']=="")
            {
                $_SESSION['mostrar']="todos";
                $_SESSION['contenido']="";
            }else{
            $_SESSION['mostrar']="buscar";
            $_SESSION['contenido']=$_POST['textBusca'];
            //Re-Direcciona.
            header('Location:'.URL."'");
                }


            break;

        case 'Categoria':
            if ($_POST['id_categoria']==0)//Muestra Todo
            {
                 $_SESSION['mostrar']="todos";
                $_SESSION['contenido']="";
                header('Location:'.URL."'");

            }else{ //Muestra solo la categoria.
            $_SESSION['mostrar']="categoria";
            $_SESSION['contenido']=$_POST['id_categoria'];
            //Re-Direcciona.
            header('Location:'.URL."'");
            }
            break;

     }



    }




    ?>
