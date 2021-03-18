<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_seadashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_seadashboard');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data	= 	$this->session->userdata('logged_in');
			$data['countMasuk']	= $this->M_seadashboard->getCountMasuk();
			$data['countSelesai']	= $this->M_seadashboard->getCountSelesai();
			$data['countTotal']	= $this->M_seadashboard->getCountTotal();
			$data['countDocument']	= $this->M_seadashboard->getCountDocument();
			$data['nama_admin'] = $session_data['nama_admin'];
			$this->load->view('v_seadashboard', $data);
		} else {
			redirect('c_sealogin','refresh');
		}
	}

	public function masukProses()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data	= 	$this->session->userdata('logged_in');
			$data['nama_admin'] = $session_data['nama_admin'];
			$this->load->view('v_seamasukproses', $data);
		} else {
			redirect('c_sealogin','refresh');
		}
	}

	public function masukSelesai()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data	= 	$this->session->userdata('logged_in');
			$data['nama_admin'] = $session_data['nama_admin'];
			$this->load->view('v_seamasukselesai', $data);
		} else {
			redirect('c_sealogin','refresh');
		}
	}

	public function GetMasukProses()
	{
		$list = $this->M_seadashboard->getDataProses();
		$data = array();
		$no = 0;
		foreach ($list as $i) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $i['id_suratmasuk'];
			$row[] = $i['nomor_agenda'];
			$row[] = date('d-m-Y', strtotime($i['tgl_surat_diterima']));
			$row[] = $i['asal_suratmasuk'];
			$row[] = $i['nomor_suratmasuk'];
			$row[] = $i['status'];
			$row[] = '<center><a class="btn-sm btn-primary" href="'.$i['masuk_file'].'" target="_blank"><i class="glyphicon glyphicon-fullscreen"></i> Lihat Surat</a> <a class="btn-sm btn-success" href="C_seamasuk/getDetailMasuk/'.$i['id_suratmasuk'].'"><i class="glyphicon glyphicon-file"></i> Detail</a> <a class="btn-sm btn-warning" href="javascript:void()" title="Update Surat" onclick="updateSurat('."'".$i['id_suratmasuk']."'".')"><i class="glyphicon glyphicon-refresh"></i> Update</a></center>';
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

	public function GetMasukSelesai()
	{
		$list = $this->M_seadashboard->getDataSelesai();
		$data = array();
		$no = 0;
		foreach ($list as $i) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $i['id_suratmasuk'];
			$row[] = $i['nomor_agenda'];
			$row[] = date('d-m-Y', strtotime($i['tgl_surat_diterima']));
			$row[] = $i['asal_suratmasuk'];
			$row[] = $i['nomor_suratmasuk'];
			$row[] = $i['status'];
			$row[] = '<center><a class="btn-sm btn-primary" href="'.base_url('uploads/surat_masuk/'.$i['masuk_file']).'" target="_blank"><i class="glyphicon glyphicon-fullscreen"></i> Lihat Surat</a> </center>';
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

}

/* End of file C_seadashboard.php */
/* Location: ./application/controllers/C_seadashboard.php */