<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class m_login extends CI_Model 
	{

		public function cek_user($data) 
		{
			$this->db->select('user.*');
			$this->db->from('user');
			$this->db->where('user.username', $data);
			$query = $this->db->get();
			return $query->num_rows();
		}

		public function select_user($data)
		{
			$this->db->select('user.*');
			$this->db->from('user');
			$this->db->where($data);
			$query = $this->db->get();
			return $query->row();
		}

		

		public function get_id($username)
		{
			$this->db->select('id_user');
			$this->db->from('user');
			$this->db->where('username', $username);
			$query = $this->db->get();
			$hasil = $query->num_rows();
			if ($hasil = 1) {
				foreach($query->result() as $hasil ){
					$id_user = $hasil->id_user;
				}
			}else{
				$id_user = false;
			}

				return $id_user;

		}

		public function update($id, $data)
		{
			return $this->db->update('user', $data, array('id_user' => $id));
		}

	}

?>