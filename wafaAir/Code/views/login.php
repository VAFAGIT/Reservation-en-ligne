<?php
    if(isset($_POST['submit'])){
        print_r($_POST);
        $loginUser = new UsersController(); 
        $loginUser->auth();
    }

    
?>



<div class="container-fluid bg-image py-4" style="background-image: url('https://wallpaperaccess.com/full/1470792.jpg');
            height: 100vh">    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <?php include('./views/includes/alerts.php');?> 
                <div class="card">
                <div class="card-headre ">
                    <h3 class="text-center">Login</h3>
                </div>
                <div class="card-body bg-dark ">   
                    <form method="POST" class="mr-1" >
                        <div class="form-group mb-3">
                             <input type="text" name="username" placeholder="Username" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                             <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>
                        <button class="btn btn-sm btn-primary mb-2" name="submit">Login</button>
                        <div class="card-footer">
                            <a href="<?php echo BASE_URL;?>register" class="btn btn-link">Sign up</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>