<?php
if (isset($_SESSION['role']) && $_SESSION['role'] != 'admin') {
  $data = new FlightsController(); //creat object from the class FlightsController
  $flight = $data->getBook();
  // $title = 'My reservations';
  // $cancel = false;
} else {
  $data = new FlightsController(); //creat object from the class FlightsController
  $flight = $data->getAllBook();
  // $title = 'All reservations';
  // $cancel = true;
}

if (isset($_POST['cancel'])) {
  $deleteFlight = new FlightsController();
  $deleteFlight->deleteBook();
}
?>
<!-- Flights going to -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="">
    <img src="../Code/public/img/logo.png" alt="" width="70" height="60" class="d-inline-block align-text-top">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo BASE_URL ?>">Home <span class="sr-only"></span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">My reservation</a>
      </li> -->

    </ul>
  </div>
</nav>
<div class="container-fluid bg-image py-4" style="background-image: url('https://mdbootstrap.com/img/new/fluid/city/018.jpg');
            height: 100vh">
  <div class="container">

    <table class="table table-responsive table-light table-hover text-center my-4">
      <thead>
        <tr>
          <!-- <th scope="col">#</th> -->
          <th scope="col">From</th>
          <th scope="col">To</th>
          <th scope="col">Departure Date</th>
          <th scope="col">Arrival Date</th>
          <th scope="col">Price</th>

          <th scopre="col"></th>
        </tr>
      </thead>
      <tbody>
       
        <?php foreach ($flight as $f) { ?>
          <tr id="<?php echo $f["id"]; ?>">
            <!-- <th scope="row"><input style="color:white;" type="checkbox" id="" name="" value=""></th> -->
            <td><?= $f["fro_m"] ?></td>
            <td><?= $f["city_to"] ?></td>
            <td><?= $f["date_time"] ?></td>
            <td><?= $f["arrive_time"] ?></td>
            <td><?= $f["price"] ?></td>
            <td>
              <div class="d-flex flex-row justify-content-between">

                <form class="" action="" method="POST">
                  <input type="text" name="id" hidden value="<?= $f["id"] ?>">

                  <button class="btn btn-warning" type="submit" name="cancel">CENCEL</button>


                </form>
                <form method="post" class="mr-2" action="addpassenger">
                  <input type="text" hidden name="id_flight" value="<?php echo $vol['id']; ?>">
                  <button class="btn btn btn-success addPassenger" value="<?= $f["id"] ?>" ><i class="fa fa-users"></i> <i class="fa fa-plus"></i> </button>
                </form>
               

              </div>
            </td>
          </tr>
        <?php } ?>
      </tbody>

    </table>
    <!-- </form> -->
  </div>
</div>
<script> 

  let buttons=document.querySelectorAll('.addPassenger');
//   button.addEventListener("click", function() {
//        alert(button.value)
//     // localStorage.setItem('id_flight', button.value);
  
// });
buttons.forEach(function(button){
  console.log(button.value);
  button.addEventListener("click", function() {
      //  alert(button.value)
    localStorage.setItem('id_flight', button.value);
  
});
});


</script>