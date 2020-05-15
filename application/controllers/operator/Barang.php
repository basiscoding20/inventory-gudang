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
		$this->load->view('operator/pengajuan_barang_masuk', $data);
		$this->load->view('partials/05footer');
		$this->load->view('partials/06plugin');
		$this->load->view('services/operator/pengajuan_barang_masuk');
	}

	public function get_kode_barang()
	{
		$data = $this->BarangModel->get_kode_barang();
		echo json_encode($data);
	}

	public function add_barang()
	{
		$kode_barang = $this->input->post('kode_barang');
		$data['kode_barang'] = $this->input->post('kode_barang');
		$data['nama_barang'] = $this->input->post('nama_barang');
		$data['quantity'] = $this->input->post('quantity');
		$data['size'] = $this->input->post('size');
		$data['created_at'] = date('Y-m-d H:i:sa');
		$data['created_by'] = $this->session->userdata('id');
		$data['status'] = 0;

		$this->load->library('ciqrcode'); //pemanggilan library QR CODE

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/img/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/img/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/img/barcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $data['barcode']=$kode_barang.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = base_url('admin/Barang/validasi_masuk/'.$kode_barang); //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$data['barcode']; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		$result = $this->BarangModel->add_barang_masuk($data);

		if ($result) {
			$response = array(
					'status' => 'sukses',
					'message' => 'Barang Berhasil di Tambah',
					'redirect' => base_url($this->session->userdata('link').'/Barang/pengajuan_barang_masuk'),
					);
		}else{
			$response = array(
					'status' => 'gagal',
					'message' => 'Barang Gagal di Tambah',
					'redirect' => base_url($this->session->userdata('link').'/Barang/pengajuan_barang_masuk'),
					);
		}

		echo json_encode($response);
	}

	public function edit_barang()
	{
		$kode = $this->input->post('kode_barang');
		$data['nama_barang'] = $this->input->post('nama_barang');
		$data['quantity'] = $this->input->post('quantity');
		$data['size'] = $this->input->post('size');
		$data['created_at'] = date('Y-m-d H:i:sa');
		$data['created_by'] = $this->session->userdata('id');

		$result = $this->BarangModel->edit_barang_masuk($kode, $data);

		if ($result) {
			$response = array(
					'status' => 'sukses',
					'message' => 'Barang Berhasil di Ubah',
					'redirect' => base_url($this->session->userdata('link').'/Barang/pengajuan_barang_masuk'),
					);
		}else{
			$response = array(
					'status' => 'gagal',
					'message' => 'Barang Gagal di Ubah',
					'redirect' => base_url($this->session->userdata('link').'/Barang/pengajuan_barang_masuk'),
					);
		}

		echo json_encode($response);
	}

	public function cetak_barang()
	{
		ob_start();
	    $data['kode_barang'] = $this->input->post('kode_barang');
	    $data['nama_barang'] = $this->input->post('nama_barang');
	    $data['quantity'] = $this->input->post('quantity');
	    $data['size'] = $this->input->post('size');
	    $data['created_at'] = $this->input->post('created_at');
	    $data['barcode'] = $this->input->post('barcode');

	    $this->load->view('operator/print', $data);

	    $html = ob_get_contents();
	        ob_end_clean();
	        
	        require_once('./assets/html2pdf/html2pdf.class.php');
	    $pdf = new HTML2PDF('P','A4','en');
	    $pdf->WriteHTML($html);
	    $pdf->Output($data['kode_barang'].'.pdf', '');
	    
	}
}

/* End of file Barang.php */
/* Location: ./application/controllers/admin/Barang.php */
?>