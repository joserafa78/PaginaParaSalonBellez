<?php
    //define ( 'DS' , DIRECTORIO_SEPARADOR );
	//define ( 'ROOT' , realpath ( dirname (__FILE__)). DS );
	define ( "URL","http://localhost/GoldNails/" );
// __________ CLAVE DE ENCRIPTACION______________
define ( "KEY","goldnail2020" ); //Para Encriptar
define ( "COD","AES-128-ECB" );
// ________________ SESIÓN_____________________
session_start (); // Inicia un Sesion.

// header ("Ubicación: index.php"); // Re-direcciona .....
// _____________ MONEDA DEL PAIS_________________
define ( "MONEDA" , "Pesos / Colombia" );
// _____________ CONEXIÓN A BD___________________

define('__CONFIG__',[
      'db'=>[
          'host'=>'mysql:host=localhost;dbname=bellezados;charset=utf8',   'user'=>'root',
          'password'=>'000000'
      ]
]);

?>
