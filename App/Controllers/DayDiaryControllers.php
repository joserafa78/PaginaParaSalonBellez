<?php declare(strict_types = 1 );
//_____________NOMBRE DE ESPACIO____________________
namespace App\Controllers;
//_____________________________________
//use PDO;
//use PDOException;
use App\ServiceSql\DayDiaryServiceSql as DaySql;
use App\ServiceSql\HoursDiaryServiceSql as HourSql;
use App\Models\DayDiary as Day;
use App\Models\HoursDiary as Hours;
use DateTime;

class  DayDiaryControllers{


//===========FUNCION ===================
//Dia,Mes,Año,HoraInicio,HoraFinal (Hora Militar)
public function createDayHours(int $d,$m,$a,$h1,$h2):void{
$dia = new Day();
$dia->day=$d;
$dia->month=$m;
$dia->year=$a;

for($i=$h1;$i<=$h2-1;$i++){

$ob=new Hours();
$ob->start_time= $i;
$ob->end_hour= $i+1;
$ob->enabled=0;
$dia->hours[]= $ob;
}

$Agenda = new DaySql();
$Agenda->create($dia);

}

//Funcion por Desarrollar Aun.
public function searchByDate(string $f1,$f2){

$date1= new DateTime($f1);
$date2= new DateTime($f2);
$diff = $date1->diff($date2);
$total=  $diff->days;
    if ($total<=31)
    {
        $fechaComoEntero = strtotime($date1);
        $ano=date("Y",$fechaComoEntero);
        $mes=date("m",$fechaComoEntero);
        $dia=date("d",$fechaComoEntero);
        $val=dia."-".mes."-".ano;
        $fechaA=date($val);
        $dia=5;
        $v='+'.$dia.' '.'day';
       $nuevaFecha = date("d-m-Y", strtotime($fechaA,"+ 5 days"));


      return $nuevaFecha;
    }

}







}
?>
