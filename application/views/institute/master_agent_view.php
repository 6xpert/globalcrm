<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>/images/favicon.png">
    <title>All Master Agents</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?= base_url() ?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
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
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->

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
                            <h2 class="pageheader-title">All Master Agents</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a class="breadcrumb-link">Manage Master Agents</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">All Master Agents</li>
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
                    <!-- data table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">All Master Agents List</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Master Agent Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($masterAgents) {
                                                $sr = 1;
                                                foreach ($masterAgents as $row) {
                                            ?>
                                                    <tr>
                                                        <td><?= $sr . '.' ?></td>
                                                        <td><?= $row['masterAgentName'] ?></td>
                                                        <td><?= $row['masterAgentEmail'] ?></td>
                                                        <td><?= $row['masterAgentPhone'] ?></td>
                                                        <td>
                                                            <?php

                                                            if ($row['masterAgentStatus'] == 1) {
                                                                echo "<span style='color:green'>Active</span>";
                                                            } else {
                                                                echo "<span style='color:red'>Deactived</span>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                                if($row['masterAgentStatus']==1){
                                                            ?>
                                                            <a href="<?=base_url('master-agent-mark-Inactive/'.$row['masterAgentID'])?>" onclick="return markInActive()" class="btn btn-warning">Mark Inactive</a>
                                                            <?php
                                                                }else{
                                                                ?>
                                                            <a href="<?=base_url('master-agent-mark-Active/'.$row['masterAgentID'])?>" onclick="return markActive()" class="btn btn-success">Mark Active</a>
                                                                <?php
                                                            }
                                                            ?>
                                                            <a href="<?=base_url('edit-master-agent/'.$row['masterAgentID'])?>" class="btn btn-info">Edit</a>
                                                            <a href="<?=base_url('master-agent-delete-data/'.$row['masterAgentID'])?>" onclick="return deleteCountry()" class="btn btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $sr++;
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="4">
                                                        <center>
                                                            No Record Found
                                                        </center>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Master Agent Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end data table  -->
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
    <script src="<?=base_url()?>assets/toastr/toastr.min.js"></script>
        <?php
    if ($this->session->flashdata('agentUpdated') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.info('Master Agent Updated!');
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
    if ($this->session->flashdata('agentDeleted') != '') {
    ?>
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error('Master Agent Deleted!');
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
        function markInActive(){
            if(confirm('Are you sure you want to Inactivate?')){
                return true;
            }else{
                return false;
            }
        }
        function markActive(){
            if(confirm('Are you sure you want to Activate?')){
                return true;
            }else{
                return false;
            }
        }
        function deleteCountry(){
            if(confirm('Are you sure you want to Delete?It may EFFECT your University and Courses records!')){
                return true;
            }else{
                return false;
            }
        }
    </script>                                        
</body>

</html>