<?php declare(strict_types = 1 );
//_____________NOMBRE DE ESPACIO____________________
namespace App\ServiceSql;
//_____________________________________
use PDO;
use PDOException;
use Config\Database\DbProvider as Conexion;
use App\Models\HumanBodyParts as BodyPart;

class  HumanBodyPartsServiceSql{
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
            $stm = $this->_db->prepare('select * from human_dody_parts');

            // 02. Execute query
            $stm->execute();

            // 03. Fetch All
            $result = $stm->fetchAll(PDO::FETCH_CLASS, '\\App\\Models\\HumanBodyParts');
        }catch(Exception  $ex){

          echo $ex->getMessage();

        }
        return $result;
    }
public function get(int $id): ?BodyPart{
        $result = null;

        try {
        $stm = $this->_db->prepare('select * from human_dody_parts where id = :id');
            $stm->execute(['id' => $id]);

            $data = $stm->fetchObject('\\App\\Models\\HumanBodyParts');

            if ($data) {
                $result = $data;
            }
        } catch (PDOException $ex) {
                 echo $ex->getMessage();
        }

        return $result;
    }
public function create(BodyPart $model): void{
        try {
            $stm = $this->_db->prepare(
        'INSERT INTO human_dody_parts (name, description,  image)VALUES (:name, :description, :image)'
            );



            $stm->execute([
               'name'=>$model->name,
               'description'=>$model->description,
              'image'=>$model->image
            ]);
        } catch (PDOException $ex) {
                 echo $ex->getMessage();
        }
    }
public function update(BodyPart $model): void{
        try {
            $stm = $this->_db->prepare('
                UPDATE human_dody_parts SET

                name = :name,
                description = :description,
                image = :image
                WHERE id = :id');



            $stm->execute([
               'name'=>$model->name,
               'description'=>$model->description,
                'image'=>$model->image,
                'id'=>$model->id
            ]);

        } catch (PDOException $ex) {
            print $ex->getMessage();

        }
    }
public function delete(int $id): void{
        try {
            $stm = $this->_db->prepare(
            'DELETE FROM human_dody_parts where id = :id'
            );

            $stm->execute(['id' => $id]);
        } catch (PDOException $ex) {

        }
    }






}
?>
