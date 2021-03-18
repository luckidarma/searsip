<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_seascanned extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		$this->load->database();
	}

	public function getDataDocs()
	{
		$this->db->select('*');
		$this->db->from('tb_docs');
		$q = $this->db->get();
		return $q->result_array();
	}

	public function getMessage($id)
	{
		$this->db->select('*');
		$this->db->from('tb_docs');
		$this->db->where('id_docs', $id);

		$query = $this->db->get();
		return $query->row();
	}

	public function getMessageId($id)
	{
		$this->db->select('*');
		$this->db->from('tb_docs');
		$this->db->where('id_docs', $id);

		$query = $this->db->get();
		return $query->row();
	}

	public function addMessage($data)
	{
		$this->db->insert('tb_docs', $data);
		return $this->db->insert_id();
	}

	public function updateMessageDocs($where, $data)
	{
		$this->db->update('tb_docs', $data, $where);
		return $this->db->affected_rows();
	}

}

/* End of file M_seascanned.php */
/* Location: ./application/models/M_seascanned.php */