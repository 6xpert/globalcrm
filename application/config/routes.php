<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//login and dash board
$route['login-data']='welcome/LoginData';
$route['dashboard']='welcome/Dashboard';
$route['logout']='welcome/Logout';

//manage countries
$route['all-countries']='welcome/Allcountries';   //--all countires
$route['country-mark-Inactive/:any']='welcome/CountryMarkInactive';
$route['country-mark_active/:any']='welcome/CountryMarkactive';
$route['add-new-country-data']='welcome/AddCountryData';
$route['country-delete-data/:any']='welcome/CountryDelete';
$route['edit-country/:any']='welcome/editCountryView';
$route['edit-new-country-data/:any']='welcome/editCountrydata';
$route['add-representing-countries']='welcome/addRepresentingCountry';  //--add representing country
$route['addrepresenting-data']='welcome/AddRepresentingCountryData';
$route['view-representing-countries']='welcome/ViewAllRepCountries';
$route['update-representing-countries-Status']='welcome/repCountryStatusUpdate';
$route['re-country-delete-data/:any']='welcome/repCountryDelete';
$route['edit-rep-country/:any']='welcome/EditRepCountryView';
$route['Editrepresenting-data/:any']='welcome/EditRepCountryData';


//manage master agents
$route['add-master-agent']='institute/AddMasterAgent';
$route['add-new-master-agent-data']='institute/AddMasterAgentData';
$route['view-master-agent']='institute/ViewMasterAgent';
$route['master-agent-mark-Inactive/:any']='institute/MasterAgentInactive';
$route['master-agent-mark-Active/:any']='institute/MasterAgentActive';
$route['master-agent-delete-data/:any']='institute/MasterAgentDelete';
$route['edit-master-agent/:any']='institute/MasterAgentEditView';
$route['edit-master-agent-data/:any']='institute/MasterAgentEditData';

//manage institutions
$route['add-representing-institute']='institute/AddRepresentingInstitute';
$route['add-representing-institution-data']='institute/AddRepresentingInstituteData';
$route['view-representing-institute/:any']='institute/RepresentingInstitute';
$route['view-representing-institute']='institute/RepresentingInstitute';
$route['update-representing-countries-data']='institute/RepresentingInstituteStatusUpdate'; //ajaxx for status update
$route['deletes-institute/:any']='institute/DeleteInstituteData'; 
$route['edit-institution/:any']='institute/EditInstituteview'; 
$route['edit-representing-institution-data/:any']='institute/EditInstituteData'; 

//manage courses
$route['add-new-course']='institute/AddCourse';
$route['get-university-against-country']='institute/getUnviersityAjax';  //ajax to get universities
$route['get-cource-against-institute']='institute/getCourceAjax';  //ajax to get universities
$route['get-intake-against-course']='institute/getCourceIntakeAjax';  //ajax to get universities
$route['add-new-course-data']='institute/AddCourseData';
$route['add-new-course/uniID/:any']='institute/AddCourse';
$route['view-courses']='institute/ViewCourses';
$route['update-course-status-data']='institute/UpdateCourseStatus';
$route['deletes-course/:any']='institute/DeleteCourse';
$route['edit-course/:any']='institute/EditCourse';
$route['edit-course-data/:any']='institute/EditCourseData';
$route['manage-category']='institute/ManageCategory'; //manage course category
$route['add-new-course-category']='institute/AddCourseCategory';
$route['course-category-delete-data/:any']='institute/CourseDelte';
$route['edit-course-category/:any']='institute/CourseEditView';
$route['edit-course-category-data/:any']='institute/CourseEditData';
$route['manage-course-levels']='institute/CourseLevels';//manage course levels
$route['add-new-course-level']='institute/CourseLevelsAddData';
$route['course-level-delete-data/:any']='institute/CourseLevelDelet';
$route['edit-course-level/:any']='institute/CourseLevelEditView';
$route['edit-course-level-data/:any']='institute/CourseLevelEditData';

