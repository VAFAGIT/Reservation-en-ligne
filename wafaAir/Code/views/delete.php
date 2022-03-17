<?php
  if(isset($_POST['id'])){
    $exitFlight = new FlightsController();
    $exitFlight->deleteFlights();
  }
  
?>