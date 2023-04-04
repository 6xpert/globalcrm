<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>/images/favicon.png">
    <title>Edit Branch Office</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?= base_url() ?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/toastr/toastr.min.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <?php

        $this->load->view('components/topheader.php');
        $this->load->view('components/sidemenu.php');
        ?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Edit Branch office</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manage Branch offices</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Branch office</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->

                <div class="row">
                    <!-- ============================================================== -->
                    <!-- validation form -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Edit Branch Office Form</h5>
                            <div class="card-body">
                                <form method="post" enctype='multipart/form-data' action="<?= base_url('edit-branch-office-data/'.$this->uri->segment(2)) ?>">
                                    <div class="row">
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mt-2">
                                            <label for="validationCustom01">Branch Name<span style="color: red;">*</span></label>
                                            <input type="text" value="<?=$branchDetail[0]['branchName']?>" Required class="form-control" id="bName" name="bName">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2 ">
                                            <label for="validationCustom01">Branch Address<span style="color: red;">*</span></label>
                                            <input type="text" value="<?=$branchDetail[0]['branchAddress']?>" Required class="form-control" id="address" name="address">

                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2 ">
                                            <label for="validationCustom01">Branch City<span style="color: red;">*</span></label>
                                            <input type="text" value="<?=$branchDetail[0]['branchCity']?>" Required class="form-control" id="city" name="city">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2 ">
                                            <label for="validationCustom01">Branch Country<span style="color: red;">*</span></label>
                                            <input type="text" value="<?=$branchDetail[0]['branchCountry']?>" Required class="form-control" id="country" name="country">

                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2 ">
                                            <label for="validationCustom01">Branch Website</label>
                                            <input type="text" value="<?=$branchDetail[0]['branchWebsite']?>"  class="form-control" id="website" name="website">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2 ">
                                            <label for="validationCustom01">Branch Phone<span style="color: red;">*</span></label>
                                            <input type="text" value="<?=$branchDetail[0]['branchPhone']?>" Required class="form-control" id="bPhone" name="bphone">

                                        </div>


                              

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-4">
                                            <h3>Point Of Contact</h3>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Contact Person<span style="color: red;">*</span></label>
                                            <input type="text" value="<?=$branchDetail[0]['bPersonName']?>" Required class="form-control" id="pname" name="pname">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Designation<span style="color: red;">*</span></label>
                                            <input type="text" value="<?=$branchDetail[0]['bPersonDesignation']?>" Required class="form-control" id="designation" name="designation">

                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Email<span style="color: red;">*</span></label>
                                            <input type="email" value="<?=$branchDetail[0]['bPersonEmail']?>" Required class="form-control" id="pemail" name="pemail">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Phone<span style="color: red;">*</span></label>
                                            <input type="text" value="<?=$branchDetail[0]['bPersonPhone']?>" Required class="form-control" id="pphone" name="pphone">

                                        </div>





                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-4">
                                            <h3>Login Details</h3>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">User Email<span style="color: red;">*</span></label>
                                            <input type="email" value="<?=$branchDetail[0]['userEmail']?>" Required class="form-control" id="bemail" name="bemail">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Password<span style="color: red;">*</span></label>
                                            <input type="password" value="<?=$branchDetail[0]['userPass']?>" Required class="form-control" id="bpass" name="bpass">

                                        </div>
                                        

                                    </div><br>
                                    <div class="form-row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button class="btn btn-primary" type="submit" onclick="return validateType()">Update Branch</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end validation form -->
                    <!-- ============================================================== -->
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="<?= base_url() ?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="<?= base_url() ?>assets/vendor/parsley/parsley.js"></script>
    <script src="<?= base_url() ?>assets/libs/js/main-js.js"></script>
    <script>
        $('#form').parsley();
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script src="<?= base_url() ?>assets/toastr/toastr.min.js"></script>
    <?php
    if ($this->session->flashdata('Branch-added') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success('New Branch Office Added!');
        </script>
    <?php
    }
    ?>
</body>

</html>