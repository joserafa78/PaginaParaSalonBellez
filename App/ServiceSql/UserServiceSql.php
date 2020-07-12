<?php declare(strict_types = 1 );
//_____________NOMBRE DE ESPACIO____________________
namespace App\ServiceSql;
//_____________________________________
use PDO;
use PDOException;
use Config\Database\DbProvider as Conexion;
use App\Models\User as User;

class  UserServiceSql{
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
            $stm = $this->_db->prepare('select * from user');

            // 02. Execute query
            $stm->execute();

            // 03. Fetch All
            $result = $stm->fetchAll(PDO::FETCH_CLASS, '\\App\\Models\\User');
        }catch(Exception  $ex){

          echo $ex->getMessage();

        }

        return $result;
    }

    public function get(int $id): ?User{
        $result = null;

        try {
        $stm = $this->_db->prepare('select * from user where id = :id');
            $stm->execute(['id' => $id]);

            $data = $stm->fetchObject('\\App\\Models\\User');
            unset($data->password);//no Carge la Clave
            if ($data) {
                $result = $data;
            }
        } catch (PDOException $ex) {
                 echo $ex->getMessage();
        }

        return $result;
    }

    public function create(User $model): string{
        try {
            $stm = $this->_db->prepare(
        'INSERT INTO user (first_name, last_name, user_name, rol,phone_number, direction, email, password, image, created, updated)VALUES (:first_name, :last_name, :user_name,:rol,:phone_number, :direction, :email, :password, :image, :created, :updated)'
            );


            $now = date('Y-m-d H:i:s');//Fecha y Hora Sistem
            $stm->execute([
               'first_name'=>$model->first_name,
               'last_name'=>$model->last_name,
                'user_name'=>$model->user_name,
                'rol'=>$model->rol,
                'phone_number'=>$model->phone_number,
                'direction'=>$model->direction,
                'email'=>$model->email,
                'password'=>$model->password,
                'image'=>$model->image,
                'created'=>$now,
                'updated'=>$now
            ]);
        } catch (PDOException $ex) {
                 echo $ex->getMessage();
        }
        $ultimoID = $this->_db->lastInsertId();//ULTIMO REGIST
        return $ultimoID;
    }

    public function update(User $model): void{
        try {
            $stm = $this->_db->prepare('
                UPDATE user SET
                first_name = :first_name,
                last_name = :last_name,
                user_name = :user_name,
                phone_number = :phone_number,
                direction= :direction,
                email = :email,
                password = :password,
                image = :image,
                updated = :updated
                WHERE id = :id');


            $now = date('Y-m-d H:i:s');//Fecha y Hora Sistem
            $stm->execute([
               'first_name'=>$model->first_name,
               'last_name'=>$model->last_name,
                'user_name'=>$model->user_name,
                'phone_number'=>$model->phone_number,
                'direction'=>$model->direction,
                'email'=>$model->email,
                'password'=>$model->password,
                'image'=>$model->image,
                'updated'=>$now,
                'id'=>$model->id
            ]);

        } catch (PDOException $ex) {
            print $ex->getMessage();

        }
    }

    public function updateBasic(User $model): void{
        try {
            $stm = $this->_db->prepare('
                UPDATE `user` SET first_name= :first_name ,last_name= :last_name ,phone_number= :phone_number ,direction= :direction ,updated= :updated  WHERE id = :id');


            $now = date('Y-m-d H:i:s');//Fecha y Hora Sistem
            $stm->execute([
               'first_name'=>$model->first_name,
               'last_name'=>$model->last_name,
                'phone_number'=>$model->phone_number,
                'direction'=>$model->direction,
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
            'DELETE FROM user where id = :id'
            );

            $stm->execute(['id' => $id]);
        } catch (PDOException $ex) {

        }
    }

    public function trueEmail(User $model){ //Devuelva Falso o los datos
         $result=false;
        try {
        $stm = $this->_db->prepare('SELECT first_name, last_name FROM `user` WHERE email = :email AND password= :password AND rol= :rol');
            $stm->execute(['email' => $model->email,
                            'password' =>$model->password,
                            'rol' => 'moderador']);

            $encontro=false;
             while($result = $stm->fetch()){
             $encontro=true;
             $rows[]=$result;

             }

        } catch (PDOException $ex) {
                 echo $ex->getMessage();
        }


        if ($encontro)
          {
        return json_encode($rows)  ;
          }
        return $encontro;
    }//Devuelve (false) o Array Objeto

    public function trueUserName(User $model){
         $result=false;
        try {
        $stm = $this->_db->prepare('SELECT first_name, last_name FROM `user` WHERE user_name = :user_name AND password= :password AND rol= :rol');
            $stm->execute(['user_name' => $model->user_name,
                                    'password' =>$model->password,
                                    'rol' => 'moderador']);

             $encontro=false;
             while($result = $stm->fetch()){
             $encontro=true;
             $rows[]=$result;

             }

        } catch (PDOException $ex) {
                 echo $ex->getMessage();
        }

          if ($encontro)
          {
        return json_encode($rows)  ;
          }
        return $encontro;
    }//Devuelve (false) o Array Objeto






}

?>
