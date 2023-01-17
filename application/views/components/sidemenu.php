<style>
    .nav{
        list-style: circle !important;
    }
    </style>
<div class="nav-left-sidebar sidebar-light">
            <div class="menu-list">
                <?php
        if($this->session->userdata['loginData']['userType']==1){

?>
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="<?=base_url('dashboard')?>"  aria-expanded="false" ><i class="fas fa-th"></i>Dashboard </a>
                               
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-globe"></i>Manage Countries</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('add-representing-countries')?>">Add Representing Countries</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('view-representing-countries')?>">View Representing Countries</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('all-countries')?>">All Countries</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fas fa-hospital-alt"></i>Representing Institutions</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('add-representing-institute')?>">Add Representing Institutions</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('view-representing-institute')?>">View Representing Institutions</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-book"></i>Manage Courses</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('add-new-course')?>">Add New Course</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('view-representing-institute')?>">View Representing Institutions</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-users"></i>Manage Master Agent</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('add-master-agent')?>">Add Master Agent</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('view-master-agent')?>">View Master Agent</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <?php
        }
        ?>
            </div>
        </div>