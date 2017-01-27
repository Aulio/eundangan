<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ex_model extends CI_Model {

	public function create($data)
	{
		return $this->db->insert('nama_tabel', $data);
	}

	public function find($id)
	{
		return  $this->db->get_where('nama_tabel', array('id' => $id))->row();
	}

	public function all()
	{
		return $this->db->get('nama_tabel')->result();
	}

	public function update($id, $data)
	{
		return $this->db->update('nama_tabel', $data, array('id' => $id));
	}

	public function delete($id)
	{
		return $this->db->delete('nama_tabel', array('id' => $id));
	}
}

/* End of file ex_model.php */
/* Location: ./application/modules/laporan/models/ex_model.php */