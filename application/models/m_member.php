<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class m_member extends CI_Model 
	{

		var $tabel = 'pengguna'; 

		function get_allimage() {
	        $this->db->from($this->tabel);
	        $query = $this->db->get();
	 
	        if ($query->num_rows() > 0) {
	            return $query->result();
	        }
	    }
	 
	    function get_insert($data, $id_member){
	       $this->db->set('pengguna.picture',$data['picture']);
	       $this->db->set('pengguna.uploaded_at',$data['uploaded_at']);
	       $this->db->set('pengguna.updated_at',$data['updated_at']);
	     	$this->db->where('pengguna.id_user',$id_member);
	       return  $this->db->update('pengguna');
	    }

		public function add($data_member)
		{
			$insert = $this->db->insert('pengguna', $data_member);
			$last_id = $this->db->insert_id();
			if ($insert) {
				$salt = md5($last_id.$data_member['password']);
				$this->db->set('pengguna.password', $salt);
				$this->db->where('pengguna.id_user', $last_id);
				return $this->db->update('pengguna');

			}else{
				return false;
			}
		}

		public function all_member()
		{
			$this->db->where('hak_akses', 2);
			$this->db->where('is_delete', 0);
			$this->db->where('is_active', 1);
			$this->db->order_by('id_user', 'desc');
			return $this->db->get('pengguna')->result();
		}
					

		public function all()
		{
			$this->db->where('hak_akses', 2);
			$this->db->where('is_delete', 0);
			$this->db->order_by('id_user', 'desc');
			return $this->db->get('pengguna')->result();
		}

		public function all_admin()
		{
			$this->db->where('hak_akses', 3);
			$this->db->where('is_delete', 0);
			$this->db->order_by('id_user', 'desc');
			return $this->db->get('pengguna')->result();
		}

		public function all_deleted()
		{
			$this->db->where('hak_akses', 2);
			$this->db->where('is_delete', 1);
			$this->db->order_by('id_user', 'desc');
			return $this->db->get('pengguna')->result();
		}

		public function all_admindeleted()
		{
			$this->db->where('hak_akses', 1);
			$this->db->where('is_delete', 1);
			$this->db->order_by('id_user', 'desc');
			return $this->db->get('pengguna')->result();
		}

		public function pagingmember($num, $offset)
		{
			$this->db->where('hak_akses', 2);
			$this->db->where('is_delete', 0);
			$this->db->order_by('id_user', 'desc');
			$this->db->limit($num, $offset);
			return $this->db->get('pengguna')->result();
		}

		public function pagingmember_deleted($num, $offset)
		{
			$this->db->where('hak_akses', 2);
			$this->db->where('is_delete', 1);
			$this->db->order_by('id_user', 'desc');
			$this->db->limit($num, $offset);
			return $this->db->get('pengguna')->result();
		}

		public function searchmember()
		{
			
			$search = $this->input->POST('key');
			$this->db->like('nama',$search);
			$this->db->where('is_delete', 0);
			$this->db->where('hak_akses', 2);
			$this->db->order_by('id_user', 'desc');
			$query = $this->db->get('pengguna');
			return $query->result(); 
		}

		public function searchmember_deleted()
		{
			
			$search = $this->input->POST('key');
			$this->db->like('nama',$search);
			$this->db->where('is_delete', 1);
			$this->db->where('hak_akses', 2);
			$this->db->order_by('id_user', 'desc');
			$query = $this->db->get('pengguna');
			return $query->result(); 
		}

		public function pagingadmin($num, $offset)
		{
			$this->db->where('hak_akses', 1);
			$this->db->where('is_delete', 0);
			$this->db->order_by('id_user', 'desc');
			$this->db->limit($num, $offset);
			return $this->db->get('pengguna')->result();
		}

		public function pagingadmin_deleted($num, $offset)
		{
			$this->db->where('hak_akses', 1);
			$this->db->where('is_delete', 1);
			$this->db->order_by('id_user', 'desc');
			$this->db->limit($num, $offset);
			return $this->db->get('pengguna')->result();
		}

		public function searchadmin()
		{
			
			$search = $this->input->POST('key');
			$this->db->like('nama',$search);
			$this->db->where('is_delete', 0);
			$this->db->where('hak_akses', 1);
			$this->db->order_by('id_user', 'desc');
			$query = $this->db->get('pengguna');
			return $query->result(); 
		}

		public function searchadmin_deleted()
		{
			
			$search = $this->input->POST('key');
			$this->db->like('nama',$search);
			$this->db->where('is_delete', 1);
			$this->db->where('hak_akses', 1);
			$this->db->order_by('id_user', 'desc');
			$query = $this->db->get('pengguna');
			return $query->result(); 
		}

		public function member_konflik($username)
		{
			$data = "username = '$username'";
			$this->db->where($data);
			return $this->db->get('pengguna')->num_rows();	
		}

		public function telepon_konflik($telepon)
		{
			$data = "telepon = '$telepon'";
			$this->db->where($data);
			return $this->db->get('pengguna')->num_rows();	
		}

		public function find($id_member)
		{
			$this->db->select('pengguna.*');
			$this->db->from('pengguna');
			$where = array('id_user' => $id_member);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}

		public function last_login($id_member, $data)
		{				
			
			return $this->db->update('pengguna', $data, array('id_user' => $id_member));
		}

		public function update($id_member, $data)
		{				
			
			return $this->db->update('pengguna', $data, array('id_user' => $id_member));
		}

		public function update_member($id_member, $data)
		{
			return $this->db->update('pengguna', $data, array('id_user' => $id_member));
		}

		public function delete($id_member, $data)
		{
			return $this->db->update('pengguna', $data, array('id_user' => $id_member));
		}

		public function cek_notif()
		{
			$where = array('notif' => 1);
					$this->db->where('hak_akses', 2);
			$this->db->where($where);
			return $this->db->get('pengguna')->num_rows();
		}

		public function cek_notif_stafadmin()
		{
			$where = array('notif' => 1);
					$this->db->where('hak_akses', 1);
			$this->db->where($where);
			return $this->db->get('pengguna')->num_rows();
		}

		public function delete_notif()
		{	
			$data = array('notif' => 0 );
			$where = array('notif' => 1);
			$this->db->where($where);
			return $this->db->update('pengguna', $data);
		}

		public function get_pass($id_user)
		{	
			$this->db->select('pengguna.password');
			$this->db->from('pengguna');
			$where = array('id_user' => $id_user);
			
			$this->db->where($where);
			$query = $this->db->get();
			foreach($query -> result() as $hasil){
				$password = $hasil->password;
			}
			return $password;
		}

		public function select_name($value)
		{
			
			return $this->db->get('pengguna', array('is_active' => 1), array('is_delete' => 0), array('hak_akses' => 2), array('id_user' => $value ))->row();
		}

		public function select_nip($value)
		{
			
			return $this->db->get('pengguna', array('is_active' => 1), array('is_delete' => 0), array('hak_akses' => 2), array('id_user' => $value ))->row();
		}

		public function select_username($value)
		{
			
			return $this->db->get('pengguna', array('is_active' => 1), array('is_delete' => 0), array('hak_akses' => 2), array('id_user' => $value ))->row();
		}

		
		public function select_user($data)
		{
			$this->db->select('pengguna.*');
			$this->db->from('pengguna');
			$this->db->where($data);
			$query = $this->db->get();
			return $query->row();
		}

		public function history()
		{
			$user = $this->session->userdata('SESS_GURU_ID_USER');
			$this->db->where('is_delete', 0);
			$this->db->where('berkas.id_user',$user);
			$this->db->order_by('uploaded_at', 'desc');
			return $this->db->get('berkas')->result();
		}

	}

?>