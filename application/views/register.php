<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content= "width=device-width, initial-scale=1.0">
        <title>Blog|Register</title>
        <!--*****BOOTSTRAP*****-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!--*****FONTAWESOME*****-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/css/register.css');?>">
    </head>
    <body>
        <center>
            <div><?php echo validation_errors();?></div>
        </center>
        <!--*****LOGIN*****-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Register</h5>
                            <?php $attr=array('class'=>'form-signin');?>
                            <?php echo form_open('login/create', $attr);?>
                            <div class="form-label-group">
                                <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" required autofocus>
                                <label for="fname">First Name</label>
                                <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" required autofocus>
                                <label for="lname">Last Name</label>
                                <input type="number" id="age" name="age" min="14" max="99" class="form-control" placeholder="Age" required autofocus>
                                <label for="age">Age</label>
                                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                                <label for="inputEmail">Email address</label>
                                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
                                <label for="username">Username</label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required autofocus>
                                <label for="inputPassword">Password</label>
                                <input type="password" id="passconf" name="passconf" class="form-control" placeholder="Confirm Password" required autofocus>
                                <label for="passconf">Re-enter Password</label>
                            </div>
                            <button class="btn btn-lg btn-danger btn-block text-uppercase" type="submit">Sign Up!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>
