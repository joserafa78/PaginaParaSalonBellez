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

//METODOS<
public function __construct(){
        $this->_db = Conexion::get();
    }
public function getAll(): array{
        $result=[];
        try{

             // 01. Prepare query SELECT
            $stm = $this->_db->prepare(
        'SELECT
s.id,s.id_body_parts, p.name as name_body_parts, s.name ,s.promotion,s.description,s.price,s.time,s.image, s.image_two,s.created,s.updated
FROM services s INNER JOIN human_dody_parts p ON s.id_body_parts = p.id order by s.promotion desc
        ');

            // 02. Execute query
            $stm->execute();

            // 03. Fetch All
            //$result = $stm->fetchAll(PDO::FETCH_CLASS, '\\App\\Models\\Services');


         while($result = $stm->fetch()){
             $rows[]=$result;
         }



        }catch(Exception  $ex){

          echo $ex->getMessage();

        }
        return $rows;
    }
public function getAllCategoria($categoria): array{
        $result=[];
        try{

             // 01. Prepare query SELECT
            $stm = $this->_db->prepare(
        'SELECT s.id,s.id_body_parts, p.name as name_body_parts, s.name ,s.promotion,s.description,s.price,s.time,s.image, s.image_two,s.created,s.updated FROM services s INNER JOIN human_dody_parts p ON s.id_body_parts = p.id WHERE S.id_body_parts = :ID order by s.promotion desc
        ');

            // 02. Execute query
            $stm->execute(['ID' => $categoria]);

            // 03. Fetch All
            //$result = $stm->fetchAll(PDO::FETCH_CLASS, '\\App\\Models\\Services');


         while($result = $stm->fetch()){
             $rows[]=$result;
         }



        }catch(Exception  $ex){

          echo $ex->getMessage();

        }
        return $rows;
    }
public function Sharh($palabra) {
        $result=[];
        try{

             // 01. Prepare query SELECT
            $stm = $this->_db->prepare(
        'SELECT s.id,s.id_body_parts, p.name as name_body_parts, s.name ,s.promotion,s.description,s.price,s.time,s.image, s.image_two,s.created,s.updated FROM services s INNER JOIN human_dody_parts p ON s.id_body_parts = p.id WHERE s.name LIKE :ID order by s.promotion desc
        ');

            // 02. Execute query
            $caracter = "%".$palabra."%";
            $stm->execute(['ID' => $caracter]);

            // 03. Fetch All
            //$result = $stm->fetchAll(PDO::FETCH_CLASS, '\\App\\Models\\Services');

           $c=0 ;
         while($result = $stm->fetch()){
             $c++;
             $rows[]=$result;
         }



        }catch(Exception  $ex){

          echo $ex->getMessage();

        }

        if ($c==0)
        {
         return false;
        }else{
         return $rows;
        }

    }
public function get(int $id): ?Services{
        $result = null;

        try {
        $stm = $this->_db->prepare('
       SELECT
s.id,s.id_body_parts, p.name as name_body_parts, s.name,s.promotion ,s.description,s.price,s.time,s.image,s.image_two, s.created,s.updated
FROM
services s INNER JOIN human_dody_parts p ON s.id_body_parts = p.id
where s.id = :id'
                                  );
            $stm->execute(['id' => $id]);

            $data = $stm->fetchObject('\\App\\Models\\Services');
            //$data = $stm->fetch(PDO::FETCH_OBJ);//Devu un solo JSON.




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
        'INSERT INTO services (id_body_parts, name,promotion, description, price, time, image,image_two, created, updated)VALUES (:id_body_parts, :name, :promotion,:description, :price, :time, :image,:image_two, :created, :updated)'
            );


            $now = date('Y-m-d H:i:s');//Fecha y Hora Sistem
            $stm->execute([
               'id_body_parts'=>$model->id_body_parts,
               'name'=>$model->name,
                'promotion'=>$model->promotion,
                'description'=>$model->description,
                'price'=>$model->price,
                'time'=>$model->time,
                'image'=>$model->image,
                'image_two'=>$model->image_two,
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
                promotion = :promotion,
                description = :description,
                price = :price,
                time= :time,
                updated = :updated
                WHERE id = :id');


            $now = date('Y-m-d H:i:s');//Fecha y Hora Sistem
            $stm->execute([
               'id_body_parts'=>$model->id_body_parts,
               'name'=>$model->name,
                'promotion'=>$model->promotion,
                'description'=>$model->description,
                'price'=>$model->price,
                'time'=>$model->time,
                'updated'=>$now,
                'id'=>$model->id
            ]);

        } catch (PDOException $ex) {
            print $ex->getMessage();

        }
    }
public function delete($id): void{
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
