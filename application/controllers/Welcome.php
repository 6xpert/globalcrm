<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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
	public function EditRepCountryView(){
		$this->data['countrydata']=$this->generic->GetData('countries',array('country_status'=>1));
		$this->data['repCountrydata']=$this->generic->GetData('representingCountries',array('repCountryID'=>$this->uri->segment(2)));
		$this->load->view('EditrepresentingCountry',$this->data);
	}
	public function EditRepCountryData(){
		$data = array(
			'country_id' => $this->input->post('countryID'),
			'livingCost' => $this->input->post('livingCost'),
			'visaRequirement' => $this->input->post('visaReq'),
			'workDetail' => $this->input->post('partTimeWork'),
			'benefits' => $this->input->post('countryBen')
		);
		$this->generic->Update('representingCountries',array('repCountryID' => $this->uri->segment(2)), $data);
		$this->session->set_flashdata('countryEdited', 1);
		redirect(base_url('view-representing-countries'));
	}
	public function Logout()
	{
		$this->session->unset_userdata('loginData');
		redirect(base_url());
	}
}
