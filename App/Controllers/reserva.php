<?php
require '../../vendor/autoload.php';
require '../../config.php';
require_once '../../App/Controllers/carrito.php';
use App\Models\User as User;
use App\Models\Eventos as Eventos;
use App\ServiceSql\EventoServiceSql as EventSql;
use App\ServiceSql\UserServiceSql as UserSql;
use App\Models\Order as Order;
use App\Models\OrderDetail as OrderDet;
use App\ServiceSql\OrderServiceSql as OrderSql;
use App\Views\includes\Header as Header;
new Header(); //CARGA CABECERA.. OK
?>


<?php
if($_POST){
    $total=0;
    $total_tiempo=0;
    $SID= session_id(); //Para la Variable de Sesion. una Clave.
        $detalle = array();
    foreach($_SESSION['CARRITO'] as $indice=>$servicio){
        $det_1= new OrderDet();
        $det_1->id_services=$servicio['ID'] ;
        $det_1->quantity=$servicio['CANTIDAD'] ;
        $AcumDescripcion.=$servicio['NOMBRE'].", ";
        $det_1->price=$servicio['PRECIO'];
        $det_1->time=$servicio['TIEMPO'] ;
        $detalle[]=$det_1;
        $total=$total+($servicio['PRECIO']*$servicio['CANTIDAD']);
        $total_tiempo=$total_tiempo+($servicio['TIEMPO']*$servicio['CANTIDAD']);


    }


    //DATOS CAPTURADOS

    //------CLENTE-----------
    $usaurio = new User();//Crea usaurio
    $usaurio->first_name=$_POST['nombre'];
    $usaurio->last_name=$_POST['apellido'];
    $usaurio->user_name=""; //Sin nombreUsuario.
    $usaurio->rol="cliente"; //Rol Generico
    $usaurio->image="avatar_1";//Avatar Generica
    $usaurio->password="000000";//Clave Generica
    $usaurio->phone_number=$_POST['telefono'];
    $usaurio->email=$_POST['email'];
    $usaurio->direction=$_POST['direccion'];
    $userSql = new UserSql;//Crea obje para enviar datos
    $ID_CLIENTE=$userSql->create($usaurio);//Carga el Cliente y Devuelve el Id
     //-------Evento----------
    $evento=new Eventos();
    $evento->title="Servicio";
    $evento->description=$AcumDescripcion;//inserta todos los Servicicios..
    $evento->color="grey";
    $evento->textColor="blue";
    $evento->start=$_POST['fecha_dom']." ".$_POST['hora_dom'];
    $evento->end=$_POST['fecha_dom']." ".$_POST['hora_dom'];//Calcula hora + minutos.
    $evenSql =new EventSql();
    $ID_IVENTO=$evenSql->create($evento);
    //-------ORDEN----------
    $orden=new Order();
    //$orden->id;
    $orden->id_client=$ID_CLIENTE;
    $orden->key_transaction=$SID ;
    $orden->paypal_data="" ;
    $orden->status="pendiente";
    $orden->total_price=0 ; //No suma..$total
    $orden->total_time=0 ; //No suma...$total_tiempo
    $orden->detail= $detalle;
    $orden->id_evento= $ID_IVENTO;

    $ord =new OrderSql();//Carga la orden
    $ord->create($orden);//crea.. ok
    //echo " YA CARGO ORDEN NUEVA..OK...";

    //limina variable de Sesion..
    unset($_SESSION['CARRITO']);
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);


}

?>

         <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

<div class="jumbotrom text-center ">
   <br/>
   <br/>
   <br/>
    <h1 class="display-4"> ¡Paso Final! </h1>
    <hr class="my-4">
    <p class="lead" >
        Usted, ha hecho una Pre-Reserva on Line por monto.
        <h4>$ <?php echo number_format($total,2)." ".MONEDA ; ?></h4>
        <div id="paypal-button-container"></div>
    </p>

    <p>En Breves minutos recibirá una Llamada para confirmar la Reserva.<br/>
     <stromg> (Para Acalaraciones: ulloa.naila@gmail.com ) </stromg>
     <stromg> (Telefono de Contacto: +57 321 254 12 34) </stromg>
    </p>
</div>

  <!-----PAYPAL------------------------------------------->
<body>
    <!-- Set up a container element for the button -->




    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $total;?> '
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }


        }).render('#paypal-button-container');
    </script>
</body>

  <!------------FIN--PAYPAL------------------------------->







