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
    <title>Representing Institutions</title>
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
                                <h3 class="mb-2">Representing Institution</h3>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Manage Representing Institution</li>
                                            <li class="breadcrumb-item active" aria-current="page">View All Representing Institution</li>
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
                                                <label>Representing Countries</label>
                                                <select name="repcountryID" id="repcountryID" class="form-control">
                                                    <option value="">Please Select Country</option>
                                                    <?php
                                                    foreach ($repCountries as $row) {
                                                    ?>
                                                        <option <?php
                                                                if (isset($_GET['Institutesearch'])) {
                                                                    if ($_GET['repcountryID'] == $row['country_id']) {
                                                                        echo 'selected=""';
                                                                    }
                                                                }
                                                                ?> value="<?= $row['country_id'] ?>"><?= $row['country_name'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01">Institute Name keyword</label>
                                                <input type="text" value="<?php
                                                                            if (isset($_GET['instituteName'])) {
                                                                                echo $_GET['instituteName'];
                                                                            }
                                                                            ?>" class="form-control" id="instituteName" name="instituteName">

                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 pt-4 ">
                                                <input type="submit" value="Search" name="Institutesearch" id="Institutesearch" class="btn btn-primary"> &nbsp;
                                                <?php
                                                if (isset($_GET['Institutesearch'])) {
                                                ?>
                                                    <a href="<?= base_url('view-representing-institute') ?>">Clear Search</a>
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
                            if ($InstituteData) {
                                foreach ($InstituteData as $row) {
                            ?>
                                    <div class="card">



                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="user-avatar float-xl-left pr-4 float-none">
                                                        <img src="<?= base_url('assets/') ?><?= ($row['uniLogo'] == '') ? 'images/inititutionAvatar.png' : 'uniLogos/' . $row['uniLogo'] ?>" alt="User Avatar" class="rounded-circle user-avatar-xl">
                                                    </div>
                                                    <div class="pl-xl-3">
                                                        <div class="m-b-0">
                                                            <div class="user-avatar-name d-inline-block">
                                                                <h2 class="font-24 m-b-10"><?= $row['uni_name'] ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="user-avatar-address">
                                                            <p class="mb-2"><i class="fa fa-map-marker-alt mr-2  text-primary"></i><?= $row['country_name'] ?><span class="m-l-10">| <?= ($row['uniCampus'] == '') ? 'No Campus Found' : $row['uniCampus'] ?> | <a href="<?=base_url('view-courses?repcountryID='.$row['repCountryID'].'&institutions='.$row['uni_id'].'&instituteName=&courseSearch=Search')?>">View Courses</a></span>
                                                            </p>
                                                            
                                                            <div class="mt-1">
                                                                <Strong>Contact Details</Strong><br>
                                                                <i class="fas fa-user"></i> <?= ($row['uniContactPerson'] == '') ? '--' : $row['uniContactPerson'] ?>&nbsp;&nbsp;&nbsp;
                                                                <i class="fas fa-mobile-alt"></i> <a href=" https://wa.me/<?=$row['uniPersonContactNo']?>" target="__blank"><?= ($row['uniPersonContactNo'] == '') ? '--' : $row['uniPersonContactNo'] ?></a>&nbsp;&nbsp;&nbsp;
                                                                <i class="fas fa-envelope"></i> <?= ($row['uniPersonEmail'] == '') ? '--' : $row['uniPersonEmail'] ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="float-xl-right float-none mt-xl-0 mt-4">
                                                        <div class="switch-button switch-button-success m-r-10" id="updatedStatus_<?= $row['uni_id'] ?>">
                                                            <input type="checkbox" <?= ($row['uniStatus'] == 1) ? 'checked=""' : '' ?> name="switch<?= $row['uni_id'] ?>" onclick="return updateStatusofUNI(<?= $row['uni_id'] ?>,<?= $row['uniStatus'] ?>)" id="switch<?= $row['uni_id'] ?>"><span>
                                                                <label for="switch<?= $row['uni_id'] ?>"></label></span>
                                                        </div>
                                                        <a href="" type="button" class="btn-wishlist m-r-10" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $row['uni_id'] ?>"><i class="fas fa-eye"></i></a>

                                                        <div class="modal fade bd-example-modal-lg-<?= $row['uni_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <img src="<?= base_url('assets/') ?><?= ($row['uniLogo'] == '') ? 'images/inititutionAvatar.png' : 'uniLogos/' . $row['uniLogo'] ?>" width="25px" alt="">&nbsp;&nbsp;&nbsp;
                                                                        <h4 class="modal-title" id="exampleModalLabel"><?= $row['uni_name'] ?></h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="mt-1">
                                                                            <h5>Contact Details</h5>
                                                                            <i class="fas fa-user"></i> <?= ($row['uniContactPerson'] == '') ? '--' : $row['uniContactPerson'] ?>&nbsp;&nbsp;&nbsp;
                                                                            <i class="fas fa-mobile-alt"></i> <a href=" https://wa.me/<?=$row['uniPersonContactNo']?>" target="__blank"><?= ($row['uniPersonContactNo'] == '') ? '--' : $row['uniPersonContactNo'] ?></a> &nbsp;&nbsp;&nbsp;
                                                                            <i class="fas fa-envelope"></i>  <?= ($row['uniPersonEmail'] == '') ? '--' : $row['uniPersonEmail'] ?><br>
                                                                            <strong>Website </strong><a target="_blank" href="<?= $row['uniWebsite'] ?>"><?= $row['uniWebsite'] ?></a><br>
                                                                            <strong>Is Language Mandatory? : 
                                                                            <?php
                                                                                    if($row['IeltsReq']==1){
                                                                                        echo 'Yes';
                                                                                    }else{
                                                                                        echo 'No';
                                                                                    }
                                                                            ?>

                                                                            </strong>
                                                                            <?php
                                                                            if ($row['uniProspactus'] != '') {
                                                                            ?>
                                                                                - <a target="_blank" href="<?= base_url('assets/uniProspectus/' . $row['uniProspactus']) ?>">Institution Prospectus</a>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                        <hr>
                                                                        <strong>Monthly Cost = <?= $row['monthlyCost'] . ' ' . $row['currency'] ?> | </strong>
                                                                        <strong>Visa Funds = <?= $row['visaFunds'] . ' ' . $row['currency'] ?> | </strong>
                                                                        <strong>Application Fee= <?= $row['applicationFee'] . ' ' . $row['currency'] ?></strong><br>
                                                                        <strong>Quality Of Application Desired : 
                                                                            <?php
                                                                                if($row['applicationQuality']==1){
                                                                                    echo 'Excelent';
                                                                                }else if($row['applicationQuality']==2){
                                                                                    echo 'Good';
                                                                                }else if($row['applicationQuality']==3){
                                                                                    echo 'Average';
                                                                                }else{
                                                                                    echo 'Below Average';
                                                                                }
                                                                            ?>
                                                                        </strong>
                                                                        <hr>
                                                                        <Strong>Contract Terms</Strong>
                                                                        <p>
                                                                            <?= $row['contractTerms'] ?><br>    
                                                                            <?php
                                                                            if ($row['contractCopy'] != '') {
                                                                            ?>
                                                                                - <a target="_blank" href="<?= base_url('assets/InContractCopy/' . $row['contractCopy']) ?>">Contract Copy Document</a>
                                                                            <?php
                                                                            }
                                                                            ?><br>
                                                                            <strong>Expiry Date: <?=$row['contractExpiry']?></strong>
                                                                        </p>

                                                                        <hr>
                                                                        <Strong>Language Requiremnts</Strong>
                                                                        <p>
                                                                            <?=$row['langRequirement']?>
                                                                        </p>
                                                                        <hr>
                                                                        <Strong>Institutional Benefits</Strong>
                                                                        <p>
                                                                            <?=$row['uniBenefits']?>
                                                                        </p>
                                                                        <hr>
                                                                        <Strong>Part Time Work Details</Strong>
                                                                        <p>
                                                                            <?=$row['partTimeWork']?>
                                                                        </p>
                                                                        <hr>
                                                                        <Strong>Scholarships Policy</Strong>
                                                                        <p>
                                                                            <?=$row['scholarshipPolicy']?>
                                                                        </p>
                                                                        <hr>
                                                                        <Strong>nstitution Status Notes Important for Counsellor/Processing office to understand next step</Strong>
                                                                        <p>
                                                                            <?=$row['uniStatusNotes']?>
                                                                        </p>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <a href="<?= base_url('edit-institution/' . $row['uni_id']) ?>" class="btn-wishlist m-r-10"><i class="fas fa-edit"></i></a>
                                                        <a href="<?= base_url('deletes-institute/' . $row['uni_id']) ?>" onclick="return varifyDelete()" class="btn-wishlist m-r-10"><i class="fas fa-trash"></i></a>
                                                        <a href="<?= base_url('add-new-course/uniID/' . $row['uni_id']) ?>" class="btn btn-primary"> <i class="fas fa-plus"></i> &nbsp;&nbsp;Add Course</a>
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
    if ($this->session->flashdata('uniDeletd') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error('Institution Deleted!');
        </script>
    <?php
    }
    ?>
    <?php
    if ($this->session->flashdata('uniUpdated') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success('Institution Updated!');
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
        function updateStatusofUNI(id, status) {
            $.ajax({
                url: "<?= base_url('update-representing-countries-data') ?>",
                data: {
                    uni_id: id,
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
                        toastr.error('Institution Deactivated!');
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
                        toastr.success('Institution activated!');
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