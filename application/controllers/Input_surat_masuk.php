<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Input_surat_masuk extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Input_surat_masuk_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
        
        //upload config 
		$config['upload_path'] 		= './upload/surat_masuk/';
		$config['allowed_types'] 	= 'gif|jpg|jpeg|png|pdf|doc|docx';
		$config['max_size']		= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
    }

    public function index()
    {
        if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("auth");
		}
        $input_surat_masuk = $this->Input_surat_masuk_model->get_all();

        $data = array(
            'input_surat_masuk_data' => $input_surat_masuk
        );

        $this->template->load('template','input_surat_masuk_list', $data);
    }

    
    
    
    public function read($id) 
    {
        $row = $this->Input_surat_masuk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kode' => $row->kode,
		'no_agenda' => $row->no_agenda,
		'indek_berkas' => $row->indek_berkas,
		'isi_ringkas' => $row->isi_ringkas,
		'dari' => $row->dari,
		'no_surat' => $row->no_surat,
		'tgl_surat' => $row->tgl_surat,
		'tgl_diterima' => $row->tgl_diterima,
		'keterangan' => $row->keterangan,
		'file' => $row->file,
		'pengolah' => $row->pengolah,
	    );
            $this->template->load('template','input_surat_masuk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('input_surat_masuk'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul' => 'Tambah',
            'button' => 'Create',
            'action' => site_url('input_surat_masuk/create_action'),
	    'id' => set_value('id'),
	    'kode' => set_value('kode'),
	    'no_agenda' => set_value('no_agenda'),
	    'indek_berkas' => set_value('indek_berkas'),
	    'isi_ringkas' => set_value('isi_ringkas'),
	    'dari' => set_value('dari'),
	    'no_surat' => set_value('no_surat'),
	    'tgl_surat' => set_value('tgl_surat'),
	    'tgl_diterima' => set_value('tgl_diterima'),
	    'keterangan' => set_value('keterangan'),
	    'file_surat_masuk' => set_value('file_surat_masuk'),
	    'pengolah' => set_value('pengolah'),
	);
        $this->template->load('template','input_surat_masuk_form', $data);
    }
   
   public function create_action()
   {

       
                 //ambil variabel Postingan
                $idp					= addslashes($this->input->post('idp'));
		$no_agenda				= addslashes($this->input->post('no_agenda'));
		$indek_berkas                           = addslashes($this->input->post('indek_berkas'));
		$kode					= addslashes($this->input->post('kode'));
		$dari					= addslashes($this->input->post('dari'));
		$no_surat				= addslashes($this->input->post('no_surat'));
		$tgl_surat				= addslashes($this->input->post('tgl_surat'));
		$isi_ringkas				= addslashes($this->input->post('isi_ringkas'));
		$keterangan					= addslashes($this->input->post('keterangan'));
        
        $sql = $this->db->query("SELECT * FROM input_surat_masuk where no_agenda='$no_agenda'");
        
        $no_agenda = $sql->num_rows();
   

        if ($no_agenda > 0) {
            $no_agenda	= gli("input_surat_masuk", "no_agenda", 4);
            
            if ($this->upload->do_upload('file_surat_masuk')) {
				$up_data	 	= $this->upload->data();
				
            
				$this->db->query("INSERT INTO input_surat_masuk VALUES (NULL, '$kode', '$no_agenda', '$indek_berkas', '$isi_ringkas', '$dari', '$no_surat', '$tgl_surat', NOW(), '$keterangan', '".$up_data['file_name']."', '".$this->session->userdata('admin_id')."')");
			} else {
				$this->db->query("INSERT INTO input_surat_masuk VALUES (NULL, '$kode', '$no_agenda', '$indek_berkas', '$isi_ringkas', '$dari', '$no_surat', '$tgl_surat', NOW(), '$keterangan', '', '".$this->session->userdata('admin_id')."')");
			}	
        
        } else
                {
                    $no_agenda				= addslashes($this->input->post('no_agenda'));
                    if ($this->upload->do_upload('file_surat_masuk')) {
                        $up_data	 	= $this->upload->data();
                        
                    
                        $this->db->query("INSERT INTO input_surat_masuk VALUES (NULL, '$kode', '	$no_agenda', '$indek_berkas', '$isi_ringkas', '$dari', '$no_surat', '$tgl_surat', NOW(), '$keterangan', '".$up_data['file_name']."', '".$this->session->userdata('admin_id')."')");
                    } else {
                        $this->db->query("INSERT INTO input_surat_masuk VALUES (NULL, '$kode', '$no_agenda', '$indek_berkas', '$isi_ringkas', '$dari', '$no_surat', '$tgl_surat', NOW(), '$keterangan', '', '".$this->session->userdata('admin_id')."')");
                    }	

            }


            
        
        
        
			
			
            $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added. ".$this->upload->display_errors()."</div>");
            redirect(site_url('input_surat_masuk'));
        
   } 
   
   
    public function create_action2() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode' => $this->input->post('kode',TRUE),
		'no_agenda' => $this->input->post('no_agenda',TRUE),
		'indek_berkas' => $this->input->post('indek_berkas',TRUE),
		'isi_ringkas' => $this->input->post('isi_ringkas',TRUE),
		'dari' => $this->input->post('dari',TRUE),
		'no_surat' => $this->input->input_stream('no_surat',TRUE),
		'tgl_surat' => $this->input->post('tgl_surat',TRUE),
		'tgl_diterima' => $this->input->input_stream('tgl_diterima',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'file' => $this->input->post('file',TRUE),
		'pengolah' => $this->input->post('pengolah',TRUE),
	    );

            $this->Input_surat_masuk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('input_surat_masuk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Input_surat_masuk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul' => 'Edit',
                'button' => 'Update',
                'action' => site_url('input_surat_masuk/update_action'),
		'id' => set_value('id', $row->id),
		'kode' => set_value('kode', $row->kode),
		'no_agenda' => set_value('no_agenda', $row->no_agenda),
		'indek_berkas' => set_value('indek_berkas', $row->indek_berkas),
		'isi_ringkas' => set_value('isi_ringkas', $row->isi_ringkas),
		'dari' => set_value('dari', $row->dari),
		'no_surat' => set_value('no_surat', $row->no_surat),
		'tgl_surat' => set_value('tgl_surat', $row->tgl_surat),
		'tgl_diterima' => set_value('tgl_diterima', $row->tgl_diterima),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'file' => set_value('file', $row->file),
		'pengolah' => set_value('pengolah', $row->pengolah),
	    );
            $this->template->load('template','input_surat_masuk_form', $data);
        } else {
            $this->session->set_flashdata('k', 'Record Not Found');
            redirect(site_url('input_surat_masuk'));
        }
    }
    
    public function update_action()
    {
       //ambil variabel Postingan
        $idp					= addslashes($this->input->post('id'));
		$no_agenda				= addslashes($this->input->post('no_agenda'));
		$indek_berkas			= addslashes($this->input->post('indek_berkas'));
		$kode					= addslashes($this->input->post('kode'));
		$dari					= addslashes($this->input->post('dari'));
		$no_surat				= addslashes($this->input->post('no_surat'));
		$tgl_surat				= addslashes($this->input->post('tgl_surat'));
		$isi_ringkas				= addslashes($this->input->post('isi_ringkas'));
		$keterangan					= addslashes($this->input->post('keterangan'));
       
        if ($this->upload->do_upload('file_surat_masuk')) {
				$up_data	 	= $this->upload->data();
							
				$this->db->query("UPDATE input_surat_masuk SET kode = '$kode', no_agenda = '$no_agenda', indek_berkas = '$indek_berkas', isi_ringkas = '$isi_ringkas', dari = '$dari', no_surat = '$no_surat', tgl_surat = '$tgl_surat', keterangan = '$keterangan', file = '".$up_data['file_name']."' WHERE id = '$idp'");
			} else {
				$this->db->query("UPDATE input_surat_masuk SET kode = '$kode', no_agenda = '$no_agenda', indek_berkas = '$indek_berkas', isi_ringkas = '$isi_ringkas', dari = '$dari', no_surat = '$no_surat', tgl_surat = '$tgl_surat', keterangan = '$keterangan' WHERE id = '$idp'");
			}	
			
            $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added. ".$this->upload->display_errors()."</div>");
			redirect(site_url('input_surat_masuk'));
    }
    public function update_action2() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kode' => $this->input->post('kode',TRUE),
		'no_agenda' => $this->input->post('no_agenda',TRUE),
		'indek_berkas' => $this->input->post('indek_berkas',TRUE),
		'isi_ringkas' => $this->input->post('isi_ringkas',TRUE),
		'dari' => $this->input->post('dari',TRUE),
		'no_surat' => $this->input->post('no_surat',TRUE),
		'tgl_surat' => $this->input->post('tgl_surat',TRUE),
		'tgl_diterima' => $this->input->post('tgl_diterima',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'file' => $this->input->post('file',TRUE),
		'pengolah' => $this->input->post('pengolah',TRUE),
	    );

            $this->Input_surat_masuk_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('input_surat_masuk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Input_surat_masuk_model->get_by_id($id);

        if ($row) {
            $this->Input_surat_masuk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('input_surat_masuk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('input_surat_masuk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode', 'kode', 'trim|required');
	$this->form_validation->set_rules('no_agenda', 'no agenda', 'trim|required');
	$this->form_validation->set_rules('indek_berkas', 'indek berkas', 'trim|required');
	$this->form_validation->set_rules('isi_ringkas', 'isi ringkas', 'trim|required');
	$this->form_validation->set_rules('dari', 'dari', 'trim|required');
	$this->form_validation->set_rules('no_surat', 'no surat', 'trim|required');
	$this->form_validation->set_rules('tgl_surat', 'tgl surat', 'trim|required');
	$this->form_validation->set_rules('tgl_diterima', 'tgl diterima', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('file', 'file', 'trim|required');
	$this->form_validation->set_rules('pengolah', 'pengolah', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "input_surat_masuk.xls";
        $judul = "input_surat_masuk";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Indek Berkas");
	xlsWriteLabel($tablehead, $kolomhead++, "Isi Ringkas");
	xlsWriteLabel($tablehead, $kolomhead++, "Dari");
	xlsWriteLabel($tablehead, $kolomhead++, "No Surat");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Surat");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Diterima");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "File");
	xlsWriteLabel($tablehead, $kolomhead++, "Pengolah");

	foreach ($this->Input_surat_masuk_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_agenda);
	    xlsWriteLabel($tablebody, $kolombody++, $data->indek_berkas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->isi_ringkas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->dari);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_surat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_surat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_diterima);
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
        header("Content-Disposition: attachment;Filename=input_surat_masuk.doc");

        $data = array(
            'input_surat_masuk_data' => $this->Input_surat_masuk_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('input_surat_masuk_doc',$data);
        
    }
    
    
    function pdf()
    {
        
        $this->load->library('fpdf_gen');
       
        $res['data2']	= $this->db->query("SELECT * FROM atur_cetak WHERE id = '1'")->row();	
        $res['data'] = $this->Input_surat_masuk_model->get_all_pdf();
        $this->load->view('Input_surat_masuk_pdf',$res);
        
        
        
    }

    function cetak()
    {
        
        $this->load->library('fpdf_gen');
       
       
        //$res['data'] = $this->Input_surat_masuk_model->get_all();
        //$this->load->view('Input_surat_masuk_cetak',$res);
        
        $idu = $this->uri->segment(3);
        $res['data4']	= $this->db->query("SELECT * FROM atur_cetak WHERE id = '1'")->row();	
	$res['data']	= $this->db->query("SELECT * FROM input_surat_masuk WHERE id = '$idu'")->row();	
	$res['data2']	= $this->db->query("SELECT kpd_yth FROM surat_disposisi WHERE id = '$idu'")->result();	
	$res['data3']	= $this->db->query("SELECT kpd_yth, isi_disposisi, sifat, batas_waktu FROM surat_disposisi WHERE id_surat = '$idu'")->result();	
	$this->load->view('Input_surat_masuk_cetak',$res);
        
    }
    
    
    
}

/* End of file Input_surat_masuk.php */
/* Location: ./application/controllers/Input_surat_masuk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-04-30 22:01:15 */
/* http://harviacode.com */