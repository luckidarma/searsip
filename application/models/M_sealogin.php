<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sealogin extends CI_Model {

	function admin_login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('tb_sealogin');
		$this->db->where('username_admin', $username);
		$this->db->where('password_admin', md5($password));
		$this->db->limit(1);

		$query	= $this->db->get();

		if ($query->num_rows() == 1) {
			$result = $query->result();
			return $result;
		} else {
			return FALSE;
		}
	}

}

/* End of file M_sealogin.php */
/* Location: ./application/models/M_sealogin.php */