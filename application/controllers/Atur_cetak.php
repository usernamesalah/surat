<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Atur_cetak extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Atur_cetak_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $atur_cetak = $this->Atur_cetak_model->get_all();

        $data = array(
            'atur_cetak_data' => $atur_cetak
        );

        $this->template->load('template','atur_cetak_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Atur_cetak_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'jenis_font' => $row->jenis_font,
		'ukuran_kertas' => $row->ukuran_kertas,
	    );
            $this->template->load('template','atur_cetak_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('atur_cetak'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('atur_cetak/create_action'),
	    'id' => set_value('id'),
	    'jenis_font' => set_value('jenis_font'),
	    'ukuran_kertas' => set_value('ukuran_kertas'),
	);
        $this->template->load('template','atur_cetak_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jenis_font' => $this->input->post('jenis_font',TRUE),
		'ukuran_kertas' => $this->input->post('ukuran_kertas',TRUE),
	    );

            $this->Atur_cetak_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('atur_cetak'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Atur_cetak_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('atur_cetak/update_action'),
		'id' => set_value('id', $row->id),
		'jenis_font' => set_value('jenis_font', $row->jenis_font),
		'ukuran_kertas' => set_value('ukuran_kertas', $row->ukuran_kertas),
	    );
            $this->template->load('template','atur_cetak_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('atur_cetak'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'jenis_font' => $this->input->post('jenis_font',TRUE),
		'ukuran_kertas' => $this->input->post('ukuran_kertas',TRUE),
	    );

            $this->Atur_cetak_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('atur_cetak'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Atur_cetak_model->get_by_id($id);

        if ($row) {
            $this->Atur_cetak_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('atur_cetak'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('atur_cetak'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenis_font', 'jenis font', 'trim|required');
	$this->form_validation->set_rules('ukuran_kertas', 'ukuran kertas', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "atur_cetak.xls";
        $judul = "atur_cetak";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Font");
	xlsWriteLabel($tablehead, $kolomhead++, "Ukuran Kertas");

	foreach ($this->Atur_cetak_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_font);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ukuran_kertas);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=atur_cetak.doc");

        $data = array(
            'atur_cetak_data' => $this->Atur_cetak_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('atur_cetak_doc',$data);
    }

}

/* End of file Atur_cetak.php */
/* Location: ./application/controllers/Atur_cetak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-02 00:46:48 */
/* http://harviacode.com */