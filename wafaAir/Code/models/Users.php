<?php

class Users{
  static public function createUser($data){ //sign up function
        
            
        try {
            $stmt = DB::connect()->prepare("INSERT INTO users (fullname,username,password) VALUES (:fullname,:username,:password)") ;
        $stmt->bindParam(':fullname',$data['fullname']);
        $stmt->bindParam(':username',$data['username']);
        $stmt->bindParam(':password',$data['password']);
        $stmt->execute();
            return 'ok';
        }
        catch(PDOException $ex){
            return '<div style="background-color : #ff3851;"><h4 style="color:green; 
                                ">Duplicated user</h4></div>';
        }
        $stmt = null;

        
        
    }
    // static public function searchPessenger($data)
    // {
    //     $search = $data['search'];
    //     try {
    //         $query = 'SELECT * FROM passenger WHERE fullname LIKE ?';
    //         $stmt = DB::connect()->prepare($query);
    //         $stmt->execute(array('%' . $search . '%'));
    //         $pessengers = $stmt->fetchAll();
    //         return $pessengers;
    //     } catch (PDOException $ex) {
    //         echo 'error' . $ex->getMessage();
    //     }
    // }

    static public function login($data){ //login function
        $username = $data['username'];
            try{
                $query = 'SELECT * FROM users WHERE username=:username';
                $stmt = DB::connect()->prepare($query) ;
                $stmt->execute(array(":username" => $username));
                $user = $stmt->fetch(PDO::FETCH_OBJ);
                return $user;
                if($stmt->execute()){
                    return 'ok';
                }
            }catch(PDOException $ex){
                echo 'erreur' . $ex->getMessage();
            }
        }




}

?>