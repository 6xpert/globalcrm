<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>/images/favicon.png">
    <title>Add Agent Access</title>
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
                            <h2 class="pageheader-title">Add Agent Access</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manage Agent</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Add Agent</li>
                                        <li class="breadcrumb-item active" aria-current="page">Add Agent Access</li>
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
                            <h5 class="card-header">Agent Name: <?= $agent[0]['agentName'] ?></h5>
                            <div class="card-body">
                                <form method="post" enctype='multipart/form-data' action="<?= base_url('add-new-own-agent-data') ?>">
                                    <div class="row">



                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-4">
                                            <h3>Unvercity Access</h3>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <select name="repcountryID" id="repcountryID" class="form-control" onchange="return getInstitution()">
                                                <option value="">Select Representing Country</option>
                                                <?php
                                                foreach ($repCountry as $row) {
                                                ?>
                                                    <option value="<?= $row['country_id'] ?>"><?= $row['country_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-2">
                                            <select required name="institutions" id="institutions" class="form-control">
                                                <option value="">Please Select Country first</option>

                                            </select>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <button type="button" onclick="return addInstituteAccess(<?= $this->uri->segment(2) ?>)" class="btn btn-outline-primary">Add Institute </button>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                            <h3>Given Access Institutes</h3>
                                            <table width="60%" id="accessCountyrarea">
                                                <?php
                                                if ($aggentAccess) {
                                                    $sr = 1;
                                                    foreach ($aggentAccess as $row) {
                                                ?>
                                                        <tr>
                                                            <th><?= $sr . '. ' ?> </th>
                                                            <th><?= $row['country_name'] ?> </th>
                                                            <th><?= $row['uni_name'] ?> </th>
                                                            <th><a href="javascript:deletagentaccess(<?= $row['accessID'] ?>)"><i class="fas fa-trash-alt"></i> </a> </th>
                                                        </tr>
                                                    <?php
                                                        $sr++;
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td colspan="4">
                                                            <center style="color:red;">No Access Given!</center>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </table>
                                        </div>



                                    </div><br>
                                    <div class="form-row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <a href="<?= base_url('add-your-agent') ?>" class="btn btn-primary" type="submit"> <i class="fas fa-arrow-left"></i>  Add New Agent</a>
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
    <script src="<?= base_url() ?>assets/toastr/toastr.min.js"></script>
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

        function addInstituteAccess(agentid) {
            var countryID = $('#repcountryID').val();
            var uniID = $('#institutions').val();
            if (uniID == '') {
                toastr.options = {
                    "closeButton": true,
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr.error('Please Select Institute!');
                return false;
            } else {
                $.ajax({
                    url: "<?= base_url('add-uni-access-to-agent') ?>",
                    data: {
                        country_id: countryID,
                        uniID: uniID,
                        agentID: agentid,
                    },
                    type: 'post',
                    success: function(output) {
                        // alert(output);
                        if (output == 'alreadyaddedUni') {
                            toastr.options = {
                                "closeButton": true,
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                            toastr.error('Institute Access Already Given!');
                        } else {
                            $('#accessCountyrarea').html('');
                            $('#accessCountyrarea').html(output);
                            toastr.options = {
                                "closeButton": true,
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                            toastr.success('Institute Access Added!');
                        }
                    }
                });
            }
        }
        function deletagentaccess(asseccID){
            if(confirm("Are you sure you want to delete access?")){
            $.ajax({
                    url: "<?= base_url('delete-uni-access-to-agent') ?>",
                    data: {
                        accessID: asseccID,
                     
                    },
                    type: 'post',
                    success: function(output) {
                        // alert(output);
                        if (output == 'alreadyaddedUni') {
                            toastr.options = {
                                "closeButton": true,
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                            toastr.error('Institute Access Already Given!');
                        } else {
                            $('#accessCountyrarea').html('');
                            $('#accessCountyrarea').html(output);
                            toastr.options = {
                                "closeButton": true,
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                            toastr.error('Institute Access Denied!');
                        }
                    }
                });
            }else{
                return false;
            }
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