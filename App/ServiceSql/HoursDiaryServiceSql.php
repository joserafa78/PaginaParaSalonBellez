<?php declare(strict_types = 1 );
//_____________NOMBRE DE ESPACIO____________________
namespace App\ServiceSql;
//_____________________________________
use PDO;
use PDOException;
use Config\Database\DbProvider as Conexion;
use App\Models\HoursDiary as Hours;

class  HoursDiaryServiceSql{
//ATRIBUTOS
    private $_db;//Conexion

//METODOS
public function __construct() {
        $this->_db = Conexion::get();
    }

public function getAll(): array{
        $result=[];
        try{

             // 01. Prepare query SELECT
            $stm = $this->_db->prepare('select * from hours_diary');

            // 02. Execute query
            $stm->execute();

            // 03. Fetch All
            $result = $stm->fetchAll(PDO::FETCH_CLASS, '\\App\\Models\\HoursDiary');
        }catch(Exception  $ex){

          echo $ex->getMessage();

        }
        return $result;
    }

public function get(int $id): ?Hours{
        $result = null;

        try {
        $stm = $this->_db->prepare('select * from hours_diary where id = :id');
            $stm->execute(['id' => $id]);

            $data = $stm->fetchObject('\\App\\Models\\HoursDiary');

            if ($data) {
                $result = $data;
            }
        } catch (PDOException $ex) {
                 echo $ex->getMessage();
        }

        return $result;
    }
 public function create(Hours $model): void{
        try {
               $stm = $this->_db->prepare('
                insert into hours_diary(id_day, start_time, end_hour, enabled)
                values(:id_day, :start_time, :end_hour, :enabled)
            ');

            $stm->execute([
                'id_day' => $model->id_day,
                'start_time' => $model->start_time,
                'end_hour' => $model->end_hour,
                'enabled' => $model->enabled
            ]);
        } catch (PDOException $ex) {
                 //echo $ex->getMessage();
            echo $ex;
        }
    }
  public function update(Hours $model): void{
        try {
            $stm = $this->_db->prepare('
                UPDATE hours_diary SET
                id_day = :id_day,
                start_time = :start_time,
                end_hour = :end_hour,
                enabled = :enabled
                WHERE id = :id');



            $stm->execute([
               'id_day'=>$model->id_day,
               'start_time'=>$model->start_time,
                'end_hour'=>$model->end_hour,
                'enabled'=>$model->enabled,
                'id'=>$model->id
            ]);

        } catch (PDOException $ex) {
            print $ex->getMessage();

        }
    }
     public function delete(int $id): void{
        try {
            $stm = $this->_db->prepare(
            'DELETE FROM hours_diary where id = :id'
            );

            $stm->execute(['id' => $id]);
        } catch (PDOException $ex) {

        }
    }


}
?>
