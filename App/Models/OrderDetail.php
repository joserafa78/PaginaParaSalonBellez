<?php
namespace App\Models;

class OrderDetail{
    public $id;

    public $id_order;//*

    public $id_services;//*
    public $services;//opocional Nuevo

    public $quantity;//*

    // User creater
    public $price;//*
    public $total_price=0;

    public $time;//*
    public $total_time=0;


    public $created;
    public $updated;

}
