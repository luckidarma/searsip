<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_seamasuk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_seamasuk');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data	= 	$this->session->userdata('logged_in');
			$data['nama_admin'] = $session_data['nama_admin'];
			$data['dispos']		= $this->M_seamasuk->getListDispos()->result();
			$data['pelaksana']	= $this->M_seamasuk->getListPelaksana()->result();
			$this->load->view('v_seamasuk', $data);
		} else {
			redirect('c_sealogin','refresh');
		}
	}

	public function listSrtMasuk()
	{
		$list = $this->M_seamasuk->getDataMasuk();
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
			// $row[] = $i['disposkabid'];
			$row[] = $i['status'];
			$row[] = '<center><a class="btn-sm btn-primary" href="'.base_url('uploads/surat_masuk/'.$i['masuk_file']).'" target="_blank"><i class="glyphicon glyphicon-fullscreen"></i> Lihat Surat</a> <a class="btn-sm btn-success" href="C_seamasuk/getDetailMasuk/'.$i['id_suratmasuk'].'"><i class="glyphicon glyphicon-file"></i> Detail</a> <a class="btn-sm btn-warning" href="javascript:void()" title="Update Surat" onclick="updateSurat('."'".$i['id_suratmasuk']."'".')"><i class="glyphicon glyphicon-refresh"></i> Update</a></center>';
			$data[] = $row;
		}
		$output = array(
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function getMasuk($id)
	{
		$data = $this->M_seamasuk->getMasuk($id);
		echo json_encode($data);
	}

	public function addSuratMasuk()
	{
		$data 	= 	array(
			'id_suratmasuk'			=>	$this->input->post('id_suratmasuk'),
			'id_disposisi'			=>	$this->input->post('id_disposisi'),
			'id_pelaksana'			=>	$this->input->post('id_pelaksana'),
			'nomor_agenda'			=>	$this->input->post('nomor_agenda'),
			'tgl_surat_diterima'	=>	$this->input->post('tgl_surat_diterima'),
			'asal_suratmasuk'		=>	$this->input->post('asal_suratmasuk'),
			'nomor_suratmasuk'		=>	$this->input->post('nomor_suratmasuk'),
			'tgl_suratmasuk'		=>	$this->input->post('tgl_suratmasuk'),
			'perihal_suratmasuk'	=>	$this->input->post('perihal_suratmasuk'),
			'disposkaban'			=>	$this->input->post('disposkaban'),
			'tgl_disposkaban'		=>	$this->input->post('tgl_disposkaban'),
			'disposkabid'			=>	$this->input->post('disposkabid'),
			'tgl_disposkabid'		=>	$this->input->post('tgl_disposkabid'),
			'disposkasubid'			=>	$this->input->post('disposkasubid'),
			'tgl_disposkasubid'		=>	$this->input->post('tgl_disposkasubid'),
			'status'				=>	$this->input->post('status'),
			'createdby'				=>	$this->input->post('createdby')
		);

		if(!empty($_FILES['masuk_file']['name']))
        {
            $upload = $this->_do_upload();
            $data['masuk_file'] = $upload;
        }
 
        $insert = $this->M_seamasuk->addSrtMasuk($data);
        echo json_encode(array($data));
	}

	public function upSuratMasuk()
	{
		$data 	= 	array(
			'id_suratmasuk'			=>	$this->input->post('id_suratmasuk'),
			'id_disposisi'			=>	$this->input->post('id_disposisi'),
			'id_pelaksana'			=>	$this->input->post('id_pelaksana'),
			'nomor_agenda'			=>	$this->input->post('nomor_agenda'),
			'tgl_surat_diterima'	=>	$this->input->post('tgl_surat_diterima'),
			'asal_suratmasuk'		=>	$this->input->post('asal_suratmasuk'),
			'nomor_suratmasuk'		=>	$this->input->post('nomor_suratmasuk'),
			'tgl_suratmasuk'		=>	$this->input->post('tgl_suratmasuk'),
			'perihal_suratmasuk'	=>	$this->input->post('perihal_suratmasuk'),
			'disposkaban'			=>	$this->input->post('disposkaban'),
			'tgl_disposkaban'		=>	$this->input->post('tgl_disposkaban'),
			'disposkabid'			=>	$this->input->post('disposkabid'),
			'tgl_disposkabid'		=>	$this->input->post('tgl_disposkabid'),
			'disposkasubid'			=>	$this->input->post('disposkasubid'),
			'tgl_disposkasubid'		=>	$this->input->post('tgl_disposkasubid'),
			'status'				=>	$this->input->post('status'),
			'updateby'				=>	$this->input->post('updateby')
		);

		if($this->input->post('remove_photo')) // if remove photo checked
        {
            if(file_exists('uploads/surat_masuk/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
                unlink('uploads/surat_masuk'.$this->input->post('remove_photo'));
            $data['masuk_file'] = '';
        }

        if(!empty($_FILES['masuk_file']['name']))
        {
            $upload = $this->_do_upload();
             
            //delete file
            $msk = $this->M_seamasuk->getMasukId($this->input->post('id_suratmasuk'));
            if(file_exists('uploads/surat_masuk/'.$msk->masuk_file) && $msk->masuk_file)
                unlink('uploads/surat_masuk/'.$msk->masuk_file);
 
            $data['masuk_file'] = $upload;
        }

        $this->M_seamasuk->updateSuratMasuk(array('id_suratmasuk' => $this->input->post('id_suratmasuk')), $data);
        echo json_encode(array($data));
	}


	public function _do_upload()
	{
		$config['upload_path']          = 'uploads/surat_masuk/';
        $config['allowed_types']        = 'pdf';
        $config['remove_spaces'] 		= TRUE;
        $config['encrypt_name'] 		= TRUE;

        $this->load->library('upload', $config);
 
        if(!$this->upload->do_upload('masuk_file')) //upload and validate
        {
            $data['inputerror'][] = 'masuk_file';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
	}

	public function getSuratMasuk($id)
	{
		$where = array('id_suratmasuk' => $id);
		$data['tb_suratmasuk'] = $this->M_seamasuk->getSuratMasukById($where, 'tb_suratmasuk')->result();
		if ($this->session->userdata('logged_in')) {
			$session_data	= 	$this->session->userdata('logged_in');
			$data['nama_admin'] = $session_data['nama_admin'];
			$this->load->view('V_seafilemasuk', $data);
		} else {
			redirect('c_sealogin','refresh');
		}
	}

	public function getDetailMasuk($id)
	{
		$where = array('id_suratmasuk' => $id);
		$data['tb_suratmasuk'] = $this->M_seamasuk->getSuratMasukById($where, 'tb_suratmasuk')->result();
		if ($this->session->userdata('logged_in')) {
			$session_data	= 	$this->session->userdata('logged_in');
			$data['nama_admin'] = $session_data['nama_admin'];
			$this->load->view('V_seadetailmasuk', $data);
		} else {
			redirect('c_sealogin','refresh');
		}
	}

}

/* End of file C_seamasuk.php */
/* Location: ./application/controllers/C_seamasuk.php */