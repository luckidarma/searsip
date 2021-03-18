<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_seakeluar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_seakeluar');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data	= 	$this->session->userdata('logged_in');
			$data['nama_admin'] = $session_data['nama_admin'];
			$this->load->view('v_seakeluar', $data);
		} else {
			redirect('c_sealogin','refresh');
		}
	}

	public function listDataKeluar()
	{
		$list = $this->M_seakeluar->getDataKeluar();
		$data = array();
		$no = 0;
		foreach ($list as $i) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $i['id_suratkeluar'];
			$row[] = date('d-m-Y', strtotime($i['tgl_suratkeluar']));
			$row[] = $i['nomor_suratkeluar'];
			// $row[] = $i['perihal_suratkeluar'];
			$row[] = $i['tujuan_suratkeluar'];
			$row[] = '<center><a class="btn-sm btn-primary" href="'.base_url('uploads/surat_keluar/'.$i['keluar_file']).'" target="_blank"><i class="glyphicon glyphicon-fullscreen"></i> Lihat Surat</a> <a class="btn-sm btn-success" href="C_seakeluar/getDetailKeluar/'.$i['id_suratkeluar'].'"><i class="glyphicon glyphicon-file"></i> Detail</a> <a class="btn-sm btn-warning" href="javascript:void()" title="Update Surat" onclick="updateSurat('."'".$i['id_suratkeluar']."'".')"><i class="glyphicon glyphicon-refresh"></i> Update</a></center>';
			$data[] = $row;
		}
		$output = array(
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function getDetailKeluar($id)
	{
		$where = array('id_suratkeluar' => $id);
		$data['tb_suratkeluar'] = $this->M_seakeluar->getSuratKeluarById($where, 'tb_suratkeluar')->result();
		if ($this->session->userdata('logged_in')) {
			$session_data	= 	$this->session->userdata('logged_in');
			$data['nama_admin'] = $session_data['nama_admin'];
			$this->load->view('V_seadetailkeluar', $data);
		} else {
			redirect('c_sealogin','refresh');
		}
	}

	public function getSuratKeluar($id)
	{
		$where = array('id_suratkeluar' => $id);
		$data['tb_suratkeluar'] = $this->M_seakeluar->getSuratKeluarById($where, 'tb_suratkeluar')->result();
		if ($this->session->userdata('logged_in')) {
			$session_data	= 	$this->session->userdata('logged_in');
			$data['nama_admin'] = $session_data['nama_admin'];
			$this->load->view('V_seadetailkeluar', $data);
		} else {
			redirect('c_sealogin','refresh');
		}
	}

	public function addSuratKeluar()
	{
		$data = array(
			'id_suratkeluar'		=>	$this->input->post('id_suratkeluar'),
			'tgl_suratkeluar'		=>	$this->input->post('tgl_suratkeluar'),
			'nomor_suratkeluar'		=>	$this->input->post('nomor_suratkeluar'),
			'perihal_suratkeluar'	=>	$this->input->post('perihal_suratkeluar'),
			'tujuan_suratkeluar'	=>	$this->input->post('tujuan_suratkeluar'),
			'tgl_distri'			=>	$this->input->post('tgl_distri')
		);

		if(!empty($_FILES['keluar_file']['name']))
        {
            $upload = $this->_do_upload();
            $data['keluar_file'] = $upload;
        }
 
        $insert = $this->M_seakeluar->addSuratKeluar($data);
        echo json_encode(array($data));
	}

	public function upSuratKeluar()
	{
		$data = array(
			'id_suratkeluar'		=>	$this->input->post('id_suratkeluar'),
			'tgl_suratkeluar'		=>	$this->input->post('tgl_suratkeluar'),
			'nomor_suratkeluar'		=>	$this->input->post('nomor_suratkeluar'),
			'perihal_suratkeluar'	=>	$this->input->post('perihal_suratkeluar'),
			'tujuan_suratkeluar'	=>	$this->input->post('tujuan_suratkeluar'),
			'tgl_distri'			=>	$this->input->post('tgl_distri'),
			'updateby'			=>	$this->input->post('updateby')
		);

		if($this->input->post('remove_photo')) // if remove photo checked
        {
            if(file_exists('uploads/surat_keluar/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
                unlink('uploads/surat_keluar'.$this->input->post('remove_photo'));
            $data['keluar_file'] = '';
        }

        if(!empty($_FILES['keluar_file']['name']))
        {
            $upload = $this->_do_upload();
             
            //delete file
            $klr = $this->M_seakeluar->getKeluar($this->input->post('id_suratkeluar'));
            if(file_exists('uploads/surat_keluar/'.$klr->keluar_file) && $klr->keluar_file)
                unlink('uploads/surat_keluar/'.$klr->keluar_file);
 
            $data['keluar_file'] = $upload;
        }

        $this->M_seakeluar->upSrtKeluar(array('id_suratkeluar' => $this->input->post('id_suratkeluar')), $data);
        echo json_encode(array($data));
	}

	// public function addSuratKeluar()
	// {
	// 	$config['upload_path'] = './uploads/surat_keluar';
	// 	$config['allowed_types'] = 'pdf|jpg|png';
		
	// 	$this->load->library('upload', $config);
		
	// 	if ($this->upload->do_upload("file")){
	// 		$data = array('upload_data' => $this->upload->data());

	// 		$id_suratkeluar			=	$this->input->post('id_suratkeluar');
	// 		$tgl_suratkeluar		=	$this->input->post('tgl_suratkeluar');
	// 		$nomor_suratkeluar		=	$this->input->post('nomor_suratkeluar');
	// 		$perihal_suratkeluar	=	$this->input->post('perihal_suratkeluar');
	// 		$tujuan_suratkeluar		=	$this->input->post('tujuan_suratkeluar');
	// 		$tgl_distri				=	$this->input->post('tgl_distri');
	// 		$keluar_file			=	base_url().'uploads/surat_keluar/'.$data['upload_data']['file_name'];

	// 		$uploadData = array(
	// 				'id_suratkeluar'		=>	$id_suratkeluar,
	// 				'tgl_suratkeluar'		=>	$tgl_suratkeluar,
	// 				'nomor_suratkeluar'		=>	$nomor_suratkeluar,
	// 				'perihal_suratkeluar'	=>	$perihal_suratkeluar,
	// 				'tujuan_suratkeluar'	=>	$tujuan_suratkeluar,
	// 				'tgl_distri'			=>	$tgl_distri,
	// 				'keluar_file'			=>	$keluar_file
	// 		);

	// 		$result 		=	$this->M_seakeluar->addSuratKeluar($uploadData);

	// 		echo json_decode($result);
	// 	}
	// }

	public function getKeluar($id)
	{
		$data = $this->M_seakeluar->getKeluar($id);
		echo json_encode($data);
	}

	// public function upSuratKeluar()
	// {
	// 	$config['upload_path'] = './uploads/surat_keluar';
	// 	$config['allowed_types'] = 'pdf|jpg|png';
		
	// 	$this->load->library('upload', $config);
		
	// 	if ($this->upload->do_upload("file")){
	// 		$data = array('upload_data' => $this->upload->data());

	// 		$tgl_suratkeluar		=	$this->input->post('tgl_suratkeluar');
	// 		$nomor_suratkeluar		=	$this->input->post('nomor_suratkeluar');
	// 		$perihal_suratkeluar	=	$this->input->post('perihal_suratkeluar');
	// 		$tujuan_suratkeluar		=	$this->input->post('tujuan_suratkeluar');
	// 		$tgl_distri				=	$this->input->post('tgl_distri');
	// 		$keluar_file			=	base_url().'uploads/surat_keluar/'.$data['upload_data']['file_name'];
	// 		$updateby				=	$this->input->post('updateby');

	// 		$uploadData = array(
	// 				'tgl_suratkeluar'		=>	$tgl_suratkeluar,
	// 				'nomor_suratkeluar'		=>	$nomor_suratkeluar,
	// 				'perihal_suratkeluar'	=>	$perihal_suratkeluar,
	// 				'tujuan_suratkeluar'	=>	$tujuan_suratkeluar,
	// 				'tgl_distri'			=>	$tgl_distri,
	// 				'keluar_file'			=>	$keluar_file,
	// 				'updateby'				=>	$updateby
	// 		);

	// 		$result = $this->M_seakeluar->upSrtKeluar(array('id_suratkeluar' => $this->input->post('id_suratkeluar')), $uploadData);

	// 		echo json_decode($result);
	// 	}
	// }

	public function _do_upload()
	{
		$config['upload_path']          = 'uploads/surat_keluar/';
        $config['allowed_types']        = 'pdf';
        $config['remove_spaces'] 		= TRUE;
        $config['encrypt_name'] 		= TRUE;

        $this->load->library('upload', $config);
 
        if(!$this->upload->do_upload('keluar_file')) //upload and validate
        {
            $data['inputerror'][] = 'keluar_file';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
	}

}

/* End of file C_seakeluar.php */
/* Location: ./application/controllers/C_seakeluar.php */