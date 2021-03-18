<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_seadispos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_seadispos');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data	= 	$this->session->userdata('logged_in');
			$data['nama_admin'] = $session_data['nama_admin'];
			$this->load->view('v_seadispos', $data);
		} else {
			redirect('c_sealogin','refresh');
		}
	}

	public function listDataDispos()
	{
		$list = $this->M_seadispos->getDataDispos();
		$data = array();
		$no = 0;
		foreach ($list as $i) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $i['nama_staff'];
			$row[] = '<a class="btn-sm btn-warning" href="javascript:void()" title="Update" onclick="updateStaf('."'".$i['id_pelaksana']."'".')"><i class="glyphicon glyphicon-refresh"></i> Update</a></center>';
			$data[] = $row;
		}
		$output = array(
						// "draw" => $_POST['draw'],
						// "recordsTotal" => $this->M_surat->count_all(),
						// "recordsFiltered" => $this->M_surat->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function addDispos()
	{
		$nama_staff		=	$this->input->post('nama_staff');

		$data = array(
				'nama_staff'	=>	$nama_staff
		);

		$insert	=	$this->M_seadispos->addDisposisi($data);
		echo json_encode(array($data));
	}

	public function getStaf($id)
	{
		$data = $this->M_seadispos->getStaf($id);
		echo json_encode($data);
	}

	public function updateStaf()
	{
		$data = array(
			'id_pelaksana' 	=> $this->input->post('id_pelaksana'),
			'nama_staff' 	=> $this->input->post('nama_staff')
		);
		// echo var_dump($data); die();
		$this->M_seadispos->updateDataStaf(array('id_pelaksana' 	=> $this->input->post('id_pelaksana')), $data);
		echo json_encode(array($data));
	}

}

/* End of file C_seadispos.php */
/* Location: ./application/controllers/C_seadispos.php */