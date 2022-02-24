<?php
  if(isset($_POST['find'])){
    $data = new FlightsController();
    $flight = $data->findFlights();
  }else{
    $data = new FlightsController();
    $flights = $data->getAllFlights();
  }

?>

<div class="container">
    <div class="row my-4">
    <div class="col-md-10 mx-auto">
      <?php include('./views/includes/alerts.php') ?>
      <div class="card">
        <div class="card-body bg-light">
        <a href="<?php echo BASE_URL; ?>add" class="btn btn-sm btn-primary mr-2 mb-2">
        <i class="fas fa-plus"></i>
      </a>
      <a href="<?php echo BASE_URL; ?>add" class="btn btn-sm btn-primary mr-2 mb-2">
        <i class="fas fa-home"></i>
      </a>
      <form method="post" class="float-right mb-2 d-flex flex-row">
        <input type="text" class="form-control" name="search" placeholder="Recherche">
        <button class="btn btn-info btn-sm" name="find" type="submit"></button>
      </form>
      <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Depart</th>
      <th scope="col">Destination</th>
      <th scope="col">Price</th>
      <th scope="col">Seats_number</th>
     

    </tr>
  </thead>
  <tbody>
       <?php foreach($flights as $flight):?>
        <tr>
      <th scope="row"><?php echo $flight['ID'] ?></th>
      <td><?php echo $flight['Depart'] ?></td>
      <td><?php echo $flight['Destination'] ?></td>
      <td><?php echo $flight['Price'] ?></td>
      <td><?php echo $flight['Seats_number'] ?></td>
    
    <td class="d-flex flex-raw">
      <form method="post" class="mr-1" action="update">
        <input type="hidden"|name="ID" value="<?php echo $flight['ID'] ;?>">
       <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> </button>
      
      </form>
      <form method="post" class="mr-1" action="delete">
        <input type="hidden"|name="ID" value="<?php echo $flight['ID'] ;?>">
       <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button>
      
      </form>
    </td>
    </tr>
       <?php endforeach ?>
  </tbody>
</table>
        </div>
      </div>
    
       </div>
    </div>
</div>