<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangModel extends CI_Model {

	function pengajuan_barang_masuk()
	{
		$this->db->select('*');
		$this->db->select('
			CASE 
			WHEN status = 0 THEN "Belum Masuk" 
			WHEN status = 1 THEN "Sudah Masuk" 
			WHEN status = 2 THEN "Sudah Keluar" 
			END as status_barang', false
		);
		$this->db->from('barang');
		$this->db->where('status', '0');
		$this->db->order_by('nama_barang', 'asc');
		return $this->db->get()->result();
	}

}

/* End of file BarangModel.php */
/* Location: ./application/models/BarangModel.php */
?>