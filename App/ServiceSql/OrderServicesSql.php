<?php declare(strict_types = 1 );
//_____________NOMBRE DE ESPACIO____________________
namespace App\ServiceSql;
//_____________________________________
use PDO;
use PDOException;
use Config\Database\DbProvider as Conexion;
use App\Models\Order as Order;
//__USE ADITIONAL___
use App\ServiceSql\UserServiceSql as UserSql;
use App\Models\User as User;

class  OrderServiceSql{//NAILA ULLOA
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
            $stm = $this->_db->prepare('select * from order');

            // 02. Execute query
            $stm->execute();

            // 03. Fetch All
            $result = $stm->fetchAll(PDO::FETCH_CLASS, '\\App\\Models\\Order');
        }catch(Exception  $ex){

          echo $ex->getMessage();

        }
        return $result;
    }
public function get(int $id): ?Order{
        $result = null;

        try {
            $stm = $this->_db->prepare('SELECT * FROM `order` WHERE id = :id');
            $stm->execute(['id' => $id]);

            $data = $stm->fetchObject('\\App\\Models\\Order');

            if ($data) {
                $result = $data;

                // Client
                $usersql = new UserSql();//Crea Object
                $num=$result->id_client  ;//Carga Var del Client
                settype($num,"integer");//Convierte a entero
                $cliente = $usersql->get($num);
                $result->client = $cliente;


                // Detail
                $num=$result->id;
                settype($num,"integer");//Convierte a entero
                $result->detail = $this->getDetail($num);
            }
        } catch (PDOException $ex) {
            var_dump($ex);
        }

        return $result;
    }
public function create(Order $model): void{
        try {
            // Begin transacation
            $this->_db->beginTransaction();

            // Prepare order creation
            $this->prepareOrderCreation($model);

            // Order creation
            $this->orderCreate($model);

            // Order Detail creation
            $this->orderDetailCreate($model);
            //Hora Agendada Detail creation
            $this->hoursDetailCreate($model);

            // Commit transaction
            $this->_db->commit();

        } catch (PDOException $ex) {
            $this->_db->rollBack();
            echo $ex;
        }
    }

//==========FUNCIONES PRIVATE================
private function getDetail(int $id_order): array{
        $stm = $this->_db->prepare('select * from order_detail where id_order = :id_order');
        $stm->execute(['id_order' => $id_order]);

        $result = $stm->fetchAll(\PDO::FETCH_CLASS, '\\App\\Models\\OrderDetail');

        foreach ($result as $item) {
            $stm = $this->_db->prepare('select * from services where id = :id_services');
            $stm->execute(['id_services' => $item->id_services]);

            $item->services = $stm->fetchObject('\\App\\Models\\Services');
        }

        return $result;
    }
private function prepareOrderCreation(Order &$model): void{
        $now = date('Y-m-d H:i:s');

        $model->created = $now;
        $model->updated = $now;

        foreach ($model->detail as $item) {
            $item->total_price = $item->price * $item->quantity;
            $item->total_time = $item->time * $item->quantity;
            $item->created_at = $now;
            $item->updated_at = $now;

            $model->total_price += $item->total_price;
            $model->total_time += $item->total_time;
        }

           $minutos=$model->total_time;
           foreach ($model->hoursdetail as $item) {
            $minutos-=60;//Se Resta por 1hora cont 60 mtos
            if ($minutos>0) {
                $t=60;
            }else{
                $t=60+$minutos;
            }
            $item->use_time = $t;
        }


    }
private function orderCreate(Order &$model): void{
        $stm = $this->_db->prepare('
            INSERT INTO `order`(id_client, total_price, total_time, created, updated)
            values(:id_client, :total_price, :total_time, :created, :updated)
        ');

//`id_client`, `total_price`, `total_time`, `created`, `updated`
       $now = date('Y-m-d H:i:s');//Fecha y Hora Sistem
        $stm->execute([
            'id_client' => $model->id_client,
            'total_price' => $model->total_price,
            'total_time' => $model->total_time,
            'created' => $now,
            'updated' => $now
        ]);

        $model->id = $this->_db->lastInsertId();//ULTIMO REGIST
    }
private function orderDetailCreate(Order $model): void{

        foreach ($model->detail as $item) {
            $stm = $this->_db->prepare('
                insert into order_detail(id_order, id_services, quantity, price, total_price, time, total_time,created,updated)
                values(:id_order, :id_services, :quantity, :price, :total_price, :time, :total_time,:created,:updated)
            ');
    $now = date('Y-m-d H:i:s');//Fecha y Hora Sistem
            $stm->execute([
                'id_order' => $model->id,
                'id_services' => $item->id_services,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'total_price' => $item->total_price,
                'time' => $item->time,
                'total_time' => $item->total_time,
                'created' => $now,
                'updated' => $now
            ]);
        }
    }
private function hoursDetailCreate(Order $model): void{

        foreach ($model->hoursdetail as $item) {
            $stm = $this->_db->prepare('
                insert into hours_detail(id_hours_day, id_order, use_time,created,updated)
                values(:id_hours_day, :id_order, :use_time,:created,:updated)
            ');

//id`, id_hours_day, id_order, use_time,created,updated
    $now = date('Y-m-d H:i:s');//Fecha y Hora Sistem
            $stm->execute([
                'id_order' => $model->id,
                'id_hours_day' => $item->id_hours_day,
                'use_time' => $item->use_time,
                'created' => $now,
                'updated' => $now
            ]);
        }
    }


}
?>
