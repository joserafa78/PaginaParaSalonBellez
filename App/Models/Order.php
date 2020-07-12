<?php
namespace App\Models;

class Order{
    public $id;

    // User client
    public $id_client;//
    public $client;//OPCIONAL
    public $key_transaction; //Data para PayPal
    public $paypal_data;  //Data para PayPal
    public $status;    //Data para PayPal
    public $total_price=0;
    public $total_time=0;
    public $created;
    public $updated;

    //Array Que Almacena "Detail_Order."
    public $detail = array();

    //Array Que Almacena "HORAS DE TRABAJO."
    public $hoursdetail = array();

    //Variable del Evento
    public $id_evento;

}
?>
