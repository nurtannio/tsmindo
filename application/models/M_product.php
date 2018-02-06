<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_product extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('product');

		$data = $this->db->get();

		return $data->result();
	}

	public function insert($data) {
		$sql = "INSERT INTO product VALUES('','" .$data['name'] ."','" .$data['description'] ."','" .$data['picture']. "')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM product WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function update($data) {
		$sql = "UPDATE product SET name='" .$data['name'] ."', description='" .$data['description'] ."', picture ='" .$data['picture']. "' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM product WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($name) {
		$this->db->where('name', $name);
		$data = $this->db->get('product');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('product');

		return $data->num_rows();
	}
}

/* End of file M_product.php */
/* Location: ./application/models/M_product.php */