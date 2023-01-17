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
			if ($this->upload->do_upload('contractCopy')) {

				$image_path = $this->upload->data();
				$loctContractCopy = $image_path['file_name'];
			} else {
				// $this->response = ;
				// die($this->upload->display_errors());
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
	public function DeleteInstituteData(){
		$this->generic->Delet('universities', array('uni_id' => $this->uri->segment(2)));
		$this->session->set_flashdata('uniDeletd', 1);
		redirect(base_url('view-representing-institute'));
	}
	public function EditInstituteview(){
		if ($this->session->userdata('loginData')) {
			$this->data['masterAgent'] = $this->generic->GetData('masterAgent', array('masterAgentStatus' => 1));
			$this->data['repCountries'] = $this->generic->GetRepresenitnCountriesWithCountryName(array('rc.repCountryStatus' => 1));
			$this->data['institute']=$this->generic->GetIntstitutsWithCountries(array('uni.uni_id'=>$this->uri->segment(2)));
			$this->load->view('institute/EditrepresentingInstitute', $this->data);
		} else {
			redirect(base_url());
		}
	}
	public function EditInstituteData(){
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
			if ($this->upload->do_upload('contractCopy')) {

				$image_path = $this->upload->data();
				$loctContractCopy = $image_path['file_name'];
			} else {
				// $this->response = ;
				// die($this->upload->display_errors());
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
		$this->generic->Update('universities',array('uni_id'=>$this->uri->segment(2)), $data);
		$this->session->set_flashdata('uniUpdated', 1);
		redirect(base_url('view-representing-institute'));
	}

//manage courses

public function AddCourse(){
	if ($this->session->userdata('loginData')) {
		$this->data['repCountries']=$this->generic->GetRepresenitnCountriesWithCountryName(array('rc.repCountryStatus'=>1));
		$this->data['courseCat']=$this->generic->GetData('courseCategory');
		$this->load->view('institute/addCourse',$this->data);
	}else{
		redirect(base_url());
	}
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
			$this->data['countries'] = $this->generic->GetData('countries', array('country_status' => 1));
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
