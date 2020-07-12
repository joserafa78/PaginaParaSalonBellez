<?php declare(strict_types = 1 );
//_____________NOMBRE DE ESPACIO____________________
namespace App\Controllers;
     //$mensaje="";
  //echo "<script> alert('Entro al Post') </script>";
if( isset($_POST['btnAccion'])){//Valida que exista un POST



    switch($_POST['btnAccion']){
        case 'Agregar':
            if (is_numeric( openssl_decrypt($_POST['id'],COD,KEY )  ) ){
                $ID=openssl_decrypt($_POST['id'],COD,KEY );//Desencripta


                //$_SESSION['message'].="Ok. Id: (".$ID.")"."</br>";//Mensaje a mostrar
                //$_SESSION['message_type']="success"; //Pintar Color en pantalla
                //session_unset()

                //echo "<script> alert('Mensaje muestra ') </script>";
            }else{
            $_SESSION['message'].="Error..ID Incorreto."."</br>";//Mensaje a mostrar
            $_SESSION['message_type']="warning"; //Pintar Color en pantalla
            }
            //NOMBRE
            if (is_string( openssl_decrypt($_POST['nombre'],COD,KEY )  ))
            {

                $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY );//Desencripta
                $_SESSION['message'].="Servicio : (".$NOMBRE.") "."</br>";//Mensaje a
                $_SESSION['message_type']="success"; //Pintar Color en pantalla
            }
            else
            {
            $_SESSION['message'].="Error..Nombre Incorreto."."</br>";//Mensaje a mostrar
            $_SESSION['message_type']="warning"; //Pintar Color en pantalla
            break;}//FIN..
            //PRECIO.
            if (is_numeric( openssl_decrypt($_POST['precio'],COD,KEY )  ))
            {
                $PRECIO=openssl_decrypt($_POST['precio'],COD,KEY );//Desencripta
               // $_SESSION['message'].="Ok.Precio: (".$PRECIO.") ".MONEDA."</br>";//Mensaje a
               // $_SESSION['message_type']="success"; //Pintar Color en pantalla
            }
            else
            {
            $_SESSION['message'].="Error..Precio Incorreto."."</br>";//Mensaje a mostrar
            $_SESSION['message_type']="warning"; //Pintar Color en pantalla
            break;}//FIN..
            //TIEMPO
            if (is_numeric( openssl_decrypt($_POST['tiempo'],COD,KEY )  ))
            {
             $TIEMPO=openssl_decrypt($_POST['tiempo'],COD,KEY );//Desencripta
                //$_SESSION['message'].="Ok.Tiempo: (".$TIEMPO.")"." Minutos</br>";//Mensaje a
                //$_SESSION['message_type']="success"; //Pintar Color en pantalla
            }
            else
            {
            $_SESSION['message'].="Error..Precio Incorreto."."</br>";//Mensaje a mostrar
            $_SESSION['message_type']="warning"; //Pintar Color en pantalla
            break;}//FIN..
            //CANTIDAD
            if (is_numeric( openssl_decrypt($_POST['cantidad'],COD,KEY )  ))
            {
               $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY );//Desencripta
                //$_SESSION['message'].="Ok.Cantidad: (".$CANTIDAD.")"."</br>";//Mensaje a
                //$_SESSION['message_type']="success"; //Pintar Color en pantalla
            }
            else
            {
            $_SESSION['message'].="Error..Cantidad, Incorreto."."</br>";//Mensaje a mostrar
            $_SESSION['message_type']="warning"; //Pintar Color en pantalla
            break;}//FIN..

            //VARIABLE DE SESION CARRITO
            if (!isset($_SESSION['CARRITO'] ))
            {
                $servicios=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'PRECIO'=>$PRECIO,
                    'TIEMPO'=>$TIEMPO,
                    'CANTIDAD'=>$CANTIDAD
                );
                $_SESSION['CARRITO'][0]=$servicios;
                $_SESSION['message']="Servicio (".$NOMBRE.") Agregado al Carrito."."</br>";
             }else{

                $registro = $_SESSION['CARRITO'];
                $idServicios= array_column($registro,'ID');
                if (in_array($ID,$idServicios) )
                {
                 echo "<script> alert('Este Servicio Ya ha sido Agregado'); </script> ";
                 $_SESSION['message']="";
                }
                else
                {

                $Num_Servicios = count($_SESSION['CARRITO']);//Cuenta cuanto Regis  Hay.
                 $servicios=array(
                'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'PRECIO'=>$PRECIO,
                    'TIEMPO'=>$TIEMPO,
                    'CANTIDAD'=>$CANTIDAD
                );
                $_SESSION['CARRITO'][$Num_Servicios]=$servicios;
                $_SESSION['message']="Servicio (".$NOMBRE.") Agregado al Carrito."."</br>";

            }
          }
            break;

        case "Eliminar":

            if (is_numeric( openssl_decrypt($_POST['id'],COD,KEY )  ) ){
                $ID=openssl_decrypt($_POST['id'],COD,KEY );//Desencripta
                foreach($_SESSION['CARRITO'] as $indice=>$servicio){
                    if ($servicio['ID']==$ID)
                    {
                    unset($_SESSION['CARRITO'][$indice]);
                        echo "<script> alert('Servicio Borrado..'); </script> ";
                    }

                }

            }else{

            }

            break;


    }



}


?>
