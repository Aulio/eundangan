<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once APPPATH."third_party/User_Auth.php";

class Userauth{
  var $CI;
  public function __construct($params = array()){
        $this->CI =& get_instance();
        $this->CI->load->helper('url');
        $this->CI->load->library('session');
        $this->CI->config->item('base_url');
        $this->CI->load->database(); 
        $this->CI->load->model('m_login');      
  }

  	// public function cek_loggedin(){
  	// 	if($this->CI->session->userdata('loggedin')){
  	// 		return TRUE;
  	// 	}else{
  	// 		return FALSE;
  	// 	}
  	// }

	  // public function logout(){
		 //  $this->CI->session->sess_destroy();
	  // }

    public function hash_password($salt,$password){
    	$hash = md5($salt.$password);
    	return $hash;
    }

    public function tesbro(){
    	$lala = "awdad";
    	return $lala;
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