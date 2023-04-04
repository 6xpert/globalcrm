<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>/images/favicon.png">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?= base_url() ?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/toastr/toastr.min.css">

    <title>Manage Followups</title>
</head>

<body class="chat-body">
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
            <div class="main-container">
                <div class="navbar bg-white breadcrumb-bar border-bottom">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a><strong>Student Name : <?= $lead[0]['stdName'] ?></strong></a>
                            </li>
                            <li class="breadcrumb-item"><a> <i class="fas fa-mobile-alt"></i> <a href=" https://wa.me/<?= $lead[0]['stdPhone'] ?>" target="__blank"><?= ($lead[0]['stdPhone'] == '') ? '--' : $lead[0]['stdPhone'] ?></a>&nbsp;&nbsp;&nbsp;
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <i class="fas fa-envelope"></i> <?= ($lead[0]['stdEmail'] == '') ? '--' : $lead[0]['stdEmail'] ?>&nbsp;&nbsp;&nbsp;

                            </li>

                        </ol>
                    </nav>
                    <!-- <div class="dropdown">
                        <button class="btn btn-outline-light btn-sm" data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-cog"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Manage Members</a>
                            <a class="dropdown-item" href="#">Subscribe</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#">Leave Chat</a>
                        </div>
                    </div> -->
                </div>
                <div class="content-container">
                    <div class="chat-module">
                        <div class="chat-module-top">

                            <div class="chat-module-body" style="top:20px !important;">
                                <?php
                                if ($followups) {
                                    foreach ($followups as $row) {
                                ?>
                                        <div class="media chat-item">
                                            <img alt="William" src="<?= base_url() ?>assets/images/user.png" class="rounded-circle user-avatar-lg">
                                            <div class="media-body">
                                                <div class="chat-item-title">
                                                    <span class="chat-item-author"><?= $row['userName'] ?></span>
                                                    <span>Added On:<?= $row['addedDate'] ?></span>
                                                </div>
                                                <div class="chat-item-body">
                                                    <p><?= $row['remarks'] ?><br>
                                                        <strong> Due Date : <?= $row['followUpDate'] ?></strong>
                                                    <a href="<?=base_url('delete-follow-up/'.$row['followUpID'])?>" onclick="return validatDelete()" style="float:right; color:red;" > <i class="fas fa-trash"></i> Delete</a>
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <center>
                                        <h3>No Followup Found!</h3>
                                    </center>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="chat-module-bottom">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Add New Follow Up
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">New Followup Form</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="chat-form" method="post" action="<?=base_url('add-new-followup-data/'.$this->uri->segment(2))?>">
                                                <label for="">Due Date</label>
                                                <input type="date" name="followupdate" class="form-control" style="width: 30%;" id="followupdate"><br>
                                                <label for="">Remarks</label>
                                                <textarea class="form-control" placeholder="Type remarks" id="remark" name="remark" rows="3"></textarea><br>
                                                <input type="submit" name="" id="" class="btn btn-primary">
                                            </form>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="chat-module-bottom">    
                            <h3>Add New Follow up:</h3>
                            <form class="chat-form">
                                <input type="date" name="followupdate" class="form-control" style="width: 20%;" id="followupdate"><br>
                                <textarea class="form-control" placeholder="Type message" id="remark" name="remark" rows="3"></textarea><br>
                                <input type="submit" name="" id="" class="btn btn-primary">
                            </form>
                        </div> -->
                    </div>

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

    <script src="<?= base_url() ?>assets/vendor/dropzone/dropzone.js"></script>
    <script src="<?= base_url() ?>assets/libs/js/main-js.js"></script>
    <script src="<?= base_url() ?>assets/toastr/toastr.min.js"></script>
    <script>
        function validatDelete(){
            if(confirm('Are you sure you want to delete followup?')){
                return true;
            }else{
                return false;
            }
        }
    </script>
    <?php
    if ($this->session->flashdata('NewFollowupadded') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success('New Followup Added!');
        </script>
    <?php
    }
    ?>
    <?php
    if ($this->session->flashdata('NewFollowDeleted') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error('Followup Deleted!');
        </script>
    <?php
    }
    ?>
</body>

</html>