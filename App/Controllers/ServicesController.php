<?php namespace App\Controllers;
//____________________________________
require '../../vendor/autoload.php';
require_once '../../config.php';
use App\ServiceSql\ServicesServiceSql as ServSql;
use App\Models\Services as Servicio;

//METODO POST

    if($_POST){

        switch($_POST["Accion"]){

            case "Consultar":
                $us = new  UserControllers();
                echo json_encode($us->mostrarUsuarios() );//Consulta todos

                //echo json_encode($personaSql->prueba());//Consulta todos
            break;


            case "Guarda":
          $bande_imagen=1;
            //__________________________

        $ruta_carpeta="../Views/img/";
        $nombre_archivo1 = "A".date("dHis").".".pathinfo($_FILES["imagenUno"]["name"],PATHINFO_EXTENSION);
        $ruta_gardar_archivo = $ruta_carpeta . $nombre_archivo1 ;
    if (!move_uploaded_file($_FILES["imagenUno"]["tmp_name"] ,$ruta_gardar_archivo ) )
            {

               $bande_imagen=0;
            }
            //_________________________
        $ruta_carpeta="../Views/img/";
        $nombre_archivo2 = "B".date("dHis").".".pathinfo($_FILES["imagenDos"]["name"],PATHINFO_EXTENSION);

        $ruta_gardar_archivo = $ruta_carpeta . $nombre_archivo2 ;

    if (!move_uploaded_file($_FILES["imagenDos"]["tmp_name"] ,$ruta_gardar_archivo ) )
            {

               $bande_imagen=0;
            }

            //_________________________
        if ($bande_imagen==1)//Guard Exiosamente
        {


                $Servicio = new Servicio();
                $Servicio->id_body_parts=$_POST['id_cuerpo'];
                $Servicio->name=$_POST['nombre'];
                $Servicio->promotion=$_POST['promocion'];
                $Servicio->description=$_POST['descripcion'];
                $Servicio->price=$_POST['precio'];
                $Servicio->time=$_POST['tiempo'];
                $Servicio->image=$nombre_archivo1;
                $Servicio->image_two=$nombre_archivo2;
                $SqlService = new ServSql();
                $SqlService->create($Servicio);

                header('Location:../Views/Servicios/servicios.php');//RE-Direcciona

         }   else{
             echo "..ERROR....";

        }

            break;



            case "Eliminar":

                $SqlService = new ServSql();
                $SqlService->delete($_POST['id']);
                header('Location:../Views/Servicios/servicios.php');//RE-Direcciona
            break;


            case "Actualizar":

                //--------------------------------------
                $Servicio = new Servicio();
                $Servicio->id=$_POST['id'];
                $Servicio->id_body_parts=$_POST['id_cuerpo'];
                $Servicio->name=$_POST['nombre'];
                $Servicio->promotion=$_POST['promocion'];
                $Servicio->description=$_POST['descripcion'];
                $Servicio->price=$_POST['precio'];
                $Servicio->time=$_POST['tiempo'];
                //$Servicio->image=$_POST[''];
                //$Servicio->image_two=$_POST[''];
                $SqlService = new ServSql();
                $SqlService->update($Servicio);


                header('Location:../Views/Servicios/servicios.php');//RE-Direcciona


            break;

        }

    }

?>

