<?php
  if(isset($_POST['ID'])){
    $exitFlights = new FlightsController();
    $exitflights->deleteFlights();
  }
  
?>