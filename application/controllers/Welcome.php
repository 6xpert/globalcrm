<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
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
	public function LoginData(){
		$email=$this->input->post('username');
		$pass=$this->input->post('password');
		$user_info=$this->generic->LoginData($email, $pass);
		//inicializing session
		if($user_info){
			$this->session->set_userdata('loginData',$user_info[0]);
			$this->session->set_flashdata('logedin',1);
			redirect(base_url('dashboard'));
		}else{
			$this->session->set_flashdata('error_msg', 1);
			redirect(base_url());
		
		}
	}
	public function Dashboard(){
		$this->load->view('dashboard');
	}
}
