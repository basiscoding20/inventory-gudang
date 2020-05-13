<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status')!='login') {
            redirect('login','refresh');
        }
        $this->load->model('BarangModel');
	}
	
	public function index()
	{
		$this->load->view('partials/01head');
		$this->load->view('partials/02sidebar');
		$this->load->view('partials/03navbar');
		$this->load->view('partials/04content');
		$this->load->view('partials/05footer');
		$this->load->view('partials/06plugin');
		$this->load->view('services/dashboard');
	}

	public function get_jumlah()
	{
		$data['barang_masuk'] = $this->BarangModel->chart_barang_masuk();
		$data['barang_keluar'] = $this->BarangModel->chart_barang_keluar();

		echo json_encode($data);
	}
}
