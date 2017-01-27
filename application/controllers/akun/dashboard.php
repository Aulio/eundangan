<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // if (!$this->session->userdata('SESS_AKUN_IS_LOGIN') || ($this->session->userdata('SESS_AKUN_IS_LOGIN') && $this->session->userdata('SESS_AKUN_USER_PRIV') !== 1)) 
        // {
        
        //     redirect(base_url('login'));
            
        // }
            $this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
            $this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate');
            $this->output->set_header('Cache-Control:post-check=0,pre-check=0',false);
            $this->output->set_header('Pragma: no-cache');

            $this->load->model('m_member');
            
            $this->load->library('Userauth');

    }

    public function index()
    {
        $this->load->view('global_akun/header_global_akun');
        $this->load->view('akun/v_dashboard');
        $this->load->view('global_akun/footer_global_akun');

    }


    public function logout_konfirm($id_member)
    {
        $data['list'] = $this->member_model->find($id_member);

        if ($data['list']) 
        {            
            $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

                $data = array(

                    'last_login' => $date->format('Y-m-d H:i:s')
                );

            if ($this->member_model->last_login($id_member, $data)) 
            {

                $this->session->sess_destroy();

                redirect(base_url('login'));

            } else {
                
                $this->session->set_flashdata('message', 'Anda gagal logout');
                
                redirect(base_url('akun/dashboard'));
            }
           
        } else {
            
                redirect(base_url('login'));
            }
    }

}
