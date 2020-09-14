<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content= "width=device-width, initial-scale=1.0">
        <title>Blog</title>
        <!--*****BOOTSTRAP*****-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/login.css');?>">
    </head>
    <body>
        <!--*****LOGIN*****-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Login</h5>
                            <form action="<?php echo site_url('login/login'); ?>" method="post">
                            <div class="form-label-group">
                                <input type="text" id="email" name="user" class="form-control" placeholder="Username or Email " required autofocus>
                                <label for="inputEmail">Username or Email</label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                                <label for="inputPassword">Password</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="remember" name='remember'>
                                <label class="custom-control-label" for="remember">Remember Me</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Login</button>
                            </form>
                            </br>
                            <form action="registration/" method="post">
                            <button class="btn btn-lg btn-warning btn-block text-uppercase" type="submit">Sign Up!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    </body>
</html>
