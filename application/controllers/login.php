<?php defined('BASEPATH') OR exit('No direct script access allowed');

class login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('SESS_AKUN_IS_LOGIN') && $this->session->userdata('SESS_AKUN_USER_PRIV') === 1) {
			redirect(base_url('akun/dashboard'));
		}
		
		$this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control:post-check=0,pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');

		$this->load->model('m_login');
		
		$this->load->library('Userauth');
		
	}

	public function index()
	{
			$this->load->view('global_login/header_global_login');
        	$this->load->view('v_login');
        	$this->load->view('global_login/footer_global_login');

	}

	public function cek()
	{
		// $username = $this->input->post('username');
		// echo json_encode($username); exit();
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) 
		{
			redirect(base_url('login'));
			
		} else {
			
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$salt = $this->get_id($username);
			
			if ($salt) {

				$hash_password = $this->userauth->hash_password($salt, $password);
			
			}else{
				
				$hash_password = 0;
			}
			
			if ($this->m_login->cek_user($username) > 0) 
			{
				$data = array(
					'username' => $this->input->post('username'),
					'password'	 => $hash_password,
					'hak_akses'	 => 1
				);
					
				$user = $this->m_login->select_user($data);

				if (count($user) > 0) 
				{
				
						if ($user->is_active == 1) 
						{
							$session = array(
								'SESS_AKUN_ID_USER' => $user->id_user,
								'SESS_AKUN_USER_NAME' => $user->username,
								'SESS_AKUN_NAMA_USER' => $user->nama,
								'SESS_AKUN_USER_PRIV' => 1,
								'SESS_AKUN_IS_LOGIN' => TRUE
							);
						
							$this->session->set_userdata( $session );

							redirect('akun/dashboard');
						
						}else {
							$this->session->set_flashdata('username',$this->input->post('username'));
						
							$this->session->set_flashdata('message', 'Akun anda belum diaktivasi. <br> Mohon periksa folder kotak masuk atau folder spam di email anda untuk aktivasi.');
							
							redirect('login');
							}
				} else {
					$this->session->set_flashdata('username',$this->input->post('username'));
						
					$this->session->set_flashdata('message', 'Username atau Password anda salah');

					redirect('login');
					}
			
			}else {
					$this->session->set_flashdata('username',$this->input->post('username'));
						
					$this->session->set_flashdata('message', 'Username atau Password anda tidak terdaftar');
					
					redirect('login');
				}
		}

	}	

	public function get_id($username)
	{
		$salt = $this->m_login->get_id($username);
		return $salt;
		if ($salt) {
			return $salt;
		}else{
			return false;
		}

	}
}

