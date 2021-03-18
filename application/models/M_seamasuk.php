<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_seamasuk extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		$this->load->database();
	}

	public function getListDispos()
	{
		return $this->db->get('tb_disposisi');
	}

	public function getListPelaksana()
	{
		return $this->db->get('tb_pelaksana');
	}

	public function getDataMasuk()
	{
		$this->db->select('*');
		$this->db->from('tb_suratmasuk');
		$this->db->join('tb_pelaksana', 'tb_suratmasuk.id_pelaksana = tb_pelaksana.id_pelaksana', 'left');
		$q = $this->db->get();
		return $q->result_array();
	}

	public function addSrtMasuk($data)
	{
		$this->db->insert('tb_suratmasuk', $data);
		return $this->db->insert_id();
	}

	public function getSuratMasukById($where, $table)
	{
		$this->db->select('*');
		$this->db->join('tb_disposisi', 'tb_suratmasuk.id_disposisi = tb_disposisi.id_disposisi', 'left');
		$this->db->join('tb_pelaksana', 'tb_suratmasuk.id_pelaksana = tb_pelaksana.id_pelaksana', 'left');
		return $this->db->get_where($table, $where);
	}
	
	public function getMasukId($id)
	{
		$this->db->select('*');
		$this->db->from('tb_suratmasuk');
		$this->db->join('tb_disposisi', 'tb_suratmasuk.id_disposisi = tb_disposisi.id_disposisi', 'left');
		$this->db->join('tb_pelaksana', 'tb_suratmasuk.id_pelaksana = tb_pelaksana.id_pelaksana', 'left');
		$this->db->where('id_suratmasuk', $id);

		$query = $this->db->get();
		return $query->row();
	}

	public function updateSuratMasuk($where, $data)
	{
		$this->db->update('tb_suratmasuk', $data, $where);
		return $this->db->affected_rows();
	}

	public function getMasuk($id)
	{
		$this->db->select('*');
		$this->db->from('tb_suratmasuk');
		$this->db->join('tb_disposisi', 'tb_suratmasuk.id_disposisi = tb_disposisi.id_disposisi', 'left');
		$this->db->where('id_suratmasuk', $id);

		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file M_seamasuk.php */
/* Location: ./application/models/M_seamasuk.php */