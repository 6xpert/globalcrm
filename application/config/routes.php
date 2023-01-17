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
$route['rep-country-mark-Inactive/:any']='welcome/repCountryInactive';
$route['rep-country-mark_active/:any']='welcome/repCountryActive';
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
