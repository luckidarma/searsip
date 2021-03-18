<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_seascanned extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_seascanned');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data	= 	$this->session->userdata('logged_in');
			$data['nama_admin'] = $session_data['nama_admin'];
			$this->load->view('v_seascanned', $data);
		} else {
			redirect('c_sealogin','refresh');
		}
	}

	public function listMessage()
	{
		$list = $this->M_seascanned->getDataDocs();
		$data = array();
		$no = 0;
		foreach ($list as $i) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $i['no_docs'];
			$row[] = $i['asal_docs'];
			$row[] = $i['perihal_docs'];
			$row[] = date('d-m-Y', strtotime($i['tgl_docs']));
			$row[] = '<center><a class="btn-sm btn-primary" href="'.base_url('uploads/document_scanned/'.$i['file_docs']).'" target="_blank"><i class="glyphicon glyphicon-fullscreen"></i> Lihat Dokumen</a> <a class="btn-sm btn-warning" href="javascript:void()" title="Update Surat" onclick="updateMessage('."'".$i['id_docs']."'".')"><i class="glyphicon glyphicon-refresh"></i> Update</a></center>';
			$data[] = $row;
		}
		$output = array(
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function getMessage($id)
	{
		$data = $this->M_seascanned->getMessage($id);
		echo json_encode($data);
	}

	public function addMessage()
	{
		$data = array(
			'id_docs'			=>	$this->input->post('id_docs'),
			'no_docs'			=>	$this->input->post('no_docs'),
			'asal_docs'			=>	$this->input->post('asal_docs'),
			'tgl_docs'			=>	$this->input->post('tgl_docs'),
			'perihal_docs'		=>	$this->input->post('perihal_docs'),
			'uploaded_at'		=>	$this->input->post('uploaded_at'),
			'uploaded'			=>	$this->input->post('uploaded')
		);

		if(!empty($_FILES['file_docs']['name']))
        {
            $upload = $this->_do_upload();
            $data['file_docs'] = $upload;
        }
 
        $insert = $this->M_seascanned->addMessage($data);
        echo json_encode(array($data));
	}

	public function upMessage()
	{
		$data = array(
			'id_docs'			=>	$this->input->post('id_docs'),
			'no_docs'			=>	$this->input->post('no_docs'),
			'asal_docs'			=>	$this->input->post('asal_docs'),
			'tgl_docs'			=>	$this->input->post('tgl_docs'),
			'perihal_docs'		=>	$this->input->post('perihal_docs'),
			'update_at'			=>	$this->input->post('update_at'),
			'updated'			=>	$this->input->post('updated')
		);

		if($this->input->post('remove_photo')) // if remove photo checked
        {
            if(file_exists('uploads/document_scanned/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
                unlink('uploads/document_scanned'.$this->input->post('remove_photo'));
            $data['file_docs'] = '';
        }

        if(!empty($_FILES['file_docs']['name']))
        {
            $upload = $this->_do_upload();
             
            //delete file
            $msk = $this->M_seascanned->getMessageId($this->input->post('id_docs'));
            if(file_exists('uploads/document_scanned/'.$msk->file_docs) && $msk->file_docs)
                unlink('uploads/document_scanned/'.$msk->file_docs);
 
            $data['file_docs'] = $upload;
        }
 
        $this->M_seascanned->updateMessageDocs(array('id_docs' => $this->input->post('id_docs')), $data);
        echo json_encode(array($data));
	}

	public function _do_upload()
	{
		$config['upload_path']          = 'uploads/document_scanned/';
        $config['allowed_types']        = 'pdf';
        $config['remove_spaces'] 		= TRUE;
        $config['encrypt_name'] 		= TRUE;

        $this->load->library('upload', $config);
 
        if(!$this->upload->do_upload('file_docs')) //upload and validate
        {
            $data['inputerror'][] = 'file_docs';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
	}

}

/* End of file c_seascanned.php */
/* Location: ./application/controllers/c_seascanned.php */