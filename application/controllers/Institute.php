<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Institute extends CI_Controller
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



	public function AddMasterAgent()
	{
		if ($this->session->userdata('loginData')) {
			$this->load->view('institute/add_master_agent');
		} else {
			redirect(base_url());
		}
	}
	public function AddMasterAgentData()
	{
		$data = array(
			'masterAgentName' => $this->input->post('name'),
			'masterAgentEmail' => $this->input->post('email'),
			'masterAgentPhone' => $this->input->post('phone'),
		);
		$this->generic->InsertData('masterAgent', $data);
		$this->session->set_flashdata('masteragentAdded', 1);
		redirect(base_url('add-master-agent'));
	}

	public function ViewMasterAgent()
	{
		if ($this->session->userdata('loginData')) {
			$this->data['masterAgents'] = $this->generic->GetData('masterAgent');
			$this->load->view('institute/master_agent_view', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function MasterAgentInactive()
	{
		$this->generic->Update('masterAgent', array('masterAgentID ' => $this->uri->segment(2)), array('masterAgentStatus' => 0));
		$this->session->set_flashdata('InactiveMArked', 1);
		redirect(base_url('view-master-agent'));
	}
	public function MasterAgentActive()
	{
		$this->generic->Update('masterAgent', array('masterAgentID ' => $this->uri->segment(2)), array('masterAgentStatus' => 1));
		$this->session->set_flashdata('activeMArked', 1);
		redirect(base_url('view-master-agent'));
	}
	public function MasterAgentDelete()
	{
		$this->generic->Delet('masterAgent', array('masterAgentID' => $this->uri->segment(2)));
		$this->session->set_flashdata('agentDeleted', 1);
		redirect(base_url('view-master-agent'));
	}
	public function MasterAgentEditView()
	{
		if ($this->session->userdata('loginData')) {
			$this->data['masterAgent'] = $this->generic->GetData('masterAgent', array('masterAgentID' => $this->uri->segment(2)));
			$this->load->view('institute/edit_master_agent', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function MasterAgentEditData()
	{
		$data = array(
			'masterAgentName' => $this->input->post('name'),
			'masterAgentEmail' => $this->input->post('email'),
			'masterAgentPhone' => $this->input->post('phone'),
		);
		$this->generic->Update('masterAgent', array('masterAgentID' => $this->uri->segment(2)), $data);
		$this->session->set_flashdata('agentUpdated', 1);
		redirect(base_url('view-master-agent'));
	}
	//manage institute

	public function AddRepresentingInstitute()
	{
		if ($this->session->userdata('loginData')) {
			$this->data['masterAgent'] = $this->generic->GetData('masterAgent', array('masterAgentStatus' => 1));
			$this->data['repCountries'] = $this->generic->GetRepresenitnCountriesWithCountryName(array('rc.repCountryStatus' => 1));
			$this->load->view('institute/addrepresentingInstitute', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function AddRepresentingInstituteData()
	{
		//Check agent agaisnt institute type
		if ($this->input->post('inType') == 2) {
			$masterAgentID = $this->input->post('masterAgent');
		} else {
			$masterAgentID = 0;
		}
		//upload Contract Copy

		if ($_FILES['contractCopy']['name'] != '') {
			$config['file_name'] = $this->input->post('instituteName') . '_ContractCopy_' . time();
			$config['upload_path'] = './assets/InContractCopy/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|xls|xlsx|csv|txt|zip|gif';
			$config['max_size'] = '100000000';
			$config['overwrite'] = TRUE;
			$config['remove_spaces'] = TRUE;
			$config['encrypt_name'] = FALSE;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('contractCopy')) {

				$image_path = $this->upload->data();
				$loctContractCopy = $image_path['file_name'];
			} else {
				// $this->response = ;
				die($this->upload->display_errors());
				$this->session->set_flashdata('ErrorUploadContractCOpy', 1);
				redirect(base_url('add-representing-institute'));
			}
		} else {
			$loctContractCopy = '';
		}
		//logo upload
		if ($_FILES['insLogo']['name'] != '') {
			$config_uni_logo['file_name'] = $this->input->post('instituteName') . '_Unilogo_' . time();
			$config_uni_logo['upload_path'] = './assets/uniLogos/';
			$config_uni_logo['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|xls|xlsx|csv|txt|zip|gif';
			$config_uni_logo['max_size'] = '100000000';
			$config_uni_logo['overwrite'] = TRUE;
			$config_uni_logo['remove_spaces'] = TRUE;
			$config_uni_logo['encrypt_name'] = FALSE;
			$this->load->library('upload', $config_uni_logo);
			$this->upload->initialize($config_uni_logo);
			$this->load->library('upload', $config_uni_logo);
			if ($this->upload->do_upload('insLogo')) {

				$image_path = $this->upload->data();
				$loctUniLogo = $image_path['file_name'];
			} else {
				// $this->response = ;
				// die($this->upload->display_errors());
				$this->session->set_flashdata('ErrorUploadUniLogo', 1);
				redirect(base_url('add-representing-institute'));
			}
		} else {
			$loctUniLogo = '';
		}
		//prospectus upload
		if ($_FILES['insProspectus']['name'] != '') {
			$config_uni_prospectus['file_name'] = $this->input->post('instituteProspectus') . '_Unilogo_' . time();
			$config_uni_prospectus['upload_path'] = './assets/uniProspectus/';
			$config_uni_prospectus['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|xls|xlsx|csv|txt|zip|gif';
			$config_uni_prospectus['max_size'] = '100000000';
			$config_uni_prospectus['overwrite'] = TRUE;
			$config_uni_prospectus['remove_spaces'] = TRUE;
			$config_uni_prospectus['encrypt_name'] = FALSE;

			$this->load->library('upload', $config_uni_prospectus);
			$this->upload->initialize($config_uni_prospectus);
			$this->load->library('upload', $config_uni_prospectus);
			if ($this->upload->do_upload('insProspectus')) {

				$image_path = $this->upload->data();
				$loctUniProspectus = $image_path['file_name'];
			} else {
				// $this->response = ;
				die($this->upload->display_errors());
				$this->session->set_flashdata('ErrorUploadUniProspectus', 1);
				redirect(base_url('add-representing-institute'));
			}
		} else {
			$loctUniProspectus = '';
		}

		//data array
		$data = array(
			'uni_name' => $this->input->post('instituteName'),
			'repCountryID' => $this->input->post('repcountryID'),
			'uniType' => $this->input->post('inType'),
			'masterAgentID' => $masterAgentID,
			'uniCampus' => $this->input->post('campus'),
			'uniWebsite' => $this->input->post('website'),
			'monthlyCost' => $this->input->post('monthlyCost'),
			'visaFunds' => $this->input->post('fundsForVisa'),
			'applicationFee' => $this->input->post('appFee'),
			'currency' => $this->input->post('Currency'),
			'contractTerms' => $this->input->post('contractTerms'),
			'contractTermsLong' => $this->input->post('contractTermsLong'),
			'applicationQuality' => $this->input->post('appQuality'),
			'contractCopy' => $loctContractCopy,
			'contractExpiry' => $this->input->post('contractExpiryDate'),
			'IeltsReq' => $this->input->post('ielts'),
			'langRequirement' => $this->input->post('LanguageReq'),
			'uniBenefits' => $this->input->post('insBenefits'),
			'partTimeWork' => $this->input->post('partTimeWork'),
			'scholarshipPolicy' => $this->input->post('scholarshipPolicy'),
			'uniStatusNotes' => $this->input->post('insStatusNotes'),
			'uniLogo' => $loctUniLogo,
			'uniProspactus' => $loctUniProspectus,
			'uniContactPerson' => $this->input->post('contactPersonName'),
			'uniPersonEmail' => $this->input->post('contactPersonEmail'),
			'uniPersonContactNo' => $this->input->post('contactPersonPhone'),
			'uniPersonDesignation' => $this->input->post('contactPersonDesignation'),
			'uniPersonOtherDetail' => $this->input->post('OptionalContactInfo'),
			'uniInvoiceStatus' => $this->input->post('alarmStatus'),
			'uniInvoiceStatus' => $this->input->post('alarmStatus'),
			'uniInvoiceAfterDays' => $this->input->post('AlarmNoOfDays'),
			'uniInvoiceCommisionPolicy' => $this->input->post('commissionAgrement'),
		);
		$this->generic->InsertData('universities', $data);
		$this->session->set_flashdata('uniAdded', 1);
		redirect(base_url('add-representing-institute'));
	}
	public function RepresentingInstitute()
	{
		if ($this->session->userdata('loginData')) {
			if (isset($_GET['Institutesearch'])) {
				$where = $where_institute = array();
				if ($_GET['repcountryID'] != '') {
					$where = array(
						'uni.repCountryID' => $_GET['repcountryID'],
					);
				}

				$where = array_merge($where, $where_institute);
				$this->data['InstituteData'] = $this->generic->GetIntstitutsWithCountries($where, $_GET['instituteName']);
			} else {
				$this->data['InstituteData'] = $this->generic->GetIntstitutsWithCountries(false, false, true);
			}

			$this->data['repCountries'] = $this->generic->GetRepresenitnCountriesWithCountryName(array('rc.repCountryStatus' => 1));

			$this->load->view('institute/representinginstitution', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function RepresentingInstituteStatusUpdate()
	{
		$uniID = $this->input->post('uni_id');
		$cStatus = $this->input->post('curent_status');
		$InstituteData = $this->generic->GetIntstitutsWithCountries(array('uni.uni_id' => $uniID));
		if ($cStatus == 1) {
			$this->generic->Update('universities', array('uni_id' => $uniID), array('uniStatus' => 0));
			echo 'deactiveted///
		<input type="checkbox"   onclick="return updateStatusofUNI(' . $InstituteData[0]['uni_id'] . ',0)" id="switch' . $InstituteData[0]['uni_id'] . '"><span>
                                                        <label for="switch' . $InstituteData[0]['uni_id'] . '"></label></span>';
		} else {
			$this->generic->Update('universities', array('uni_id' => $uniID), array('uniStatus' => 1));
			echo 'actived///
		<input type="checkbox"  checked="" onclick="return updateStatusofUNI(' . $InstituteData[0]['uni_id'] . ',1)" id="switch' . $InstituteData[0]['uni_id'] . '"><span>
                                                        <label for="switch' . $InstituteData[0]['uni_id'] . '"></label></span>';
		}
	}
	public function DeleteInstituteData()
	{
		$this->generic->Delet('universities', array('uni_id' => $this->uri->segment(2)));
		$this->session->set_flashdata('uniDeletd', 1);
		redirect(base_url('view-representing-institute'));
	}
	public function EditInstituteview()
	{
		if ($this->session->userdata('loginData')) {
			$this->data['masterAgent'] = $this->generic->GetData('masterAgent', array('masterAgentStatus' => 1));
			$this->data['repCountries'] = $this->generic->GetRepresenitnCountriesWithCountryName(array('rc.repCountryStatus' => 1));
			$this->data['institute'] = $this->generic->GetIntstitutsWithCountries(array('uni.uni_id' => $this->uri->segment(2)));
			$this->load->view('institute/EditrepresentingInstitute', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function EditInstituteData()
	{
		//Check agent agaisnt institute type
		if ($this->input->post('inType') == 2) {
			$masterAgentID = $this->input->post('masterAgent');
		} else {
			$masterAgentID = 0;
		}
		//get uni detail
		$uniDetail = $this->generic->GetData('universities', array('uni_id' => $this->uri->segment(2)));
		//upload Contract Copy

		if ($_FILES['contractCopy']['name'] != '') {
			$config['file_name'] = $this->input->post('instituteName') . '_ContractCopy_' . time();
			$config['upload_path'] = './assets/InContractCopy/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|xls|xlsx|csv|txt|zip|gif';
			$config['max_size'] = '100000000';
			$config['overwrite'] = TRUE;
			$config['remove_spaces'] = TRUE;
			$config['encrypt_name'] = FALSE;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('contractCopy')) {

				$image_path = $this->upload->data();
				$loctContractCopy = $image_path['file_name'];
			} else {
				// $this->response = ;
				die($this->upload->display_errors());
				$this->session->set_flashdata('ErrorUploadContractCOpy', 1);
				redirect(base_url('edit-institution/' . $this->uri->segment(2)));
			}
		} else {
			$loctContractCopy = $uniDetail[0]['contractCopy'];
		}
		//logo upload
		if ($_FILES['insLogo']['name'] != '') {
			$config_uni_logo['file_name'] = $this->input->post('instituteName') . '_Unilogo_' . time();
			$config_uni_logo['upload_path'] = './assets/uniLogos/';
			$config_uni_logo['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|xls|xlsx|csv|txt|zip|gif';
			$config_uni_logo['max_size'] = '100000000';
			$config_uni_logo['overwrite'] = TRUE;
			$config_uni_logo['remove_spaces'] = TRUE;
			$config_uni_logo['encrypt_name'] = FALSE;
			$this->load->library('upload', $config_uni_logo);
			$this->upload->initialize($config_uni_logo);
			$this->load->library('upload', $config_uni_logo);
			if ($this->upload->do_upload('insLogo')) {

				$image_path = $this->upload->data();
				$loctUniLogo = $image_path['file_name'];
			} else {
				// $this->response = ;
				// die($this->upload->display_errors());
				$this->session->set_flashdata('ErrorUploadUniLogo', 1);
				redirect(base_url('edit-institution/' . $this->uri->segment(2)));
			}
		} else {
			$loctUniLogo = $uniDetail[0]['uniLogo'];
		}
		//prospectus upload
		if ($_FILES['insProspectus']['name'] != '') {
			$config_uni_prospectus['file_name'] = $this->input->post('instituteProspectus') . '_Unilogo_' . time();
			$config_uni_prospectus['upload_path'] = './assets/uniProspectus/';
			$config_uni_prospectus['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|xls|xlsx|csv|txt|zip|gif';
			$config_uni_prospectus['max_size'] = '100000000';
			$config_uni_prospectus['overwrite'] = TRUE;
			$config_uni_prospectus['remove_spaces'] = TRUE;
			$config_uni_prospectus['encrypt_name'] = FALSE;

			$this->load->library('upload', $config_uni_prospectus);
			$this->upload->initialize($config_uni_prospectus);
			$this->load->library('upload', $config_uni_prospectus);
			if ($this->upload->do_upload('insProspectus')) {

				$image_path = $this->upload->data();
				$loctUniProspectus = $image_path['file_name'];
			} else {
				// $this->response = ;
				die($this->upload->display_errors());
				$this->session->set_flashdata('ErrorUploadUniProspectus', 1);
				redirect(base_url('edit-institution/' . $this->uri->segment(2)));
			}
		} else {
			$loctUniProspectus = $uniDetail[0]['uniProspactus'];
		}

		//data array
		$data = array(
			'uni_name' => $this->input->post('instituteName'),
			'repCountryID' => $this->input->post('repcountryID'),
			'uniType' => $this->input->post('inType'),
			'masterAgentID' => $masterAgentID,
			'uniCampus' => $this->input->post('campus'),
			'uniWebsite' => $this->input->post('website'),
			'monthlyCost' => $this->input->post('monthlyCost'),
			'visaFunds' => $this->input->post('fundsForVisa'),
			'applicationFee' => $this->input->post('appFee'),
			'currency' => $this->input->post('Currency'),
			'contractTerms' => $this->input->post('contractTerms'),
			'contractTermsLong' => $this->input->post('contractTermsLong'),
			'applicationQuality' => $this->input->post('appQuality'),

			'contractExpiry' => $this->input->post('contractExpiryDate'),
			'IeltsReq' => $this->input->post('ielts'),
			'langRequirement' => $this->input->post('LanguageReq'),
			'uniBenefits' => $this->input->post('insBenefits'),
			'partTimeWork' => $this->input->post('partTimeWork'),
			'scholarshipPolicy' => $this->input->post('scholarshipPolicy'),
			'uniStatusNotes' => $this->input->post('insStatusNotes'),
			'uniLogo' => $loctUniLogo,
			'uniProspactus' => $loctUniProspectus,
			'uniContactPerson' => $this->input->post('contactPersonName'),
			'uniPersonEmail' => $this->input->post('contactPersonEmail'),
			'uniPersonContactNo' => $this->input->post('contactPersonPhone'),
			'uniPersonDesignation' => $this->input->post('contactPersonDesignation'),
			'uniPersonOtherDetail' => $this->input->post('OptionalContactInfo'),
			'uniInvoiceStatus' => $this->input->post('alarmStatus'),
			'uniInvoiceStatus' => $this->input->post('alarmStatus'),
			'uniInvoiceAfterDays' => $this->input->post('AlarmNoOfDays'),
			'uniInvoiceCommisionPolicy' => $this->input->post('commissionAgrement'),
		);
		$this->generic->Update('universities', array('uni_id' => $this->uri->segment(2)), $data);
		$this->session->set_flashdata('uniUpdated', 1);
		redirect(base_url('view-representing-institute'));
	}

	//manage courses

	public function AddCourse()
	{
		if ($this->session->userdata('loginData')) {
			if ($this->uri->segment(2) != '') {
				$this->data['uni'] = $this->generic->GetData('universities', array('uni_id' => $this->uri->segment(3)));
				$this->data['countries'] = $this->generic->GetData('countries', array('country_id' => $this->data['uni'][0]['repCountryID']));
			}
			$this->data['repCountries'] = $this->generic->GetRepresenitnCountriesWithCountryName(array('rc.repCountryStatus' => 1));
			$this->data['courseCat'] = $this->generic->GetData('courseCategory', array('courseCatStatus' => 1));
			$this->data['CourseLevel'] = $this->generic->GetData('courseLevels', array('courseLevelStatus' => 1));
			$this->load->view('institute/addCourse', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function AddCourseData()
	{
		//upload doc 1 
		if ($_FILES['doc1']['name'] != '') {
			$config_uni_prospectus['file_name'] = $this->input->post('courseTittle') . '_Doc1_' . time();
			$config_uni_prospectus['upload_path'] = './assets/courseDocs/';
			$config_uni_prospectus['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|xls|xlsx|csv|txt|zip|gif';
			$config_uni_prospectus['max_size'] = '100000000';
			$config_uni_prospectus['overwrite'] = TRUE;
			$config_uni_prospectus['remove_spaces'] = TRUE;
			$config_uni_prospectus['encrypt_name'] = FALSE;

			$this->load->library('upload', $config_uni_prospectus);
			$this->upload->initialize($config_uni_prospectus);
			$this->load->library('upload', $config_uni_prospectus);
			if ($this->upload->do_upload('doc1')) {

				$image_path = $this->upload->data();
				$doc1name = $image_path['file_name'];
			} else {
				// $this->response = ;
				// die($this->upload->display_errors());
				$this->session->set_flashdata('ErrorUploadDoc1', 1);
				redirect(base_url('add-new-course'));
			}
		} else {
			$doc1name = '';
		}
		//upload doc 2
		if ($_FILES['doc2']['name'] != '') {
			$config_uni_prospectus['file_name'] = $this->input->post('courseTittle') . '_Doc2_' . time();
			$config_uni_prospectus['upload_path'] = './assets/courseDocs/';
			$config_uni_prospectus['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|xls|xlsx|csv|txt|zip|gif';
			$config_uni_prospectus['max_size'] = '100000000';
			$config_uni_prospectus['overwrite'] = TRUE;
			$config_uni_prospectus['remove_spaces'] = TRUE;
			$config_uni_prospectus['encrypt_name'] = FALSE;

			$this->load->library('upload', $config_uni_prospectus);
			$this->upload->initialize($config_uni_prospectus);
			$this->load->library('upload', $config_uni_prospectus);
			if ($this->upload->do_upload('doc2')) {

				$image_path = $this->upload->data();
				$doc2name = $image_path['file_name'];
			} else {
				// $this->response = ;
				// die($this->upload->display_errors());
				$this->session->set_flashdata('ErrorUploadDoc2', 1);
				redirect(base_url('add-new-course'));
			}
		} else {
			$doc2name = '';
		}
		//upload doc 3 
		if ($_FILES['doc3']['name'] != '') {
			$config_uni_prospectus['file_name'] = $this->input->post('courseTittle') . '_Doc3_' . time();
			$config_uni_prospectus['upload_path'] = './assets/courseDocs/';
			$config_uni_prospectus['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|xls|xlsx|csv|txt|zip|gif';
			$config_uni_prospectus['max_size'] = '100000000';
			$config_uni_prospectus['overwrite'] = TRUE;
			$config_uni_prospectus['remove_spaces'] = TRUE;
			$config_uni_prospectus['encrypt_name'] = FALSE;

			$this->load->library('upload', $config_uni_prospectus);
			$this->upload->initialize($config_uni_prospectus);
			$this->load->library('upload', $config_uni_prospectus);
			if ($this->upload->do_upload('doc3')) {

				$image_path = $this->upload->data();
				$doc3name = $image_path['file_name'];
			} else {
				// $this->response = ;
				// die($this->upload->display_errors());
				$this->session->set_flashdata('ErrorUploadDoc3', 1);
				redirect(base_url('add-new-course'));
			}
		} else {
			$doc3name = '';
		}
		//getting uni id
		if ($this->uri->segment(2) == '') {
			// die('sdfsd');
			$uniIDfainal = $this->input->post('uniID');
		} else {
			$uniIDfainal = $this->input->post('uniIDHidden');
		}
		$data = array(
			'CourseName' => $this->input->post('courseTittle'),
			'uni_id' => $uniIDfainal,
			'courseCatID' => $this->input->post('courseCat'),
			'courseLevelID' => $this->input->post('courseLevel'),
			'durationYears' => $this->input->post('durationYear'),
			'durationMonths' => $this->input->post('durationMonth'),
			'durationWeeks' => $this->input->post('durationWeek'),
			'awardingBody' => $this->input->post('awardingBody'),
			'courseFee' => $this->input->post('courseFee'),
			'courseApplicationFee' => $this->input->post('appFee'),
			'coursePartTime' => $this->input->post('partTimeWork'),
			'courseBenefits' => $this->input->post('courseBenefits'),
			'generalEligibility' => $this->input->post('eligibility'),
			'courseIelts' => $this->input->post('ielts'),
			'courseLanguageReq' => $this->input->post('LanguageReq'),
			'courseAdditionalInfo' => $this->input->post('aditionalInfo'),
			'doc1Desc' => $this->input->post('doc1desc'),
			'doc2Desc' => $this->input->post('doc2desc'),
			'doc3Desc' => $this->input->post('doc3desc'),
			'courseDoc1' => $doc1name,
			'courseDoc2' => $doc2name,
			'courseDoc3' => $doc3name,

		);
		$this->generic->InsertData('courses', $data);
		$maxCourceId = $this->generic->GetMaxID('courses', 'courseID');

		//add intakes
		if ($this->input->post('jan')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $maxCourceId[0]['result'], 'courseIntakeMonth' => 'January'));
		}
		if ($this->input->post('feb')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $maxCourceId[0]['result'], 'courseIntakeMonth' => 'February'));
		}
		if ($this->input->post('march')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $maxCourceId[0]['result'], 'courseIntakeMonth' => 'March'));
		}
		if ($this->input->post('april')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $maxCourceId[0]['result'], 'courseIntakeMonth' => 'April'));
		}
		if ($this->input->post('may')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $maxCourceId[0]['result'], 'courseIntakeMonth' => 'May'));
		}
		if ($this->input->post('june')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $maxCourceId[0]['result'], 'courseIntakeMonth' => 'June'));
		}
		if ($this->input->post('july')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $maxCourceId[0]['result'], 'courseIntakeMonth' => 'July'));
		}
		if ($this->input->post('aug')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $maxCourceId[0]['result'], 'courseIntakeMonth' => 'Augest'));
		}
		if ($this->input->post('sep')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $maxCourceId[0]['result'], 'courseIntakeMonth' => 'September'));
		}
		if ($this->input->post('oct')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $maxCourceId[0]['result'], 'courseIntakeMonth' => 'Octuber'));
		}
		if ($this->input->post('nov')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $maxCourceId[0]['result'], 'courseIntakeMonth' => 'November'));
		}
		if ($this->input->post('dec')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $maxCourceId[0]['result'], 'courseIntakeMonth' => 'December'));
		}
		$this->session->set_flashdata('uploaded', 1);
		redirect(base_url('add-new-course'));
	}
	public function getUnviersityAjax()
	{
		$unis = $this->generic->GetUniversitiesInSortedForm('universities', array('repCountryID' => $this->input->post('country_id')));
		$opt = '<option value="">Select Universities</option>';
		if ($unis) {
			$opt = '<option value="">Select Universities</option>';
			foreach ($unis as $row) {
				$opt = $opt . '<option value="' . $row['uni_id'] . '">' . $row['uni_name'] . '</option>';
			}
		} else {
			$opt = '<option value="">No Record Found</option>';
		}
		echo $opt;
	}
	public function getCourceAjax()
	{
		$unis = $this->generic->GetData('courses', array('uni_id' => $this->input->post('institute')));
		$opt = '<option value="">Select Universities</option>';
		if ($unis) {
			$opt = '<option value="">Select Course</option>';
			foreach ($unis as $row) {
				$opt = $opt . '<option value="' . $row['courseID'] . '">' . $row['CourseName'] . '</option>';
			}
		} else {
			$opt = '<option value="">No Record Found</option>';
		}
		echo $opt;
	}
	public function getCourceIntakeAjax()
	{
		$unis = $this->generic->GetData('courseIntake', array('courseID' => $this->input->post('courseid')));
		$opt = '<option value="">Select Course Intake</option>';
		if ($unis) {
			$opt = '<option value="">Select Course</option>';
			foreach ($unis as $row) {
				$opt = $opt . '<option value="' . $row['courseIntakeID'] . '">' . $row['courseIntakeMonth'] . '</option>';
			}
		} else {
			$opt = '<option value="">No Record Found</option>';
		}
		echo $opt;
	}
	public function ViewCourses()
	{
		if ($this->session->userdata('loginData')) {


			$this->data['courses'] = '';
			if (isset($_GET['courseSearch'])) {
				$where_country = $where_institute = '';
				if ($_GET['repcountryID'] != '') {
					$where_country = array(
						'con.country_id' => $_GET['repcountryID'],
					);
				}
				if ($_GET['institutions'] != '') {
					$where_institute = array(
						'co.uni_id' => $_GET['institutions'],
					);
				}
				$fainalWhere = array_merge($where_country, $where_institute);
				$this->data['repInstitute'] = $this->generic->GetData('universities', array('repCountryID' => $_GET['repcountryID']));
				$this->data['courses'] = $this->generic->GetAllCourses($fainalWhere, true, $_GET['instituteName']);
			}
			// else{
			// 	$this->data['courses']=$this->generic->GetAllCourses();
			// }
			$this->data['repCountries'] = $this->generic->GetRepresenitnCountriesWithCountryName(array('rc.repCountryStatus' => 1));
			$this->load->view('institute/viewCourses', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function UpdateCourseStatus()
	{
		$uniID = $this->input->post('courseID');
		$cStatus = $this->input->post('curent_status');

		$InstituteData = $this->generic->GetAllCourses(array('co.courseID' => $uniID));
		if ($cStatus == 1) {
			$this->generic->Update('courses', array('courseID' => $uniID), array('courseStatus' => 0));
			echo 'deactiveted///
		<input type="checkbox"   onclick="return updateStatusofcource(' . $InstituteData[0]['courseID'] . ',0)" id="switch' . $InstituteData[0]['courseID'] . '"><span>
                                                        <label for="switch' . $InstituteData[0]['courseID'] . '"></label></span>';
		} else {
			$this->generic->Update('courses', array('courseID' => $uniID), array('courseStatus' => 1));
			echo 'actived///
		<input type="checkbox"  checked="" onclick="return updateStatusofcource(' . $InstituteData[0]['courseID'] . ',1)" id="switch' . $InstituteData[0]['courseID'] . '"><span>
                                                        <label for="switch' . $InstituteData[0]['courseID'] . '"></label></span>';
		}
	}
	public function DeleteCourse()
	{
		$this->generic->Delet('courses', array('courseID' => $this->uri->segment(2)));
		$this->session->set_flashdata('courseDeleted', 1);
		redirect(base_url('view-courses'));
	}
	public function EditCourse()
	{
		$this->data['course'] = $this->generic->GetData('courses', array('courseID' => $this->uri->segment(2)));
		$this->data['repCountries'] = $this->generic->GetRepresenitnCountriesWithCountryName(array('rc.repCountryStatus' => 1));
		$this->data['courseCat'] = $this->generic->GetData('courseCategory', array('courseCatStatus' => 1));
		$this->data['CourseLevel'] = $this->generic->GetData('courseLevels', array('courseLevelStatus' => 1));
		$this->data['uniDetail'] = $this->generic->GetData('universities', array('uni_id' => $this->data['course'][0]['uni_id']));
		$this->data['Intake'] = $this->generic->GetData('courseIntake', array('courseID' => $this->uri->segment(2)));
		$this->data['alluni'] = $this->generic->GetData('universities', array('repCountryID' => $this->data['uniDetail'][0]['repCountryID']));
		$this->load->view('institute/EditCourse', $this->data);
	}
	public function EditCourseData()
	{
		$courseDetail = $this->generic->GetData('courses', array('courseID' => $this->uri->segment(2)));
		//upload doc 1 
		if ($_FILES['doc1']['name'] != '') {
			$config_uni_prospectus['file_name'] = $this->input->post('courseTittle') . '_Doc1_' . time();
			$config_uni_prospectus['upload_path'] = './assets/courseDocs/';
			$config_uni_prospectus['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|xls|xlsx|csv|txt|zip|gif';
			$config_uni_prospectus['max_size'] = '100000000';
			$config_uni_prospectus['overwrite'] = TRUE;
			$config_uni_prospectus['remove_spaces'] = TRUE;
			$config_uni_prospectus['encrypt_name'] = FALSE;

			$this->load->library('upload', $config_uni_prospectus);
			$this->upload->initialize($config_uni_prospectus);
			$this->load->library('upload', $config_uni_prospectus);
			if ($this->upload->do_upload('doc1')) {

				$image_path = $this->upload->data();
				$doc1name = $image_path['file_name'];
			} else {
				// $this->response = ;
				// die($this->upload->display_errors());
				$this->session->set_flashdata('ErrorUploadDoc1', 1);
				redirect(base_url('add-new-course'));
			}
		} else {
			$doc1name = $courseDetail[0]['courseDoc1'];
		}
		//upload doc 2
		if ($_FILES['doc2']['name'] != '') {
			$config_uni_prospectus['file_name'] = $this->input->post('courseTittle') . '_Doc2_' . time();
			$config_uni_prospectus['upload_path'] = './assets/courseDocs/';
			$config_uni_prospectus['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|xls|xlsx|csv|txt|zip|gif';
			$config_uni_prospectus['max_size'] = '100000000';
			$config_uni_prospectus['overwrite'] = TRUE;
			$config_uni_prospectus['remove_spaces'] = TRUE;
			$config_uni_prospectus['encrypt_name'] = FALSE;

			$this->load->library('upload', $config_uni_prospectus);
			$this->upload->initialize($config_uni_prospectus);
			$this->load->library('upload', $config_uni_prospectus);
			if ($this->upload->do_upload('doc2')) {

				$image_path = $this->upload->data();
				$doc2name = $image_path['file_name'];
			} else {
				// $this->response = ;
				// die($this->upload->display_errors());
				$this->session->set_flashdata('ErrorUploadDoc2', 1);
				redirect(base_url('add-new-course'));
			}
		} else {
			$doc2name = $courseDetail[0]['courseDoc2'];
		}
		//upload doc 3 
		if ($_FILES['doc3']['name'] != '') {
			$config_uni_prospectus['file_name'] = $this->input->post('courseTittle') . '_Doc3_' . time();
			$config_uni_prospectus['upload_path'] = './assets/courseDocs/';
			$config_uni_prospectus['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|xls|xlsx|csv|txt|zip|gif';
			$config_uni_prospectus['max_size'] = '100000000';
			$config_uni_prospectus['overwrite'] = TRUE;
			$config_uni_prospectus['remove_spaces'] = TRUE;
			$config_uni_prospectus['encrypt_name'] = FALSE;

			$this->load->library('upload', $config_uni_prospectus);
			$this->upload->initialize($config_uni_prospectus);
			$this->load->library('upload', $config_uni_prospectus);
			if ($this->upload->do_upload('doc3')) {

				$image_path = $this->upload->data();
				$doc3name = $image_path['file_name'];
			} else {
				// $this->response = ;
				// die($this->upload->display_errors());
				$this->session->set_flashdata('ErrorUploadDoc3', 1);
				redirect(base_url('add-new-course'));
			}
		} else {
			$doc3name = $courseDetail[0]['courseDoc3'];
		}

		$data = array(
			'CourseName' => $this->input->post('courseTittle'),
			'uni_id' => $this->input->post('uniID'),
			'courseCatID' => $this->input->post('courseCat'),
			'courseLevelID' => $this->input->post('courseLevel'),
			'durationYears' => $this->input->post('durationYear'),
			'durationMonths' => $this->input->post('durationMonth'),
			'durationWeeks' => $this->input->post('durationWeek'),
			'awardingBody' => $this->input->post('awardingBody'),
			'courseFee' => $this->input->post('courseFee'),
			'courseApplicationFee' => $this->input->post('appFee'),
			'coursePartTime' => $this->input->post('partTimeWork'),
			'courseBenefits' => $this->input->post('courseBenefits'),
			'generalEligibility' => $this->input->post('eligibility'),
			'courseIelts' => $this->input->post('ielts'),
			'courseLanguageReq' => $this->input->post('LanguageReq'),
			'courseAdditionalInfo' => $this->input->post('aditionalInfo'),
			'doc1Desc' => $this->input->post('doc1desc'),
			'doc2Desc' => $this->input->post('doc2desc'),
			'doc3Desc' => $this->input->post('doc3desc'),
			'courseDoc1' => $doc1name,
			'courseDoc2' => $doc2name,
			'courseDoc3' => $doc3name,

		);
		$this->generic->Update('courses', array('courseID' => $this->uri->segment(2)), $data);
		$this->generic->Delet('courseIntake', array('courseID' => $this->uri->segment(2)));

		//add intakes
		if ($this->input->post('jan')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $this->uri->segment(2), 'courseIntakeMonth' => 'January'));
		}
		if ($this->input->post('feb')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $this->uri->segment(2), 'courseIntakeMonth' => 'February'));
		}
		if ($this->input->post('march')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $this->uri->segment(2), 'courseIntakeMonth' => 'March'));
		}
		if ($this->input->post('april')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $this->uri->segment(2), 'courseIntakeMonth' => 'April'));
		}
		if ($this->input->post('may')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $this->uri->segment(2), 'courseIntakeMonth' => 'May'));
		}
		if ($this->input->post('june')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $this->uri->segment(2), 'courseIntakeMonth' => 'June'));
		}
		if ($this->input->post('july')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $this->uri->segment(2), 'courseIntakeMonth' => 'July'));
		}
		if ($this->input->post('aug')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $this->uri->segment(2), 'courseIntakeMonth' => 'Augest'));
		}
		if ($this->input->post('sep')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $this->uri->segment(2), 'courseIntakeMonth' => 'September'));
		}
		if ($this->input->post('oct')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $this->uri->segment(2), 'courseIntakeMonth' => 'Octuber'));
		}
		if ($this->input->post('nov')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $this->uri->segment(2), 'courseIntakeMonth' => 'November'));
		}
		if ($this->input->post('dec')) {
			$this->generic->InsertData('courseIntake', array('courseID' => $this->uri->segment(2), 'courseIntakeMonth' => 'December'));
		}
		$this->session->set_flashdata('edited', 1);
		redirect(base_url('view-courses'));
	}
	public function ManageCategory()
	{
		$this->data['categories'] = $this->generic->GetData('courseCategory');
		$this->load->view('institute/manageCategory', $this->data);
	}
	public function AddCourseCategory(){
		$this->generic->InsertData('courseCategory',array('courseCat'=>$this->input->post('cat')));
		$this->session->set_flashdata('added', 1);
		redirect(base_url('manage-category'));
	}
	public function CourseDelte(){
		$this->generic->Delet('courseCategory',array('courseCatID'=>$this->uri->segment(2)));
		$this->session->set_flashdata('deleted', 1);
		redirect(base_url('manage-category'));
	}
	public function CourseEditView(){
		$this->data['cat']=$this->generic->GetData('courseCategory',array('courseCatID'=>$this->uri->segment(2)));
		$this->load->view('institute/editCategory',$this->data);
	}
	public function CourseEditData(){
		$this->generic->Update('courseCategory',array('courseCatID'=>$this->uri->segment(2)),array('courseCat'=>$this->input->post('cat')));
		$this->session->set_flashdata('edited', 1);
		redirect(base_url('manage-category'));
	}
	//manage course levels
	public function CourseLevels(){
		$this->data['level'] = $this->generic->GetData('courseLevels');
		$this->load->view('institute/manageLevels', $this->data);
	}
	public function CourseLevelsAddData(){
		$this->generic->InsertData('courseLevels',array('courseLevel'=>$this->input->post('level')));
		$this->session->set_flashdata('added', 1);
		redirect(base_url('manage-course-levels'));
	}
	public function CourseLevelDelet(){
		$this->generic->Delet('courseLevels',array('courseLevelID'=>$this->uri->segment(2)));
		$this->session->set_flashdata('deleted', 1);
		redirect(base_url('manage-course-levels'));
	}
	public function CourseLevelEditView(){
		$this->data['level'] = $this->generic->GetData('courseLevels',array('courseLevelID'=>$this->uri->segment(2)));
		$this->load->view('institute/EditCourseLevel',$this->data);
	}
	public function CourseLevelEditData(){
		$this->generic->Update('courseLevels',array('courseLevelID'=>$this->uri->segment(2)),array('courseLevel'=>$this->input->post('level')));
		$this->session->set_flashdata('edited', 1);
		redirect(base_url('manage-course-levels'));
	}
}
