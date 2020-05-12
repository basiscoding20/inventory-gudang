<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangModel extends CI_Model {

// Pengajuan Barang Masuk

	function pengajuan_barang_masuk()
	{
		$this->db->select('*');
		$this->db->select('
			CASE 
			WHEN status = 0 THEN "Belum Masuk" 
			WHEN status = 1 THEN "Sudah Masuk" 
			WHEN status = 2 THEN "Sudah Keluar"
			WHEN status = 3 THEN "Return"
			END as status_barang', false
		);
		$this->db->from('barang_masuk');
		$this->db->where('status', '0');
		$this->db->or_where('status', '3');
		$this->db->order_by('nama_barang', 'asc');
		return $this->db->get()->result();
	}

	function add_barang_gudang($data)
	{
		return $this->db->insert('barang_gudang', $data);
	}

	function validasi_barang_masuk($kode_barang, $jumlah)
	{
		$cek = $this->db->get_where('barang_masuk', array('kode_barang' => $kode_barang))->row();

		if ($jumlah < $cek->quantity) {
			$sisa_jumlah = $cek->quantity - $jumlah;
			return $this->db->update('barang_masuk', array('status' => 3, 'quantity' => $sisa_jumlah), array('kode_barang' => $kode_barang));
		}else{
			return $this->db->update('barang_masuk', array('status' => 1), array('kode_barang' => $kode_barang));
		}
		return true;
	}

// Barang Masuk

	function barang_masuk()
	{
		$this->db->select('barang_gudang.*, barang_masuk.nama_barang, barang_masuk.size');
		$this->db->select('
			CASE 
			WHEN status_gudang = 1 THEN "Sudah Masuk" 
			WHEN status_gudang = 2 THEN "Sudah Keluar"
			WHEN status_gudang = 4 THEN "Proses Keluar"
			END as status_barang', false
		);
		$this->db->from('barang_gudang');
		$this->db->join('barang_masuk', 'barang_masuk.kode_barang = barang_gudang.kode_barang_masuk', 'LEFT');
		$this->db->where('status_gudang', '1');
		$this->db->order_by('nama_barang', 'asc');
		return $this->db->get()->result();
	}

// Pengajuan Barang Masuk

	function pengajuan_barang_keluar()
	{
		$this->db->select('barang_keluar.*, barang_masuk.nama_barang, barang_masuk.size');
		$this->db->select('
			CASE
			WHEN status_keluar = 4 THEN "Proses Keluar"
			END as status_barang', false
		);
		$this->db->from('barang_keluar');
		$this->db->join('barang_masuk', 'barang_keluar.kode_barang_keluar = barang_masuk.kode_barang', 'LEFT');
		$this->db->where('status_keluar', '4');
		$this->db->order_by('nama_barang', 'asc');
		return $this->db->get()->result();
	}

	function remove_barang_gudang($data)
	{
		return $this->db->insert('barang_gudang', $data);
	}

	function validasi_barang_keluar($kode_barang, $jumlah)
	{
		$cek = $this->db->get_where('barang_masuk', array('kode_barang' => $kode_barang))->row();

		if ($jumlah < $cek->quantity) {
			$sisa_jumlah = $cek->quantity - $jumlah;
			return $this->db->update('barang_masuk', array('status' => 3, 'quantity' => $sisa_jumlah), array('kode_barang' => $kode_barang));
		}else{
			return $this->db->update('barang_masuk', array('status' => 1), array('kode_barang' => $kode_barang));
		}
		return true;
	}


}

/* End of file BarangModel.php */
/* Location: ./application/models/BarangModel.php */
?>