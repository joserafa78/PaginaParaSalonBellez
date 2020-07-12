<?php
    define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . DS);
	define('URL', "http://localhost/GoldNails/");
//__________CLAVE DE ENCRIPTACION______________
define("KEY","develoteca");
define("COD","AES-128-ECB");
//________________SESION_____________________
session_start();//Inicia un Sesion.

//header("Location: index.php");//Re-direcciona.....
//_____________MONEDA DEL PAIS_________________
define("MONEDA","Pesos/Colombia");
//_____________CONEXION A BD___________________
define('__CONFIG__',[
      'db'=>[
    'host'=>'mysql:host=localhost;dbname=belleza;charset=utf8',   'user'=>'root',
    'password'=>''
      ]
]);
?>
