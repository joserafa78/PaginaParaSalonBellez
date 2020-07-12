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
        $user->email=$_POST['correo'];
        $user->password =$_POST['password'];

        $UserSQL = new UserSql();
        $resulado =$UserSQL->trueEmail($user);
        if (!$resulado)
        {
         echo $valor ;
        }else{
            echo json_encode($resulado);
        }





    break;

    default:
        echo "Defecto";
    break;
}



?>
