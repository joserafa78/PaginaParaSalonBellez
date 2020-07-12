<?php declare(strict_types = 1 );
//_____________NOMBRE DE ESPACIO____________________
namespace App\ServiceSql;
//_____________________________________
use PDO;
use PDOException;
use Config\Database\DbProvider as Conexion;
use App\Models\Eventos as Eventos;

class  EventoServiceSql{
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
            $stm = $this->_db->prepare('SELECT * FROM eventos');

            // 02. Execute query
            $stm->execute();

            // 03. Fetch All
            //$result = $stm->fetchAll(PDO::FETCH_CLASS, '\\App\\Models\\User');
              $result = $stm->fetchAll(PDO::FETCH_ASSOC);


        }catch(Exception  $ex){

          echo $ex->getMessage();

        }

        return $result;
    }

public function getAllComplete(): array{
        $result=[];
        try{

             // 01. Prepare query SELECT
            $stm = $this->_db->prepare('select e.`id`,e.`title`,e.`description`,e.`color`,e.`textColor`,e.`start`,e.`end`,
u.`first_name`,u.`last_name`,u.`phone_number`,u.`direction`,o.`id` as id_O, u.`id` as id_U
from `user` u INNER JOIN `order` o
ON
u.id = o.id_client INNER JOIN  `evento_orden` eo
ON
eo.id_order = o.id  INNER JOIN `eventos` e
ON e.id= eo.id_evento');

            // 02. Execute query
            $stm->execute();

            // 03. Fetch All
            //$result = $stm->fetchAll(PDO::FETCH_CLASS, '\\App\\Models\\User');
              $result = $stm->fetchAll(PDO::FETCH_ASSOC);


        }catch(Exception  $ex){

          echo $ex->getMessage();

        }

        return $result;
    }

public function getID($id): array{
        $result=[];
        try{

             // 01. Prepare query SELECT
            $stm = $this->_db->prepare('select e.`id`,  u.`first_name`,u.`last_name`,u.`phone_number`,u.`direction`,o.`id`
            from `user` u INNER JOIN `order` o ON
            u.id = o.id_client INNER JOIN  `evento_orden` eo ON
            eo.id_order = o.id  INNER JOIN `eventos` e
            ON e.id= eo.id_evento
            WHERE e.`id`=:ID');

            // 02. Execute query
            $stm->execute(['ID'=>$id]);

            // 03. Fetch All
            //$result = $stm->fetchAll(PDO::FETCH_CLASS, '\\App\\Models\\User');
              $result = $stm->fetchAll(PDO::FETCH_ASSOC);


        }catch(Exception  $ex){

          echo $ex->getMessage();

        }

        return $result;
    }

public function create(Eventos $model): string{

          try {
            $stm = $this->_db->prepare(
        'INSERT INTO eventos( title, description, color, textColor, start, end) VALUES (:title, :description, :color, :textColor, :start, :end)'
            );

            $stm->execute([
               'title'=>$model->title,
               'description'=>$model->description,
                'color'=>$model->color,
                'textColor'=>$model->textColor,
                'start'=>$model->start,
                'end'=>$model->end
            ]);
        } catch (PDOException $ex) {
                 echo $ex->getMessage();
        }
        $ultimoID = $this->_db->lastInsertId();//ULTIMO REGIST
        return $ultimoID;


}


public function update(Eventos $model): void{
        try {

            $stm = $this->_db->prepare( 'UPDATE eventos SET
           title=:title,
           description =:description,
           color =:color,
            textColor = :textColor,
            start= :start,
            end = :end
           WHERE id= :id') ;

            $stm->execute([
            "id"  =>$model->id,
            "title"=>$model->title,
            "description"=>$model->description,
            "color"=>$model->color,
            "textColor"=>$model->textColor,
            "start"=>$model->start,
            "end"=>$model->end
                ]);

        } catch (PDOException $ex) {
            print $ex->getMessage();

        }
    }

public function updateTitle(Eventos $model): void{
        try {

            $stm = $this->_db->prepare( 'UPDATE eventos SET
           title=:title
           WHERE id= :id') ;

            $stm->execute([
            "id"  =>$model->id,
            "title"=>$model->title
                ]);

        } catch (PDOException $ex) {
            print $ex->getMessage();

        }
    }


}
