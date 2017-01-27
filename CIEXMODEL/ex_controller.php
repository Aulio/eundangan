<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ex_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ex_model');
	}

	public function index()
	{
		// ambil semua data
		$data['list'] = $this->ex_model->all();

		// load view
		$this->load->view('path/to/view', $data);
	}

	public function add()
	{
		// bikin rule validation
		$this->form_validation->set_rules('field_yang_di_form', 'Label Field Yang Di Form', 'trim|required|min_length[5]|max_length[12]|xss_clean');

		// cek apakah validation is run
		if ($this->form_validation->run() === FALSE) {
			// tampilkan form
			$this->load->view('path/to/form');
		} else {
			// lakukan logic buat add
			$variabel_bebas = $this->input->post('field_yang_di_form');
			
			// masukkan ke array data untuk di pass ke model agar di masukkan ke database
			$data = array(
				'kolom_yang_ada_di_tabel_database' => $variabel_bebas // kalau lebih dari satu, pisahkan dengan koma (,)
			);

			if ($this->ex_model->add($data)) {
				// set message berhasil
				$this->session->set_flashdata('nama_flash_data', 'Pesan yang akan ditampilkan jika berhasil');

				// arahkan ke list
				redirect(base_url('path_ke_list'));
			} else {
				// set message gagal
				$this->session->set_flashdata('nama_flash_data', 'Pesan yang akan ditampilkan jika gagal');

				// arahkan ke form untuk diisi kembali
				redirect(base_url('path_ke_form'));
			}
		}
	}

	public function detail($id)
	{
		// ambil data dari database yang mempunyai id = $id
		$variabel_bebas = $this->ex_model->find($id);

		// cek terlebih dahulu apakah data tersebut ada atau tidak
		if ($variabel_bebas) {
			// load view
			$this->load->view('path/to/view', $data);
		} else {
			// kalau tidak ada arahkan ke list
			redirect(base_url('path_ke_list'));
		}
	}

	public function update($id)
	{
		// ambil data dari database yang mempunyai id = $id
		$variabel_bebas = $this->ex_model->find($id);

		// cek terlebih dahulu apakah data tersebut ada atau tidak
		if ($variabel_bebas) {
			// bikin rule validation
			$this->form_validation->set_rules('field_yang_di_form', 'Label Field Yang Di Form', 'trim|required|min_length[5]|max_length[12]|xss_clean');

			// cek apakah validation is run
			if ($this->form_validation->run() === FALSE) {
				// ambil data diatas kemudian masukkan ke array untuk di pass ke view
				$data['variabel_yang_di_pass'] = $variabel_bebas;

				// tampilkan form
				$this->load->view('path/to/form/update', $data);
			} else {
				// lakukan logic buat add
				$variabel_bebas = $this->input->post('field_yang_di_form');
				
				// masukkan ke array data untuk di pass ke model agar di masukkan ke database
				$data = array(
					'kolom_yang_ada_di_tabel_database' => $variabel_bebas // kalau lebih dari satu, pisahkan dengan koma (,)
				);

				if ($this->ex_model->update($id, $data)) {
					// set message berhasil
					$this->session->set_flashdata('nama_flash_data', 'Pesan yang akan ditampilkan jika berhasil');

					// arahkan ke list
					redirect(base_url('path_ke_list'));
				} else {
					// set message gagal
					$this->session->set_flashdata('nama_flash_data', 'Pesan yang akan ditampilkan jika gagal');

					// arahkan ke form untuk diisi kembali
					redirect(base_url('path_ke_form'));
				}
			}
		} else {
			// kalau tidak ada arahkan ke list
			redirect(base_url('path_ke_list'));
		}
	}
	public function delete($id)
	{
		// ambil data dari database yang mempunyai id = $id
		$variabel_bebas = $this->ex_model->find($id);
		# $variabel_bebas = 0 / 1. tergantung dari fungsi diatas
		# 0: false, 1:true

		// cek terlebih dahulu apakah data tersebut ada atau tidak
		if ($variabel_bebas) {
			// jika ada datanya maka jalankan blok berikut
			// awal blok
			if ($this->ex_model->delete($id)) {
				// set message berhasil
				$this->session->set_flashdata('nama_flash_data', 'Pesan yang akan ditampilkan jika berhasil');

				redirect(base_url('path_ke_list'));
			} else {
				// set message gagal
				$this->session->set_flashdata('nama_flash_data', 'Pesan yang akan ditampilkan jika gagal');

				// arahkan ke form untuk diisi kembali
				redirect(base_url('path_ke_form'));
			}
			// akhir blok
		} else {
			// kalau tidak ada arahkan ke list
			redirect(base_url('path_ke_list'));
		}
	}
	
}



	/*$data = array(
				'populasi_awal' => $populasi_awal,
				'pakan_stok' =>$pakan_stok,
				'bobot_doc' =>$bobot_doc
			);*/
/* End of file ex_controller.php */
/* Location: ./application/modules/laporan/controllers/ex_controller.php */