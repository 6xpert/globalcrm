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
    <title>Manage Tasks</title>
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
                                <h3 class="mb-2">Manage Task</h3>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Manage Task</li>
                                            <li class="breadcrumb-item active" aria-current="page">View All Task</li>
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
                            if ($tasks) {
                                foreach ($tasks as $row) {
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
                                                                <h2 class="font-24 m-b-10"><?= $row['userName'] ?> </h2>
                                                            </div>
                                                        </div>
                                                        <div class="user-avatar-address">
                                                            <p class="mb-2">
                                                                Task Type: <strong>
                                                                    <?php
                                                                    if ($row['taskType'] == 1) {
                                                                        echo 'Lead';
                                                                    } else if ($row['taskType'] == 2) {
                                                                        echo 'Application';
                                                                    } else {
                                                                        echo 'General';
                                                                    }
                                                                    ?>
                                                                </strong> | Status:
                                                                <strong>
                                                                    <?php
                                                                    if ($row['taskStatus'] == 0) {
                                                                        echo '<span class="text-primary">Assigned</span>';
                                                                    } else if ($row['taskStatus'] == 1) {
                                                                        echo '<span class="text-secondary">Responded</span>';
                                                                    } else if ($row['taskStatus'] == 2) {
                                                                        echo '<span class="text-warning">Update Requested</span>';
                                                                    } else {
                                                                        echo '<span class="text-success">Completed</span>';
                                                                    }
                                                                    ?>
                                                                </strong>

                                                            </p>

                                                            <div class="mt-1">
                                                                <Strong>Contact Details</Strong><br>
                                                                <i class="fas fa-mobile-alt"></i> <a href=" https://wa.me/<?= $row['userPhone'] ?>" target="__blank"><?= ($row['userPhone'] == '') ? '--' : $row['userPhone'] ?></a>&nbsp;&nbsp;&nbsp;
                                                                <i class="fas fa-envelope"></i> <?= ($row['userEmail'] == '') ? '--' : $row['userEmail'] ?>
                                                            </div>
                                                            <hr>
                                                            <?php
                                                        if ($row['taskStatus'] != 3) {
                                                        ?>
                                                                <a href="<?= base_url('task-response/' . $row['taskID']) ?>"><i class="fas fa-comment-dots"></i> &nbsp;&nbsp;Add / View Response</a> &nbsp;&nbsp;
                                                                <?php
                                                        }else{
                                                            ?>
                                                                <a href="<?= base_url('task-response/' . $row['taskID']) ?>"><i class="fas fa-comment-dots"></i> &nbsp;&nbsp;View Response</a> &nbsp;&nbsp;

                                                            <?php
                                                        }
                                                        ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="float-xl-right float-none mt-xl-0 mt-4">

                                                        <a href="" type="button" class="btn-wishlist m-r-10" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $row['taskID'] ?>"><i class="fas fa-eye"></i></a>

                                                        <div class="modal fade bd-example-modal-lg-<?= $row['taskID'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <img src="<?= base_url('assets/images/user.png') ?>" width="25px" alt="">&nbsp;&nbsp;&nbsp;
                                                                        <h4 class="modal-title" id="exampleModalLabel"><?= $row['userName'] ?></h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h3>Task:</h3>
                                                                        <p><?= $row['task'] ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <a href="<?= base_url('deletes-task/' . $row['taskID']) ?>" onclick="return varifyDelete()" class="btn-wishlist m-r-10"><i class="fas fa-trash"></i></a>
                                                        <?php
                                                        if ($row['taskStatus'] != 3) {
                                                        ?>
                                                            <a href="<?= base_url('mark-task-complete/' . $row['taskID']) ?>" onclick="return varifyComplete()" class="btn btn-success mt-1"> <i class="fas fa-check"></i> &nbsp;&nbsp;Mark Complete</a>
                                                        <?php
                                                        }
                                                        ?>
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
    if ($this->session->flashdata('taskDeleted') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error('Task Deleted!');
        </script>
    <?php
    }
    ?>
    <?php
    if ($this->session->flashdata('taskCompleted') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success('Task Completed!');
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

        function varifyComplete() {
            if (confirm('Are you sure you want to mark task complete?')) {
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