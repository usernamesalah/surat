<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Klasifikasi_surat extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Klasifikasi_surat_model');
        $this->load->model('Atur_cetak_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("auth");
		}
        $klasifikasi_surat = $this->Klasifikasi_surat_model->get_all();

        $data = array(
            'klasifikasi_surat_data' => $klasifikasi_surat
        );

        $this->template->load('template','klasifikasi_surat_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Klasifikasi_surat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kode' => $row->kode,
		'nama' => $row->nama,
		'uraian' => $row->uraian,
	    );
            $this->template->load('template','klasifikasi_surat_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('klasifikasi_surat'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('klasifikasi_surat/create_action'),
	    'id' => set_value('id'),
	    'kode' => set_value('kode'),
	    'nama' => set_value('nama'),
	    'uraian' => set_value('uraian'),
	);
        $this->template->load('template','klasifikasi_surat_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode' => $this->input->post('kode',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'uraian' => $this->input->post('uraian',TRUE),
	    );

            $this->Klasifikasi_surat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('klasifikasi_surat'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Klasifikasi_surat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('klasifikasi_surat/update_action'),
		'id' => set_value('id', $row->id),
		'kode' => set_value('kode', $row->kode),
		'nama' => set_value('nama', $row->nama),
		'uraian' => set_value('uraian', $row->uraian),
	    );
            $this->template->load('template','klasifikasi_surat_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('klasifikasi_surat'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kode' => $this->input->post('kode',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'uraian' => $this->input->post('uraian',TRUE),
	    );

            $this->Klasifikasi_surat_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('klasifikasi_surat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Klasifikasi_surat_model->get_by_id($id);

        if ($row) {
            $this->Klasifikasi_surat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('klasifikasi_surat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('klasifikasi_surat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode', 'kode', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('uraian', 'uraian', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "klasifikasi_surat.xls";
        $judul = "klasifikasi_surat";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Uraian");

	foreach ($this->Klasifikasi_surat_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->uraian);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=klasifikasi_surat.doc");

        $data = array(
            'klasifikasi_surat_data' => $this->Klasifikasi_surat_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('klasifikasi_surat_doc',$data);
    }
    function pdf()
    {
        
        $this->load->library('fpdf_gen');
       
        $res['data2']	= $this->db->query("SELECT * FROM atur_cetak WHERE id = '1'")->row();	
	
        $res['data'] = $this->Klasifikasi_surat_model->get_all();
        $this->load->view('Klasifikasi_surat_pdf',$res);
        
        
        
    }
    public function get_klasifikasi() {
		$kode 				= $this->input->post('kode',TRUE);
		
		$data 				=  $this->db->query("SELECT id, kode, nama FROM klasifikasi_surat WHERE kode LIKE '%$kode%' ORDER BY id ASC")->result();
		
		$klasifikasi 		=  array();
                    foreach ($data as $d) {
			$json_array				= array();
                $json_array['value']	= $d->kode;
			$json_array['label']	= $d->kode." - ".$d->nama;
			$klasifikasi[] 			= $json_array;
		}
		
		echo json_encode($klasifikasi);
	}
}

/* End of file Klasifikasi_surat.php */
/* Location: ./application/controllers/Klasifikasi_surat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-04-17 02:47:15 */
/* http://harviacode.com */