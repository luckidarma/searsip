<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_seadispos extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		$this->load->database();
	}

	// public function getDataDispos2()
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('tb_disposisi');
	// 	$q = $this->db->get();
	// 	return $q->result_array();
	// }

	public function getDataDispos()
	{
		$this->db->select('*');
		$this->db->from('tb_pelaksana');
		$q = $this->db->get();
		return $q->result_array();
	}

	public function addDisposisi($data)
	{
		$this->db->insert('tb_pelaksana', $data);
		return $this->db->insert_id();
	}

	public function getStaf($id)
	{
		$this->db->select('*');
		$this->db->from('tb_pelaksana');
		$this->db->where('id_pelaksana', $id);

		$query = $this->db->get();
		return $query->row();
	}

	public function updateDataStaf($where, $data)
	{
		$this->db->update('tb_pelaksana', $data, $where);
		return $this->db->affected_rows();
	}


}

/* End of file M_seadispos.php */
/* Location: ./application/models/M_seadispos.php */