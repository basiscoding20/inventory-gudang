<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Login extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			
			$this->load->model('LoginModel');
		}
	
		public function index()
		{
			$this->load->view('partials/01head');
			$this->load->view('login');
			$this->load->view('partials/06plugin');
			$this->load->view('services/login');
		}

		public function masuk()
		{
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$result = $this->LoginModel->validasi($username, $password);

			if ($result->num_rows() > 0) {
				foreach ($result->result() as $rs) {
					$data_session = array(
						'username'		=> $username,
						'nama_lengkap' 	=> $rs->nama_lengkap,
						'id'			=> $rs->id_user,
						'level'			=> $rs->id_level,
						'foto'			=> $rs->foto,
						'email'			=> $rs->email,
						'nama_akses'	=> $rs->nama_akses,
						'link'			=> $rs->link,
						'status' 		=> "login"
					);
					

					$this->session->set_userdata($data_session);
				};
				$response = array(
					'status' => 'sukses',
					'message' => 'Anda Berhasil Login',
					);
			}else{
				$response = array(
					'status' => 'gagal',
					'message' => 'Username Atau Password yang anda masukan salah !',
					);
			};

			echo json_encode($response);
		}
	
	}
	
	/* End of file Login.php */
	/* Location: ./application/controllers/Login.php */

 ?>