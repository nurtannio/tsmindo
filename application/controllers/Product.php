<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_product');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataProduct'] = $this->M_product->select_all();

		$data['page'] 		= "product";
		$data['judul'] 		= "Data Product";
		$data['deskripsi'] 	= "Manage Data Product";

		$data['modal_add_product'] = show_my_modal('Admin/modals/modal_tambah_product', 'tambah-product', $data);

		$this->template->views('Admin/Product/home', $data);
	}

	public function tampil() {
		$data['dataProduct'] = $this->M_product->select_all();
		$this->load->view('Admin/Product/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'jpg|png';
			
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('picture')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data_picture = $this->upload->data();
				$data['picture'] = $data_picture['file_name'];
			}

			$result = $this->M_product->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Product Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Product Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataProduct']= $this->M_product->select_by_id($id);

		echo show_my_modal('Admin/modals/modal_update_product', 'update-product', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'jpg|png';
			
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('picture')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data_picture = $this->upload->data();
				$data['picture'] = $data_picture['file_name'];
			}

			$result = $this->M_product->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Product Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Product Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_product->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Product Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Product Gagal dihapus', '20px');
		}
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */