<?php declare(strict_types = 1 );
//_____________NOMBRE DE ESPACIO____________________
namespace App\Controllers;
//_____________________________________

use App\Models\User as User;
use App\ServiceSql\UserServiceSql as UserSql;

class  UserControllers{//CLASE USERCONTROLLERS
//ATRIBUTOS
    private $_usersql;//Sql

//METODOS
public function __construct(){
        $this->_usersql = new UserSql();
    }
//METODOS
public function mostrarUsuarios(): array{

return  $this->_usersql->getAll();

}


}

//METODO POST

    if($_POST){


        switch($_POST["accion"]){
            case "CONSULTAR":
                $us = new  UserControllers();
                echo json_encode($us->mostrarUsuarios() );//Consulta todos

                //echo json_encode($personaSql->prueba());//Consulta todos
            break;
           /* case "CONSULTAR_ID":
                echo json_encode($personaSql->get($_POST["idPersona"]));
            break;
            case "GUARDAR":
                $nombres = $_POST["nombres"];
                $apellidos = $_POST["apellidos"];
                $telefono = $_POST["telefono"];
                $direccion = $_POST["direccion"];
                $password = $_POST["password"];
                $email = $_POST["email"];

                if($nombres == ""){
                    echo json_encode("Debe ingresar los nombres de la persona");
                    return;
                }

                if($apellidos == ""){
                    echo json_encode("Debe ingresar los apellidos de la persona");
                    return;
                }

                if($fechaNacimiento == ""){
                    echo json_encode("Debe ingresar la Fecha Nacimiento de la persona");
                    return;
                }

                if($direccion == ""){
                    echo json_encode("Debe ingresar la dirección de la persona");
                    return;
                }

                if($telefono == ""){
                    echo json_encode("Debe ingresar el teléfono de la persona");
                    return;
                }
                $usuario = new User();
                $usuario->first_name=$nombres;
                $usuario->last_name=$apellidos;
                $usuario->phone_number=$telefono;
                $usuario->direction$=$direccion;
                $usuario->email=$email;
                $usuario->password =$password;




                $respuesta = $personaSql->create( $usuario );
                echo json_encode($respuesta);
            break;
            case "MODIFICAR":
                $nombres = $_POST["nombres"];
                $apellidos = $_POST["apellidos"];
                $fechaNacimiento = $_POST["fechaNacimiento"];
                $direccion = $_POST["direccion"];
                $telefono = $_POST["telefono"];
                $idPersona = $_POST["idPersona"];

                if($nombres == ""){
                    echo json_encode("Debe ingresar los nombres de la persona");
                    return;
                }

                if($apellidos == ""){
                    echo json_encode("Debe ingresar los apellidos de la persona");
                    return;
                }

                if($fechaNacimiento == ""){
                    echo json_encode("Debe ingresar la Fecha Nacimiento de la persona");
                    return;
                }

                if($direccion == ""){
                    echo json_encode("Debe ingresar la dirección de la persona");
                    return;
                }

                if($telefono == ""){
                    echo json_encode("Debe ingresar el teléfono de la persona");
                    return;
                }

                $respuesta = $persona->updte($idPersona, $nombres, $apellidos, $fechaNacimiento, $direccion, $telefono);
                echo json_encode($respuesta);
            break;
            case "ELIMINAR":
                $idPersona = $_POST["idPersona"];
                $respuesta = $persona->Eliminar($idPersona);
                echo json_encode($respuesta);
            break;

        }
        */
    }





}//FIN
?>