//manage branch office
$route['add-new-branch-office']='allusers/AddNewBranchOffice';
$route['add-new-branch-office-data']='allusers/AddNewBranchOfficeData';
$route['view-branach-office']='allusers/ViewAllBrancheOffices';
$route['update-branch-office-status-data']='allusers/UpdateBranchStatus'; //ajax call
$route['deletes-branch-office/:any']='allusers/deletBranchOffice'; 
$route['edit-branch-office/:any']='allusers/EditBranchOfiiceView'; 
$route['edit-branch-office-data/:any']='allusers/EditBranchOfiiceData'; 

//manage staff
$route['add-staff-memeber']='allusers/addStaffView';
$route['add-new-staff-data']='allusers/addStaffdata';
$route['view-staff-members']='allusers/allStaffMember';
$route['deletes-staff-member/:any']='allusers/deletStaffdata';
$route['update-staff-member-status-data']='allusers/updateStaff'; //ajax call
$route['edit-staff-member/:any']='allusers/editStaffView'; 
$route['update-staff-data/:any']='allusers/editStaffdata'; 

//manage leads
$route['manage-lead-source']='leads/manageLeadSource'; //manage sources
$route['add-lead-source-data']='leads/LeadSourceData';
$route['lead-source-mark-Inactive/:any']='leads/LeadSourceInactive';
$route['lead-source-mark_active/:any']='leads/LeadSourceActive';
$route['lead-source-delete-data/:any']='leads/LeadSourceDelet';
$route['add-new-lead']='leads/AddNewLead'; //add leads
$route['add-new-leads-data']='leads/AddNewLeadData';
$route['add-cources-to-lead/:any']='leads/AddNewLeadCources';
$route['add-lead-course-data/:any']='leads/AddNewLeadCourcesData';
$route['deletes-lead-course/:any/:any']='leads/AddNewLeadCourcesDelete';
$route['mark-lead-complete/:any']='leads/markLeadnew';
$route['view-leads']='leads/allleads';
$route['update-lead-status/:any/:any']='leads/UpdateLeadStatus';
$route['edit-lead/:any']='leads/editLead';
$route['update-leads-data/:any']='leads/editLeadData';
$route['view-followups/:any']='leads/manageFollowups';
$route['add-new-followup-data/:any']='leads/newFollowupsData';
$route['delete-follow-up/:any']='leads/DeleteFollowupsData';
        //--manage task managment
$route['add-new-lead-task/:any']='task/AddNewLeadTask';

//manage your agent
$route['add-your-agent']='allusers/addManinAgent';
$route['add-agent-access/:any']='allusers/addManinAgentAccess';
$route['add-new-own-agent-data']='allusers/addManinAgentData';
$route['add-uni-access-to-agent']='allusers/addManinAgentUniAccesData';  //ajax
$route['delete-uni-access-to-agent']='allusers/DeleteManinAgentUniAccesData';  //ajax
$route['update-agent-status']='allusers/UpdateAgentStatus';  //ajax
$route['deletes-agent/:any']='allusers/DeleteAgent';
$route['edit-agent/:any']='allusers/EditAgentview';
$route['edit-agent-data/:any']='allusers/EditAgentData';

//manage task
$route['add-new-task']='task/addNewTask';
$route['view-agent']='allusers/AllAgentsView';
$route['add-new-task-data']='task/addNewTAskData';
$route['manage-tasks']='task/ManageAllTasks';
$route['deletes-task/:any']='task/deletdTask';
$route['mark-task-complete/:any']='task/MarkTaskComplete';
$route['task-response/:any']='task/taskResponcesView';
$route['add-new-task-response/:any']='task/taskResponcesData';

//manage application
//-- ad new application
$route['add-new-application']='application/AddPersonalDetail';
$route['add-personal-detail']='application/AddPersonalDetail';
$route['add-new-application-data']='application/AddPersonalDetailData';
$route['add-student-education']='application/AddStudentEducation'; //step 2


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
