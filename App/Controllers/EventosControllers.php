<?php namespace App\Controllers;
//____________________________________
require '../../vendor/autoload.php';
require_once '../../config.php';
use App\ServiceSql\EventoServiceSql as EvenSql;
use App\Models\Eventos as Evento;
use App\Models\User as User;
use App\ServiceSql\UserServiceSql as UserSql;


$accion = (isset($_GET['accion']) ) ? $_GET['accion'] : 'leer';

switch ($accion)
{
  /*  case 'agregar':

        //$mensaj="Entro a php";
        //echo "<script>  alert($mensaj); </script>";
        //echo "<script>  console.log($_POST); </script>";



        $sentenciaSQL= $pdo->prepare("INSERT INTO eventos ( title, description, color, textColor, start, end) VALUES (:title, :description, :color, :textColor, :start, :end)");
        $respuesta = $sentenciaSQL->execute(array(
            "title"=>$_POST['title'],
            "description"=>$_POST['descripcion'],
            "color"=>"grey",
            "textColor"=>"blue",
            "start"=>$_POST['start'],
            "end"=>$_POST['end']

        ));


        /*
        "title"=>$_POST['title'],
            "description"=>$_POST['description'],
            "color"=>$_POST['color'],
            "textColor"=>$_POST['textColor'],
            "start"=>$_POST['start'],
            "end"=>$_POST['end']
        ::::::::::::::::::
         $ultimoID = $pdo->lastInsertId();//ULTIMO REGIST
        echo"Ultimo es: ";
        echo $ultimoID;


      echo json_decode($respuesta);

        echo "true";
        break;

    case 'eliminar':
            $respuesta=false;

        if ( isset($_POST['id']) )  //Preguanta si Hay Algo en el id?
        {

           $sentenciaSQL =$pdo->prepare( 'DELETE FROM eventos WHERE id = :ID') ;
           $respuesta= $sentenciaSQL->execute(['ID' => $_POST['id']] );
        }

        echo json_encode($respuesta);



        break;
      */
    case 'modificar':

        $respuesta=false;

        if ( isset($_POST['id']) )  //Preguanta si Hay Algo en el id?
        {

            $evento = new Evento();//EVENTO
            $evento->id= $_POST['id'];
            $evento->title=$_POST['title'];
            $evento->description= $_POST['descripcion'] ;
            $evento->color= $_POST['color'] ;
            $evento->textColor= $_POST['textColor'] ;
            $evento->start= $_POST['start'] ;
            $evento->end=$_POST['end'];

            $EveSql = new EvenSql();
            $EveSql->update($evento);
            //echo json_encode($respuesta);

            $usuario = new User();//USUARIO
            $usuario->id=$_POST['id_U'];
            $usuario->first_name=$_POST['nombre'] ;
            $usuario->last_name=$_POST['apellidos'] ;
            $usuario->phone_number=$_POST['telefono'] ;
            $usuario->direction=$_POST['direccion'] ;

            $userSql= new UserSql();
            $userSql->updateBasic($usuario);
            //------




            //--------

        }

        //echo json_encode($respuesta);

        break;


        case 'mostrarDataCompleta':
        $EveSql = new EvenSql();
        $resultado=$EveSql->getAllComplete();
        //Conviete toda la Consula a formato Json.
        echo json_encode($resultado) ;

        break;

        default:

        $EveSql = new EvenSql();
        $resultado=$EveSql->getAll();
        //Conviete toda la Consula a formato Json.
        echo json_encode($resultado) ;

       // break;
//

}

?>
