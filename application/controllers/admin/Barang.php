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

	public function tampil_barang_masuk()
	{
	}	

}

/* End of file Barang.php */
/* Location: ./application/controllers/admin/Barang.php */
?>