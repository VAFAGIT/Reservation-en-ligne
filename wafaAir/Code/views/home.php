<?php
if (isset($_POST['find'])) {
    $data = new FlightsController();
    $flights = $data->findFlights();
} else {
    $data = new FlightsController();
    $flights = $data->getAllFlights();
}

if (isset($_SESSION['role']) && $_SESSION['role'] != 'admin') {
    Redirect::to('homeuser');
}



?>
<div class="container-fluid bg-white">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="">
                <img src="https://banner2.cleanpng.com/20180505/lbq/kisspng-flight-aeronautics-aviation-airplane-qatar-airways-airline-5aede2e041fde5.5689378015255395522703.jpg" alt="" width="50" height="60" class="d-inline-block align-text-top">
                <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo BASE_URL ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL ?>add">ADD Flight</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL ?>showflights">Reservation</a>
                    </li>


                </ul>
                <div class="ml-auto">
                    <input type="text" name="search" placeholder="Search">
                    <button class="btn btn-info btn-sm " name="find" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <a href="<?php echo BASE_URL ?>logout" title="Logout" class="btn link btn-sm mb-2 mr-2 ">
                    <!--url de base plus la page add -->
                    <i class="fas fa-user "><span class="p-2"><?php echo $_SESSION['username']; ?></span></i>
                </a>

            </div>
        </nav>
    </div>
</div>
<div class="container-fluid bg-image py-4" style="background-image: url('https://mdbootstrap.com/img/new/fluid/city/018.jpg');
            height: 100vh">
    <div class="row my-4">
        <div class="col-md-10 mx-auto">
            <?php include('./views/includes/alerts.php'); ?>
            <div class="card">
                <div class="card-body bg-light">


                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">From / To</th>
                                <th scope="col">Date & time</th>
                                <th scope="col">Arrive time</th>
                                <th scope="col">Price</th>
                                <th scope="col">Seats number</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($flights as $flight) : ?>
                                <tr>
                                    <th scope="row"><?php echo $flight['fro_m'] . ' ' . $flight['city_to'] ?></th>
                                    <td><?php echo $flight['date_time'] ?></td>
                                    <td><?php echo $flight['arrive_time'] ?></td>
                                    <td><?php echo $flight['price'] ?></td>
                                    <td><?php echo $flight['seats_number'] ?></td>
                                    <td>
                                        <?php echo $flight['status']
                                            ? '<span class="badge bg-success">One way</span>'
                                            :
                                            '<span class="badge bg-danger">Round trip</span>';; ?></td>
                                    <td class="d-flex flex-row">
                                        <form method="POST" class="me-2" action="update">
                                            <input type="hidden" name="id" value="<?php echo $flight['id'] ?>">
                                            <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                        </form>
                                        <form method="POST" class="me-3" action="delete">
                                            <input type="hidden" name="id" value="<?php echo $flight['id'] ?>">
                                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>