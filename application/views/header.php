<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content= "width=device-width, initial-scale=1.0">
        <title>Blog</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/css/main.css');?>">
    </head>
    <body id="main">
        <div id="mySidenav" class="sidenav">
            <div><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></div>
            <div id="friends_xx" style="display:block"></div>
        </div>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#" style="color: green;text-decoration: underline;"><strong>Blog</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url('dashboard/'); ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url('people'); ?>">People</a>
                    </li>
                    <li class="nav-item active" id="nav_friends">
                        <a class="nav-link" href=" " id="friends">Friends</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active" href="" id="notifications" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Notifications <span class="badge badge-primary"></span>
                        </a>
                        <div class="dropdown-menu" id="notes" aria-labelledby="navbarDropdown" >
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                </ul>
                <div class="btn-group" style="float:right;">
                    <button class="btn btn-light btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?php if(null !==$_SESSION['avatar']){echo base_url('/avatar/'.@$_SESSION['avatar']);}else{echo base_url('/avatar/avatar.png');}?>" width="25px" height="25px" class="avatar">
                    <?php echo " ".$_SESSION['name']." ";?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#avatarmodal">Change Avatar</button>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url('webagram/logout');?>">Logout</a>
                    </div>
                </div>
                <!--  -->
            </div>
        </nav>
        <!--modal for avatar-->
        <div class="modal fade" id="avatarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Avatar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <form action="<?php echo base_url('webagram/useravatar');?>" method="post" enctype="multipart/form-data"><input type="file" name="avatar" id="avatar" class="upload"><label for="avatar" class="btn btn-warning" style="margin-top: 8px" >New Avatar</label>
                            <button type="submit" class="btn btn-primary" >Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal for friend requests -->
        <div class="modal fade" id="confirmmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">You have a friend request</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="reject" class="btn btn-danger">Reject</button>
                        <button type="submit" id="accept" class="btn btn-primary">Accept</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
            var sessionuserid = '<?= $_SESSION['userid'];?>';
            var updatestatus = '<?= base_url("feed/updatestatus");?>';
            var notifications = '<?= base_url("webagram/notifications");?>';
            var freindrequest = '<?= base_url('people/req_response');?>';
            var online_users = '<?= base_url('friends/index')?>';
            var src = '<?= base_url();?>';
        </script>
		<script src="<?php echo base_url();?>/js/notifications.js"></script>
