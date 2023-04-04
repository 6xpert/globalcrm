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
    <title>Manage Agents</title>
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
                                <h3 class="mb-2">Manage Agents</h3>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Manage Agents</li>
                                            <li class="breadcrumb-item active" aria-current="page">View All Agents</li>
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
                  
                        <!-- end search bar  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- card influencer one -->
                            <!-- ============================================================== -->
                            <?php
                            if ($agents) {
                                foreach ($agents as $row) {
                            ?>
                                    <div class="card">



                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="user-avatar float-xl-left pr-4 float-none">
                                                        <img src="<?= base_url('assets/images/user.png') ?>" alt="User Avatar" class="rounded-circle user-avatar-xl">
                                                    </div>
                                                    <div class="pl-xl-3">
                                                        <div class="m-b-0">
                                                            <div class="user-avatar-name d-inline-block">
                                                                <h2 class="font-24 m-b-10"><?= $row['agentName'] ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="user-avatar-address">
                                                            <p class="mb-2"><i class="fa fa-map-marker-alt mr-2  text-primary"></i><?= $row['companyAddress'] ?><span class="m-l-10">| <?= ($row['companyCountry'] == '') ? 'No Campus Found' : $row['country_name'] ?> </span>
                                                            </p>
                                                            
                                                            <div class="mt-1">
                                                                <Strong>Contact Details</Strong><br>
                                                                <i class="fas fa-user"></i> <?= ($row['agentPosition'] == '') ? '--' : $row['agentPosition'] ?>&nbsp;&nbsp;&nbsp;
                                                                <i class="fas fa-mobile-alt"></i> <a href=" https://wa.me/<?=$row['agentPhone']?>" target="__blank"><?= ($row['agentPhone'] == '') ? '--' : $row['agentPhone'] ?></a>&nbsp;&nbsp;&nbsp;
                                                                <i class="fas fa-envelope"></i> <?= ($row['agentEmail'] == '') ? '--' : $row['agentEmail'] ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="float-xl-right float-none mt-xl-0 mt-4">
                                                        <div class="switch-button switch-button-success m-r-10" id="updatedStatus_<?= $row['agentID'] ?>">
                                                            <input type="checkbox" <?= ($row['agentStatus'] == 1) ? 'checked=""' : '' ?> name="switch<?= $row['agentID'] ?>" onclick="return updateStatusoAgent(<?= $row['agentID'] ?>,<?= $row['agentStatus'] ?>)" id="switch<?= $row['agentID'] ?>"><span>
                                                                <label for="switch<?= $row['agentID'] ?>"></label></span>
                                                        </div>
                                                        <a href="" type="button" class="btn-wishlist m-r-10" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $row['agentID'] ?>"><i class="fas fa-eye"></i></a>

                                                        <div class="modal fade bd-example-modal-lg-<?= $row['agentID'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <img src="<?= base_url('assets/images/user.png') ?>" width="25px" alt="">&nbsp;&nbsp;&nbsp;
                                                                        <h4 class="modal-title" id="exampleModalLabel"><?= $row['agentName'] ?></h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="mt-1">
                                                                            <h5>Contact Details</h5>
                                                                            <i class="fas fa-user"></i> <?= ($row['agentPosition'] == '') ? '--' : $row['agentPosition'] ?>&nbsp;&nbsp;&nbsp;
                                                                            <i class="fas fa-mobile-alt"></i> <a href=" https://wa.me/<?=$row['agentPhone']?>" target="__blank"><?= ($row['agentPhone'] == '') ? '--' : $row['agentPhone'] ?></a> &nbsp;&nbsp;&nbsp;
                                                                            <i class="fas fa-envelope"></i>  <?= ($row['agentEmail'] == '') ? '--' : $row['agentEmail'] ?><br>
                                                                            <strong>Website </strong><a target="_blank" href="<?= $row['comapnyWebsite'] ?>"><?= $row['comapnyWebsite'] ?></a><br>
                                                                           

                                                                            </strong>
                                                                         
                                                                        </div>
                                                                        <hr>
                                                                        
                                                                        <Strong>Compnay Details</Strong><br>
                                                                        <i class="fas fa-mobile-alt"></i> <a href=" https://wa.me/<?=$row['companyPhone']?>" target="__blank"><?= ($row['companyPhone'] == '') ? '--' : $row['companyPhone'] ?></a> &nbsp;&nbsp;&nbsp;
                                                                        <i class="fas fa-mobile-alt"></i> <a href=" https://wa.me/<?=$row['companyMobile']?>" target="__blank"><?= ($row['companyMobile'] == '') ? '--' : $row['companyMobile'] ?></a> &nbsp;&nbsp;&nbsp;
                                                                            <i class="fas fa-envelope"></i>  <?= ($row['companyEmail'] == '') ? '--' : $row['companyEmail'] ?><br>
                                                                        <p>
                                                                            Company Name: <?= $row['companyName'] ?><br>    
                                                                            Compnay Registeration Number: <?=$row['companyNumber']?>
                                                                            Compnay Address: <?= $row['companyAddress'] ?>, <?=$row['companyCountry']?><br>
                                                                            Registeration Date: <?= $row['companyRegDate'] ?>
                                                                        </p>

                                                                        <hr>
                                                                        <Strong>Do you have contractual relationships with other UK universities ?</Strong>
                                                                        <p>
                                                                            <?php
                                                                                    if($row['contractInUK']==1){
                                                                                        echo 'Yes <br> Details: ';
                                                                                        echo $row['lengthOfRelationship'];
                                                                                    }else{
                                                                                        echo 'No';
                                                                                    }
                                                                            ?>
                                                                        </p>
                                                                        <hr>
                                                                        <Strong>Please confirm your organization has a full understanding of UKVI to ensure prospective students are advised appropriately?</Strong>
                                                                        <p>
                                                                        <?php
                                                                                    if($row['understandingOfUKVI']==1){
                                                                                        echo 'Yes';
                                                                                    }else{
                                                                                        echo 'No';
                                                                                    }
                                                                            ?>
                                                                        </p>
                                                                        <hr>
                                                                        <Strong>How many students you have placed in universities last year?</Strong>
                                                                        <p>
                                                                            <?=$row['lastYearStudents']?> Students
                                                                        </p>
                                                                        <hr>
                                                                        <Strong>Do you have any recommendations/accreditations from government or Education Ministry?</Strong>
                                                                        <p>
                                                                        <?php
                                                                                    if($row['govRecomendation']==1){
                                                                                        echo 'Yes <br> Details: ';
                                                                                        echo $row['recomentationDetail'];
                                                                                    }else{
                                                                                        echo 'No';
                                                                                    }
                                                                            ?>
                                                                        </p>
                                                                        <hr>
                                                                        <Strong>Why do you wish to work with Global Group of Education?</Strong>
                                                                        <p>
                                                                            <?=$row['whyGGOE']?>
                                                                        </p>
                                                                        <hr>
                                                                        <Strong>How do you plan to market ?</Strong>
                                                                        <p>
                                                                            <?=$row['marketPlan']?>
                                                                        </p>
                                                                        <hr>
                                                                        <div class="mt-1">
                                                                            <h5>Reffrence Contact Person</h5>
                                                                            <i class="fas fa-user"></i> <?= ($row['ref1Name'] == '') ? '--' : $row['ref1Name'] ?>(<?=$row['ref1Position']?>)&nbsp;&nbsp;&nbsp;
                                                                            <i class="fas fa-mobile-alt"></i> <a href=" https://wa.me/<?=$row['ref1Phone']?>" target="__blank"><?= ($row['ref1Phone'] == '') ? '--' : $row['ref1Phone'] ?></a> &nbsp;&nbsp;&nbsp;
                                                                            <i class="fas fa-envelope"></i>  <?= ($row['ref1Email'] == '') ? '--' : $row['ref1Email'] ?><br>
                                                                           

                                                                            </strong>
                                                                         
                                                                        </div>
                                                                        <div class="mt-1">
                                                                            <h5>Reffrence Contact Person</h5>
                                                                            <i class="fas fa-user"></i> <?= ($row['ref2Name'] == '') ? '--' : $row['ref2Name'] ?>(<?=$row['ref2Position']?>)&nbsp;&nbsp;&nbsp;
                                                                            <i class="fas fa-mobile-alt"></i> <a href=" https://wa.me/<?=$row['ref2Phone']?>" target="__blank"><?= ($row['ref2Phone'] == '') ? '--' : $row['ref2Phone'] ?></a> &nbsp;&nbsp;&nbsp;
                                                                            <i class="fas fa-envelope"></i>  <?= ($row['ref2Email'] == '') ? '--' : $row['ref2Email'] ?><br>
                                                                           

                                                                            </strong>
                                                                         
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <a href="<?= base_url('edit-agent/' . $row['agentID']) ?>" class="btn-wishlist m-r-10"><i class="fas fa-edit"></i></a>
                                                        <a href="<?= base_url('deletes-agent/' . $row['agentID']) ?>" onclick="return varifyDelete()" class="btn-wishlist m-r-10"><i class="fas fa-trash"></i></a>
                                                        <a href="<?= base_url('add-agent-access/' . $row['agentID']) ?>" class="btn btn-primary mt-1"> <i class="fas fa-plus"></i> &nbsp;&nbsp;Add Institute Access</a>
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
    if ($this->session->flashdata('agentDeleted') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error('Agent Deleted!');
        </script>
    <?php
    }
    ?>
    <?php
    if ($this->session->flashdata('agentupdated') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success('Agent Updated!');
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
        function updateStatusoAgent(id, status) {
            $.ajax({
                url: "<?= base_url('update-agent-status') ?>",
                data: {
                    agentID: id,
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
                        toastr.error('Agent Deactivated!');
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
                        toastr.success('Agent activated!');
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