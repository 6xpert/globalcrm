<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>/images/favicon.png">
    <title>All Representing Countries</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?= base_url() ?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
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
                            <h2 class="pageheader-title">Representing Countries</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manage Country</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">View All Representing Countries</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- card influencer one -->
                            <!-- ============================================================== -->
                            <?php
                            if ($RepCountries) {
                                foreach ($RepCountries as $row) {
                            ?>
                                    <div class="card">



                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="user-avatar float-xl-left pr-4 float-none">
                                                        <img src="<?= base_url('assets/images/') ?><?= ($row['flag'] == '') ? 'glob.jpeg' :  $row['flag'] ?>" alt="User Avatar" class="rounded-circle user-avatar-xl">
                                                    </div>
                                                    <div class="pl-xl-3">
                                                        <div class="m-b-0">
                                                            <div class="user-avatar-name d-inline-block">
                                                                <h2 class="font-24 m-b-10"><?= $row['country_name'] ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="user-avatar-address">
                                                           
                                                            <div class="mt-1">
                                                                
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="float-xl-right float-none mt-xl-0 mt-4">
                                                        <div class="switch-button switch-button-success m-r-10" id="updatedStatus_<?= $row['repCountryID'] ?>">
                                                            <input type="checkbox" <?= ($row['repCountryStatus'] == 1) ? 'checked=""' : '' ?> name="switch<?= $row['repCountryID'] ?>" onclick="return updateStatusofRepCountry(<?= $row['repCountryID'] ?>,<?= $row['repCountryStatus'] ?>)" id="switch<?= $row['repCountryID'] ?>"><span>
                                                                <label for="switch<?= $row['repCountryID'] ?>"></label></span>
                                                        </div>
                                                        <a href="" type="button" class="btn-wishlist m-r-10" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $row['repCountryID'] ?>"><i class="fas fa-eye"></i></a>

                                                        <div class="modal fade bd-example-modal-lg-<?= $row['repCountryID'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="exampleModalLabel"><?= $row['country_name'] ?></h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                      
                                                                        <Strong>Living Cost</Strong>
                                                                        <p>
                                                                            <?= $row['livingCost'] ?><br>    
                                                                            
                                                                        </p>

                                                                        <hr>
                                                                        <Strong>Visa Requirement</Strong>
                                                                        <p>
                                                                            <?=$row['visaRequirement']?>
                                                                        </p>
                                                                        <hr>
                                                                        <Strong>Work Detail</Strong>
                                                                        <p>
                                                                            <?=$row['workDetail']?>
                                                                        </p>
                                                                        <hr>
                                                                        <Strong>Benefits</Strong>
                                                                        <p>
                                                                            <?=$row['benefits']?>
                                                                        </p><hr>
                                                                       <strong>Additional Links</strong><br>
                                                                       <?php
                                                                        if($row['link1']){
                                                                       ?>
                                                                       <a href="<?=$row['link1']?>" target="__blank"><i class="fas fa-external-link-alt"></i> <?=$row['link1desc']?></a>
                                                                       <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <a href="<?= base_url('edit-rep-country/' . $row['repCountryID']) ?>" class="btn-wishlist m-r-10"><i class="fas fa-edit"></i></a>
                                                        <a href="<?= base_url('re-country-delete-data/' . $row['repCountryID']) ?>" onclick="return deleteCountry()" class="btn-wishlist m-r-10"><i class="fas fa-trash"></i></a>
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
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper -->
        <!-- ============================================================== -->
        <!-- Optional JavaScript -->
        <script src="<?= base_url() ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <script src="<?= base_url() ?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
        <script src="<?= base_url() ?>assets/vendor/multi-select/js/jquery.multi-select.js"></script>
        <script src="<?= base_url() ?>assets/libs/js/main-js.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/datatables/js/data-table.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
        <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
        <script src="<?= base_url() ?>assets/toastr/toastr.min.js"></script>
        <script>
            function updateStatusofRepCountry(id,status){
                $.ajax({
                url: "<?= base_url('update-representing-countries-Status') ?>",
                data: {
                    country_id: id,
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
        <?php
        if ($this->session->flashdata('countryEdited') != '') {
        ?>
            <script type="text/javascript">
                toastr.options = {
                    "closeButton": true,
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr.info('Country Updated!');
            </script>
        <?php
        }
        ?>
        <?php
        if ($this->session->flashdata('InactiveMArked') != '') {
        ?>
            <script type="text/javascript">
                toastr.options = {
                    "closeButton": true,
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr.warning('Marked Inactive!');
            </script>
        <?php
        }
        ?>
        <?php
        if ($this->session->flashdata('countryDeleted') != '') {
        ?>
            <script type="text/javascript">
                toastr.options = {
                    "closeButton": true,
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr.error('Country Deleted!');
            </script>
        <?php
        }
        ?>
        <?php
        if ($this->session->flashdata('countryAdded') != '') {
        ?>
            <script type="text/javascript">
                toastr.options = {
                    "closeButton": true,
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr.success('New Country Added!');
            </script>
        <?php
        }
        ?>
        <?php
        if ($this->session->flashdata('activeMArked') != '') {
        ?>
            <script type="text/javascript">
                toastr.options = {
                    "closeButton": true,
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr.success('Marked Active!');
            </script>
        <?php
        }
        ?>
        <script>
            

            function deleteCountry() {
                if (confirm('Are you sure you want to Delete?')) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
</body>

</html>