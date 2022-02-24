<?php

class Flights{
   
    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM flights');
        $stmt->execute();
        return $stmt->fetchAll();
        // $stmt->close();
        $stmt = null;
    }
    
    static public function getFlights($data){
        $ID = $data['ID'];
        try {
            $query = 'SELECT * FROM flights WHERE ID = :ID';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":ID" => $ID));
            $flights = $stmt->fetch(PDO::FETCH_OBJ);
            return $flights;
        } catch(PDOException $ex){
          echo 'erreur' . $ex->getMessage();
        }
    }

    static public function searchFlights($data){
        $search = $data['search'];
        try{
            $query = 'SELECT * FROM flights WHERE depart LIKE ? OR destinaition LIKE ?';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array('%'.$search.'%','%'.$search. '%'));
            return $flights->fetchAll();
        }catch(PDOException $ex){
            echo 'erreur' .$ex->getMessage();
        }
    }

    static public function add($data){
        $stmt = DB::connect()->prepare('INSERT INTO flights(
            depart,destination,price,seats_number)
            VALUES (:depart,:destination,:price,:seats_number)');
        $stmt->bindParam(':depart',$data['depart']);   
        $stmt->bindParam(':destination',$data['destination']);  
        $stmt->bindParam(':price',$data['price']);  
        $stmt->bindParam(':seats_number',$data['seats_number']);  

        if($stmt->execute()){
            return 'ok';
        } else {
            return 'error';
        }
        // $stmt->close();
        $stmt = null;
    }

    static public function update($data){
        $stmt = DB::connect()->prepare('UPDATE flights SET
            depart = :depart,destination = :destination,price = :price,seats_number = :seats_number)
           WHERE id = :id ');
        $stmt->bindParam(':id',$data['id']);   
        $stmt->bindParam(':depart',$data['depart']);   
        $stmt->bindParam(':destination',$data['destination']);  
        $stmt->bindParam(':price',$data['price']);  
        $stmt->bindParam(':seats_number',$data['seats_number']);  
        if($stmt->execute()){
            return 'ok';
        } else {
            return 'error';
        }
        // $stmt->close();
        $stmt = null;
    }

    static public function delete($data){
        $ID = $data['ID'];
        try{
            $query = 'DELETE * FROM flights WHERE ID = :ID';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":ID" => $ID));
            if($stmt->execute()){
                return 'ok';
            }

        }catch(PDOException $ex){
            echo 'erreur' . $ex->getMessage();
          }
    }
}
?>
