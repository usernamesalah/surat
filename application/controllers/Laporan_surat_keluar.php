<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_surat_keluar extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        
    }

    public function index()
    {


        $this->template->load('template','laporan_surat_keluar_form');
    }

    public function cetak_surat_keluar() {
		$this->load->library('fpdf_gen');
		$tgl_start		= $this->input->get('tgl_start');
		$tgl_end		= $this->input->get('tgl_end');
		
		$a['tgl_start']	= $tgl_start;
		$a['tgl_end']	= $tgl_end;		

		//if ($jenis_surat == "agenda_surat_masuk") {	
			$a['data2']	= $this->db->query("SELECT * FROM atur_cetak WHERE id = '1'")->row();	
                        $a['data']	= $this->db->query("SELECT * FROM input_surat_keluar WHERE tgl_catat >= '$tgl_start' AND tgl_catat <= '$tgl_end' ORDER BY id")->result(); 
			$this->load->view('cetak_surat_keluar_pdf', $a);
		//} else {
		//	$a['data']	= $this->db->query("SELECT * FROM t_surat_keluar WHERE tgl_catat >= '$tgl_start' AND tgl_catat <= '$tgl_end' ORDER BY id")->result();
		//	$this->load->view('admin/agenda_surat_keluar', $a);
		//}
    }	
}

