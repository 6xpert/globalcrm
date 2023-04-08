<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Application extends CI_Controller
{
	function __construct()
	{

		parent::__construct();
		$this->load->helper('file');
		$this->load->model('Generic_model', 'generic');
	}


	function AddPersonalDetail()
	{
		if ($this->session->userdata('loginData')) {
			$this->load->view('application/generalInfoStep1');
		} else {
			redirect(base_url());
		}
	}
	function AddPersonalDetailData()
	{
		if ($this->session->userdata('loginData')) {
			$data = array(
				'firstName' => $this->input->post('fname'),
				'lastName' => $this->input->post('lname'),
				'email' => $this->input->post('stdemail'),
				'email' => $this->input->post('stdemail'),
				'mobile' => $this->input->post('stdphone'),
				'DOB' => $this->input->post('dob'),
				'gender' => $this->input->post('gender'),
				'nationality' => $this->input->post('nationality'),
				'birthCountyr' => $this->input->post('birthCountry'),
				'nativeLanguage' => $this->input->post('language'),
				'ppName' => $this->input->post('passportName'),
				'ppCountry' => $this->input->post('passportLocation'),
				'ppNumber' => $this->input->post('passportNo'),
				'ppIssueDate' => $this->input->post('passportIssueDate'),
				'ppExpiryDate' => $this->input->post('passportExpiryDate'),
				'paCountry' => $this->input->post('PACountry'),
				'paAddress1' => $this->input->post('PAAddress1'),
				'paAddress2' => $this->input->post('PAAddress2'),
				'paZIP' => $this->input->post('PAPostCode'),
				'paState' => $this->input->post('PAState'),
				'paCity' => $this->input->post('PACity'),
				'caCountry' => $this->input->post('CACountry'),
				'caAddress1' => $this->input->post('CAAddress1'),
				'caAddress2' => $this->input->post('CAAddress2'),
				'caZIP' => $this->input->post('CAPostCode'),
				'caState' => $this->input->post('CAState'),
				'caCity' => $this->input->post('CACity'),
				'ECName' => $this->input->post('ECName'),
				'ECPhone' => $this->input->post('ECMobile'),
				'ECEmail' => $this->input->post('ECEmail'),
				'ECRelation' => $this->input->post('ECRelationship'),
			);
			$this->generic->InsertData('application', $data);
			$MaxApplicationId = $this->generic->GetMaxID('application', 'appID');
			$this->session->set_flashdata('step1complete', 1);
			redirect(base_url('add-student-education?applicationID=' . $MaxApplicationId[0]['result']));
		} else {
			redirect(base_url());
		}
	}
	public function AddStudentEducation()
	{
		if ($this->session->userdata('loginData')) {
			$this->data['courseLevel'] = $this->generic->GetData('courseLevels', array('courseLevelStatus' => 1));
			$this->data['AcadmicHistory']=$this->generic->GetData('appAcadmicHistory',array('appID'=>$_GET['applicationID']));
			$this->data['appDetail'] = $this->generic->GetData('application', array('appID' => $_GET['applicationID']));
			$this->load->view('application/educationStep2', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function AddDestinationCountry()
	{
		$country = $this->input->post('country');
		$appID = $this->input->post('appId');
		$this->generic->Update('application', array('appID' => $appID), array('destCountry' => $country));
		echo 'Added';
	}
	public function AddAcadmicHistoryData(){
		$data=array(
			'country'=>$this->input->post('AcHistoryCountry'),
			'institution'=>$this->input->post('AcHistoryInst'),
			'course'=>$this->input->post('AcHistoryCourse'),
			'studyLevel'=>$this->input->post('AcHistoryStudyLevel'),
			'startDate'=>$this->input->post('AcHistoryStartDate'),
			'endDate'=>$this->input->post('AcHistoryEndDate'),
			'resultPercentage'=>$this->input->post('AcHistoryPercentage'),
			'resultTotalMarks'=>$this->input->post('AcHistoryTotalMarks'),
			'resultObtainMarks'=>$this->input->post('AcHistoryObtainMarks'),
			'appID'=>$this->uri->segment(2),
		);
		$this->generic->InsertData('appAcadmicHistory',$data);
		$this->session->set_flashdata('acadmicHistoryAdded', 1);
			redirect(base_url('add-student-education?applicationID=' . $this->uri->segment(2)));
	}
}
