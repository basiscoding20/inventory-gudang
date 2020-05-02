<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class LoginModel extends CI_Model {
	
		function validasi($username, $password)
		{
			$this->db->select('*');
			$this->db->from('user_aktif');
			$this->db->join('user_group', 'user_group.id_akses = user_aktif.id_level', 'left');
			$this->db->where('user_aktif.username', $username);
			$this->db->where('user_aktif.password', $password);
			$this->db->where('user_aktif.status', 'Aktif');
			$this->db->limit(1);
			return $this->db->get();
			
		}
	
	}
	
	/* End of file LoginModel.php */
	/* Location: ./application/models/LoginModel.php */
 ?>