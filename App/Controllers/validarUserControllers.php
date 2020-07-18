<?php declare(strict_types = 1 );
//_____________NOMBRE DE ESPACIO____________________
namespace App\Controllers;
require '../../vendor/autoload.php';
require_once '../../config.php';
use App\Models\User as User;
use App\ServiceSql\UserServiceSql as UserSql;

$user = new User();


$accion = (isset($_GET['accion'] ) )?$_GET['accion'] : 'defaul';



switch ($accion)
{
    case 'entrar':
        $valor = 'false';

        $email = $_POST['correo'];
        $clave=$_POST["password"];

        $user->email= $email;
        $user->password =  $clave;

        $UserSQL = new UserSql();
        $resulado =$UserSQL->trueEmail($user);
        if (!$resulado)
        {
         echo $valor ;

        }else{
            echo $resulado;
        }






    break;

    default:
        echo "Defecto";
    break;
}



?>
