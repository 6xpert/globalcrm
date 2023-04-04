<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>/images/favicon.png">
    <title>Edit Representing Countries</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?= base_url() ?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/toastr/toastr.min.css">
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

        include('components/topheader.php');
        include('components/sidemenu.php');
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
                            <h2 class="pageheader-title">Edit Representing Countries</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manage Countries</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Representing Countries</li>
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
                            <h5 class="card-header">Edit Representing Countries Form</h5>
                            <div class="card-body">
                                <form method="post" enctype='multipart/form-data'  action="<?=base_url('Editrepresenting-data/'.$this->uri->segment(2))?>">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                            <label >Countries<span style="color: red;">*</span></label>
                                            <select name="countryID" id="countryID" required class="form-control">
                                                <option value="">Please Select Country</option>
                                                <?php
                                                foreach ($countrydata as $row) {
                                                ?>
                                                    <option
                                                    <?php
                                                            if($row['country_id']==$repCountrydata[0]['country_id']){
                                                                echo 'selected';
                                                            }
                                                    ?>
                                                    value="<?=$row['country_id']?>"><?=$row['country_name']?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                            <label for="validationCustom01">Monthly Living Cost</label>
                                            <input type="text" value="<?=$repCountrydata[0]['livingCost']?>" class="form-control" id="livingCost" name="livingCost"   >
                                            
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">Visa Requirement</label>
                                            <textarea name="visaReq"  id="visaReq" class="form-control" cols="30" rows="5"><?=$repCountrydata[0]['visaRequirement']?></textarea>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">Part Time Work Details</label>
                                            <textarea name="partTimeWork" id="partTimeWork" class="form-control" cols="30" rows="5"><?=$repCountrydata[0]['workDetail']?></textarea>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">Country Benefits</label>
                                            <textarea name="countryBen" id="countryBen" class="form-control" cols="30" rows="5"><?=$repCountrydata[0]['benefits']?></textarea>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                                            <h3>Additional Links</h3>
                                            
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                            <label for="validationCustom01">Link 1 Description</label>
                                            <input type="text" class="form-control" value="<?=$repCountrydata[0]['link1desc']?>" id="link1desc" name="link1desc"   >
                                            
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                            <label for="validationCustom01">Link</label>
                                            <input type="text" class="form-control" value="<?=$repCountrydata[0]['link1']?>" id="link1" name="link1"   >
                                            
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                            <label for="validationCustom01">Link 2 Description</label>
                                            <input type="text" class="form-control" value="<?=$repCountrydata[0]['link2desc']?>" id="link2desc" name="link2desc"   >
                                            
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                            <label for="validationCustom01">Link</label>
                                            <input type="text" class="form-control" value="<?=$repCountrydata[0]['link2']?>" id="link2" name="link2"   >
                                            
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                            <label for="validationCustom01">Link 3 Description</label>
                                            <input type="text" class="form-control" value="<?=$repCountrydata[0]['link3desc']?>" id="link3desc" name="link3desc"   >
                                            
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                            <label for="validationCustom01">Link</label>
                                            <input type="text" class="form-control" value="<?=$repCountrydata[0]['link3']?>" id="link3" name="link3"   >
                                            
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                            <label for="validationCustom01">Link 4 Description</label>
                                            <input type="text" class="form-control" value="<?=$repCountrydata[0]['link4desc']?>" id="link4desc" name="link4desc"   >
                                            
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                            <label for="validationCustom01">Link</label>
                                            <input type="text" class="form-control" value="<?=$repCountrydata[0]['link4']?>" id="link4" name="link4"   >
                                            
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <label for="validationCustom01">Countyr Flag</label>
                                            <input type="file" class="form-control" id="flag" name="flag"   >
                                            
                                        </div>

                                    </div><br>
                                    <div class="form-row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button class="btn btn-primary" type="submit">Update Country</button>
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
     <script src="<?=base_url()?>assets/toastr/toastr.min.js"></script>
        <?php
    if ($this->session->flashdata('RepCountryAdded') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success('Representing Country Added!');
        </script>
        <?php
    }
    ?>
        <?php
    if ($this->session->flashdata('CountryAlreadyAdded') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error('Representing Country Already Added!');
        </script>
        <?php
    }
    ?>
</body>

</html>