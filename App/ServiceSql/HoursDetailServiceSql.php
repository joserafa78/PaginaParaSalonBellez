<?php declare(strict_types = 1 );
//_____________NOMBRE DE ESPACIO____________________
namespace App\ServiceSql;
//_____________________________________
use PDO;
use PDOException;
use Config\Database\DbProvider as Conexion;
use App\Models\HoursDetail as HoursDet;

class  HoursDetailServiceSql{
//ATRIBUTOS
    private $_db;//Conexion

//METODOS
public function __construct(){
        $this->_db = Conexion::get();
    }
public function get(int $id): ?HoursDet{
        $result = null;

        try {
        $stm = $this->_db->prepare('select * from hours_detail where id = :id');
            $stm->execute(['id' => $id]);

            $data = $stm->fetchObject('\\App\\Models\\HoursDetail');

            if ($data) {
                $result = $data;
            }
        } catch (PDOException $ex) {
                 echo $ex->getMessage();
        }

        return $result;
    }
public function create(HoursDet $model): void{
        try {
            $stm = $this->_db->prepare(
        'INSERT INTO hours_detail (id_hours_day,id_order, use_time,created,updated)VALUES (:id_hours_day,:id_order, :use_time, :created, :updated )' );


          $now = date('Y-m-d H:i:s');//Fecha y Hora Sistem
            $stm->execute([
               'id_hours_day'=>$model->id_hours_day,
               'id_order'=>$model->id_order,
                'use_time'=>$model->use_time,
                'created'=>$now,
                'updated'=>$now
            ]);
        } catch (PDOException $ex) {
                 echo $ex->getMessage();
        }
    }
public function update(HoursDet $model): void{
        try {

            $stm = $this->_db->prepare('
                UPDATE hours_detail SET
                id_hours_day = :id_hours_day,
                id_order = :id_order,
                use_time = :use_time,
                updated = :updated
                WHERE id = :id');


            $now = date('Y-m-d H:i:s');//Fecha y Hora Sistem
            $stm->execute([
               'id_hours_day'=>$model->id_hours_day,
               'id_order'=>$model->id_order,
                'use_time'=>$model->use_time,
                'updated'=>$now,
                'id'=>$model->id
            ]);

        } catch (PDOException $ex) {
            print $ex->getMessage();

        }
    }

public function delete(int $id): void{
        try {
            $stm = $this->_db->prepare(
            'DELETE FROM hours_detail where id = :id'
            );

            $stm->execute(['id' => $id]);
        } catch (PDOException $ex) {

        }
    }




}
?>
