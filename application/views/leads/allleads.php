<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>/images/favicon.png">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?= base_url('assets/') ?>vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>libs/css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/fonts/fontawesome/css/fontawesome-all.css">
    <title>All Leads</title>
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
            <div class="influence-finder">
                <div class="container-fluid dashboard-content">
                    <!-- ============================================================== -->
                    <!-- pageheader -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h3 class="mb-2">All Leads</h3>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Manage Leads</li>
                                            <li class="breadcrumb-item active" aria-current="page">View All Leads</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- content -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- search bar  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="get">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                                                <label>Search By Lead Source</label>
                                                <select name="leadSource" id="leadSource" class="form-control">
                                                    <option value="">Please Select Lead Source</option>
                                                    <?php
                                                    foreach ($leadSource as $row) {
                                                    ?>
                                                        <option <?php
                                                                if (isset($_GET['leadSearch'])) {
                                                                    if ($_GET['leadSource'] == $row['sourceID']) {
                                                                        echo 'selected=""';
                                                                    }
                                                                }
                                                                ?> value="<?= $row['sourceID'] ?>"><?= $row['source'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                                                <label>Search By Lead Status</label>
                                                <select name="leadStatusSearch" id="leadStatusSearch" class="form-control">
                                                    <option 
                                                    <?php
                                                                if (isset($_GET['leadSearch'])) {
                                                                    if ($_GET['leadStatusSearch'] == 0) {
                                                                        echo 'selected=""';
                                                                    }
                                                                }
                                                                ?>
                                                    value="0">All</option>
                                                    <option 
                                                    <?php
                                                                if (isset($_GET['leadSearch'])) {
                                                                    if ($_GET['leadStatusSearch'] == 2) {
                                                                        echo 'selected=""';
                                                                    }
                                                                }
                                                                ?>
                                                    value="2">New</option>
                                                    <option 
                                                    <?php
                                                                if (isset($_GET['leadSearch'])) {
                                                                    if ($_GET['leadStatusSearch'] == 3) {
                                                                        echo 'selected=""';
                                                                    }
                                                                }
                                                                ?>
                                                    value="3">In Progress</option>
                                                    <option 
                                                    <?php
                                                                if (isset($_GET['leadSearch'])) {
                                                                    if ($_GET['leadStatusSearch'] == 4) {
                                                                        echo 'selected=""';
                                                                    }
                                                                }
                                                                ?>
                                                    value="4">Not Responding</option>
                                                    <option 
                                                    <?php
                                                                if (isset($_GET['leadSearch'])) {
                                                                    if ($_GET['leadStatusSearch'] == 5) {
                                                                        echo 'selected=""';
                                                                    }
                                                                }
                                                                ?>
                                                    value="5">Future Lead</option>
                                                    <option 
                                                    <?php
                                                                if (isset($_GET['leadSearch'])) {
                                                                    if ($_GET['leadStatusSearch'] == 1) {
                                                                        echo 'selected=""';
                                                                    }
                                                                }
                                                                ?>
                                                    value="1">Application Generated</option>
                                                  
                                                </select>
                                            </div>

                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01">Student Name keyword</label>
                                                <input type="text" value="<?php
                                                                            if (isset($_GET['stdName'])) {
                                                                                echo $_GET['stdName'];
                                                                            }
                                                                            ?>" class="form-control" id="stdName" name="stdName">

                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 pt-4 ">
                                                <input type="submit" value="Search" name="leadSearch" onclick="return validateSeach()" id="leadSearch" class="btn btn-primary"> &nbsp;
                                                <?php
                                                if (isset($_GET['leadSearch'])) {
                                                ?>
                                                    <a href="<?= base_url('view-leads') ?>">Clear Search</a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end search bar  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- card influencer one -->
                            <!-- ============================================================== -->
                            <?php
                            if ($leads) {
                                foreach ($leads as $row) {
                            ?>
                                    <div class="card">



                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12">

                                                    <div class="pl-xl-3">
                                                        <div class="m-b-0">
                                                            <div class="user-avatar-name d-inline-block">
                                                                <h2 class="font-24 m-b-10"><?= $row['stdName'] ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="user-avatar-address">
                                                            <!-- <p class="mb-2"><i class="fas fa-map-marker-alt mr-2  text-primary"></i><?= $row['branchAddress'] ?><span class="m-l-10">| <?= $row['branchCity']  ?></span>
                                                            </p> -->
                                                            <div class="mt-1">
                                                                <Strong>Contact Details</Strong><br>
                                                                <i class="fas fa-mobile-alt"></i> <a href=" https://wa.me/<?= $row['stdPhone'] ?>" target="__blank"><?= ($row['stdPhone'] == '') ? '--' : $row['stdPhone'] ?></a>&nbsp;&nbsp;&nbsp;
                                                                <i class="fas fa-envelope"></i> <?= ($row['stdEmail'] == '') ? '--' : $row['stdEmail'] ?>&nbsp;&nbsp;&nbsp;
                                                                <i class=" far fa-calendar-alt"></i> DOB: <?= ($row['stdDOB'] == '') ? '--' : $row['stdDOB'] ?><br>
                                                                <Strong>Lead Source: <?= $row['source'] ?>

                                                                </Strong><br>
                                                                <strong>Lead Status:
                                                                    <?php
                                                                    if ($row['leadStatus'] == 2) {
                                                                        echo 'New';
                                                                    } else if ($row['leadStatus'] == 3) {
                                                                        echo 'In Progress';
                                                                    } else if ($row['leadStatus'] == 4) {
                                                                        echo 'Not Responding';
                                                                    } else if ($row['leadStatus'] == 5) {
                                                                        echo 'Future Lead';
                                                                    } else {
                                                                        echo "<span style='color:green'>Application Generated</span>";
                                                                    }

                                                                    ?>
                                                                </strong>
                                                                <hr>
                                                                <a href="<?= base_url('view-followups/' . $row['leadID']) ?>"><i class="fas fa-hands-helping"></i> &nbsp;&nbsp;Manage Followup</a> &nbsp;&nbsp;| &nbsp;&nbsp;
                                                                <a href="#exampleModal_<?= $row['leadID'] ?>" data-toggle="modal"><i class="fas fa-clipboard-list"></i> &nbsp;&nbsp;Add Task</a>&nbsp;&nbsp;| &nbsp;&nbsp;
                                                               <?php
                                                               if($row['leadStatus']!=1){
                                                               ?>
                                                                <div class="dropdown float-right">
                                                                    <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                                                       Update Status <i class="mdi mdi-dots-vertical"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(14px, 19px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                        <!-- item-->
                                                                        <a href="<?=base_url('update-lead-status/'.$row['leadID'].'/'.'2')?>" onclick="return updateStatusVerification()" <?=($row['leadStatus']==2)?'style="pointer-events: none; color: grey"':''?> class="dropdown-item">New</a>
                                                                        <!-- item-->
                                                                        <a href="<?=base_url('update-lead-status/'.$row['leadID'].'/'.'3')?>" onclick="return updateStatusVerification()" <?=($row['leadStatus']==3)?'style="pointer-events: none; color: grey"':''?> class="dropdown-item">In Progress</a>
                                                                        <!-- item-->
                                                                        <a href="<?=base_url('update-lead-status/'.$row['leadID'].'/'.'4')?>" onclick="return updateStatusVerification()" <?=($row['leadStatus']==4)?'style="pointer-events: none; color: grey"':''?> class="dropdown-item">Not Responding</a>
                                                                        <!-- item-->
                                                                        <a href="<?=base_url('update-lead-status/'.$row['leadID'].'/'.'5')?>" onclick="return updateStatusVerification()" <?=($row['leadStatus']==5)?'style="pointer-events: none; color: grey"':''?> class="dropdown-item">Future Lead</a>
                                                                        <a href="<?=base_url('update-lead-status/'.$row['leadID'].'/'.'1')?>" onclick="return updateStatusVerification()"<?=($row['leadStatus']==1)?'style="pointer-events: none; color: grey"':''?> class="dropdown-item">Application Generated</a>
                                                                    </div>
                                                                </div>
                                                               <?php
                                                               }
                                                               ?>
                                                                <div class="modal fade" id="exampleModal_<?= $row['leadID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Student Name: <?= $row['stdName'] ?></h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post" action="<?= base_url('add-new-lead-task/' . $row['leadID']) ?>">
                                                                                    <div class="form-group">
                                                                                        <label for="recipient-name" class="col-form-label">Assign To</label>
                                                                                        <select name="assignTo" id="assignTo" required class="form-control">

                                                                                            <?php
                                                                                            if ($staff) {
                                                                                                echo '<option value="">Select staff member</option>';
                                                                                                foreach ($staff as $staffrow) {
                                                                                            ?>
                                                                                                    <option value="<?= $staffrow['userID'] ?>"><?= $staffrow['userName'] ?></option>
                                                                                                <?php
                                                                                                }
                                                                                            } else {
                                                                                                ?>
                                                                                                <option value="">Please add Staff</option>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="message-text" class="col-form-label">Due Date</label>
                                                                                        <input type="date" required class="form-control" id="dueDate" name="dueDate">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="message-text" class="col-form-label">Task</label>
                                                                                        <textarea class="form-control" required id="task" name="task"></textarea>
                                                                                    </div>

                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="float-xl-right float-none mt-xl-0 mt-4">
                                                        <!-- <div class="switch-button switch-button-success m-r-10" id="updatedStatus_<?= $row['branchID'] ?>">
                                                            <input type="checkbox" <?= ($row['branchStatus'] == 1) ? 'checked=""' : '' ?> name="switch<?= $row['branchID'] ?>" onclick="return updateStatusofbranch(<?= $row['branchID'] ?>,<?= $row['branchStatus'] ?>)" id="switch<?= $row['branchID'] ?>"><span>
                                                                <label for="switch<?= $row['branchID'] ?>"></label></span>
                                                        </div> -->


                                                        <a href="<?= base_url('edit-lead/' . $row['leadID']) ?>" class="btn-wishlist m-r-10"><i class="fas fa-edit"></i></a>
                                                        <a href="<?= base_url('deletes-branch-office/' . $row['leadID']) ?>" onclick="return varifyDelete()" class="btn-wishlist m-r-10"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="border-top user-social-box">
                                        <div class="user-social-media d-xl-inline-block "><span class="mr-2 twitter-color"> <i class="fab fa-twitter-square"></i></span><span>13,291</span></div>
                                        <div class="user-social-media d-xl-inline-block"><span class="mr-2  pinterest-color"> <i class="fab fa-pinterest-square"></i></span><span>84,019</span></div>
                                        <div class="user-social-media d-xl-inline-block"><span class="mr-2 instagram-color"> <i class="fab fa-instagram"></i></span><span>12,300</span></div>
                                        <div class="user-social-media d-xl-inline-block"><span class="mr-2  facebook-color"> <i class="fab fa-facebook-square "></i></span><span>92,920</span></div>
                                        <div class="user-social-media d-xl-inline-block"><span class="mr-2 medium-color"> <i class="fab fa-medium"></i></span><span>291</span></div>
                                        <div class="user-social-media d-xl-inline-block"><span class="mr-2 youtube-color"> <i class="fab fa-youtube"></i></span><span>1291</span></div>
                                    </div> -->
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
                    <!-- ============================================================== -->
                    <!-- footer -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- end footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- end wrapper  -->
            <!-- ============================================================== -->
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="<?= base_url('assets/') ?>vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="<?= base_url('assets/') ?>libs/js/main-js.js"></script>
    <script src="<?= base_url() ?>assets/toastr/toastr.min.js"></script>
    <script>
        function updateStatusVerification(){
            if(confirm('Are you sure you want to update lead Status?')){
                return true;
            }else{
                return false;
            }
        }
        function validateSeach() {
            var leadSource = $('#leadSource').val();
            var stdname = $('#stdName').val();
            var LeadStatus = $('#leadStatusSearch').val();
            if (leadSource == '' && stdname == '' && LeadStatus=='') {
                toastr.options = {
                    "closeButton": true,
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr.error('Lead Source or Enter Student Name Required!');
                return false;
            }
        }
    </script>
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
    </script>
    <?php
    if ($this->session->flashdata('taskadded') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success('Task Added!');
        </script>
    <?php
    }
    ?>
    <?php
    if ($this->session->flashdata('BranchDeleted') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error('Branch Office Deleted!');
        </script>
    <?php
    }
    ?>
    <?php
    if ($this->session->flashdata('LeadStatusupdated') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success('Lead Status Updated!');
        </script>
    <?php
    }
    ?>
    <?php
    if ($this->session->flashdata('edited') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success('Course Updated!');
        </script>
    <?php
    }
    ?>
    <script>
        function varifyDelete() {
            if (confirm('Are you sure you want to delete? Your records may disturbed!')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    <script>
        function updateStatusofbranch(id, status) {
            // alert(id);
            $.ajax({
                url: "<?= base_url('update-branch-office-status-data') ?>",
                data: {
                    branchID: id,
                    curent_status: status,
                },
                type: 'post',
                success: function(output) {
                    // alert(output)
                    const myArray = output.split("///");
                    if (myArray[0] == 'deactiveted') {
                        //alert
                        toastr.options = {
                            "closeButton": true,
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr.error('Branch Office Deactivated!');
                        //add html
                        $('#updatedStatus_' + id).html('');
                        $('#updatedStatus_' + id).html(myArray[1]);
                    } else {
                        //alert
                        toastr.options = {
                            "closeButton": true,
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr.success('Branch Office activated!');
                        //add html
                        $('#updatedStatus_' + id).html('');
                        $('#updatedStatus_' + id).html(myArray[1]);
                    }
                }
            });
        }
    </script>
</body>

</html>