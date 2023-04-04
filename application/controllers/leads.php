<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leads extends CI_Controller
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
			'leadStatus' => 2,
		);
		if ($this->session->userdata['loginData']['accessRole'] != 1) {
			if ($this->session->userdata['loginData']['accessRole'] == 2) {
				$leadsdata['parentUserID'] = $this->session->userdata['loginData']['userID'];
			} else if ($this->session->userdata['loginData']['accessRole'] == 3) {
				if ($this->session->userdata['loginData']['userType'] == 3) {
					$parentID = $this->generic->GetData('branchStaffUserLink', array('userID' => $this->session->userdata['loginData']['userID']));
					$leadsdata['parentUserID'] = $parentID[0]['branchID'];
				} else if ($this->session->userdata['loginData']['userType'] == 6) {
					$parentID = $this->generic->GetData('agentUserLink', array('userID' => $this->session->userdata['loginData']['userID']));
					$leadsdata['parentUserID'] = $parentID[0]['agentID'];
				} else if ($this->session->userdata['loginData']['userType'] == 7) {
					$parentID = $this->generic->GetData('users', array('userType' => 1));
					$leadsdata['parentUserID'] = $parentID[0]['userID'];
				}
			}
		} else {
			$leadsdata['parentUserID'] = $this->session->userdata['loginData']['userID'];
		}
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
			if ($this->session->userdata['loginData']['accessRole'] == 1) {
				if (isset($_GET['leadSearch'])) {
					if ($_GET['leadSource'] != '') {
						$where = array(
							'l.sourceID' => $_GET['leadSource'],
						);
					}
					if ($_GET['leadStatusSearch'] != 0) {
						$where['l.leadStatus'] = $_GET['leadStatusSearch'];
					} else {
						$where['l.leadStatus!='] = 0;
					}
					$like = array(
						'l.stdName' => $_GET['stdName'],
					);
					$this->data['leads'] = $this->generic->GetLeadInfo($where, $like);
				} else {
					$this->data['leads'] = $this->generic->GetLeadInfo();
				}

				$this->data['staff'] = $this->generic->GetData('users', array('userType' => 7));
			} else if ($this->session->userdata['loginData']['accessRole'] == 2) {
				if ($this->session->userdata['loginData']['userType'] == 2) {
					// $this->data['staff'] = $this->generic->GetData('users', array('userType' => 7));
				} else if ($this->session->userdata['loginData']['userType'] == 5) {
				}
			}
			$this->data['leadSource'] = $this->generic->GetData('leadSource', array('sourceStatus' => 1));
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
	public function UpdateLeadStatus()
	{
		if ($this->uri->segment(3) == 1) {
			$leadDetail = $this->generic->GetLeadInfo(array('leadID' => $this->uri->segment(2)));
			$nameArray = explode(' ', $leadDetail[0]['stdName'], 2);
			

			$applicationData = array(
				'email' => $leadDetail[0]['stdEmail'],
				'mobile' => $leadDetail[0]['stdPhone'],
				'DOB' => $leadDetail[0]['stdDOB'],
				'ppName' => $leadDetail[0]['FatherName'],
				'ppName' => $leadDetail[0]['FatherName'],
			);
			// var_dump($nameArray[0]);
			// die;
			if ($nameArray) {
				if ($nameArray[0] != '') {
					$applicationData['firstName'] = $nameArray[0];
				}
				if ($nameArray[1] != '') {
					$applicationData['lastName'] = $nameArray[1];
				}
			} else {
				$applicationData['firstName'] = $leadDetail[0]['stdName'];
			}
			$this->generic->InsertData('application', $applicationData);
			$maxAppID = $this->generic->GetMaxID('application', 'appID');
			//application lead link data
			$ApplicationLinkData = array(
				'leadID' => $leadDetail[0]['leadID'],
				'appID' => $maxAppID[0]['result'],
			);
			$this->generic->InsertData('leadApplicationLink', $ApplicationLinkData);
			//update application id in the courses list
			$this->generic->Update('leadSelectedCourses',array('leadID'=>$leadDetail[0]['leadID'],array('appID'=>$maxAppID[0]['result'])));
		}
		$this->generic->Update('leads', array('leadID' => $this->uri->segment(2)), array('leadStatus' => $this->uri->segment(3)));
		$this->session->set_flashdata('LeadStatusupdated', 1);
		redirect(base_url('view-leads'));
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
}
