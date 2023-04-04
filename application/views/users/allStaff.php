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
    <title>Staff Members</title>
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
                                <h3 class="mb-2">Staff Members</h3>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Manage Staff Members</li>
                                            <li class="breadcrumb-item active" aria-current="page">View All Staff Members</li>
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
                        
                        <!-- ============================================================== -->
                        <!-- end search bar  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- card influencer one -->
                            <!-- ============================================================== -->
                            <?php
                            if ($staff) {
                                foreach ($staff as $row) {
                            ?>
                                    <div class="card">



                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    
                                                    <div class="pl-xl-3">
                                                        <div class="m-b-0">
                                                            <div class="user-avatar-name d-inline-block">
                                                                <h2 class="font-24 m-b-10"><?= $row['userName'] ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="user-avatar-address">
                                                            <!-- <p class="mb-2"><i class="fas fa-map-marker-alt mr-2  text-primary"></i><?= $row['branchAddress'] ?><span class="m-l-10">| <?= $row['branchCity']  ?></span>
                                                            </p> -->
                                                            <div class="mt-1">
                                                                <Strong>Contact Details</Strong><br>
                                                                <i class="fas fa-mobile-alt"></i> <?= ($row['userPhone'] == '') ? '--' : $row['userPhone'] ?>&nbsp;&nbsp;&nbsp;
                                                                <i class="fas fa-envelope"></i> <?= ($row['userEmail'] == '') ? '--' : $row['userEmail'] ?><br>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="float-xl-right float-none mt-xl-0 mt-4">
                                                        <div class="switch-button switch-button-success m-r-10" id="updatedStatus_<?= $row['userID'] ?>">
                                                            <input type="checkbox" <?= ($row['userStatus'] == 1) ? 'checked=""' : '' ?> name="switch<?= $row['userID'] ?>" onclick="return updateStatusofbranch(<?= $row['userID'] ?>,<?= $row['userStatus'] ?>)" id="switch<?= $row['userID'] ?>"><span>
                                                                <label for="switch<?= $row['userID'] ?>"></label></span>
                                                        </div>
                                             

                                                        <a href="<?= base_url('edit-staff-member/' . $row['userID']) ?>" class="btn-wishlist m-r-10"><i class="fas fa-edit"></i></a>
                                                        <a href="<?= base_url('deletes-staff-member/' . $row['userID']) ?>" onclick="return varifyDelete()" class="btn-wishlist m-r-10"><i class="fas fa-trash"></i></a>
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
   
    <?php
    if ($this->session->flashdata('staffDeleted') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error('Staff Members Deleted!');
        </script>
    <?php
    }
    ?>
    <?php
    if ($this->session->flashdata('staffupdated') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success('Staff Member Updated!');
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
                url: "<?= base_url('update-staff-member-status-data') ?>",
                data: {
                    staffID: id,
                    curent_status: status,
                },
                type: 'post',
                success: function(output) {
                    // alert(output);
                    const myArray = output.split("///");
                    if (myArray[0] == 'deactiveted') {
                        //alert
                        toastr.options = {
                            "closeButton": true,
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr.error('Staff Member Deactivated!');
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
                        toastr.success('Staff Member activated!');
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