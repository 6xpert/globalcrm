<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>/images/favicon.png">
    <title>Add Cources for Lead</title>
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
                            <h2 class="pageheader-title">Add Cources to lead</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manage Leads</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Add new Lead</li>
                                        <li class="breadcrumb-item active" aria-current="page">Add Cources to lead</li>
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
                            <h5 class="card-header">Add Cource for : <?=$lead[0]['stdName']?></h5>
                            <div class="card-body">
                                <form method="post" enctype='multipart/form-data' action="<?= base_url('add-lead-course-data/'.$this->uri->segment(2)) ?>">
                                    <div class="row">
                                    
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mt-2">
                                            <label for="validationCustom01">Select Representing Country<span style="color: red;">*</span></label>
                                            <select name="repcountryID" required id="repcountryID"  class="form-control" onchange="return getInstitution()">
                                                <option value="">Select Representing Country</option>
                                                <?php
                                                    if($repCountry){
                                                        foreach($repCountry as $row){
                                                ?>
                                                <option value="<?=$row['country_id']?>"><?=$row['country_name']?></option>
                                                <?php
                                                        }
                                                    }
                                                        ?>
                                            </select>

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2 ">
                                            <label for="validationCustom01">Representing Institution<span style="color: red;">*</span></label>
                                            <select required name="institutions" id="institutions" onchange="return getCources()" class="form-control">
                                                    <?php
                                                    if (isset($_GET['courseSearch'])) {

                                                        foreach ($repInstitute as $row) {

                                                    ?>
                                                            <option value="<?= $row['uni_id'] ?>"><?= $row['uni_name'] ?></option>
                                                        <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <option value="">Please Select representing Country first</option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>

                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2 ">
                                            <label for="validationCustom01">Select Course<span style="color: red;">*</span></label>
                                            <select required name="cources" id="cources" class="form-control" onchange="return GetIntake()">
                                                <option value="">Please select Institution </option>
                                            </select>

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2 ">
                                            <label for="validationCustom01">Select Course Intake</label>
                                            <select  name="intake" id="intake" class="form-control">
                                                <option value="">Select Course first</option>
                                            </select>

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2 ">
                                            <label for="validationCustom01">Select Course Intake</label>
                                            <select  name="intakeyear" id="intakeyear" class="form-control">
                                                <option value="">Select Year</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                                <option value="2030">2030</option>
                                                <option value="2031">2031</option>
                                                <option value="2032">2032</option>
                                                <option value="2033">2033</option>
                                                <option value="2034">2034</option>
                                            </select>

                                        </div>

                                       

                                    </div><br>
                                    <div class="form-row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button class="btn btn-primary" type="submit" onclick="return validateType()">Add Course</button>
                                            <a href="<?=base_url('mark-lead-complete/'.$this->uri->segment(2))?>" class="btn btn-outline-primary">Click here to mark lead as complete!</a>
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
                <div class="row">
                        <!-- ============================================================== -->
                        <!-- search bar  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <h2>Added Courses </h2>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end search bar  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- card influencer one -->
                            <!-- ============================================================== -->
                            <?php
                            if ($addedCources) {
                                foreach ($addedCources as $row) {
                            ?>
                                    <div class="card">



                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    
                                                    <div class="pl-xl-3">
                                                        <div class="m-b-0">
                                                            <div class="user-avatar-name d-inline-block">
                                                                <h2 class="font-24 m-b-10"><?= $row['country_name'] ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="user-avatar-address">
                                                            
                                                            <div class="mt-1">
                                                                <Strong>Contact Details</Strong><br>
                                                                <i class="fas fa-user"></i> <?= ($row['uniContactPerson'] == '') ? '--' : $row['uniContactPerson'] ?>&nbsp;&nbsp;&nbsp;
                                                                <i class="fas fa-mobile-alt"></i> <?= ($row['uniPersonContactNo'] == '') ? '--' : $row['uniPersonContactNo'] ?>&nbsp;&nbsp;&nbsp;
                                                                <i class="fas fa-envelope"></i> <?= ($row['uniPersonEmail'] == '') ? '--' : $row['uniPersonEmail'] ?><br>
                                                                <Strong>Website: 
                                                                    <?php
                                                                        if($row['uniWebsite']!=''){
                                                                    ?>
                                                                    <a href="<?=$row['uniWebsite']?>" target="_blank"><?=$row['uniWebsite']?></a>
                                                                    <?php
                                                                        }else{
                                                                            echo 'No available';
                                                                        }
                                                                    ?>
                                                                </Strong><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="float-xl-right float-none mt-xl-0 mt-4">
                                                    
                                             

                                                        <a href="<?= base_url('deletes-lead-course/' . $row['leadCourseID']).'/'.$this->uri->segment(2) ?>" onclick="return deleteLeadCourse()" class="btn-wishlist m-r-10"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                <?php

                                }
                            } else {
                               ?>
                                <center>
                                    <h2>No Record Found</h2>
                                </center>
                            <?php
                            }
                            ?>


                        </div>

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
    if ($this->session->flashdata('LeadAdded') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success('Lead Initialized! Please add respective Cources.');
        </script>
    <?php
    }
    ?>
    <?php
    if ($this->session->flashdata('Leadupdated') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success('Lead Updated! Please add respective Cources.');
        </script>
    <?php
    }
    ?>
    <?php
    if ($this->session->flashdata('coursedeleted') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error('Lead Course Deleted!');
        </script>
    <?php
    }
    ?>
    <?php
    if ($this->session->flashdata('courseAdded') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success('New Course is added to lead!');
        </script>
    <?php
    }
    ?>
     <script>
          function deleteLeadCourse(){
            if(confirm('Are you sure you want to Delete?')){
                return true;
            }else{
                return false;
            }
        }
        function getInstitution() {
            var countryID = $('#repcountryID').val();
            $.ajax({
                url: "<?= base_url('get-university-against-country') ?>",
                data: {
                    country_id: countryID,
                },
                type: 'post',
                success: function(output) {
                    $('#institutions').html(output);
                }
            });
        }
        function getCources(){
            var instituteID=$('#institutions').val();
            $.ajax({
                url: "<?= base_url('get-cource-against-institute') ?>",
                data: {
                    institute: instituteID,
                },
                type: 'post',
                success: function(output) {
                    $('#cources').html(output);
                }
            });
        }
        function GetIntake(){
            var courseID=$('#cources').val();
            $.ajax({
                url: "<?= base_url('get-intake-against-course') ?>",
                data: {
                    courseid: courseID,
                },
                type: 'post',
                success: function(output) {
                    $('#intake').html(output);
                }
            });
        }
    </script>
</body>

</html>