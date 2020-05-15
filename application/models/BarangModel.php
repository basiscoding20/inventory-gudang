<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangModel extends CI_Model {

	function get_by_kode($kode)
	{
		return $this->db->get_where('barang_masuk', array('kode_barang' => $kode))->row();
	}

// Tampil Pengajuan Barang Masuk

	function pengajuan_barang_masuk()
	{
		$this->db->select('*');
		$this->db->select('
			CASE 
			WHEN status = 0 THEN "Belum Masuk" 
			WHEN status = 1 THEN "Sudah Masuk" 
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
			WHEN status_gudang = 4 THEN "Proses Keluar"
			END as status_barang', false
		);
		$this->db->from('barang_gudang');
		$this->db->join('barang_masuk', 'barang_masuk.kode_barang = barang_gudang.kode_barang_masuk', 'LEFT');
		$this->db->where('status_gudang', '1');
		$this->db->or_where('status_gudang', '4');
		$this->db->order_by('nama_barang', 'asc');
		return $this->db->get()->result();
	}

// Tampil Pengajuan Barang Keluar

	function pengajuan_barang_keluar()
	{
		$this->db->select('barang_gudang.*, barang_masuk.nama_barang, barang_masuk.size');
		$this->db->select('
			CASE
			WHEN status_gudang = 4 THEN "Proses Keluar"
			END as status_barang', false
		);
		$this->db->from('barang_gudang');
		$this->db->join('barang_masuk', 'barang_masuk.kode_barang = barang_gudang.kode_barang_masuk', 'LEFT');
		$this->db->where('status_gudang', '4');
		$this->db->order_by('nama_barang', 'asc');
		return $this->db->get()->result();
	}

	function add_barang_keluar($data)
	{
		return $this->db->insert('barang_keluar', $data);
	}

	function keluarkan_barang_gudang($kode_barang, $jumlah)
	{
		$cek = $this->db->get_where('barang_gudang', array('kode_barang_masuk' => $kode_barang))->row();

		if ($jumlah < $cek->quantity) {
			$sisa_jumlah = $cek->quantity - $jumlah;
			return $this->db->update('barang_gudang', array('status_gudang' => 1, 'quantity' => $sisa_jumlah), array('kode_barang_masuk' => $kode_barang));
		}else{
			return $this->db->update('barang_gudang', array('status_gudang' => 2), array('kode_barang_masuk' => $kode_barang));
		}
		return true;
	}

// Barang Keluar

	function barang_keluar()
	{
		$this->db->select('barang_keluar.*, barang_masuk.nama_barang, barang_masuk.size');
		$this->db->from('barang_keluar');
		$this->db->join('barang_masuk', 'barang_masuk.kode_barang = barang_keluar.kode_barang_keluar', 'LEFT');
		$this->db->order_by('nama_barang', 'asc');
		return $this->db->get()->result();
	}

// Jumlah Barang

	function chart_barang_masuk()
	{
		$this->db->select('SUM(quantity) as jumlah_barang_masuk, MONTH(created_at) as daftar_bulan, YEAR(created_at) as daftar_tahun');
		$this->db->from('barang_masuk');
		$this->db->where('YEAR(created_at)', date('Y'));
		$this->db->group_by('daftar_bulan, daftar_tahun');
		return $this->db->get()->result();
	}

	function chart_barang_keluar()
	{
		$this->db->select('SUM(quantity) as jumlah_barang_keluar, MONTH(created_at) as daftar_bulan, YEAR(created_at) as daftar_tahun');
		$this->db->from('barang_keluar');
		$this->db->where('YEAR(created_at)', date('Y'));
		$this->db->group_by('daftar_bulan, daftar_tahun');
		return $this->db->get()->result();
	}

	function jumlah_barang_masuk()
	{
		$this->db->select('COUNT(id) as jumlah_barang_masuk');
		$this->db->from('barang_gudang');
		$this->db->where('status_gudang', 1);
		return $this->db->get()->row();
	}

	function jumlah_barang_keluar()
	{
		$this->db->select('COUNT(id) as jumlah_barang_keluar');
		$this->db->from('barang_keluar');
		return $this->db->get()->row();
	}

	function jumlah_pengajuan_barang_masuk()
	{
		$this->db->select('COUNT(id_barang) as jumlah_pengajuan_barang_masuk');
		$this->db->from('barang_masuk');
		$this->db->where('status', 0);
		return $this->db->get()->row();
	}

	function jumlah_pengajuan_barang_keluar()
	{
		$this->db->select('COUNT(id) as jumlah_pengajuan_barang_keluar');
		$this->db->from('barang_gudang');
		$this->db->where('status_gudang', 4);
		return $this->db->get()->row();
	}

// Buat Kode Barang

	function get_kode_barang()
	{
		$q = $this->db->query("SELECT MAX(RIGHT(kode_barang,4)) AS kd_max FROM barang_masuk WHERE DATE(created_at)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy').$kd;
	}
// Add Pengajuan Barang Masuk

	function add_barang_masuk($data)
	{
		return $this->db->insert('barang_masuk', $data);
	}

// Edit Pengajuan Barang Masuk

	function edit_barang_masuk($kode, $data)
	{
		return $this->db->update('barang_masuk', $data, array('kode_barang' => $kode));
	}

// Add Pengajuan Barang Keluar

	function add_pengajuan_barang_keluar()
	{
		return $this->db->update('barang_gudang', array('status_gudang' => 4));
	}

// Edit Pengajuan Barang Keluar

	function edit_pengajuan_barang_keluar($kode, $data)
	{
		return $this->db->update('barang_gudang', $data, array('kode_barang_masuk' => $kode));
	}
}

/* End of file BarangModel.php */
/* Location: ./application/models/BarangModel.php */
?>