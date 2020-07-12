<?php declare(strict_types = 1 );
//_____________NOMBRE DE ESPACIO____________________
namespace App\ServiceSql;
//_____________________________________
use PDO;
use PDOException;
use Config\Database\DbProvider as Conexion;
use App\Models\EventOrder as EvenOrder;//Modelo

class  EventOrderServiceSql{
//ATRIBUTOS
    private $_db;//Conexion

//METODOS
    public function __construct()
    {
        $this->_db = Conexion::get();
    }

public function create(EvenOrder $model){

          try {
            $stm = $this->_db->prepare(
        'INSERT INTO evento_orden( id_evento, id_order) VALUES (:id_evento, :id_order)'
            );

            $stm->execute([
               'id_evento'=>$model->id_evento,
               'id_order'=>$model->id_order
            ]);
        } catch (PDOException $ex) {
                 echo $ex->getMessage();
        }
        //$ultimoID = $this->_db->lastInsertId();//ULTIMO REGIST
        //return $ultimoID;


}





}
