<?php
  if(isset($_POST['ID'])){
    $exitFlights = new FlightsController();
    $flights = $exitflights->getOneFlights();
  }else{
      Redirect::to('home');
  }
  if(isset($_POST['submit'])){
    $exitFlights = new FlightsController();
    $exitflights->updateFlights();
  }

  

?>
<div class="container">
    <div class="row my-4">
    <div class="col-md-10 mx-auto">
      <div class="card">
        <div class="card-header">Update Flights</div>  
        <div class="card-body bg-light">
                <a href="<?php echo BASE_URL; ?>" class="btn btn-sm btn-secondary mr-2 mb-2">
                      <i class="fas fa-home"></i>
                </a>
                <form method="post">
                    <div class="form-group">
                       <label for="depart">Depart</label>
                       <input type="text" name="depart" class="
                       form-control" placeholder="depart" 
                         value="<?php echo $flights->depart; ?>">
                        <input type="hidden"|name="ID" value="<?php echo $flight->ID ;?>">
                    </div>
                    <div class="form-group">
                       <label for="destination">destination</label>
                       <input type="text" name="destination" class="
                       form-control" placeholder="destination" 
                       value="<?php echo $flights->destination; ?>">
                    </div>
                    <div class="form-group">
                       <label for="price">Price</label>
                       <input type="text" name="price" class="
                       form-control" placeholder="price" 
                       value="<?php echo $flights->price; ?>">
                    </div>
                    <div class="form-group">
                       <label for="seats_number">Seats_number</label>
                       <input type="text" name="seats_number" class="
                       form-control" placeholder="seats_number"
                       value="<?php echo $flights->seats_number; ?>" >
                    </div>
                    <div class="from-group">
                     <button type="submit" class="btn btn-primary" name="submit">Valider</button>
                    </div>
                </form> 
                
               
        </div>
       </div>
    
    </div>
    </div>
</div>