<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Input_surat_masuk_model');
        $this->load->model('Input_surat_keluar_model');
        $this->load->model('Klasifikasi_surat_model');
        $this->load->model('Admin_model');
        
    }

    public function index()
    {

        $a['surat_masuk'] = $this->Input_surat_masuk_model->tampil_surat_masuk()->num_rows(); 
	$a['surat_keluar'] = $this->Input_surat_keluar_model->tampil_surat_keluar()->num_rows(); 
	$a['klasifikasi_surat'] = $this->Klasifikasi_surat_model->tampil_klasifikasi_surat()->num_rows(); 
	$a['admin'] = $this->Admin_model->tampil_admin()->num_rows(); 
		
	//$this->load->view('admin/index', $a);
        $this->template->load('template','home', $a);
    }

    
}
