<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task extends CI_Controller
{
	function __construct()
	{

		parent::__construct();
		$this->load->helper('file');
		$this->load->model('Generic_model', 'generic');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function AddNewLeadTask()
	{
		$data = array(
			'assignTo' => $this->input->post('assignTo'),
			'assignby' => $this->session->userdata['loginData']['userID'],
			'dueDate' => $this->input->post('dueDate'),
			'addingDate' => date('Y-m-d'),
			'task' => $this->input->post('task'),
			'leadID' => $this->uri->segment(2),
			'taskType' => 1,
			'taskStatus' => 0

		);
		$this->generic->InsertData('tasks', $data);
		$this->session->set_flashdata('taskadded', 1);
		redirect(base_url('view-leads'));
	}












	public function manageLeadSource()
	{
		if ($this->session->userdata('loginData')) {
			$this->data['source'] = $this->generic->GetData('leadSource');
			$this->load->view('leads/manageSources', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function LeadSourceData()
	{
		$this->generic->InsertData('leadSource', array('source' => $this->input->post('source')));
		$this->session->set_flashdata('LeadsAdded', 1);
		redirect(base_url('manage-lead-source'));
	}
	public function LeadSourceInactive()
	{
		$this->generic->Update('leadSource', array('sourceID' => $this->uri->segment(2)), array('sourceStatus' => 0));
		// die();
		$this->session->set_flashdata('LeadsInactive', 1);
		redirect(base_url('manage-lead-source'));
	}
	public function LeadSourceActive()
	{
		$this->generic->Update('leadSource', array('sourceID' => $this->uri->segment(2)), array('sourceStatus' => 1));
		// die();
		$this->session->set_flashdata('Leadsactive', 1);
		redirect(base_url('manage-lead-source'));
	}
	public function LeadSourceDelet()
	{
		$this->generic->Delet('leadSource', array('sourceID' => $this->uri->segment(2)));
		$this->session->set_flashdata('LeadDeleted', 1);
		redirect(base_url('manage-lead-source'));
	}
	public function AddNewLead()
	{
		if ($this->session->userdata('loginData')) {
			$this->data['source'] = $this->generic->GetData('leadSource', array('sourceStatus' => 1));
			$this->load->view('leads/addLeads', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function AddNewLeadData()
	{
		$leadsdata = array(
			'sourceID' => $this->input->post('source'),
			'stdName' => $this->input->post('stdname'),
			'stdEmail' => $this->input->post('stdemail'),
			'stdPhone' => $this->input->post('stdphone'),
			'stdAddPhone' => $this->input->post('addphone'),
			'stdDOB' => $this->input->post('dob'),
			'estimatedBudget' => $this->input->post('estBudget'),
			'10thMarks' => $this->input->post('10marks'),
			'StdIelts' => $this->input->post('ielts'),
			'FundingMode' => $this->input->post('fundingMode'),
			'FatherName' => $this->input->post('fname'),
			'stdIletsScore' => $this->input->post('ieltsScore'),
			'stdHSC' => $this->input->post('hsc'),
			'stdUG' => $this->input->post('ug'),
			'viseRejection' => $this->input->post('viseRejection'),
			'addedBy' => $this->session->userdata['loginData']['userID'],
			'leadStatus' => 0,
		);
		$this->generic->InsertData('leads', $leadsdata);
		//get max leads id for followups
		$maxID = $this->generic->GetMaxID('leads', 'leadID');
		//followup data
		$followupdata = array(
			'leadID' => $maxID[0]['result'],
			'addeby' => $this->session->userdata['loginData']['userID'],
			'addedDate' => date('Y-m-d'),
			'followUpDate' => $this->input->post('followupdate'),
			'remarks' => $this->input->post('remarks'),
		);
		$this->generic->InsertData('leadFollowUp', $followupdata);
		$this->session->set_flashdata('LeadAdded', 1);
		redirect(base_url('add-cources-to-lead/' . $maxID[0]['result']));
	}
	public function AddNewLeadCources()
	{
		if ($this->session->userdata('loginData')) {
			$this->data['lead'] = $this->generic->GetData('leads', array('leadID' => $this->uri->segment(2)));
			$this->data['repCountry'] = $this->generic->GetRepresenitnCountriesWithCountryName(array('rc.repCountryStatus' => 1));
			$this->data['addedCources'] = $this->generic->GetLeadCoursesWithDetails(array('l.leadID' => $this->uri->segment(2)));
			$this->load->view('leads/addCourcesToLeads', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function AddNewLeadCourcesData()
	{
		$coursedata = array(
			'leadID' => $this->uri->segment(2),
			'repCountryID' => $this->input->post('repcountryID'),
			'courseID' => $this->input->post('cources'),
			'courseIntakeID' => $this->input->post('intake'),
			'intakeYear' => $this->input->post('intakeyear'),
			'uni_id' => $this->input->post('institutions'),
		);
		$this->generic->InsertData('leadSelectedCourses', $coursedata);
		$this->session->set_flashdata('courseAdded', 1);
		redirect(base_url('add-cources-to-lead/' . $this->uri->segment(2)));
	}

	public function AddNewLeadCourcesDelete()
	{
		$this->generic->Delet('leadSelectedCourses', array('leadCourseID' => $this->uri->segment(2)));
		$this->session->set_flashdata('coursedeleted', 1);
		redirect(base_url('add-cources-to-lead/' . $this->uri->segment(3)));
	}
	public function markLeadnew()
	{
		$this->generic->Update('leads', array('leadID' => $this->uri->segment(2)), array('leadStatus' => 2));
		$this->session->set_flashdata('leadadded', 1);
		redirect(base_url('add-new-lead'));
	}
	public function allleads()
	{
		if ($this->session->userdata('loginData')) {
			$this->data['leads'] = $this->generic->GetLeadInfo();
			if ($this->session->userdata['loginData']['accessRole'] == 1) {
				$this->data['staff'] = $this->generic->GetData('users', array('userType' => 7));
			} else if ($this->session->userdata['loginData']['accessRole'] == 2) {
				if ($this->session->userdata['loginData']['userType'] == 2) {
					// $this->data['staff'] = $this->generic->GetData('users', array('userType' => 7));
				} else if ($this->session->userdata['loginData']['userType'] == 5) {
				}
			}
			$this->load->view('leads/allleads', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function editLead()
	{
		if ($this->session->userdata('loginData')) {
			$this->data['source'] = $this->generic->GetData('leadSource', array('sourceStatus' => 1));
			$this->data['lead'] = $this->generic->GetLeadInfo(array('l.leadID' => $this->uri->segment(2)));
			$this->load->view('leads/editLead', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function editLeadData()
	{
		$leadsdata = array(
			'sourceID' => $this->input->post('source'),
			'stdName' => $this->input->post('stdname'),
			'stdEmail' => $this->input->post('stdemail'),
			'stdPhone' => $this->input->post('stdphone'),
			'stdAddPhone' => $this->input->post('addphone'),
			'stdDOB' => $this->input->post('dob'),
			'estimatedBudget' => $this->input->post('estBudget'),
			'10thMarks' => $this->input->post('10marks'),
			'StdIelts' => $this->input->post('ielts'),
			'FundingMode' => $this->input->post('fundingMode'),
			'FatherName' => $this->input->post('fname'),
			'stdIletsScore' => $this->input->post('ieltsScore'),
			'stdHSC' => $this->input->post('hsc'),
			'stdUG' => $this->input->post('ug'),
			'viseRejection' => $this->input->post('viseRejection'),

		);
		$this->generic->Update('leads', array('leadID' => $this->uri->segment(2)), $leadsdata);
		//followup data
		$followupdata = array(
			'leadID' => $this->uri->segment(2),
			'addeby' => $this->session->userdata['loginData']['userID'],
			'addedDate' => date('Y-m-d'),
			'followUpDate' => $this->input->post('followupdate'),
			'remarks' => $this->input->post('remarks'),
		);
		$this->generic->InsertData('leadFollowUp', $followupdata);
		$this->session->set_flashdata('Leadupdated', 1);
		redirect(base_url('add-cources-to-lead/' . $this->uri->segment(2)));
	}
	public function manageFollowups()
	{
		if ($this->session->userdata('loginData')) {
			$this->data['followups'] = $this->generic->GetFollowUpWithUser(array('fu.leadID' => $this->uri->segment(2)));
			$this->data['lead'] = $this->generic->GetData('leads', array('leadID' => $this->uri->segment(2)));
			$this->load->view('leads/manageFollowups', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function newFollowupsData()
	{
		$data = array(
			'leadID' => $this->uri->segment(2),
			'addeby' => $this->session->userdata['loginData']['userID'],
			'addedDate' => date('Y-m-d'),
			'followUpDate' => $this->input->post('followupdate'),
			'remarks' => $this->input->post('remark'),
		);
		$this->generic->InsertData('leadFollowUp', $data);
		$this->session->set_flashdata('NewFollowupadded', 1);
		redirect(base_url('view-followups/' . $this->uri->segment(2)));
	}
	public function DeleteFollowupsData()
	{
		$followup = $this->generic->GetData('leadFollowUp', array('followUpID' => $this->uri->segment(2)));
		$this->generic->Delet('leadFollowUp', array('followUpID' => $this->uri->segment(2)));
		$this->session->set_flashdata('NewFollowDeleted', 1);
		redirect(base_url('view-followups/' . $followup[0]['leadID']));
	}

	public function addNewTask()
	{
		if ($this->session->userdata('loginData')) {
			if ($this->session->userdata['loginData']['userType'] == 1) {
				$this->data['staff'] = $this->generic->GetAdminStaff();
				$this->load->view('task/addNewTask', $this->data);
			}
		} else {
			redirect(base_url());
		}
	}
	public function addNewTAskData()
	{
		$data = array(
			'assignTo' => $this->input->post('staff'),
			'assignby' => $this->session->userdata['loginData']['userID'],
			'dueDate' => $this->input->post('dueDate'),
			'task' => $this->input->post('task'),
			'taskType' => 3,
			'taskStatus' => 0,
		);
		$this->generic->InsertData('tasks', $data);
		$this->session->set_flashdata('newtaskadded', 1);
		redirect(base_url('add-new-task'));
	}
	public function ManageAllTasks()
	{
		if ($this->session->userdata('loginData')) {
			if ($this->session->userdata['loginData']['userType'] == 1) {
				$this->data['tasks'] = $this->generic->GetTaskList(array('t.assignby' => $this->session->userdata['loginData']['userID']));
			}
			$this->load->view('task/manageTask', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function deletdTask()
	{
		$this->generic->Delet('tasks', array('taskID' => $this->uri->segment(2)));
		$this->session->set_flashdata('taskDeleted', 1);
		redirect(base_url('manage-tasks'));
	}
	public function MarkTaskComplete()
	{
		$this->generic->Update('tasks',array('taskID'=>$this->uri->segment(2)),array('taskStatus'=>3));
		$this->session->set_flashdata('taskCompleted', 1);
		redirect(base_url('manage-tasks'));
	}
	public function taskResponcesView(){
		if ($this->session->userdata('loginData')) {
			$this->data['task']=$this->generic->GetTaskList(array('taskID'=>$this->uri->segment(2)));
			$this->data['responses']=$this->generic->GettaskResponses(array('tr.taskID'=>$this->uri->segment(2)));
			$this->load->view('task/manageResponse',$this->data);
		}else{
			redirect(base_url());
		}
	}
	public function taskResponcesData(){
		$data=array(
			'taskID'=>$this->uri->segment(2),
			'responseBy'=>$this->session->userdata['loginData']['userID'],
			'taskResponse'=>$this->input->post('response'),
		);
		$this->generic->InsertData('taskResponse',$data);
		$task=$this->generic->GetData('tasks',array('taskID'=>$this->uri->segment(2)));
		if($this->session->userdata['loginData']['accessRole']!=3){
			if($task[0]['taskStatus']!=0){
				$this->generic->Update('tasks',array('taskID'=>$this->uri->segment(2)),array('taskStatus'=>2));
			}
		}else{
			$this->generic->Update('tasks',array('taskID'=>$this->uri->segment(2)),array('taskStatus'=>1));
		}
		$this->session->set_flashdata('responseadded', 1);
		redirect(base_url('task-response/'.$this->uri->segment(2)));
	}








	public function AddNewBranchOffice()
	{
		$this->load->view('users/addbranch');
	}
	public function AddNewBranchOfficeData()
	{
		$userdata = array(
			'userName' => $this->input->post('bName'),
			'userEmail' => $this->input->post('bemail'),
			'userPass' => $this->input->post('bpass'),
			'userPhone' => $this->input->post('bphone'),
			'userType' => 2,
			'accessRole' => 2,

		);
		$this->generic->InsertData('users', $userdata);
		//get max id from user
		$maxuser = $this->generic->GetMaxID('users', 'userID');
		$branchData = array(
			'userID' => $maxuser[0]['result'],
			'branchName' => $this->input->post('bName'),
			'branchAddress' => $this->input->post('address'),
			'branchCity' => $this->input->post('city'),
			'branchCountry' => $this->input->post('country'),
			'branchWebsite' => $this->input->post('website'),
			'branchPhone' => $this->input->post('bphone'),
			'bPersonName' => $this->input->post('pname'),
			'bPersonDesignation' => $this->input->post('designation'),
			'bPersonPhone' => $this->input->post('pphone'),
			'bPersonEmail' => $this->input->post('pemail'),
			'bPersonEmail' => $this->input->post('pemail'),
		);
		$this->generic->InsertData('branchOffice', $branchData);
		$this->session->set_flashdata('Branch-added', 1);
		redirect(base_url('add-new-branch-office'));
	}
	public function ViewAllBrancheOffices()
	{
		if ($this->session->userdata('loginData')) {
			$this->data['branchOffice'] = $this->generic->GetAllBranchOffices();
			$this->load->view('users/allbranchoffice', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function UpdateBranchStatus()
	{
		// die('heee');
		$branchID = $this->input->post('branchID');
		$cStatus = $this->input->post('curent_status');
		$BranchData = $this->generic->GetAllBranchOffices(array('b.branchID' => $branchID));
		if ($cStatus == 1) {
			$this->generic->Update('branchOffice', array('branchID' => $branchID), array('branchStatus' => 0));
			echo 'deactiveted///
		<input type="checkbox"   onclick="return updateStatusofbranch(' . $BranchData[0]['branchID'] . ',0)" id="switch' . $BranchData[0]['branchID'] . '"><span>
                                                        <label for="switch' . $BranchData[0]['branchID'] . '"></label></span>';
		} else {
			$this->generic->Update('branchOffice', array('branchID' => $branchID), array('branchStatus' => 1));
			echo 'actived///
		<input type="checkbox"  checked="" onclick="return updateStatusofbranch(' . $BranchData[0]['branchID'] . ',1)" id="switch' . $BranchData[0]['branchID'] . '"><span>
                                                        <label for="switch' . $BranchData[0]['branchID'] . '"></label></span>';
		}
	}
	public function deletBranchOffice()
	{
		$this->generic->Delet('branchOffice', array('branchID' => $this->uri->segment(2)));
		$this->session->set_flashdata('BranchDeleted', 1);
		redirect(base_url('view-branach-office'));
	}
	public function EditBranchOfiiceView()
	{
		$this->data['branchDetail'] = $this->generic->GetAllBranchOffices(array('branchID' => $this->uri->segment(2)));
		$this->load->view('users/editBranchOffice', $this->data);
	}
	public function EditBranchOfiiceData()
	{
		// die('sdfds');
		$userdata = array(
			'userName' => $this->input->post('bName'),
			'userEmail' => $this->input->post('bemail'),
			'userPass' => $this->input->post('bpass'),
			'userPhone' => $this->input->post('bphone'),

		);
		$branchedtail = $this->generic->GetData('branchOffice', array('branchID' => $this->uri->segment(2)));
		$this->generic->Update('users', array('userID' => $branchedtail[0]['userID']), $userdata);

		$branchData = array(
			'branchName' => $this->input->post('bName'),
			'branchAddress' => $this->input->post('address'),
			'branchCity' => $this->input->post('city'),
			'branchCountry' => $this->input->post('country'),
			'branchWebsite' => $this->input->post('website'),
			'branchPhone' => $this->input->post('bphone'),
			'bPersonName' => $this->input->post('pname'),
			'bPersonDesignation' => $this->input->post('designation'),
			'bPersonPhone' => $this->input->post('pphone'),
			'bPersonEmail' => $this->input->post('pemail'),
			'bPersonEmail' => $this->input->post('pemail'),
		);
		$this->generic->Update('branchOffice', array('branchID' => $this->uri->segment(2)), $branchData);
		$this->session->set_flashdata('Branch-edited', 1);
		redirect(base_url('view-branach-office'));
	}

	//manage staff
	public function addStaffView()
	{
		if ($this->session->userdata('loginData')) {
			$this->load->view('users/addstaff');
		} else {
			redirect(base_url());
		}
	}
	public function addStaffdata()
	{
		$data = array(
			'userName' => $this->input->post('name'),
			'userEmail' => $this->input->post('email'),
			'userPass' => $this->input->post('pass'),
			'userPhone' => $this->input->post('phone'),
			'userType' => 7,
			'accessRole' => 3,
		);
		$this->generic->InsertData('users', $data);
		$this->session->set_flashdata('staffadded', 1);
		redirect(base_url('add-staff-memeber'));
	}
	public function allStaffMember()
	{
		if ($this->session->userdata('loginData')) {
			$this->data['staff'] = $this->generic->GetData('users', array('userType' => 7));
			$this->load->view('users/allStaff', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function deletStaffdata()
	{
		$this->generic->Delet('users', array('userID' => $this->uri->segment(2)));
		$this->session->set_flashdata('staffDeleted', 1);
		redirect(base_url('view-staff-members'));
	}
	public function updateStaff()
	{
		// die('asds');	
		$staffID = $this->input->post('staffID');
		$cStatus = $this->input->post('curent_status');
		$StaffData = $this->generic->GetData('users', array('userID' => $staffID));
		if ($StaffData[0]['userStatus'] == 1) {
			$this->generic->Update('users', array('userID' => $staffID), array('userStatus' => 0));
			echo 'deactiveted///
		<input type="checkbox"   onclick="return updateStatusofbranch(' . $StaffData[0]['userID'] . ',0)" id="switch' . $StaffData[0]['userID'] . '"><span>
                                                        <label for="switch' . $StaffData[0]['userID'] . '"></label></span>';
		} else {
			$this->generic->Update('users', array('userID' => $staffID), array('userStatus' => 1));
			echo 'actived///
		<input type="checkbox"  checked="" onclick="return updateStatusofbranch(' . $StaffData[0]['userID'] . ',1)" id="switch' . $StaffData[0]['userID'] . '"><span>
                                                        <label for="switch' . $StaffData[0]['userID'] . '"></label></span>';
		}
	}
	public function editStaffView()
	{
		if ($this->session->userdata('loginData')) {
			$this->data['staff'] = $this->generic->GetData('users', array('userID' => $this->uri->segment(2)));
			$this->load->view('users/editstaff', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function editStaffdata()
	{
		$data = array(
			'userName' => $this->input->post('name'),
			'userEmail' => $this->input->post('email'),
			'userPass' => $this->input->post('pass'),
			'userPhone' => $this->input->post('phone'),

		);
		$this->generic->Update('users', array('userID' => $this->uri->segment(2)), $data);
		$this->session->set_flashdata('staffupdated', 1);
		redirect(base_url('view-staff-members'));
	}











	public function index()
	{
		$this->load->view('login');
	}
	public function LoginData()
	{
		$email = $this->input->post('username');
		$pass = $this->input->post('password');
		$user_info = $this->generic->LoginData($email, $pass);
		//inicializing session
		if ($user_info) {
			$this->session->set_userdata('loginData', $user_info[0]);
			$this->session->set_flashdata('logedin', 1);
			redirect(base_url('dashboard'));
		} else {
			$this->session->set_flashdata('error_msg', 1);
			redirect(base_url());
		}
	}
	public function Dashboard()
	{
		if ($this->session->userdata('loginData')) {
			$this->load->view('dashboard');
		} else {
			redirect(base_url());
		}
	}
	//manage countries
	//--all countries

	public function Allcountries()
	{
		if ($this->session->userdata('loginData')) {
			$this->data['countries'] = $this->generic->GetData('countries');
			$this->load->view('allcountries', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function CountryMarkInactive()
	{
		$this->generic->Update('countries', array('country_id' => $this->uri->segment(2)), array('country_status' => 0));
		$this->session->set_flashdata('InactiveMArked', 1);
		redirect(base_url('all-countries'));
	}
	public function CountryMarkactive()
	{
		$this->generic->Update('countries', array('country_id' => $this->uri->segment(2)), array('country_status' => 1));
		$this->session->set_flashdata('activeMArked', 1);
		redirect(base_url('all-countries'));
	}
	public function AddCountryData()
	{
		$this->generic->InsertData('countries', array('country_name' => $this->input->post('country')));
		$this->session->set_flashdata('countryAdded', 1);
		redirect(base_url('all-countries'));
	}

	public function CountryDelete()
	{
		$this->generic->Delet('countries', array('country_id' => $this->uri->segment(2)));
		$this->session->set_flashdata('countryDeleted', 1);
		redirect(base_url('all-countries'));
	}
	public function editCountryView()
	{
		if ($this->session->userdata('loginData')) {
			$this->data['country'] = $this->generic->GetData('countries', array('country_id' => $this->uri->segment(2)));
			$this->load->view('editCountry', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function editCountrydata()
	{
		$this->generic->Update('countries', array('country_id' => $this->uri->segment(2)), array('country_name' => $this->input->post('country')));
		$this->session->set_flashdata('countryEdited', 1);
		redirect(base_url('all-countries'));
	}
	//----representing country
	public function addRepresentingCountry()
	{
		if ($this->session->userdata('loginData')) {
			$this->data['countries'] = $this->generic->GetData('countries', array('country_status' => 1,));
			$this->load->view('addrepresentingCountry', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function AddRepresentingCountryData()
	{
		$countryVerify = $this->generic->GetData('representingCountries', array('country_id' => $this->input->post('countryID')));
		if ($countryVerify) {
			$this->session->set_flashdata('CountryAlreadyAdded', 1);
			redirect(base_url('add-representing-countries'));
		} else {
			$data = array(
				'country_id' => $this->input->post('countryID'),
				'livingCost' => $this->input->post('livingCost'),
				'visaRequirement' => $this->input->post('visaReq'),
				'workDetail' => $this->input->post('partTimeWork'),
				'benefits' => $this->input->post('countryBen')
			);
			$this->generic->InsertData('representingCountries', $data);
			$this->session->set_flashdata('RepCountryAdded', 1);
			redirect(base_url('add-representing-countries'));
		}
	}

	public function ViewAllRepCountries()
	{
		if ($this->session->userdata('loginData')) {
			$this->data['RepCountries'] = $this->generic->GetRepresenitnCountriesWithCountryName();
			$this->load->view('representingCountriesList', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function repCountryInactive()
	{
		$this->generic->Update('representingCountries', array('repCountryID' => $this->uri->segment(2)), array('repCountryStatus' => 0));
		$this->session->set_flashdata('InactiveMArked', 1);
		redirect(base_url('view-representing-countries'));
	}
	public function repCountryActive()
	{
		$this->generic->Update('representingCountries', array('repCountryID' => $this->uri->segment(2)), array('repCountryStatus' => 1));
		$this->session->set_flashdata('activeMArked', 1);
		redirect(base_url('view-representing-countries'));
	}
	public function repCountryDelete()
	{
		$this->generic->Delet('representingCountries', array('repCountryID' => $this->uri->segment(2)));
		$this->session->set_flashdata('countryDeleted', 1);
		redirect(base_url('view-representing-countries'));
	}
	public function EditRepCountryView()
	{
		$this->data['countrydata'] = $this->generic->GetData('countries', array('country_status' => 1));
		$this->data['repCountrydata'] = $this->generic->GetData('representingCountries', array('repCountryID' => $this->uri->segment(2)));
		$this->load->view('EditrepresentingCountry', $this->data);
	}
	public function EditRepCountryData()
	{
		$data = array(
			'country_id' => $this->input->post('countryID'),
			'livingCost' => $this->input->post('livingCost'),
			'visaRequirement' => $this->input->post('visaReq'),
			'workDetail' => $this->input->post('partTimeWork'),
			'benefits' => $this->input->post('countryBen')
		);
		$this->generic->Update('representingCountries', array('repCountryID' => $this->uri->segment(2)), $data);
		$this->session->set_flashdata('countryEdited', 1);
		redirect(base_url('view-representing-countries'));
	}
	public function Logout()
	{
		$this->session->unset_userdata('loginData');
		redirect(base_url());
	}
}
