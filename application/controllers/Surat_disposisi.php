<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surat_disposisi extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Surat_disposisi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $surat_disposisi = $this->Surat_disposisi_model->get_by_id($id);

        $data = array(
            'surat_disposisi_data' => $surat_disposisi
        );

        $this->template->load('template','surat_disposisi_list', $data);
    }

    public function surat_disposisi() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
		
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(4);
		$idu1					= $this->uri->segment(3);
		$idu2					= $this->uri->segment(5);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$id_surat				= addslashes($this->input->post('id_surat'));
		$kpd_yth				= addslashes($this->input->post('kpd_yth'));
		$isi_disposisi                          = addslashes($this->input->post('isi_disposisi'));
		$sifat					= addslashes($this->input->post('sifat'));
		$batas_waktu                            = addslashes($this->input->post('batas_waktu'));
		$catatan				= addslashes($this->input->post('catatan'));
		
		$cari					= addslashes($this->input->post('q'));
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_disposisi WHERE id_surat = '$idu1'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."admin/surat_disposisi/".$idu1."/p");
		
		$a['judul_surat']	= gval("t_surat_masuk", "id", "isi_ringkas", $idu1);
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM t_disposisi WHERE id = '$idu2'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('index.php/admin/surat_disposisi/'.$idu2);
		} else if ($mau_ke == "add") {
			$a['page']		= "f_surat_disposisi";
		} else if ($mau_ke == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_disposisi WHERE id = '$idu2'")->row();	
			$a['page']		= "f_surat_disposisi";
		} else if ($mau_ke == "act_add") {	
			$this->db->query("INSERT INTO t_disposisi VALUES (NULL, '$id_surat', '$kpd_yth', '$isi_disposisi', '$sifat', '$batas_waktu', '$catatan')");
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('index.php/admin/surat_disposisi/'.$id_surat);
		} else if ($mau_ke == "act_edt") {
			$this->db->query("UPDATE t_disposisi SET kpd_yth = '$kpd_yth', isi_disposisi = '$isi_disposisi', sifat = '$sifat', batas_waktu = '$batas_waktu', catatan = '$catatan' WHERE id = '$idp'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated</div>");			
			redirect('index.php/admin/surat_disposisi/'.$id_surat);
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_disposisi WHERE id_surat = '$idu1' LIMIT $awal, $akhir ")->result();
			$a['page']		= "l_surat_disposisi";
		}
		
		$this->load->view('admin/aaa', $a);	
	}
    
    
    public function seek($id)
    {
       // $surat_disposisi = $this->Surat_disposisi_model->seek_by_id($id);
       
        $data ['surat_disposisi_data'] = $this->db->query("SELECT * FROM surat_disposisi WHERE id_surat = $id ")->result();
       // $data = array(
       //     'surat_disposisi_data' => $surat_disposisi,
       //     'input_surat_data' => $input_surat   
       // );
        $data['judul_surat']	= gval("input_surat_masuk", "id", "isi_ringkas", $id);
        $this->template->load('template','surat_disposisi_list', $data);
    }
    
    public function read($id) 
    {
        $row = $this->Surat_disposisi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_surat' => $row->id_surat,
		'kpd_yth' => $row->kpd_yth,
		'isi_disposisi' => $row->isi_disposisi,
		'sifat' => $row->sifat,
		'batas_waktu' => $row->batas_waktu,
		'catatan' => $row->catatan,
	    );
            $this->template->load('template','surat_disposisi_list', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_disposisi_list'));
        }
    }

    public function create($id) 
    {
     
            $data = array(
                'button' => 'Create',
                'action' => site_url('surat_disposisi/create_action'),
                'id' => set_value('id'),
                'id_surat' => set_value('id_surat', $this->uri->segment(3)),
                'kpd_yth' => set_value('kpd_yth'),
                'isi_disposisi' => set_value('isi_disposisi'),
                'sifat' => set_value('sifat'),
                'batas_waktu' => set_value('batas_waktu'),
                'catatan' => set_value('catatan'),
	);
        $this->template->load('template','surat_disposisi_form', $data);
        
    }
    
    public function create_action() 
    {
        $this->_rules();
        $id_surat				= addslashes($this->input->post('id_surat'));
        if ($this->form_validation->run() == FALSE) {
            $this->create($this->input->post('id_surat', TRUE));
        } else {
            $data = array(
		'id_surat' => $this->input->post('id_surat',TRUE),
		'kpd_yth' => $this->input->post('kpd_yth',TRUE),
		'isi_disposisi' => $this->input->post('isi_disposisi',TRUE),
		'sifat' => $this->input->post('sifat',TRUE),
		'batas_waktu' => $this->input->post('batas_waktu',TRUE),
		'catatan' => $this->input->post('catatan',TRUE),
	    );

            $this->Surat_disposisi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('surat_disposisi/seek/'. $id_surat));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Surat_disposisi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('surat_disposisi/update_action'),
		'id' => set_value('id', $row->id),
		'id_surat' => set_value('id_surat', $row->id_surat),
		'kpd_yth' => set_value('kpd_yth', $row->kpd_yth),
		'isi_disposisi' => set_value('isi_disposisi', $row->isi_disposisi),
		'sifat' => set_value('sifat', $row->sifat),
		'batas_waktu' => set_value('batas_waktu', $row->batas_waktu),
		'catatan' => set_value('catatan', $row->catatan),
	    );
            $this->template->load('template','surat_disposisi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_disposisi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $id_surat				= addslashes($this->input->post('id_surat'));
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_surat' => $this->input->post('id_surat',TRUE),
		'kpd_yth' => $this->input->post('kpd_yth',TRUE),
		'isi_disposisi' => $this->input->post('isi_disposisi',TRUE),
		'sifat' => $this->input->post('sifat',TRUE),
		'batas_waktu' => $this->input->post('batas_waktu',TRUE),
		'catatan' => $this->input->post('catatan',TRUE),
	    );

            $this->Surat_disposisi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('surat_disposisi/seek/'. $id_surat));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Surat_disposisi_model->get_by_id($id);
       // $id_surat				= addslashes($this->input->post('id'));
        if ($row) {
            $this->Surat_disposisi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('surat_disposisi/seek/'. $row->id_surat));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_disposisi/seek/'. $row->id_surat));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_surat', 'id surat', 'trim|required');
	$this->form_validation->set_rules('kpd_yth', 'kpd yth', 'trim|required');
	$this->form_validation->set_rules('isi_disposisi', 'isi disposisi', 'trim|required');
	$this->form_validation->set_rules('sifat', 'sifat', 'trim|required');
	$this->form_validation->set_rules('batas_waktu', 'batas waktu', 'trim|required');
	$this->form_validation->set_rules('catatan', 'catatan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "surat_disposisi.xls";
        $judul = "surat_disposisi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Surat");
	xlsWriteLabel($tablehead, $kolomhead++, "Kpd Yth");
	xlsWriteLabel($tablehead, $kolomhead++, "Isi Disposisi");
	xlsWriteLabel($tablehead, $kolomhead++, "Sifat");
	xlsWriteLabel($tablehead, $kolomhead++, "Batas Waktu");
	xlsWriteLabel($tablehead, $kolomhead++, "Catatan");

	foreach ($this->Surat_disposisi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_surat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kpd_yth);
	    xlsWriteLabel($tablebody, $kolombody++, $data->isi_disposisi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sifat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->batas_waktu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->catatan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=surat_disposisi.doc");

        $data = array(
            'surat_disposisi_data' => $this->Surat_disposisi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('surat_disposisi_doc',$data);
    }

}

/* End of file Surat_disposisi.php */
/* Location: ./application/controllers/Surat_disposisi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-01 17:53:25 */
/* http://harviacode.com */