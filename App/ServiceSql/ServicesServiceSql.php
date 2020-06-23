<?php declare(strict_types = 1 );
//_____________NOMBRE DE ESPACIO____________________
namespace App\ServiceSql;
//_____________________________________
use PDO;
use PDOException;
use Config\Database\DbProvider as Conexion;
use App\Models\Services as Services;

class  ServicesServiceSql{
//ATRIBUTOS
    private $_db;//Conexion

//METODOS
public function __construct(){
        $this->_db = Conexion::get();
    }
public function getAll(): array{
        $result=[];
        try{

             // 01. Prepare query SELECT
            $stm = $this->_db->prepare(
        'SELECT
s.id,s.id_body_parts, p.name as name_body_parts, s.name ,s.description,s.price,s.time,s.image, s.created,s.updated
FROM services s INNER JOIN human_dody_parts p ON s.id_body_parts = p.id
        ');

            // 02. Execute query
            $stm->execute();

            // 03. Fetch All
            $result = $stm->fetchAll(PDO::FETCH_CLASS, '\\App\\Models\\Services');
        }catch(Exception  $ex){

          echo $ex->getMessage();

        }
        return $result;
    }

public function get(int $id): ?Services{
        $result = null;

        try {
        $stm = $this->_db->prepare('
       SELECT
s.id,s.id_body_parts, p.name as name_body_parts, s.name ,s.description,s.price,s.time,s.image, s.created,s.updated
FROM
services s INNER JOIN human_dody_parts p ON s.id_body_parts = p.id
where s.id = :id'
                                  );
            $stm->execute(['id' => $id]);

            $data = $stm->fetchObject('\\App\\Models\\Services');

            if ($data) {
                $result = $data;
            }
        } catch (PDOException $ex) {
                 echo $ex->getMessage();
        }

        return $result;
    }

   public function create(Services $model): void{
        try {
            $stm = $this->_db->prepare(
        'INSERT INTO services (id_body_parts, name, description, price, time, image, created, updated)VALUES (:id_body_parts, :name, :description, :price, :time, :image, :created, :updated)'
            );


            $now = date('Y-m-d H:i:s');//Fecha y Hora Sistem
            $stm->execute([
               'id_body_parts'=>$model->id_body_parts,
               'name'=>$model->name,
                'description'=>$model->description,
                'price'=>$model->price,
                'time'=>$model->time,
                'image'=>$model->image,
                'created'=>$now,
                'updated'=>$now
            ]);
        } catch (PDOException $ex) {
                 echo $ex->getMessage();
        }
    }
  public function update(Services $model): void{
        try {
            $stm = $this->_db->prepare('
                UPDATE services SET
                id_body_parts = :id_body_parts,
                name = :name,
                description = :description,
                price = :price,
                time= :time,
                image = :image,
                updated = :updated
                WHERE id = :id');


            $now = date('Y-m-d H:i:s');//Fecha y Hora Sistem
            $stm->execute([
               'id_body_parts'=>$model->id_body_parts,
               'name'=>$model->name,
                'description'=>$model->description,
                'price'=>$model->price,
                'time'=>$model->time,
                'image'=>$model->image,
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
            'DELETE FROM services where id = :id'
            );

            $stm->execute(['id' => $id]);
        } catch (PDOException $ex) {

        }
    }




}
?>
