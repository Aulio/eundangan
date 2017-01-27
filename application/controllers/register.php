<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('SESS_AKUN_IS_LOGIN') || ($this->session->userdata('SESS_AKUN_IS_LOGIN') && $this->session->userdata('SESS_AKUN_USER_PRIV') === 1)) 
		{
			redirect(base_url('akun/dashboard'));
		}
		
		$this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control:post-check=0,pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
		
		$this->load->model('m_register');
		
	}

	public function index()
	{

			$this->load->view('global_register/header_global_register');
	        $this->load->view('v_register');
	        $this->load->view('global_register/footer_global_register');
		
	}

	public function form()
	{

		$this->form_validation->set_rules('nama', 'Nama', 'trim|xss_clean');
		$this->form_validation->set_rules('telepon', 'Telepon', 'trim|xss_clean');
		$this->form_validation->set_rules('username', 'Username', 'trim|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean');
		$this->form_validation->set_rules('hak_ases', ' Hak akses', 'trim|xss_clean');
		$this->form_validation->set_rules('jenis_kelamin', ' Hak akses', 'trim|xss_clean');
		
		if ($this->form_validation->run() === FALSE) {

			redirect(base_url('register'));
		
		} else {

			$nama= $this->input->post('nama');
			$jenis_kelamin= $this->input->post('jenis_kelamin');
			$telepon= $this->input->post('telepon');
			$username = $this->input->post('username');
			$password= $this->input->post('password');

			$polausername = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
			$polapassword ="/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{5,}$/";
			$polatelepon ="/^.{6,}$/";
			
			if($this->member_model->member_konflik($username) > 0 || $this->member_model->telepon_konflik($telepon) > 0  || !preg_match($polapassword, $this->input->post('password')) || !preg_match($polausername, $this->input->post('username')) || !preg_match($polatelepon, $this->input->post('telepon'))){
				
				if (!preg_match($polapassword, $this->input->post('password'))) {
					$this->session->set_flashdata('password', 'Password minimal 5 digit dan terdiri dari huruf, angka serta beberapa karakter "!@#$%"');
				}
				if (!preg_match($polausername, $this->input->post('username'))) {
					$this->session->set_flashdata('username_konfirm', 'Email Tidak Valid');
				}
				
				if ($this->member_model->member_konflik($username) > 0) {
					$this->session->set_flashdata('username', 'Email telah terdaftar sebelumnya');
				}
				if (!preg_match($polatelepon, $this->input->post('telepon'))) {
					$this->session->set_flashdata('telepon', 'Nomor telepon minimal terdiri dari 6 karakter');
				}
				if ($this->member_model->telepon_konflik($telepon) > 0) {
					$this->session->set_flashdata('telepon_konfirm', 'Nomor Telepon tersebut sudah digunakan');
				}
				
				$this->session->set_flashdata('NAM',$this->input->post('nama'));
				$this->session->set_flashdata('KELAMIN',$this->input->post('jenis_kelamin'));
				$this->session->set_flashdata('TELEPO',$this->input->post('telepon'));
				$this->session->set_flashdata('USERNAM',$this->input->post('username'));
				$this->session->set_flashdata('PASSWOR',$this->input->post('password'));

				redirect(base_url('register'));

			}else {
					$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

					$data = array(
						'nama' => $nama,
						'jenis_kelamin' => $jenis_kelamin,
						'telepon' => $telepon,
						'username' => $username,
						'password' => $password,
						'hak_akses' => 1,
						'is_active' => 0,
						'notif' => 1,
						'created_at' => $date->format('Y-m-d H:i:s'),
						'is_delete' => 0
						);
				
					$this->session->set_userdata($data);
			
					if ($this->member_model->add($data)) {

						$id = $this->m_register->select_id_user($data)->id_user;
						$data_undangan = array('id_user' => $id
									
									);
						if ($this->m_register->add_register($data_undangan)) {

							$list = $this->m_register->find($id);
							$kode = md5(time());
							$this->m_register->add_verifikasi($id, $kode);

							$subject = 'Aktifasi Member Jadimanten';

				            // Get full html:
				            $body = 'Halo ' . $list->nama_user . ', <br> Terimakasih telah menjadi member Jadimanten. Untuk menyelesaikan proses pendaftaran, mohon verifikasi akun anda. <br>Klik link dibawah ini untuk verifikasi : <br><br> ' . base_url('register/aktivasi_berhasil/' . $kode);
				            $this->load->library('email');
				            $result = $this->email
				                ->from('niscalindo@gmail.com')
				                // ->reply_to('yoursecondemail@somedomain.com')    // Optional, an account where a human being reads.
				                ->to($username)
				                ->subject($subject)
				                ->message($body)
				                ->send();

							$this->session->set_flashdata('indikator_register', 'true');
							$this->session->set_flashdata('message', 'Terimakasih, Registrasi Member Berhasil');

							redirect(base_url('register/aktivasi'));
							}else {

								$this->session->set_flashdata('warning', 'Maaf, Anda Belum Bisa Regristrasi Mohon Isi Data Dengan Benar');

								redirect(base_url('register'));
							}
					} 
			}
		}
	}

	// public function notif()
 //    {
 //    	if(!empty($this->session->flashdata('indikator_register')))
 //    	{
 //        	$this->load->view('notif_register');
 //    	}else{
 //    		redirect(base_url('register'));
 //    	}

 //    }

    public function aktivasi()
	{
		$this->load->view('global_home/header_global_home');
		$this->load->view('v_aktivasi');
		$this->load->view('global_home/footer_global_footer');
	}
	public function aktivasi_error()
	{
		$this->load->view('global_home/header_global_home');
		$this->load->view('v_aktivasi_error');
		$this->load->view('global_home/footer_global_footer');
	}

	public function aktivasi_berhasil($kode = null)
	{
		$this->load->model('m_register');
		if (is_null($kode)) {
				redirect(base_url());
		} else {
			$cekApaAda = $this->m_register->find_aktivasi($kode);

			// var_dump($kode);
			if ($cekApaAda) {
								$id_user = $cekApaAda->id_user;
								// var_dump($id_user);
							

								// update status aktif user jadi 1
								$result = $this->m_register->aktivasi_member($id_user);

								if ($result && $this->m_register->delete_kode($kode)) {
									$this->load->view('global_home/header_global_footer');
									$this->load->view('v_aktivasi_sukses');
									$this->load->view('global_home/footer_global_footer');
								} else {
								 echo 'Gagal';
								}
			}
			else {
				redirect(base_url('register/aktivasi_error'));
			}
		}
	}


	public function reset_password ($kode = null)
	{	
		$this->load->model('m_register');
		if (is_null($kode)) {
				redirect(base_url());
		} else {
			$cekApaAda = $this->m_register->find_reset($kode);

			// var_dump($kode);
			if ($cekApaAda) {
				$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean');
				$this->form_validation->set_rules('konfirm_password', 'Konfirmasi Password', 'trim|xss_clean');

				if ($this->form_validation->run() === FALSE) {
					$data['kode'] = $kode;

					$this->load->view('global_home/header_global_footer');
					$this->load->view('v_ubah_password', $data);
					$this->load->view('global_home/footer_global_footer');
				} else {
					$password= $this->input->post('password');
					$konfirm_password = $this->input->post('konfirm_password');

					$polapassword ="/^.{5,}$/";

					if($this->input->post('password') !== $this->input->post('konfirm_password') || !preg_match($polapassword, $this->input->post('password'))){
						if (!preg_match($polapassword, $this->input->post('password'))) {
							$this->session->set_flashdata('password_konfirm', 'Password minimal terdiri dari 5 karakter');
						}
						if ($this->input->post('password') !== $this->input->post('konfirm_password')) {
							$this->session->set_flashdata('password', 'Password dan konfirmasi password tidak cocok');
						}

						redirect(base_url('register/reset_password/' . $kode));
					}else{

						$data = array(
							'password' => md5($password)
						);
						if ($this->m_register->update_user($cekApaAda->id_user, $data)) {
							// set message berhasil
							$this->session->set_flashdata('message', 'data anda berhasil dimasukkan');

							// arahkan ke list
							redirect(base_url('register/reset_sukses'));
						} else {
							// set message gagal
							$this->session->set_flashdata('message', 'data anda gagal dimasukkan');

							// arahkan ke form untuk diisi kembali
							redirect(base_url('ubah_password'));
						}
					}
				}
			} else {
				echo 'Gagal Ginjal';
			}
		}
	}
	public function reset_sukses()
	{

		$this->load->view('global_home/header_global_footerl');
		$this->load->view('v_reset_sukses');
		$this->load->view('global_home/footer_global_footer');
	}
	
}
