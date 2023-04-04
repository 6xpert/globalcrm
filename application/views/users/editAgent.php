<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>/images/favicon.png">
    <title>Edit Agent</title>
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
                            <h2 class="pageheader-title">Edit Agent</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manage Agent</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Agent</li>
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
                            <h5 class="card-header">Personal Details</h5>
                            <div class="card-body">
                                <form method="post" enctype='multipart/form-data' action="<?= base_url('edit-agent-data/'.$this->uri->segment(2)) ?>">
                                    <div class="row">

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mt-2">
                                            <label for="validationCustom01">Agent Name<span style="color: red;">*</span></label>
                                            <input type="text" Required class="form-control" value="<?=$agent[0]['agentName']?>" id="agentName" name="agentName">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2 ">
                                            <label for="validationCustom01">Agent Phone<span style="color: red;">*</span></label>
                                            <input type="number" Required class="form-control" value="<?=$agent[0]['agentPhone']?>" id="agentPhone" name="agentPhone">

                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2 ">
                                            <label for="validationCustom01">Agent Email<span style="color: red;">*</span></label>
                                            <input type="email" Required class="form-control" value="<?=$agent[0]['agentEmail']?>" id="agentEmail" name="agentEmail">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2 ">
                                            <label for="validationCustom01">Agent Position<span style="color: red;">*</span></label>
                                            <input type="text" Required class="form-control" value="<?=$agent[0]['agentPosition']?>" id="agentPosition" name="agentPosition">

                                        </div>




                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-4">
                                            <h3>Company Details</h3>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Company Name<span style="color: red;">*</span></label>
                                            <input type="text" Required class="form-control" value="<?=$agent[0]['companyName']?>" id="cName" name="cName">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Bussiness Address<span style="color: red;">*</span></label>
                                            <input type="text" Required class="form-control" value="<?=$agent[0]['companyAddress']?>" id="cAddress" name="cAddress">

                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Country<span style="color: red;">*</span></label>
                                            <select name="cCountry" id="cCountry" class="form-control" required>
                                                <option value="">Select Country</option>
                                                <?php
                                                foreach ($countries as $row) {
                                                ?>
                                                    <option 
                                                    <?php
                                                        if($agent[0]['companyCountry']==$row['country_id']){
                                                            echo 'selected';
                                                        }
                                                    ?>
                                                    value="<?= $row['country_id'] ?>"><?= $row['country_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Company Registeration Number<span style="color: red;">*</span></label>
                                            <input type="number" Required class="form-control" value="<?=$agent[0]['companyNumber']?>" id="cRegNumber" name="cRegNumber">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Company Phone<span style="color: red;">*</span></label>
                                            <input type="number" Required class="form-control" value="<?=$agent[0]['companyPhone']?>" id="cPhone" name="cPhone">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Company Mobile Number<span style="color: red;">*</span></label>
                                            <input type="number" Required class="form-control" value="<?=$agent[0]['companyMobile']?>" id="cMobile" name="cMobile">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Company Registeration Date<span style="color: red;">*</span></label>
                                            <input type="date" Required class="form-control" value="<?=$agent[0]['companyRegDate']?>" id="cRegDate" name="cRegDate">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Company Email<span style="color: red;">*</span></label>
                                            <input type="email" Required class="form-control" value="<?=$agent[0]['companyEmail']?>" id="cEmail" name="cEmail">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Company Website</label>
                                            <input type="text" class="form-control" id="cWebsite" value="<?=$agent[0]['comapnyWebsite']?>" name="cWebsite">

                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <p>Do you have contractual relationships with other UK universities ?</p>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="relation" id="relation" onclick="relationcheck()"  <?=($agent[0]['contractInUK']==1)?'checked':''?> value="1" class="custom-control-input"><span class="custom-control-label">Yes</span>
                                            </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="relation" id="relation" onclick="relationcheck()" <?=($agent[0]['contractInUK']==0)?'checked':''?> value="0" class="custom-control-input"><span class="custom-control-label">No</span>
                                            </label>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2" id="relationwhydiv" style="display:none;">
                                            <label>If yes, please provide a list below with length of relationship and continue on aseparatesheetif necessary.</label>
                                            <textarea name="relationWhy" id="relationWhy" cols="30" class="form-control" rows="5"><?=$agent[0]['lengthOfRelationship']?></textarea>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <p>Please confirm your organization has a full understanding of UKVI to ensure prospective students are advised appropriately?</p>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="UKVI" id="UKVI" value="1" class="custom-control-input" <?=($agent[0]['understandingOfUKVI']==1)?'checked':''?>><span class="custom-control-label">Yes</span>
                                            </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="UKVI" id="UKVI" value="0" class="custom-control-input" <?=($agent[0]['understandingOfUKVI']==0)?'checked':''?>><span class="custom-control-label">No</span>
                                            </label>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <p>How many students you have placed in universities last year?</p>
                                            <input type="number" name="noOfStd" value="<?=$agent[0]['lastYearStudents']?>" id="noOfStd" class="form-control">
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2"></div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <p>Do you have any recommendations/accreditations from government or Education Ministry?</p>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="recomendation" id="recomendation" onclick="recomendationcheck()" <?=($agent[0]['govRecomendation']==1)?'checked':''?> value="1" class="custom-control-input"><span class="custom-control-label">Yes</span>
                                            </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="recomendation" id="recomendation" onclick="recomendationcheck()" <?=($agent[0]['govRecomendation']==0)?'checked':''?> value="0" class="custom-control-input"><span class="custom-control-label">No</span>
                                            </label>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2" id="recomendationDetailsDiv" style="display:none;">
                                            <label>If yes, please provide details:</label>
                                            <textarea name="recomendationDetails" id="recomendationDetails" cols="30" class="form-control" rows="5"><?=$agent[0]['recomentationDetail']?></textarea>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label>Why do you wish to work with Global Group of Education?</label>
                                            <textarea name="wish" id="wish" cols="30" class="form-control" rows="5"><?=$agent[0]['whyGGOE']?></textarea>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <label>How do you plan to market ?</label>
                                            <textarea name="marketing" id="marketing" cols="30" class="form-control" rows="5"><?=$agent[0]['marketPlan']?></textarea>
                                        </div>


                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-4">
                                            <h3>Reference # 1</h3>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Person Name</label>
                                            <input type="text" class="form-control" id="ref1name" value="<?=$agent[0]['ref1Name']?>" name="ref1name">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Position/Organization</label>
                                            <input type="text" class="form-control" id="ref1position" value="<?=$agent[0]['ref1Position']?>" name="ref1position">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Person Email</label>
                                            <input type="email" class="form-control" id="ref1email" value="<?=$agent[0]['ref1Email']?>" name="ref1email">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Person Phone</label>
                                            <input type="number" class="form-control" id="ref1phone" value="<?=$agent[0]['ref1Phone']?>" name="ref1phone">

                                        </div>


                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-4">
                                            <h3>Reference # 2</h3>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Person Name</label>
                                            <input type="text" class="form-control" id="ref2name" value="<?=$agent[0]['ref2Name']?>" name="ref2name">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Position/Organization</label>
                                            <input type="text" class="form-control" id="ref2position" value="<?=$agent[0]['ref2Position']?>" name="ref2position">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Person Email</label>
                                            <input type="email" class="form-control" id="ref2email" value="<?=$agent[0]['ref2Email']?>" name="ref2email">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Person Phone</label>
                                            <input type="number" class="form-control" id="ref2phone" value="<?=$agent[0]['ref2Phone']?>" name="ref2phone">

                                        </div>


                                     

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-4">
                                            <h3>Login Details</h3>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">User Email<span style="color: red;">*</span></label>
                                            <input type="email" Required class="form-control" id="bemail"  name="bemail">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <label for="validationCustom01">Password<span style="color: red;">*</span></label>
                                            <input type="password" Required class="form-control" id="bpass" name="bpass">

                                        </div>


                                    </div><br>
                                    <div class="form-row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button class="btn btn-primary" type="submit">Update Agent</button>
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
        function addInstituteAccess(){
            var countryID = $('#repcountryID').val();
            var uniID = $('#institutions').val();
            $.ajax({
                url: "<?= base_url('add-uni-access-to-agent') ?>",
                data: {
                    country_id: countryID,
                    uniID:uniID,
                },
                type: 'post',
                success: function(output) {
                    $('#institutions').html(output);
                }
            });
        }
    </script>
    <script>
        function relationcheck() {
            var relation = $("input[name='relation']:checked").val();
            if (relation == 1) {
                $('#relationwhydiv').fadeIn();
            } else {
                $('#relationwhydiv').fadeOut();
            }
        }

        function recomendationcheck() {
            var recomendation = $("input[name='recomendation']:checked").val();
            if (recomendation == 1) {
                $('#recomendationDetailsDiv').fadeIn();

            } else {
                $('#recomendationDetailsDiv').fadeOut();

            }
        }
    </script>
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
    if ($this->session->flashdata('agentAdded') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success('New Agent Added!');
        </script>
    <?php
    }
    ?>
</body>

</html>