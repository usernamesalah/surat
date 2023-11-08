<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Input_surat_keluar extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Input_surat_keluar_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
        
        //upload config 
		$config['upload_path'] 		= './upload/surat_keluar/';
		$config['allowed_types'] 	= 'gif|jpg|jpeg|png|pdf|doc|docx';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
    }

    public function index()
    {
        $input_surat_keluar = $this->Input_surat_keluar_model->get_all();

        $data = array(
            'input_surat_keluar_data' => $input_surat_keluar
        );

        $this->template->load('template','input_surat_keluar_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Input_surat_keluar_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kode' => $row->kode,
		'no_agenda' => $row->no_agenda,
		'isi_ringkas' => $row->isi_ringkas,
		'tujuan' => $row->tujuan,
		'no_surat' => $row->no_surat,
		'tgl_surat' => $row->tgl_surat,
		'tgl_catat' => $row->tgl_catat,
		'keterangan' => $row->keterangan,
		'file' => $row->file,
		'pengolah' => $row->pengolah,
	    );
            $this->template->load('template','input_surat_keluar_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('input_surat_keluar'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul' => 'Tambah',
            'button' => 'Create',
            'action' => site_url('input_surat_keluar/create_action'),
	    'id' => set_value('id'),
	    'kode' => set_value('kode'),
	    'no_agenda' => set_value('no_agenda'),
	    'isi_ringkas' => set_value('isi_ringkas'),
	    'tujuan' => set_value('tujuan'),
	    'no_surat' => set_value('no_surat'),
	    'tgl_surat' => set_value('tgl_surat'),
	    'tgl_catat' => set_value('tgl_catat'),
	    'keterangan' => set_value('keterangan'),
	    'file' => set_value('file'),
	    'pengolah' => set_value('pengolah'),
	);
        $this->template->load('template','input_surat_keluar_form', $data);
    }
    
    public function create_action() 
    {
       /* $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode' => $this->input->post('kode',TRUE),
		'no_agenda' => $this->input->post('no_agenda',TRUE),
		'isi_ringkas' => $this->input->post('isi_ringkas',TRUE),
		'tujuan' => $this->input->post('tujuan',TRUE),
		'no_surat' => $this->input->post('no_surat',TRUE),
		'tgl_surat' => $this->input->post('tgl_surat',TRUE),
		'tgl_catat' => $this->input->post('tgl_catat',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'file' => $this->input->post('file',TRUE),
		'pengolah' => $this->input->post('pengolah',TRUE),
	    );

            $this->Input_surat_keluar_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('input_surat_keluar'));
        }*/
        //ambil variabel Postingan
        
        
        $idp					= addslashes($this->input->post('idp'));
		$no_agenda				= addslashes($this->input->post('no_agenda'));
		$kode					= addslashes($this->input->post('kode'));
		$tujuan					= addslashes($this->input->post('tujuan'));
		$no_surat				= addslashes($this->input->post('no_surat'));
		$tgl_surat				= addslashes($this->input->post('tgl_surat'));
		$isi_ringkas				= addslashes($this->input->post('isi_ringkas'));
		$keterangan					= addslashes($this->input->post('keterangan'));
       
        
        
        $sql = $this->db->query("SELECT * FROM input_surat_keluar where no_agenda='$no_agenda'");
        $sql2 = $this->db->query("SELECT * FROM input_surat_keluar where no_surat='$no_surat'");
        $no_agenda = $sql->num_rows();
        $no_surat = $sql2->num_rows();

        if ($no_agenda > 0 || $no_surat > 0) {
            $no_agenda	= gli("input_surat_keluar", "no_agenda", 4);
            $no_surat	= gli("input_surat_keluar", "no_surat", 4);
          //  $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Nomor surat sudah ada. Silahkan masukkan nomor lain </div>");
        //redirect(site_url('input_surat_keluar'));
        if ($this->upload->do_upload('file_surat_keluar')) {
            $up_data	 	= $this->upload->data();
            
        
            $this->db->query("INSERT INTO input_surat_keluar VALUES (NULL, '$kode', '$no_agenda', '$isi_ringkas', '$tujuan', '$no_surat', '$tgl_surat', NOW(), '$keterangan', '".$up_data['file_name']."', '".$this->session->userdata('admin_id')."')");
        } else {
            $this->db->query("INSERT INTO input_surat_keluar VALUES (NULL, '$kode', '$no_agenda', '$isi_ringkas', '$tujuan', '$no_surat', '$tgl_surat', NOW(), '$keterangan', '', '".$this->session->userdata('admin_id')."')");
        }	
    
    } else{
            $no_agenda				= addslashes($this->input->post('no_agenda'));
            $no_surat				= addslashes($this->input->post('no_surat'));
            if ($this->upload->do_upload('file_surat_keluar')) {
				$up_data	 	= $this->upload->data();
				
            
				$this->db->query("INSERT INTO input_surat_keluar VALUES (NULL, '$kode', '$no_agenda', '$isi_ringkas', '$tujuan', '$no_surat', '$tgl_surat', NOW(), '$keterangan', '".$up_data['file_name']."', '".$this->session->userdata('admin_id')."')");
			} else {
				$this->db->query("INSERT INTO input_surat_keluar VALUES (NULL, '$kode', '$no_agenda', '$isi_ringkas', '$tujuan', '$no_surat', '$tgl_surat', NOW(), '$keterangan', '', '".$this->session->userdata('admin_id')."')");
			}	
        }
			
            $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added.2 ".$this->upload->display_errors()."</div>");
            redirect(site_url('input_surat_keluar'));
        
    }
    
    public function update($id) 
    {
        $row = $this->Input_surat_keluar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul' => 'Edit',
                'button' => 'Update',
                'action' => site_url('input_surat_keluar/update_action'),
		'id' => set_value('id', $row->id),
		'kode' => set_value('kode', $row->kode),
		'no_agenda' => set_value('no_agenda', $row->no_agenda),
		'isi_ringkas' => set_value('isi_ringkas', $row->isi_ringkas),
		'tujuan' => set_value('tujuan', $row->tujuan),
		'no_surat' => set_value('no_surat', $row->no_surat),
		'tgl_surat' => set_value('tgl_surat', $row->tgl_surat),
		'tgl_catat' => set_value('tgl_catat', $row->tgl_catat),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'file' => set_value('file', $row->file),
		'pengolah' => set_value('pengolah', $row->pengolah),
	    );
            $this->template->load('template','input_surat_keluar_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('input_surat_keluar'));
        }
    }
    
    public function update_action() 
    {
       /* $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kode' => $this->input->post('kode',TRUE),
		'no_agenda' => $this->input->post('no_agenda',TRUE),
		'isi_ringkas' => $this->input->post('isi_ringkas',TRUE),
		'tujuan' => $this->input->post('tujuan',TRUE),
		'no_surat' => $this->input->post('no_surat',TRUE),
		'tgl_surat' => $this->input->post('tgl_surat',TRUE),
		'tgl_catat' => $this->input->post('tgl_catat',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'file' => $this->input->post('file',TRUE),
		
	    );

            $this->Input_surat_keluar_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('input_surat_keluar'));
        }*/
        
        //ambil variabel Postingan
        $idp					= addslashes($this->input->post('id'));
		$no_agenda				= addslashes($this->input->post('no_agenda'));
		$indek_berkas			= addslashes($this->input->post('indek_berkas'));
		$kode					= addslashes($this->input->post('kode'));
		$tujuan					= addslashes($this->input->post('tujuan'));
		$no_surat				= addslashes($this->input->post('no_surat'));
		$tgl_surat				= addslashes($this->input->post('tgl_surat'));
		$isi_ringkas				= addslashes($this->input->post('isi_ringkas'));
		$keterangan					= addslashes($this->input->post('keterangan'));
       
        if ($this->upload->do_upload('file_surat_keluar')) {
				$up_data	 	= $this->upload->data();
							
				$this->db->query("UPDATE input_surat_keluar SET kode = '$kode', no_agenda = '$no_agenda',  isi_ringkas = '$isi_ringkas', tujuan = '$tujuan', no_surat = '$no_surat', tgl_surat = '$tgl_surat', keterangan = '$keterangan', file = '".$up_data['file_name']."' WHERE id = '$idp'");
			} else {
				$this->db->query("UPDATE input_surat_keluar SET kode = '$kode', no_agenda = '$no_agenda',  isi_ringkas = '$isi_ringkas', tujuan = '$tujuan', no_surat = '$no_surat', tgl_surat = '$tgl_surat', keterangan = '$keterangan' WHERE id = '$idp'");
			}	
			
            $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added. ".$this->upload->display_errors()."</div>");
			redirect(site_url('input_surat_keluar'));
    }
    
    public function delete($id) 
    {
        $row = $this->Input_surat_keluar_model->get_by_id($id);

        if ($row) {
            $this->Input_surat_keluar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('input_surat_keluar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('input_surat_keluar'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode', 'kode', 'trim|required');
	$this->form_validation->set_rules('no_agenda', 'no agenda', 'trim|required');
	$this->form_validation->set_rules('isi_ringkas', 'isi ringkas', 'trim|required');
	$this->form_validation->set_rules('tujuan', 'tujuan', 'trim|required');
	$this->form_validation->set_rules('no_surat', 'no surat', 'trim|required');
	$this->form_validation->set_rules('tgl_surat', 'tgl surat', 'trim|required');
	$this->form_validation->set_rules('tgl_catat', 'tgl catat', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('file', 'file', 'trim|required');
	$this->form_validation->set_rules('pengolah', 'pengolah', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "input_surat_keluar.xls";
        $judul = "input_surat_keluar";
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
	xlsWriteLabel($tablehead, $kolomhead++, "No Agenda");
	xlsWriteLabel($tablehead, $kolomhead++, "Isi Ringkas");
	xlsWriteLabel($tablehead, $kolomhead++, "Tujuan");
	xlsWriteLabel($tablehead, $kolomhead++, "No Surat");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Surat");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Catat");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "File");
	xlsWriteLabel($tablehead, $kolomhead++, "Pengolah");

	foreach ($this->Input_surat_keluar_model->get_all_pdf() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_agenda);
	    xlsWriteLabel($tablebody, $kolombody++, $data->isi_ringkas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tujuan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_surat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_surat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_catat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->file);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pengolah);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=input_surat_keluar.doc");

        $data = array(
            'input_surat_keluar_data' => $this->Input_surat_keluar_model->get_all_pdf(),
            'start' => 0
        );
        
        $this->load->view('input_surat_keluar_doc',$data);
    }
    
    function pdf()
    {
        
        $this->load->library('fpdf_gen');
       
        $res['data2']	= $this->db->query("SELECT * FROM atur_cetak WHERE id = '1' order by id asc")->row();	
        $res['data'] = $this->Input_surat_keluar_model->get_all_pdf();
        $this->load->view('Input_surat_keluar_pdf',$res);
        
        
        
    }

}

/* End of file Input_surat_keluar.php */
/* Location: ./application/controllers/Input_surat_keluar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-04-17 02:48:00 */
/* http://harviacode.com */