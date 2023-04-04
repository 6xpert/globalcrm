<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>/images/favicon.png">
    <title>Edit Course</title>
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
                            <h2 class="pageheader-title">Edit Course</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manage Courses</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Course</li>
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
                            <h5 class="card-header">Edit Course Form</h5>
                            <div class="card-body">
                                <form method="post" enctype='multipart/form-data' action="<?= base_url('edit-course-data/'.$this->uri->segment(2)) ?>">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                            <label>Representing Countries<span style="color: red;">*</span></label>
                                            <select name="repcountryID" id="repcountryID" required onchange="return getUniversities()" class="form-control">

                                                <option value="">Please Select Country</option>
                                                <?php
                                                foreach ($repCountries as $row) {
                                                ?>
                                                    <option <?php
                                                            if ($row['country_id'] == $uniDetail[0]['repCountryID']) {
                                                                echo 'selected';
                                                            }
                                                            ?> value="<?= $row['country_id'] ?>"><?= $row['country_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                            <label>Representing Univertisity<span style="color: red;">*</span></label>
                                            <select name="uniID" id="uniID" required class="form-control">
                                                <option value="">Select University</option>
                                                <?php
                                                foreach ($alluni as $row) {
                                                ?>
                                                    <option <?php
                                                            if ($row['uni_id'] == $uniDetail[0]['uni_id']) {
                                                                echo 'selected';
                                                            }
                                                            ?> value="<?= $row['uni_id'] ?>"><?= $row['uni_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mt-2">
                                            <label for="validationCustom01">Course Tittle<span style="color: red;">*</span></label>
                                            <input type="text" Required class="form-control" value="<?= $course[0]['CourseName'] ?>" id="courseTittle" name="courseTittle">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2 ">
                                            <label for="validationCustom01">Course Type</label>
                                            <select name="courseCat" id="courseCat" class="form-control">
                                                <option value="1">Select course Category</option>
                                                <?php
                                                if ($courseCat) {
                                                    foreach ($courseCat as $row) {
                                                ?>
                                                        <option <?php
                                                                if ($row['courseCatID'] == $course[0]['courseCatID']) {
                                                                    echo 'selected';
                                                                }
                                                                ?> value="<?= $row['courseCatID'] ?>"><?= $row['courseCat'] ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2 ">
                                            <label for="validationCustom01">Course Level</label>
                                            <select name="courseLevel" id="courseLevel" class="form-control">
                                                <option value="1">Select course Level</option>
                                                <?php
                                                if ($CourseLevel) {
                                                    foreach ($CourseLevel as $row) {
                                                ?>
                                                        <option <?php
                                                                if ($row['courseLevelID'] == $course[0]['courseLevelID']) {
                                                                    echo 'selected';
                                                                }
                                                                ?> value="<?= $row['courseLevelID'] ?>"><?= $row['courseLevel'] ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>

                                        </div>


                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Course Duration <span style="color: red;">*</span></label><br>
                                            <input type="number" required class="form-control " value="<?= $course[0]['durationYears'] ?>" placeholder="Years" style="width:32%; float:left" id="durationYear" name="durationYear">
                                            <input type="number" required class="form-control ml-1" value="<?= $course[0]['durationMonths'] ?>" placeholder="Months" style="width:33%; float:left;" id="durationMonth" name="durationMonth">
                                            <input type="number" required class="form-control ml-1" value="<?= $course[0]['durationWeeks'] ?>" placeholder="Weeks" style="width:33%; float:left;" id="durationWeek" name="durationWeek">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Awarding Body</label>
                                            <input type="text" class="form-control" value="<?= $course[0]['awardingBody'] ?>" id="awardingBody" name="awardingBody">

                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Course Fee <span style="color:red">*</span></label>
                                            <input type="number" required value="<?= $course[0]['courseFee'] ?>" class="form-control" id="courseFee" name="courseFee">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Application Fee</label>
                                            <input type="number" value="<?= $course[0]['courseApplicationFee'] ?>" class="form-control" id="appFee" name="appFee">

                                        </div>





                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">Is Language Mandatory?(Eg: IELTS or TOEFL) &nbsp;&nbsp;

                                            </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="ielts" id="ielts" <?php
                                                                                            if ($course[0]['courseIelts'] == 1) {
                                                                                                echo 'checked';
                                                                                            }
                                                                                            ?> value="1" class="custom-control-input"><span class="custom-control-label">Yes</span>
                                            </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" <?php
                                                                    if ($course[0]['courseIelts'] == 2) {
                                                                        echo 'checked';
                                                                    }
                                                                    ?> name="ielts" id="ielts" value="2" class="custom-control-input"><span class="custom-control-label">No</span>
                                            </label>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">Language Requiremnts</label>
                                            <textarea name="LanguageReq" id="LanguageReq" class="form-control" cols="30" rows="5"><?= $course[0]['courseLanguageReq'] ?></textarea>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">Course Benefits</label>
                                            <textarea name="courseBenefits" id="courseBenefits" class="form-control" cols="30" rows="5"><?= $course[0]['courseBenefits'] ?></textarea>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">Part Time Work Details(Mention hours permitted with estimated wages)</label>
                                            <textarea name="partTimeWork" id="partTimeWork" class="form-control" cols="30" rows="5"><?= $course[0]['coursePartTime'] ?></textarea>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">General Eligibility</label>
                                            <textarea name="eligibility" id="eligibility" class="form-control" cols="30" rows="5"><?= $course[0]['generalEligibility'] ?></textarea>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">Aditional Information of Course</label>
                                            <textarea name="aditionalInfo" id="aditionalInfo" class="form-control" cols="30" rows="5"><?= $course[0]['courseAdditionalInfo'] ?></textarea>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-4">
                                            <h3>Additional Information</h3>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Document 1 Description</label>
                                            <input type="text" value="<?= $course[0]['doc1Desc'] ?>" class="form-control" id="doc1desc" name="doc1desc">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Document 1</label>
                                            <input type="file" class="form-control" id="doc1" name="doc1">

                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Document 2 Description</label>
                                            <input type="text" value="<?= $course[0]['doc2Desc'] ?>" class="form-control" id="doc2desc" name="doc2desc">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Document 2</label>
                                            <input type="file" class="form-control" id="doc2" name="doc2">

                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Document 3 Description</label>
                                            <input type="text" value="<?= $course[0]['doc3Desc'] ?>" class="form-control" id="doc3desc" name="doc3desc">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Document 3</label>
                                            <input type="file" class="form-control" id="doc3" name="doc3">

                                        </div>





                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-4">
                                            <h3>Intake</h3>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" <?php
                                                                        if ($Intake) {
                                                                            foreach ($Intake as $row) {
                                                                                if ($row['courseIntakeMonth'] == 'January') {
                                                                                    echo 'checked';
                                                                                }
                                                                            }
                                                                        }
                                                                        ?> name="jan" id="jan" class="custom-control-input"><span class="custom-control-label">Jan</span>
                                            </label>
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" <?php
                                                                        if ($Intake) {
                                                                            foreach ($Intake as $row) {
                                                                                if ($row['courseIntakeMonth'] == 'February') {
                                                                                    echo 'checked';
                                                                                }
                                                                            }
                                                                        }
                                                                        ?> name="feb" id="feb" class="custom-control-input"><span class="custom-control-label">Feb</span>
                                            </label>
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" <?php
                                                                        if ($Intake) {
                                                                            foreach ($Intake as $row) {
                                                                                if ($row['courseIntakeMonth'] == 'March') {
                                                                                    echo 'checked';
                                                                                }
                                                                            }
                                                                        }
                                                                        ?> name="march" id="march" class="custom-control-input"><span class="custom-control-label">March</span>
                                            </label>
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" <?php
                                                                        if ($Intake) {
                                                                            foreach ($Intake as $row) {
                                                                                if ($row['courseIntakeMonth'] == 'April') {
                                                                                    echo 'checked';
                                                                                }
                                                                            }
                                                                        }
                                                                        ?> name="april" id="april" class="custom-control-input"><span class="custom-control-label">April</span>
                                            </label>
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" <?php
                                                                        if ($Intake) {
                                                                            foreach ($Intake as $row) {
                                                                                if ($row['courseIntakeMonth'] == 'May') {
                                                                                    echo 'checked';
                                                                                }
                                                                            }
                                                                        }
                                                                        ?> name="may" id="may" class="custom-control-input"><span class="custom-control-label">May</span>
                                            </label>
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" <?php
                                                                        if ($Intake) {
                                                                            foreach ($Intake as $row) {
                                                                                if ($row['courseIntakeMonth'] == 'June') {
                                                                                    echo 'checked';
                                                                                }
                                                                            }
                                                                        }
                                                                        ?> name="june" id="june" class="custom-control-input"><span class="custom-control-label">June</span>
                                            </label>
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" <?php
                                                                        if ($Intake) {
                                                                            foreach ($Intake as $row) {
                                                                                if ($row['courseIntakeMonth'] == 'July') {
                                                                                    echo 'checked';
                                                                                }
                                                                            }
                                                                        }
                                                                        ?> name="july" id="july" class="custom-control-input"><span class="custom-control-label">July</span>
                                            </label>
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" <?php
                                                                        if ($Intake) {
                                                                            foreach ($Intake as $row) {
                                                                                if ($row['courseIntakeMonth'] == 'Augest') {
                                                                                    echo 'checked';
                                                                                }
                                                                            }
                                                                        }
                                                                        ?> name="aug" id="aug" class="custom-control-input"><span class="custom-control-label">Aug</span>
                                            </label>
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" <?php
                                                                        if ($Intake) {
                                                                            foreach ($Intake as $row) {
                                                                                if ($row['courseIntakeMonth'] == 'September') {
                                                                                    echo 'checked';
                                                                                }
                                                                            }
                                                                        }
                                                                        ?> name="sep" id="sep" class="custom-control-input"><span class="custom-control-label">Sep</span>
                                            </label>
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" <?php
                                                                        if ($Intake) {
                                                                            foreach ($Intake as $row) {
                                                                                if ($row['courseIntakeMonth'] == 'Octuber') {
                                                                                    echo 'checked';
                                                                                }
                                                                            }
                                                                        }
                                                                        ?> name="oct" id="oct" class="custom-control-input"><span class="custom-control-label">Oct</span>
                                            </label>
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" <?php
                                                                        if ($Intake) {
                                                                            foreach ($Intake as $row) {
                                                                                if ($row['courseIntakeMonth'] == 'November') {
                                                                                    echo 'checked';
                                                                                }
                                                                            }
                                                                        }
                                                                        ?> name="nov" id="nov" class="custom-control-input"><span class="custom-control-label">Nov</span>
                                            </label>
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" <?php
                                                                        if ($Intake) {
                                                                            foreach ($Intake as $row) {
                                                                                if ($row['courseIntakeMonth'] == 'December') {
                                                                                    echo 'checked';
                                                                                }
                                                                            }
                                                                        }
                                                                        ?> name="dec" id="dec" class="custom-control-input"><span class="custom-control-label">Dec</span>
                                            </label>
                                        </div>

                                    </div><br>
                                    <div class="form-row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button class="btn btn-primary" type="submit" onclick="return validateType()">Update Course</button>
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
    <script>
        function getUniversities() {
            var countryID = $('#repcountryID').val();
            $.ajax({
                url: "<?= base_url('get-university-against-country') ?>",
                data: {
                    country_id: countryID,
                },
                type: 'post',
                success: function(output) {
                    $('#uniID').html(output);
                }
            });
        }
        // var countryID = $('#repcountryID').val();
        //     $.ajax({
        //         url: "<?= base_url('get-university-against-country') ?>",
        //         data: {
        //             country_id: countryID,
        //         },
        //         type: 'post',
        //         success: function(output) {
        //             $('#uniID').html(output);
        //         }
        //     });
    </script>
    <script>
        function showMasterAgent() {
            var type = $('#inType').val();
            if (type == 2) {

                $('#masteragentRow').fadeIn();
                // $('#masteragentRow').css('display','block');
            } else {
                $('#masteragentRow').fadeOut();
            }
        }

        function validateType() {
            var type = $('#inType').val();
            if (type == 2) {
                var masterAgentID = $('#masterAgent').val();
                if (masterAgentID == 0) {
                    alert('Master Agent Not Selected!');
                    return false;
                } else {
                    return true;
                }
            }
        }
    </script>
    <script src="<?= base_url() ?>assets/toastr/toastr.min.js"></script>
    <?php
    if ($this->session->flashdata('ErrorUploadDoc1') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error('Error uploading Document 1, Please Try again!');
        </script>
    <?php
    }
    ?>
    <?php
    if ($this->session->flashdata('ErrorUploadDoc2') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error('Error uploading Document 2, Please Try again!');
        </script>
    <?php
    }
    ?>
    <?php
    if ($this->session->flashdata('ErrorUploadDoc3') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error('Error uploading Document 3, Please Try again!');
        </script>
    <?php
    }
    ?>
    <?php
    if ($this->session->flashdata('uploaded') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success('New Course Added!');
        </script>
    <?php
    }
    ?>
</body>

</html>