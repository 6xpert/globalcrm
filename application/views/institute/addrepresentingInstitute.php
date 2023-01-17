<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>/images/favicon.png">
    <title>Add Representing Institutes</title>
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
                            <h2 class="pageheader-title">Add Representing Institutes</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manage Institutes</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Add Representing Institutes</li>
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
                            <h5 class="card-header">New Representing Institutes Form</h5>
                            <div class="card-body">
                                <form method="post" enctype='multipart/form-data' action="<?=base_url('add-representing-institution-data')?>">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                            <label >Representing Countries<span style="color: red;">*</span></label>
                                            <select name="repcountryID" id="repcountryID" required class="form-control">
                                                <option value="">Please Select Country</option>
                                                <?php
                                                foreach ($repCountries as $row) {
                                                ?>
                                                    <option value="<?=$row['country_id']?>"><?=$row['country_name']?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                            <label for="validationCustom01">Institute Name<span style="color: red;">*</span></label>
                                            <input type="text" Required class="form-control" id="instituteName" name="instituteName"   >
                                            
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2 ">
                                            <label for="validationCustom01">Institute Type</label>
                                            <select name="inType" id="inType" class="form-control" onchange="showMasterAgent()">
                                                <option value="1">Direct</option>
                                                <option value="2">Indirect</option>
                                            </select>
                                            
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Campus</label>
                                            <input type="text"  class="form-control" id="campus" name="campus"   >
                                            
                                        </div>
                                       
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2" id="masteragentRow" style="display: none;">
                                            <label for="validationCustom02">Select Master Agent <span style="color: red;">*</span></label>
                                            <select name="masterAgent" id="masterAgent" class="form-control">
                                                <option value="0">Select Master Agent</option>
                                                <?php
                                                if($masterAgent){
                                                    foreach($masterAgent as $row){
                                                ?>
                                                <option value="<?=$row['masterAgentID']?>"><?=$row['masterAgentName']?></option>
                                                <?php
                                                    }
                                                }else{
                                                    ?>
                                                <option value="00">No Master Agents Fount Please add!</option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Website</label>
                                            <input type="text"  class="form-control" id="website" name="website"   >
                                            
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Monthly Living Cost</label>
                                            <input type="text"  class="form-control" id="monthlyCost" name="monthlyCost"   >
                                            
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Funds Requirement for Visa</label>
                                            <input type="text"  class="form-control" id="fundsForVisa" name="fundsForVisa"   >
                                            
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Application Fee</label>
                                            <input type="text"  class="form-control" id="appFee" name="appFee"   >
                                            
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Currency</label>
                                            <input type="text"  class="form-control" id="Currency" name="Currency"   >
                                            
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Contract Terms</label>
                                            <input type="text"  class="form-control" id="contractTerms" name="contractTerms"   >
                                            
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Quality Of Application Desired</label>
                                            <select name="appQuality" id="appQuality" class="form-control">
                                                <option value="0">Select type of students</option>
                                                <option value="1">Excelent</option>
                                                <option value="2">Good</option>
                                                <option value="3">Average</option>
                                                <option value="4">Below Average</option>
                                            </select>
                                            
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Upload Contract Copy</label>
                                            <input type="file"  class="form-control" id="contractCopy" name="contractCopy"   >
                                            
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Contract Expiry Date</label>
                                            <input type="date"  class="form-control" id="contractExpiryDate" name="contractExpiryDate"   >
                                            
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">Is Language Mandatory?(Eg: IELTS or TOEFL) &nbsp;&nbsp; 
                                                
                                            </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="ielts" id="ielts" value="1"  class="custom-control-input"><span class="custom-control-label">Yes</span>
                                            </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="ielts" id="ielts"  value="2" class="custom-control-input"><span class="custom-control-label">No</span>
                                            </label>
                                        </div>

                                         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">Language Requiremnts</label>
                                            <textarea name="LanguageReq" id="LanguageReq" class="form-control" cols="30" rows="5"></textarea>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">Institutional Benefits</label>
                                            <textarea name="insBenefits" id="insBenefits" class="form-control" cols="30" rows="5"></textarea>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">Part Time Work Details(Mention hours permitted with estimated wages)</label>
                                            <textarea name="partTimeWork" id="partTimeWork" class="form-control" cols="30" rows="5"></textarea>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">Scholarships Policy</label>
                                            <textarea name="scholarshipPolicy" id="scholarshipPolicy" class="form-control" cols="30" rows="5"></textarea>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">Institution Status Notes Important for Counsellor/Processing office to understand next step</label>
                                            <textarea name="insStatusNotes" id="insStatusNotes" class="form-control" cols="30" rows="5"></textarea>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Institution Logo</label>
                                            <input type="file"  class="form-control" id="insLogo" name="insLogo"   >
                                            
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Institution Prospectus</label>
                                            <input type="file"  class="form-control" id="insProspectus" name="insProspectus"   >
                                            
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-4">
                                                <h3>Contact Details</h3>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Informational Contact person <span style="color: red;">*</span></label>
                                            <input type="text" required class="form-control" id="contactPersonName" name="contactPersonName"   >
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Email <span style="color: red;">*</span></label>
                                            <input type="email" required class="form-control" id="contactPersonEmail" name="contactPersonEmail"   >
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Contact Number <span style="color: red;">*</span></label>
                                            <input type="number" required class="form-control" id="contactPersonPhone" name="contactPersonPhone"   >
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Designation <span style="color: red;">*</span></label>
                                            <input type="email" required class="form-control" id="contactPersonDesignation" name="contactPersonDesignation"   >
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom02">Optional Contact Information</label>
                                            <textarea name="OptionalContactInfo" id="OptionalContactInfo" class="form-control" cols="30" rows="5"></textarea>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-4">
                                                <h3>Invoice Alarm Settings</h3>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Status</label>
                                            <select name="alarmStatus" id="alarmStatus" class="form-control">
                                                <option value="0">Select Status</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Alarm After No. of Days</label>
                                            <input type="number"  class="form-control" id="AlarmNoOfDays" name="AlarmNoOfDays"   >
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Commission Policy & Agreement</label>
                                            <input type="text"  class="form-control" id="commissionAgrement" name="commissionAgrement"   >
                                        </div>
                                    </div><br>
                                    <div class="form-row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button class="btn btn-primary" type="submit" onclick="return validateType()">Add Institution</button>
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
        function showMasterAgent(){
            var type=$('#inType').val();
            if(type==2){
                
                $('#masteragentRow').fadeIn();
                // $('#masteragentRow').css('display','block');
            }else{
                $('#masteragentRow').fadeOut();
            }
        }
        function validateType(){
            var type=$('#inType').val();
            if(type==2){
                var masterAgentID=$('#masterAgent').val();
                if(masterAgentID==0){
                    alert('Master Agent Not Selected!');
                    return false;
                }else{
                    return true;
                }
            }
        }
    </script>
     <script src="<?=base_url()?>assets/toastr/toastr.min.js"></script>
        <?php
    if ($this->session->flashdata('ErrorUploadContractCOpy') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error('Error uploading Contract Copy,Please Try again!');
        </script>
        <?php
    }
    ?>
        <?php
    if ($this->session->flashdata('ErrorUploadUniLogo') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error('Error uploading Institute Logo,Please Try again!');
        </script>
        <?php
    }
    ?>
        <?php
    if ($this->session->flashdata('ErrorUploadUniProspectus') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error('Error uploading Institute Prospectus,Please Try again!');
        </script>
        <?php
    }
    ?>
        <?php
    if ($this->session->flashdata('uniAdded') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success('New Representing Institution Added!');
        </script>
        <?php
    }
    ?>
</body>

</html>