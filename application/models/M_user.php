<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
	public function select_all() {
		$sql = "SELECT * FROM user";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function delete($id) {
		$sql = "DELETE FROM user WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data) {
		$sql = "INSERT INTO user VALUES('','" .$data['username'] ."','" .md5($data['password']) ."','" .$data['picture']. "')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($username) {
		$this->db->where('username', $username);
		$data = $this->db->get('user');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('user');

		return $data->num_rows();
	}

	public function update($data, $id) {
		$this->db->where("id", $id);
		$this->db->update("user", $data);

		return $this->db->affected_rows();
	}

	public function select($id = '') {
		if ($id != '') {
			$this->db->where('id', $id);
		}

		$data = $this->db->get('user');

		return $data->row();
	}
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */