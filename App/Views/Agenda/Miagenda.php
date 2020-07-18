<?php
require '../../../vendor/autoload.php';
require '../../../config.php';
    use App\Views\includes\Header as Header;
    new Header();

?>

<!--CODIGO SCRIPT--->
<script>
        function addZero(i) {
            if (i < 10) {
                i = '0' + i;
            }
            return i;
        }

        var hoy = new Date();
        var dd = hoy.getDate();
        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        }

        var mm = hoy.getMonth() + 1;
        var yyyy = hoy.getFullYear();

        dd = addZero(dd);
        mm = addZero(mm);

        $(document).ready(function() {
            var URL= $('#url').val();
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: yyyy + '-' + mm + '-' + dd,
                buttonIcons: true, // show the prev/next text
                weekNumbers: false,
                editable: true,//Activa Callend para que usaurio Mueva eventos
                eventLimit: true, // allow "more" link when too many events (+)
                    /*
                dayClick: function(date, jsEvent, view) {
                    //Ocular Botones.
                    $('#btnAgregar').prop('disabled',false);
                    $('#btnModificar').prop('disabled',true);
                    $('#btnEliminar').prop('disabled',true);

                    limpiarFormulario();
                    $('#textFecha').val(date.format());
                    $(this).css('background-color', 'grey');
                    $('#ModalEventos').modal(); //Abre modal

                },*/
                eventDrop: function(calEvent){
                  $('#textId').val(calEvent.id);
                    $('#textTitulo').val(calEvent.title);
                    $('#textColor').val(calEvent.color);
                    $('#textDescripcion').val(calEvent.description);

                    var FechaHora = calEvent.start.format().split("T");
                      $('#textFecha').val(FechaHora[0]);
                    $('#textHora').val(FechaHora[1]);
                    //AHOR MODIFICA AUTOMATICAMENTE.
                     RecolectarDatosGUI();
                  EnviarInformacion('modificar',NuevoEvento,true);

                },
                eventClick: function(calEvent, jsEvent, view) {
                    //Ocular Botones.
                    $('#btnAgregar').prop('disabled',true);
                    $('#btnModificar').prop('disabled',false);
                    $('#btnEliminar').prop('disabled',false);
                    //__________
                    $('#title-ModalEventos').html(calEvent.title);
                    //Mostrar la informacion
                    $('#textDescripcion').val(calEvent.description);
                    $('#textId').val(calEvent.id);
                    $('#textTitulo').val(calEvent.title);
                    $('#textColor').val(calEvent.color);
                    $('#text_tex_Color ').val(calEvent.textColor);
                    $('#textNombre').val(calEvent.first_name);
                    $('#textApellidos').val(calEvent.last_name);

                    $('#textTelefono').val(calEvent.phone_number);
                    $('#textDireccion').val(calEvent.direction);
                    $('#textId_User').val(calEvent.id_U);

                    FechaHora = calEvent.start._i.split(" ");

                    $('#textFecha').val(FechaHora[0]);
                    $('#textHora').val(FechaHora[1]);


                    //$('#modal-event').modal();

                    $('#ModalEventos').modal();
                },  //OJO CAMBIAR URL...POR VARIABLE...

    events:URL+'App/Controllers/EventosControllers.php?accion=mostrarDataCompleta'

            });
        });

    </script>

<!--html--->
<div class="container">
       <br>
        <br>
        <br>
        <h2 class="lead">---MI AGENDA---.</h2>

        <nav aria-label="breadcrumb">

        </nav>

        <div class="row">
            <div id="content" class="col-lg-12">
                <div id="calendar"></div>
                <div class="modal fade" id="modal-event" tabindex="-1" role="dialog" aria-labelledby="modal-eventLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="event-title"> </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="event-description">



                                </div>
                            </div>
                            <div class="modal-footer">


                    <button type="button" class="btn btn-success">Modificar</button>
                    <button type="button" class="btn btn-danger">Borrar</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<!-- Modal -->
