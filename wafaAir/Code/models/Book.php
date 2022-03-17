

<?php

class Book{
    static public function add($data){
        $stmt = DB::connect()->prepare("INSERT INTO `reservation`(`id_user`, `id_flight`) VALUES (:id_user,:id_flight)") ;
        $stmt->bindParam(':id_flight',$data['id']);
        $stmt->bindParam(':id_user',$_SESSION['id']);

        if($stmt->execute()){
            return'ok';
        }else{
            return 'error';
        }
        $stmt = null;
 
    }
    static public function delete($data){
        $stmt = DB::connect()->prepare("DELETE FROM `reservation` WHERE id=:id ") ;
        $stmt->bindParam(':id',$data['id']);
        // $stmt->bindParam(':id_user',$_SESSION['id']);
    
        if($stmt->execute()){
            return'ok';
        }else{
            return 'error';
        }
        $stmt = null;
 
    }
    

    public static function getAll(){
        $stmt = DB::connect()->prepare('SELECT r.id,f.fro_m,f.city_to,f.date_time,f.arrive_time,f.price,u.fullname FROM reservation r , flights f, users u WhERE r.id_flight = f.id && r.id_user = u.id && r.id_user = '.$_SESSION['id']);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function getAllFlights(){
        $stmt = DB::connect()->prepare('SELECT r.id,f.fro_m,f.city_to,f.date_time,f.arrive_time,f.price,u.fullname FROM reservation r , flights f, users u WHERE r.id_flight = f.id && r.id_user = u.id ');
        $stmt->execute();
        return $stmt->fetchAll();
    }
}