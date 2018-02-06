<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_product');
	}

	public function index() {
		$data['sum_user'] 		= $this->M_user->total_rows();
		$data['sum_product'] 	= $this->M_product->total_rows();
		$data['userdata'] 		= $this->userdata;

		$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
		
		$data['page'] 			= "home";
		$data['judul'] 			= "Home";
		$data['deskripsi'] 		= "Manage Data";
		$this->template->views('Admin/home', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */