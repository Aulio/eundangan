<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reset_password extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// if (!$this->session->userdata('SESS_MEMBER_IS_LOGIN') || ($this->session->userdata('SESS_MEMBER_IS_LOGIN') && $this->session->userdata('SESS_MEMBER_USER_PRIV') !== 3)) 
		// {
		// 	redirect(base_url('member/login'));
		// }
		$this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control:post-check=0,pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');

		$this->load->model('m_register');
	}

	public function index()
	{

		$this->load->view('global_home/header_global_home');
		$this->load->view('v_reset_password');
		$this->load->view('global_home/footer_global_home');
	}
}