<?php
  if(isset($_post['submit'])){
    $newFlights = new FlightsController();
    $newflights = addFlights();
  }
  

?>

<div class="container">
    <div class="row my-4">
    <div class="col-md-10 mx-auto">
      <div class="card">
        <div class="card-header">Add Flights</div>  
        <div class="card-body bg-light">
                <a href="<?php echo BASE_URL; ?>" class="btn btn-sm btn-secondary mr-2 mb-2">
                      <i class="fas fa-home"></i>
                </a>
                <form method="post">
                    <div class="form-group">
                       <label for="depart">Depart</label>
                       <input type="text" name="depart" class="
                       form-control" placeholder="depart" >
                    </div>
                    <div class="form-group">
                       <label for="destination">destination</label>
                       <input type="text" name="destination" class="
                       form-control" placeholder="destination" >
                    </div>
                    <div class="form-group">
                       <label for="price">Price</label>
                       <input type="text" name="price" class="
                       form-control" placeholder="price" >
                    </div>
                    <div class="form-group">
                       <label for="seats_number">Seats_number</label>
                       <input type="text" name="seats_number" class="
                       form-control" placeholder="seats_number" >
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