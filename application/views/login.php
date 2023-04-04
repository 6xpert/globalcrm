<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>/images/favicon.png">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?= base_url() ?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/toastr/toastr.min.css">
    <style>
        html,
        body {
            height: 100%;
            background-color: white;
        }

        body {
            display: -ms-flexbox;
           
            -ms-flex-align: center;
         
            
        }
        #myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
  /* z-index: 3; */
}
    </style>
</head>

<body> <!-- ============================================================== -->
    <!-- login page  -->
    <!-- https://youtu.be/PShhk9fAE1o    -->
    <!-- ============================================================== -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light pt-3 pb-3">
    <a href="<?= base_url() ?>">
                    <img class="logo-img" src="<?= base_url() ?>assets/images/logo.png" width="70%" alt="logo">
                </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>">Login</a>
                </li>
            </ul>
        </div>
    </nav>




   
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="splash-container">
                <div class="card ">
                        <div class="card-header text-center">
                            <h2>Login Form</h2><span class="splash-description">Please enter your user information.</span>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?= base_url('login-data') ?>">
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="username" name="username" type="email" placeholder="Username" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
                    
               
            </div>
            <div class="col-md-6">
                <video width="100%" height="395" autoplay="" loop="" muted="" poster="http://thingstodoin.uk/dev/GlobalGroup/public/assets/video/video.mp4" id="background">
                    <source src="http://thingstodoin.uk/dev/GlobalGroup/public/assets/video/video.mp4" type="video/mp4">
                    <source src="http://thingstodoin.uk/dev/GlobalGroup/public/assets/video/video.mp4" type="video/webm">
                    <source src="http://thingstodoin.uk/dev/GlobalGroup/public/assets/video/video.mp4" type="video/ogg">
                </video>
            </div>
        </div>
    </div>
    <!-- <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">
                <center>
                <img src="<?=base_url('assets/banner.jpeg')?>" class="text-center" width="20%" alt="">
                </center>
            </div>
        </div>
    </div> -->

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="<?= base_url() ?>assets/toastr/toastr.min.js"></script>
    <?php
    if ($this->session->flashdata('error_msg') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error('Invalid Login!');
        </script>
    <?php
    }
    ?>
</body>

</html>