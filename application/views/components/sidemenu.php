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
                                            <a class="nav-link" href="<?=base_url('view-courses')?>">View All Courses</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('manage-category')?>">Mange Course Category</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('manage-course-levels')?>">Manage Course Levels</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-14" aria-controls="submenu-14"><i class="fab fa-wpforms"></i>Manage Applications</a>
                                <div id="submenu-14" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('add-new-application')?>">Add New Application</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('view-application')?>">Manage Application</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('manage-lead-source')?>">Manage Leads Sources</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fas fa-clipboard-list"></i>Manage Leads</a>
                                <div id="submenu-8" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('add-new-lead')?>">Add New Lead</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('view-leads')?>">Manage Leads</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('manage-lead-source')?>">Manage Leads Sources</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fas fa-calendar-check"></i>Manage Tasks</a>
                                <div id="submenu-9" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('add-new-task')?>">Add New Task</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('manage-tasks')?>">Manage Tasks</a>
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
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-10"><i class="far fa-user"></i>Manage Your Agent</a>
                                <div id="submenu-10" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('add-your-agent')?>">Add Agent</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('view-agent')?>">Manage Agent</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-building"></i>Manage Branch Office</a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('add-new-branch-office')?>">Add New Branch</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('view-branach-office')?>">View Branch Office</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-users"></i>Manage Staff</a>
                                <div id="submenu-7" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('add-staff-memeber')?>">Add New Staff Member</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=base_url('view-staff-members')?>">Manage Staff Members</a>
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