<div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="title-ModalEventos">

                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" id="textId" name="textId">
                    <input type="hidden" id="textFecha" name="textFecha">

                    <div class="form-row">
                        <div class="form-group col-md-8">
                        <label for="">Titulo:</label>
                        <input type="text" id="textTitulo" name="textTitulo" class="form-control" > <br>
                        </div>

                        <div class="form-group col-md-4 ">
                        <label for="">Hora:</label>
                        <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true" >
                        <input type="text" id="textHora" name="textHora" class="form-control"  >

                        </div>
                        </div>
                   </div>
                   <div class="form-row">
                   <div class="form-group col-md-6">
                   <label for="">Nombres:</label>
                        <input type="text" id="textNombre" name="textTitulo" class="form-control" >
                   </div>
                   <div class="form-group col-md-6">
                   <label for="">Apellidos:</label>
                        <input type="text" id="textApellidos" name="textTitulo" class="form-control" >
                   </div>
                   </div>

                      <div class="form-row">
                   <div class="form-group col-md-6">
                   <label for="">Telefono:</label>
                        <input type="text" id="textTelefono" name="textTitulo" class="form-control" >
                   </div>
                   <div class="form-group col-md-6">
                   <label for="">Direccion:</label>
                        <input type="text" id="textDireccion" name="textTitulo" class="form-control" >
                   </div>
                   </div>

                   <div class="form-group">
                   <label for="">Descripcion:</label>
                     <textarea id="textDescripcion" rows="3" name="textDescripcion" class="form-control">  </textarea>
                    </div>

                 <div class="form-group ">
                    <label for="">Color:</label>
                    <input type="color" id="textColor" name="textColor" class="form-control">
                    </div>

                    <div class="form-group ">
                    <label for="">ColorTexto:</label>
                    <input type="color" id="text_tex_Color" name="text_tex_Colo" class="form-control" > <br>
                    </div>

                    <!--ID USUARIO -->
                    <input type="hidden" id="textId_User" >

                <div class="modal-footer">

                  <!--  <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>-->

                    <button type="button" id="btnModificar" class="btn btn-success">Modificar</button>

                   <!--  <button type="button" id="btnEliminar" class="btn btn-danger">Eliminar</button> -->

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!------FIN MODAL------>

<!---SCRIPT-------->
<script>
        var NuevoEvento;



        $('#btnEliminar').click(function() {  //btnEliminar
            RecolectarDatosGUI();
            EnviarInformacion('eliminar',NuevoEvento);
        });

        $('#btnModificar').click(function() {  //btnEliminar
            RecolectarDatosGUI();
            EnviarInformacion('modificar',NuevoEvento);
        });

function RecolectarDatosGUI(){

             NuevoEvento = {
                 id: $('#textId').val(),
                title: $('#textTitulo').val(),
                start: $('#textFecha').val() + " " + $('#textHora').val(),
                color: $('#textColor').val(),
                descripcion: $('#textDescripcion').val(),
                textColor: $('#text_tex_Color').val(),
                end: $('#textFecha').val() + " " + $('#textHora').val(),
                 nombre: $('#textNombre').val(),
                apellidos: $('#textApellidos').val(),
                 telefono: $('#textTelefono').val(),
                 direccion: $('#textDireccion').val(),
                 id_U: $('#textId_User').val()

            };


    }

    </script>
<!---SCRIPT-------->
<script>
function EnviarInformacion(accion,objEvento,modal){
            var url = $('#url').val();
                $.ajax({
                 url:url+'App/Controllers/EventosControllers.php?accion='+accion,
                 type: 'POST',
                 data:objEvento,
                 beforeSend: function () { //Icono de Recarga.
                     //$('.fa').css('display', 'inline');
                 }
             })
             .done(function (msj) { //TRUE
                 console.log("success");
                 console.log(msj);
                 $('#calendar').fullCalendar('refetchEvents'); //Refesca Calenda
                    if (!modal ){ //Si modal se true, entonces quetarlo
                        $('#ModalEventos').modal('toggle'); //Ciera modal modal
                    }


             })
             .fail(function () { //FALSE
                 console.log("error");

             })
             .always(function () { //SIEMPRE
                 console.log("complete");

             });


    }

function limpiarFormulario(){
                     $('#textId').val("");
                    $('#textTitulo').val("");
                    $('#textColor').val("");
                   $('#text_tex_Color').val("");
                    $('#textDescripcion').val("");
                 $('#textNombre').val("");
                 $('#textApellidos').val("");
                  $('#textTelefono').val("");
                  $('#textDirecion').val("");
 }


        //Prara el Reloj
        $('.clockpicker').clockpicker();
</script>

<!--==================FOOTER====================-->
<?php //include('includes/footer.php');
    use App\Views\includes\Footer as Footer;
    new Footer();
?>
