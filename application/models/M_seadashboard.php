<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_seadashboard extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getCountMasuk()
	{
		$this->db->select('count(status) as total');
		$this->db->where('status', 'Proses');
		$query = $this->db->get('tb_suratmasuk');
		return $query;
	}

	public function getCountSelesai()
	{
		$this->db->select('count(status) as total');
		$this->db->where('status', 'Selesai');
		$query = $this->db->get('tb_suratmasuk');
		return $query;
	}

	public function getCountTotal()
	{
		$this->db->select('count(status) as total');
		$query = $this->db->get('tb_suratmasuk');
		return $query;
	}

	public function getCountDocument()
	{
		$this->db->select('count(id_docs) as total');
		$query = $this->db->get('tb_docs');
		return $query;
	}

	public function getDataProses()
	{
		$this->db->select('*');
		$this->db->from('tb_suratmasuk');
		$this->db->join('tb_pelaksana', 'tb_suratmasuk.id_pelaksana = tb_pelaksana.id_pelaksana', 'left');
		$this->db->where('status', 'Proses');
		$q = $this->db->get();
		return $q->result_array();
	}

	public function getDataSelesai()
	{
		$this->db->select('*');
		$this->db->from('tb_suratmasuk');
		$this->db->join('tb_pelaksana', 'tb_suratmasuk.id_pelaksana = tb_pelaksana.id_pelaksana', 'left');
		$this->db->where('status', 'Selesai');
		$q = $this->db->get();
		return $q->result_array();
	}
	

}

/* End of file M_seadashboard.php */
/* Location: ./application/models/M_seadashboard.php */