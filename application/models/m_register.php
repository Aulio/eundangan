<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_register extends CI_Model {

	public function add_user($data_undangan)
	{
		return $this->db->insert('user', $data_undangan);
	}

	public function select_id_user($data_undangan)
	{
		$this->db->select('id_user');
		$this->db->where($data_undangan);

		return $this->db->get('user')->row();
	}

	public function add_register($data)
	{
		return $this->db->insert('user', $data);
	}

	public function add_verifikasi($id, $kode)
	{
		$data = array('id_user' => $id,
		 				'kode_konfirmasi' => $kode);
		$this->db->insert('table_verifikasi_user', $data);
	}
	public function reset_pwd($id, $kode)
	{
		$data = array('id_user' => $id,
		 				'kode_konfirmasi' => $kode);
		return $this->db->insert('table_reset_pwd', $data);
	}

	// public function username_konflik($username)
	// {
	// 	$this->db->select('user.email_user');
	// 	$this->db->where('email_user', $username);
	// 	return $this->db->get('user')->num_rows();	
		
	// }
	public function telepon_konflik($no_telepon)
	{
		$data = "no_telepon = '$no_telepon'";
		$this->db->where($data);
		return $this->db->get('view_user')->num_rows();	
	}

	public function email_konflik($email_user)
	{
		$data = "email_user = '$email_user'";
		$this->db->where($data);
		return $this->db->get('view_user')->num_rows();	
		
	}
	public function username_konflik($nama_user)
	{
		$data = "nama_user = '$nama_user'";
		$this->db->where($data);
		return $this->db->get('view_user')->num_rows();	
		
	}

	public function find($id_user)
	{
		$this->db->select('user.id_user, user.id_user, user.nama_user, user.alamat, user.no_telepon, user.tanggal_lahir, user.jenis_kelamin, user.email_user, user.password, user.hak_akses, user.aktif, user.hapus, user.notif');
		$this->db->from('user');
		$this->db->join('user', 'user.id_user = user.id_user');
		$where = array('user.id_user' => $id_user);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->row();
	}

	public function all()
	{
		// $this->db->select('user.id_user, user.nama_user, user.alamat, user.no_telepon, user.tanggal_lahir, user.jenis_kelamin');
		// $this->db->from('user');
		// $this->db->join('user', 'user.id_user = user.id_user');

		// $this->db->select('user.id_user, user.id_user, table_verifikasi_user.id_user, user.nama_user, user.alamat, user.no_telepon, user.tanggal_lahir, user.jenis_kelamin, user.email_user, user.password, user.hak_akses, table_verifikasi_user.status');
		// $this->db->from('user');
		// $this->db->join('user', 'user.id_user = user.id_user');
		// $this->db->join('table_verifikasi_user', 'user.id_user = table_verifikasi_user.id_user');

		// return $this->db->get()->result();
		$this->db->where('hak_akses', 3);
		$this->db->where('hapus', 0);
		$this->db->order_by('id_user', 'desc');
		return $this->db->get('view_user')->result();

		// return $this->db->get('user')->result();
		// return $this->db->get('user')->result();
	}

	public function all_aktif()
	{
		// $this->db->select('user.id_user, user.nama_user, user.alamat, user.no_telepon, user.tanggal_lahir, user.jenis_kelamin');
		// $this->db->from('user');
		// $this->db->join('user', 'user.id_user = user.id_user');

		// $this->db->select('user.id_user, user.id_user, table_verifikasi_user.id_user, user.nama_user, user.alamat, user.no_telepon, user.tanggal_lahir, user.jenis_kelamin, user.email_user, user.password, user.hak_akses, table_verifikasi_user.status');
		// $this->db->from('user');
		// $this->db->join('user', 'user.id_user = user.id_user');
		// $this->db->join('table_verifikasi_user', 'user.id_user = table_verifikasi_user.id_user');

		// return $this->db->get()->result();
		$this->db->where('hak_akses', 3);
		$this->db->where('hapus', 0);
		$this->db->where('aktif', 1);
		$this->db->order_by('id_user', 'desc');
		return $this->db->get('view_user')->result();

		// return $this->db->get('user')->result();
		// return $this->db->get('user')->result();
	}

	public function all_nonaktif()
	{
		// $this->db->select('user.id_user, user.nama_user, user.alamat, user.no_telepon, user.tanggal_lahir, user.jenis_kelamin');
		// $this->db->from('user');
		// $this->db->join('user', 'user.id_user = user.id_user');

		// $this->db->select('user.id_user, user.id_user, table_verifikasi_user.id_user, user.nama_user, user.alamat, user.no_telepon, user.tanggal_lahir, user.jenis_kelamin, user.email_user, user.password, user.hak_akses, table_verifikasi_user.status');
		// $this->db->from('user');
		// $this->db->join('user', 'user.id_user = user.id_user');
		// $this->db->join('table_verifikasi_user', 'user.id_user = table_verifikasi_user.id_user');

		// return $this->db->get()->result();
		$this->db->where('hak_akses', 3);
		$this->db->where('aktif', 0);
		$this->db->or_where('hapus', 1);
		$this->db->order_by('id_user', 'desc');
		return $this->db->get('view_user')->result();

		// return $this->db->get('user')->result();
		// return $this->db->get('user')->result();
	}

	public function paging($num, $offset)
	{
		// $this->db->select('user.id_user, user.nama_user, user.alamat, user.no_telepon, user.tanggal_lahir, user.jenis_kelamin');
		// $this->db->from('user');
		// $this->db->join('user', 'user.id_user = user.id_user');

		// $this->db->select('user.id_user, user.id_user, table_verifikasi_user.id_user, user.nama_user, user.alamat, user.no_telepon, user.tanggal_lahir, user.jenis_kelamin, user.email_user, user.password, user.hak_akses, table_verifikasi_user.status');
		// $this->db->from('user');
		// $this->db->join('user', 'user.id_user = user.id_user');
		// $this->db->join('table_verifikasi_user', 'user.id_user = table_verifikasi_user.id_user');

		// return $this->db->get()->result();
		$this->db->where('hak_akses', 3);
		$this->db->where('hapus', 0);
		$this->db->order_by('id_user', 'desc');
		$this->db->limit($num, $offset);
		return $this->db->get('view_user')->result();

		// return $this->db->get('user')->result();
		// return $this->db->get('user')->result();
	}

	public function paging_aktif($num, $offset)
	{
		// $this->db->select('user.id_user, user.nama_user, user.alamat, user.no_telepon, user.tanggal_lahir, user.jenis_kelamin');
		// $this->db->from('user');
		// $this->db->join('user', 'user.id_user = user.id_user');

		// $this->db->select('user.id_user, user.id_user, table_verifikasi_user.id_user, user.nama_user, user.alamat, user.no_telepon, user.tanggal_lahir, user.jenis_kelamin, user.email_user, user.password, user.hak_akses, table_verifikasi_user.status');
		// $this->db->from('user');
		// $this->db->join('user', 'user.id_user = user.id_user');
		// $this->db->join('table_verifikasi_user', 'user.id_user = table_verifikasi_user.id_user');

		// return $this->db->get()->result();
		$this->db->where('hak_akses', 3);
		$this->db->where('hapus', 0);
		$this->db->where('aktif', 1);
		$this->db->order_by('id_user', 'desc');
		$this->db->limit($num, $offset);
		return $this->db->get('view_user')->result();

		// return $this->db->get('user')->result();
		// return $this->db->get('user')->result();
	}

	public function paging_nonaktif($num, $offset)
	{
		// $this->db->select('user.id_user, user.nama_user, user.alamat, user.no_telepon, user.tanggal_lahir, user.jenis_kelamin');
		// $this->db->from('user');
		// $this->db->join('user', 'user.id_user = user.id_user');

		// $this->db->select('user.id_user, user.id_user, table_verifikasi_user.id_user, user.nama_user, user.alamat, user.no_telepon, user.tanggal_lahir, user.jenis_kelamin, user.email_user, user.password, user.hak_akses, table_verifikasi_user.status');
		// $this->db->from('user');
		// $this->db->join('user', 'user.id_user = user.id_user');
		// $this->db->join('table_verifikasi_user', 'user.id_user = table_verifikasi_user.id_user');

		// return $this->db->get()->result();
		$this->db->where('hak_akses', 3);
		$this->db->where('aktif', 0);
		$this->db->or_where('hapus', 1);
		$this->db->order_by('id_user', 'desc');
		$this->db->limit($num, $offset);
		return $this->db->get('view_user')->result();

		// return $this->db->get('user')->result();
		// return $this->db->get('user')->result();
	}



	public function update($id_user, $data)
	{
		return $this->db->update('user', $data, array('id_user' => $id_user));
	}

	public function update_user($id_user, $data)
	{
		return $this->db->update('user', $data, array('id_user' => $id_user));
	}

	public function delete($id_user)
	{
		return $this->db->update('user', array('hapus' => 1), array('id_user' => $id_user));
	}

	public function search(){
		$this->db->select('user_user.id_user, user_user.nama_user, user_user.email_user, user_user.password, user_user.no_telepon_user, user_user.tanggal_lahir, table_jenis_kelamin.id_jeniskelamin, table_jenis_kelamin.jenis_kelamin');
		$this->db->from('user_user');
		$this->db->join('table_jenis_kelamin', 'user_user.id_jeniskelamin = table_jenis_kelamin.id_jeniskelamin');

		$search = $this->input->POST('key');
		$this->db->like('nama_user',$search);
		$query = $this->db->get();
		return $query->result(); 
	 }
	 public function profile()
	 {
	 	$this->db->where('id_user', $this->session->userdata('SESS_MEMBER_ID_USER'));
	 	return $this->db->get('view_user')->row();
	 }

	 public function find_aktivasi($kode)
	 {
	 	return $this->db->get_where('table_verifikasi_user', array('kode_konfirmasi' => $kode))->row();
	 }

	 public function delete_kode($kode)
	 {
	 	$where = array('kode_konfirmasi' => $kode);
	 	$this->db->where($where);
	 	return $this->db->delete('table_verifikasi_user');
	 }

	public function aktivasi_member($id_user)
	{
		return $this->db->update('user', array('aktif' => 1), array('id_user' => $id_user));
	}
	public function find_reset($kode)
	 {
	 	return $this->db->get_where('table_reset_pwd', array('kode_konfirmasi' => $kode))->row();
	 }
	public function reset_member($id_user)
	{
		return $this->db->update('user', array('aktif' => 1), array('id_user' => $id_user));
	}

	public function select_name($value)
	{
		$where = array('id_user' => $value );
		$this->db->where($where);
		return $this->db->get('user')->row();
	}

	public function cek_notif()
	{
		$where = array('notif' => 1);
		$this->db->where($where);
		return $this->db->get('user')->num_rows();
	}

	public function delete_notif()
	{	
		$data = array('notif' => 0 );
		$where = array('notif' => 1);
		$this->db->where($where);
		return $this->db->update('user', $data);
	}

	public function member_aktif($aktif)
	{
		$where = array('aktif' => $aktif );
		$this->db->where($where);
		return $this->db->get('user')->row();
	}

	public function cek_aktivasi()
	{
		$where = array('aktif' => 1);
		$this->db->where($where);
		return $this->db->get('user')->row();
	}

	public function searchMember($keyword)
	{
		$this->db->order_by('nama_user', 'asc');
		$this->db->like('nama_user', $keyword);
		return $this->db->get('user')->result_array();
	}
	// public function delete_aktivasi()
	// {	
	// 	$data = array('aktivasi' => 0 );
	// 	$where = array('aktivasi' => 1);
	// 	$this->db->where($where);
	// 	return $this->db->update('user', $data);
	// }
}

/* End of file ex_model.php */
/* Location: ./application/modules/laporan/models/ex_model.php */