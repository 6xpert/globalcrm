<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Allusers extends CI_Controller
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
		$maxuserID=$this->generic->GetMaxID('users','userID');
		if($this->session->userdata['loginData']['userType']==1){
			$userlinkData=array(
				'userID'=>$maxuserID[0]['result'],
			);
			$this->generic->InsertData('adminStaffLink',$userlinkData);
		}
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
	//agents
	public function addManinAgent()
	{
		if ($this->session->userdata('loginData')) {
			$this->data['countries'] = $this->generic->GetData('countries', array('country_status' => 1));
			$this->load->view('users/addNewAgent', $this->data);
		} else {
			redirect(base_url());
		}
	}
	//ajax to add agent access
	public function addManinAgentUniAccesData()
	{
		//check if already added
		$unicheck = $this->generic->GetData('agentUniversityAccess', array('agentID' => $this->input->post('agentID'), 'uni_id' => $this->input->post('uniID')));
		if ($unicheck) {
			echo 'alreadyaddedUni';
		} else {
			$data = array(
				'agentID' => $this->input->post('agentID'),
				'uni_id' => $this->input->post('uniID'),
				'accessStuts' => 1,
			);
			$this->generic->InsertData('agentUniversityAccess', $data);
			$agentaccess = $this->generic->GetAgentAccessUniversity(array('ac.agentID' => $this->input->post('agentID')));
			$tr = '';
			$sr = 1;
			foreach ($agentaccess  as $row) {
				$tr = $tr . '<tr>
			<th >' . $sr . '. ' . ' </th>
			<th >' . $row['country_name'] . '  </th>
			<th >' . $row['uni_name'] . ' </th>
			<th > <a href="javascript:deletagentaccess(' . $row['accessID'] . ')"><i class="fas fa-trash-alt"></i> </a> </th>
		</tr>';
				$sr++;
			}
			echo $tr;
		}
	}
	// ajax to delete agent access
	public function DeleteManinAgentUniAccesData()
	{
		$accessid = $this->input->post('accessID');
		$accessdata = $this->generic->GetData('agentUniversityAccess', array('accessID' => $accessid));
		$this->generic->Delet('agentUniversityAccess', array('accessID' => $accessid));
		$agentaccess = $this->generic->GetAgentAccessUniversity(array('ac.agentID' => $accessdata[0]['agentID']));
		$tr = '';
		$sr = 1;
		foreach ($agentaccess  as $row) {
			$tr = $tr . '<tr>
			<th >' . $sr . '. ' . ' </th>
			<th >' . $row['country_name'] . '  </th>
			<th >' . $row['uni_name'] . ' </th>
			<th > <a href="javascript:deletagentaccess(' . $row['accessID'] . ')"><i class="fas fa-trash-alt"></i> </a> </th>
		</tr>';
			$sr++;
		}
		echo $tr;
	}
	public function addManinAgentData()
	{
		$data = array(
			'agentName' => $this->input->post('agentName'),
			'agentPhone' => $this->input->post('agentPhone'),
			'agentEmail' => $this->input->post('agentEmail'),
			'agentPosition' => $this->input->post('agentPosition'),
			'companyName' => $this->input->post('cName'),
			'companyAddress' => $this->input->post('cAddress'),
			'companyCountry' => $this->input->post('cCountry'),
			'companyNumber' => $this->input->post('cRegNumber'),
			'companyRegDate' => $this->input->post('cRegDate'),
			'companyPhone' => $this->input->post('cPhone'),
			'companyMobile' => $this->input->post('cMobile'),
			'companyEmail' => $this->input->post('cEmail'),
			'comapnyWebsite' => $this->input->post('cWebsite'),
			'contractInUK' => $this->input->post('relation'),
			'lengthOfRelationship' => $this->input->post('relationWhy'),
			'understandingOfUKVI' => $this->input->post('UKVI'),
			'lastYearStudents' => $this->input->post('noOfStd'),
			'govRecomendation' => $this->input->post('recomendation'),
			'recomentationDetail' => $this->input->post('recomendationDetails'),
			'whyGGOE' => $this->input->post('wish'),
			'marketPlan' => $this->input->post('marketing'),
			'ref1Name' => $this->input->post('ref1name'),
			'ref1Position' => $this->input->post('ref1position'),
			'ref1Email' => $this->input->post('ref1email'),
			'ref1Phone' => $this->input->post('ref1phone'),
			'ref2Name' => $this->input->post('ref2name'),
			'ref2Position' => $this->input->post('ref2position'),
			'ref2Email' => $this->input->post('ref2email'),
			'ref2Phone' => $this->input->post('ref2phone'),
			'addedOn' => date('Y-m-d'),
			'agentStatus' => 1,
			'agnetAddedBy' => $this->session->userdata['loginData']['userID']
		);
		$this->generic->InsertData('agents', $data);

		$userData = array(
			'userName' => $this->input->post('agentName'),
			'userEmail' => $this->input->post('bemail'),
			'userPass' => $this->input->post('bpass'),
			'userPhone' => $this->input->post('agentPhone'),
			'userType' => 5,
			'accessRole' => 2,
			'userStatus' => 1
		);
		$this->generic->InsertData('users', $userData);
		$maxIDagent = $this->generic->GetMaxID('agents', 'agentID');
		$maxIDUser = $this->generic->GetMaxID('users', 'userID');
		$linkData = array(
			'agentID' => $maxIDagent[0]['result'],
			'userID' => $maxIDUser[0]['result'],
			'agentType' => 1

		);
		$this->generic->InsertData('agentUserLink', $linkData);
		$this->session->set_flashdata('agentAdded', 1);
		redirect(base_url('add-agent-access/' . $$maxIDagent[0]['result']));
	}
	public function addManinAgentAccess()
	{
		if ($this->session->userdata('loginData')) {
			$this->data['agent'] = $this->generic->GetData('agents', array('agentID' => $this->uri->segment(2)));
			$this->data['aggentAccess'] = $this->generic->GetAgentAccessUniversity(array('ac.agentID' => $this->uri->segment(2)));
			$this->data['repCountry'] = $this->generic->GetRepresenitnCountriesWithCountryName(array('rc.repCountryStatus' => 1));
			$this->load->view('users/addAgentAccess', $this->data);
		} else {
			redirect(base_url());
		}
	}
	//manage agents
	public function AllAgentsView()
	{
		if ($this->session->userdata('loginData')) {
			$this->data['agents'] = $this->generic->GetAgentData();
			$this->load->view('users/manageagents', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function UpdateAgentStatus()
	{
		$agentID = $this->input->post('agentID');
		$cStatus = $this->input->post('curent_status');
		//disable account
		$uiserID = $this->generic->GetData('agentUserLink', array('agentID' => $agentID));

		$AgentData = $this->generic->GetAgentData(array('a.agentID' => $agentID));
		if ($cStatus == 1) {
			$this->generic->Update('users', array('userID' => $uiserID[0]['userID']), array('userStatus' => 0));
			$this->generic->Update('agents', array('agentID' => $agentID), array('agentStatus' => 0));
			echo 'deactiveted///
		<input type="checkbox"   onclick="return updateStatusoAgent(' . $AgentData[0]['agentID'] . ',0)" id="switch' . $AgentData[0]['agentID'] . '"><span>
                                                        <label for="switch' . $AgentData[0]['agentID'] . '"></label></span>';
		} else {
			$this->generic->Update('users', array('userID' => $uiserID[0]['userID']), array('userStatus' => 1));
			$this->generic->Update('agents', array('agentID' => $agentID), array('agentStatus' => 1));
			echo 'actived///
		<input type="checkbox"  checked="" onclick="return updateStatusoAgent(' . $AgentData[0]['agentID'] . ',1)" id="switch' . $AgentData[0]['agentID'] . '"><span>
                                                        <label for="switch' . $AgentData[0]['agentID'] . '"></label></span>';
		}
	}
	public function DeleteAgent()
	{
		$userID = $this->generic->GetData('agentUserLink', array('agentID' => $this->uri->segment(2), 'agentType' => 1));
		$this->generic->Delet('agents', array('agentID' => $this->uri->segment(2)));
		$this->generic->Delet('users', array('userID' => $userID[0]['userID']));
		$this->generic->Delet('agentUserLink', array('agentID' => $this->uri->segment(2), 'agentType' => 1));
		$this->generic->Delet('agentDocs', array('agentID' => $this->uri->segment(2)));
		$this->session->set_flashdata('agentDeleted', 1);
		redirect(base_url('view-agent'));
	}
	public function EditAgentview()
	{
		if ($this->session->userdata('loginData')) {
			$this->data['countries'] = $this->generic->GetData('countries', array('country_status' => 1));
			$this->data['agent'] = $this->generic->GetAgentData(array('a.agentID' => $this->uri->segment(2)));
			$this->load->view('users/editAgent',$this->data);
		} else {
			redirect(base_url());
		}
	}
	public function EditAgentData(){
		$data = array(
			'agentName' => $this->input->post('agentName'),
			'agentPhone' => $this->input->post('agentPhone'),
			'agentEmail' => $this->input->post('agentEmail'),
			'agentPosition' => $this->input->post('agentPosition'),
			'companyName' => $this->input->post('cName'),
			'companyAddress' => $this->input->post('cAddress'),
			'companyCountry' => $this->input->post('cCountry'),
			'companyNumber' => $this->input->post('cRegNumber'),
			'companyRegDate' => $this->input->post('cRegDate'),
			'companyPhone' => $this->input->post('cPhone'),
			'companyMobile' => $this->input->post('cMobile'),
			'companyEmail' => $this->input->post('cEmail'),
			'comapnyWebsite' => $this->input->post('cWebsite'),
			'contractInUK' => $this->input->post('relation'),
			'lengthOfRelationship' => $this->input->post('relationWhy'),
			'understandingOfUKVI' => $this->input->post('UKVI'),
			'lastYearStudents' => $this->input->post('noOfStd'),
			'govRecomendation' => $this->input->post('recomendation'),
			'recomentationDetail' => $this->input->post('recomendationDetails'),
			'whyGGOE' => $this->input->post('wish'),
			'marketPlan' => $this->input->post('marketing'),
			'ref1Name' => $this->input->post('ref1name'),
			'ref1Position' => $this->input->post('ref1position'),
			'ref1Email' => $this->input->post('ref1email'),
			'ref1Phone' => $this->input->post('ref1phone'),
			'ref2Name' => $this->input->post('ref2name'),
			'ref2Position' => $this->input->post('ref2position'),
			'ref2Email' => $this->input->post('ref2email'),
			'ref2Phone' => $this->input->post('ref2phone'),
			'addedOn' => date('Y-m-d'),
			'agentStatus' => 1,
			'agnetAddedBy' => $this->session->userdata['loginData']['userID']
		);
		$this->generic->Update('agents',array('agentID'=>$this->uri->segment(2)),$data);
		$userID = $this->generic->GetData('agentUserLink', array('agentID' => $this->uri->segment(2), 'agentType' => 1));
		$userData = array(
			'userName' => $this->input->post('agentName'),
			'userEmail' => $this->input->post('bemail'),
			'userPass' => $this->input->post('bpass'),
			'userPhone' => $this->input->post('agentPhone'),
			
		);
		$this->generic->Update('users',array('userID'=>$userID[0]['userID']),$userData);
		$this->session->set_flashdata('agentupdated', 1);
		redirect(base_url('view-agent'));

	}
}
