<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status')!='login') {
			redirect('login','refresh');
		}
		$this->load->model('BarangModel');
		$this->load->library('zend');

	}
// Barang Gudang
	public function barang_masuk()
	{
		$data['barang_masuk'] = $this->BarangModel->barang_masuk();
		$this->load->view('partials/01head');
		$this->load->view('partials/02sidebar');
		$this->load->view('partials/03navbar');
		$this->load->view('waterspider/barang_masuk', $data);
		$this->load->view('partials/05footer');
		$this->load->view('partials/06plugin');
		$this->load->view('services/waterspider/barang_masuk');
	}

	public function validasi_barang_gudang()
	{
		$result['barang_gudang'] = $this->BarangModel->add_pengajuan_barang_keluar();

		if ($result) {
			$response = array(
					'status' => 'sukses',
					'message' => 'Barang Berhasil di Ajukan',
					'redirect' => base_url($this->session->userdata('link').'/Barang/barang_masuk'),
					);
		}else{
			$response = array(
					'status' => 'gagal',
					'message' => 'Barang Gagal di Ajukan',
					'redirect' => base_url($this->session->userdata('link').'/Barang/barang_masuk'),
					);
		}

		echo json_encode($response);

	}	

// Barang Keluar
	public function barang_keluar()
	{
		$data['barang_keluar'] = $this->BarangModel->barang_keluar();
		$this->load->view('partials/01head');
		$this->load->view('partials/02sidebar');
		$this->load->view('partials/03navbar');
		$this->load->view('waterspider/barang_keluar', $data);
		$this->load->view('partials/05footer');
		$this->load->view('partials/06plugin');
		$this->load->view('services/barang_keluar');
	}
}

/* End of file Barang.php */
/* Location: ./application/controllers/admin/Barang.php */
?>