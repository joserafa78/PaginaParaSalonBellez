<?php

//___________________________________
require_once 'vendor/autoload.php';
require_once 'config.php';
//require_once 'App/Controllers/carrito.php';
require_once "App/Views/index.php";//Index vistas.++++++
//require_once"App/Views/Car/mostrarCarrito.php";


//-----------------
/*
//Email.
use App\Controllers\processEmail as PROCESSEMAIL;
use App\Models\Email as EMAIL;
$mail = new EMAIL();
$mail->addres="joserafa78@protonmail.com" ;
 $mail->name="Sr Rafafael" ;
$mail->title= "Ensayo";
$mail->body="Esto es la Cuarta Mensajee." ;
$procemail = new PROCESSEMAIL();
var_dump( $procemail::enviaEmail($mail));
//-------------
use App\ServiceSql\ServicesServiceSql as SerSQL;
$SERV=new SerSQL();
var_dump( $SERV->Sharh("secado") );

use App\Models\User as user;//Modelo
use App\ServiceSql\UserServiceSql as USERSql;

$user=new user();
$user->id="42";
$user->first_name="Raul ";
$user->last_name="Gorrin";
$user->phone_number="4444444";
$user->direction="España";
$userSQL=new USERSql();


var_dump($userSQL->updateBasic($user));
echo "Listo..ww2";



use App\ServiceSql\EventoServiceSql as EvSQL;
$EvenId =new  EvSQL();
var_dump($EvenId->getAllComplete());


use App\Models\EventOrder as EventOrder;//Modelo
use App\ServiceSql\EventOrderServiceSql as EvenOrSql;//Sql

$eveord = new EventOrder();
$eveord->id_evento="12";
$eveord->id_order="24";
$EOSQL = new EvenOrSql();
$EOSQL->create($eveord);
         echo " LISTO..";


use App\ServiceSql\EventoServiceSql as EvenSql;
use App\Models\Eventos as Evento;
$EveSql = new EvenSql();
var_dump($EveSql->getAll());
         echo " LISTO..";

//--------------
use App\Models\Eventos as Eventos;
use App\ServiceSql\EventoServiceSql as EventSql;
$evento = new Eventos();
$evento->id="3";
$evento->title="Servicio (10232)";
$evento->description="Solo es una Prueba";
$evento->color="grey";
$evento->textColor="red";
$evento->start="2010-07-13 13:00:00";
$evento->end="2010-07-13 14:00:00";
$sqlEvent=new EventSql();
$sqlEvent->updateTitle($evento);
echo "TITULO ACTUALIZADO. ";


//use App\ServiceSql\UserServiceSql as UserSql;

use App\ServiceSql\ServicesServiceSql as servsql;
use App\Models\Services as Serv;
$ser = new servsql();
$id=18;
var_dump($ser->get($id));
$obj=new Serv();
$obj=$ser->get($id);
echo " --MOSTRO--";

echo "Nomber:".$obj->name;
echo "Nomber:".$obj->description;

//___________________________________
/*
use App\ServiceSql\DayDiaryServiceSql as DaySql;
use App\ServiceSql\HoursDiaryServiceSql as HourSql;
use App\Controllers\DayDiaryControllers as AgenCont;
use App\Models\DayDiary as Day;
use App\Models\HoursDiary as Hours;
use App\ServiceSql\OrderServiceSql as OrderSql;
use App\Models\Order as Order;
use App\Models\OrderDetail as OrderDet;

use App\Models\HoursDetail as HoursDet;
use App\ServiceSql\HoursDetailServiceSql as HoursDetSql;

use App\Models\User as User;
use App\ServiceSql\UserServiceSql as UserSql;


//____________________SEGURIDAD________________
use App\Models\User as user;//Modelo
use App\ServiceSql\UserServiceSql as USERSql;

$user=new user();
$user->email="nail@gmail.com";
$user->password="000000";

$userSQL=new USERSql();

var_dump($userSQL->trueEmail($user));

/*
$horaDatall=new HoursDet();
    $horaDatall->id=2;
    $horaDatall->id_hours_day=24;
    $horaDatall->id_order= 15;
    $horaDatall->use_time=30;

$horaDsql = new HoursDetSql();
$horaDsql->update($horaDatall);
echo "UPDATE.OK ";

$horaDsql = new HoursDetSql();
$horaDsql->delete(2);
echo "Eliminado.OK ";
 */

//$horaDsql = new HoursDetSql();
//var_dump($horaD->get(1));

/*
$model=new Day();
//$model->id=4;
$model->day=19;
$model->month=6;
$model->year=2010;
$model->hours[]=new Hours(7,8,0);
$model->hours[]=new Hours(8,9,0);

$h1 = new Hours();
//$h->id=3;
$h1->id_day=6;
$h1->start_time=8;
$h1->end_hour=9;
$h1->enabled=0;
//_____________________
$h2 = new Hours();
//$h->id=3;
$h2->id_day=6;
$h2->start_time=9;
$h2->end_hour=10;
$h2->enabled=0;
//_____________________
//_____________________
$h3 = new Hours();
//$h->id=3;
$h3->id_day=6;
$h3->start_time=9;
$h3->end_hour=10;
$h3->enabled=0;

$Bc=new HourSql();
$Bc->create($h1);
$Bc->create($h2);
$Bc->create($h3);



$orden=new Order();++++++++++++++++
//$orden->id;
$orden->id_client=1;

    $det_1= new OrderDet();
    $det_1->id_services=1 ;
    $det_1->quantity=1 ;
    $det_1->price=10000 ;
    $det_1->time=20 ;



    $det_2= new OrderDet();
    $det_2->id_services=2 ;
    $det_2->quantity=1;
   $det_2->price=90000 ;
    $det_2->time=60 ;



$orden->detail[]=$det_1;
$orden->detail[] =$det_2;


    $horaDetal_1=new HoursDet();
    $horaDetal_1->id_hours_day=18;
    //$horaDatall->id_order= 15;
    //$horaDatall->use_time=30;

   $horaDetal_2=new HoursDet();
    $horaDetal_2->id_hours_day=18;
    //$horaDatall->id_order= 15;
    //$horaDatall->use_time=30;

$orden->hoursdetail[]=$horaDetal_1;
$orden->hoursdetail[]=$horaDetal_2;

$ord =new OrderSql();
$ord->create($orden);*/


