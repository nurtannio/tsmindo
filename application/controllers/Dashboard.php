<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_product');
	}

	public function index()
	{			
		$this->load->view('frontend/header');
		$this->load->view('frontend/index');
		$this->load->view('frontend/footer');
	}
	public function about()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/about');
		$this->load->view('frontend/footer');
	}
	public function contact()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/contact');
		$this->load->view('frontend/footer');
	}
	public function products()
	{
		$data['dataProduct'] = $this->M_product->select_all();

		$this->load->view('frontend/header');
		$this->load->view('frontend/products', $data);
		$this->load->view('frontend/footer');
	}
}
