<?php declare(strict_types = 1 );
//_____________NOMBRE DE ESPACIO____________________
namespace App\ServiceSql;
//_____________________________________
use PDO;
use PDOException;
use Config\Database\DbProvider as Conexion;
use App\Models\DayDiary as Day;

class  DayDiaryServiceSql{
//ATRIBUTOS
    private $_db;//Conexion

//METODOS
    public function __construct()
    {
        $this->_db = Conexion::get();
    }

public function getAll(): array{
        $result=[];
        try{

             // 01. Prepare query SELECT
            $stm = $this->_db->prepare('SELECT * FROM day_diary');

            // 02. Execute query
            $stm->execute();

            // 03. Fetch All
    $result = $stm->fetchAll(PDO::FETCH_CLASS, '\\App\\Models\\DayDiary');
        }catch(Exception  $ex){

          echo $ex->getMessage();

        }
        return $result;
    }
public function get(int $id): ?Day{
        $result = null;

        try {
        $stm = $this->_db->prepare('select * from day_diary where id = :id');
            $stm->execute(['id' => $id]);

            $data = $stm->fetchObject('\\App\\Models\\DayDiary');

            if ($data) {
                $result = $data;
            }
        } catch (PDOException $ex) {
                 echo $ex->getMessage();
        }

        return $result;
    }
public function create(Day $model): void{
        try {
      // Begin transacation
            $this->_db->beginTransaction();
      //Funcion llama Crear..
            $this->DayDiaryCreate($model);
        //Funcion Crea Horas de cada dia.
            $this->HoursDetailCreate($model);
       // Commit transaction
            $this->_db->commit();

        } catch (PDOException $ex) {
            $this->_db->rollBack();

            echo $ex;
        }
    }
public function update(Day $model): void{
        try {
            $stm = $this->_db->prepare('
                UPDATE user SET
                day = :day,
                month = :month,
                year = :year,
                WHERE id = :id');



            $stm->execute([
               'day'=>$model->day,
               'month'=>$model->month,
                'year'=>$model->year,
                'id'=>$model->id
            ]);

        } catch (PDOException $ex) {
            print $ex->getMessage();

        }
    }

//========FUNCIONES PRIVADAS========
private function prepareDayCreation(Day &$model): void
{


        foreach ($model->hours as $item) {
            //$item->id_day = $item->price ;
            $item->start_time = $item->start_time;
            $item->end_hour = $item->end_hour;
            $item->enabled =$item->enabled;

        }
    }

private function DayDiaryCreate(Day &$model): void{
           $stm = $this->_db->prepare(
        'INSERT INTO day_diary (day, month, year)
        VALUES (:day ,:month , :year)'
            );

            $stm->execute([
               'day'=>$model->day,
               'month'=>$model->month,
                'year'=>$model->year
                ]);
        //carga el ID del ultimo
    $model->id = $this->_db->lastInsertId();
    }

private function HoursDetailCreate(Day $model): void{
        foreach ($model->hours as $item) {
            $stm = $this->_db->prepare('
                insert into hours_diary(id_day, start_time, end_hour, enabled)
                values(:id_day, :start_time, :end_hour, :enabled)
            ');

            $stm->execute([
                'id_day' => $model->id,
                'start_time' => $item->start_time,
                'end_hour' => $item->end_hour,
                'enabled' => $item->enabled
            ]);
        }
    }

//==================================

}
?>
