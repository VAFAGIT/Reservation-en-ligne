<?php

class FlightsController{

    public function getAllFlights(){
        $flights = Flights::getAll();
        return $flights;
    }

    public function getOneFlights(){
        if(isset($_POST['id'])){
            $data = array(
             'id' => $_POST['ID']
            );
            $flights = Flights::getFlights($data); 
        return $flights;
        }
    }
    
    public function findFlights(){
       if(isset($_POST['search'])){
           $data = array('search' => $_POST['search'] );
       }
       $flights = Flights::searchFlights($data);
       return $flights;
    }

    public function updateFlights(){
        if(isset($_POST['submit'])){
          $data = array(
              'id' => $_POST['id'],
              'depart' => $_POST['depart'],
              'destination' => $_POST['destination'],
              'price' => $_POST['price'],
              'seat_number' => $_POST['seat_number'],
          );
          $result = Flights::update($data);
          if($result === 'ok'){
            Session::set('success','modified flight');
            Redirect::to('home');
          }else{
              echo $result;
          }
        }
    }



    public function addFlights(){
        if(isset($_POST['submit'])){
          $data = array(
              'depart' => $_POST['depart'],
              'destination' => $_POST['destination'],
              'price' => $_POST['price'],
              'seat_number' => $_POST['seat_number'],
          );
          $result = Flights::add($data);
          if($result === 'ok'){
              Session::set('success','flight added');
              Redirect::to('home');
          }else{
              echo $result;
          }
        }
    }



    public function deleteFlights(){
        if(isset($_POST['id'])){
            $data['id'] = $_POST['id'];
            $result = Flights::delete($data);
            if($result === 'ok'){
                Session::set('success','deleted flight');
                Redirect::to('home');
            }else{
                echo $result;
            }
        }
    }

}



?>