<?php
    define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . DS);
	define('URL', "http://localhost/GoldNails/");
//___________________________________
require_once 'vendor/autoload.php';
require_once 'config.php';
require_once "App/Views/index.html";//Index vistas.

use App\ServiceSql\UserServiceSql as UserSql;
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


//____________________________________
$user=new UserSql();

var_dump($user->getAll());
*/
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



$orden=new Order();
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


