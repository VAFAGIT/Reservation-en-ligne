<?php
  if(isset($_POST['submit'])){
    $CreatUser = new UsersController();
    $CreatUser->register();
  }

?>

<div class="container-fluid bg-image py-4" style="background-image: url('https://wallpaperaccess.com/full/1470792.jpg');
            height: 100vh">    <div class="row my-4">
    <div class="row my-4">
      <div class="col-md-6 mx-auto">
           <?php include('./views/includes/alerts.php') ?>
               <div class="card">
                   <div class="card-header">
                       <h3 class="text-center">inscription</h3>
                   </div>
                    <div class="card-body bg-dark">
      
                    <form method="POST" class="mr-1 " action="">
                        <div class="form-group mb-3">
                             <input type="text" name="fullname" placeholder="Full Name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                             <input type="text" name="username" placeholder="Usename" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                             <input type="password" name="password" placeholder="password" class="form-control">
                        </div>
                        <button name="submit" class="btn btn-sm btn-primary mb-2">sign up</button>
                        <div class="card-footer">
                            <a href="<?php echo BASE_URL;?>login" class="btn btn-link">sign in</a>
                        </div>
                    </form>
                       <div class="card-footer">
                          <a href="<?php echo BASE_URL;?>login" class="btn btn-link">Connexion</a>
                       </div>
                    </div>
                </div>
    
           </div>
        </div>
    </div>
</div>
