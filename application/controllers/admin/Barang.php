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
	}
// Pengajuan Barang Masuk
	public function pengajuan_barang_masuk()
	{
		$data['pengajuan_barang_masuk'] = $this->BarangModel->pengajuan_barang_masuk();
		$this->load->view('partials/01head');
		$this->load->view('partials/02sidebar');
		$this->load->view('partials/03navbar');
		$this->load->view('admin/pengajuan_barang_masuk', $data);
		$this->load->view('partials/05footer');
		$this->load->view('partials/06plugin');
		$this->load->view('services/pengajuan_barang_masuk');
	}

	public function validasi_barang_masuk()
	{
		$data['quantity'] = $this->input->post('quantity');
		$data['kode_barang_masuk'] = $this->input->post('kode_barang');
		$data['created_at'] = date('Y-m-d h:i:sa');
		$data['created_by'] = $this->session->userdata('id');
		$data['status_gudang'] = 1;
		$kode_barang = $this->input->post('kode_barang');
		$jumlah = $this->input->post('quantity');

		$result['barang_gudang'] = $this->BarangModel->add_barang_gudang($data);
		$result['barang_masuk'] = $this->BarangModel->validasi_barang_masuk($kode_barang, $jumlah);

		if ($result) {
			$response = array(
					'status' => 'sukses',
					'message' => 'Barang Berhasil di Validasi',
					'redirect' => base_url($this->session->userdata('link').'/Barang/pengajuan_barang_masuk'),
					);
		}else{
			$response = array(
					'status' => 'gagal',
					'message' => 'Barang Gagal di Validasi',
					'redirect' => base_url($this->session->userdata('link').'/Barang/pengajuan_barang_masuk'),
					);
		}

		echo json_encode($response);

	}	

	public function validasi_barang()
	{
		$kode = $this->uri->segment(4);
		$data['barang']= $this->BarangModel->get_by_kode($kode);
		$this->load->view('admin/validasi_barang', $data);
	}
// Barang Gudang
	public function barang_masuk()
	{
		$data['barang_masuk'] = $this->BarangModel->barang_masuk();
		$this->load->view('partials/01head');
		$this->load->view('partials/02sidebar');
		$this->load->view('partials/03navbar');
		$this->load->view('admin/barang_masuk', $data);
		$this->load->view('partials/05footer');
		$this->load->view('partials/06plugin');
		$this->load->view('services/barang_masuk');
	}

// Pengajuan Barang Keluar
	public function pengajuan_barang_keluar()
	{
		$data['pengajuan_barang_keluar'] = $this->BarangModel->pengajuan_barang_keluar();
		$this->load->view('partials/01head');
		$this->load->view('partials/02sidebar');
		$this->load->view('partials/03navbar');
		$this->load->view('admin/pengajuan_barang_keluar', $data);
		$this->load->view('partials/05footer');
		$this->load->view('partials/06plugin');
		$this->load->view('services/pengajuan_barang_keluar');
	}

	public function validasi_barang_keluar()
	{
		$data['quantity'] = $this->input->post('quantity');
		$data['kode_barang_keluar'] = $this->input->post('kode_barang');
		$data['created_at'] = date('Y-m-d h:i:sa');
		$data['created_by'] = $this->session->userdata('id');
		$kode_barang = $this->input->post('kode_barang');
		$jumlah = $this->input->post('quantity');

		$result['barang_keluar'] = $this->BarangModel->add_barang_keluar($data);
		$result['barang_gudang'] = $this->BarangModel->keluarkan_barang_gudang($kode_barang, $jumlah);

		if ($result) {
			$response = array(
					'status' => 'sukses',
					'message' => 'Barang Berhasil di Keluarkan',
					'redirect' => base_url($this->session->userdata('link').'/Barang/pengajuan_barang_keluar'),
					);
		}else{
			$response = array(
					'status' => 'gagal',
					'message' => 'Barang Gagal di Keluarkan',
					'redirect' => base_url($this->session->userdata('link').'/Barang/pengajuan_barang_keluar'),
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
		$this->load->view('admin/barang_keluar', $data);
		$this->load->view('partials/05footer');
		$this->load->view('partials/06plugin');
		$this->load->view('services/barang_keluar');
	}

}

/* End of file Barang.php */
/* Location: ./application/controllers/admin/Barang.php */
?>