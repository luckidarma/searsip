<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_seakeluar extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		$this->load->database();
	}

	public function getDataKeluar()
	{
		$this->db->select('*');
		$this->db->from('tb_suratkeluar');
		$q = $this->db->get();
		return $q->result_array();
	}

	public function getSuratKeluarById($where, $table)
	{
		$this->db->select('*');
		return $this->db->get_where($table, $where);
	}

	public function addSuratKeluar($data)
	{
		$this->db->insert('tb_suratkeluar', $data);
		return $this->db->insert_id();
	}

	public function getKeluar($id)
	{
		$this->db->select('*');
		$this->db->from('tb_suratkeluar');
		$this->db->where('id_suratkeluar', $id);

		$query = $this->db->get();
		return $query->row();
	}

	public function upSrtKeluar($where, $data)
	{
		$this->db->update('tb_suratkeluar', $data, $where);
		return $this->db->affected_rows();
	}

}

/* End of file M_seakeluar.php */
/* Location: ./application/models/M_seakeluar.php */