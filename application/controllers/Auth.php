<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		//$this->load->library(array('ion_auth','form_validation'));
		//$this->load->helper(array('url','language'));

		//$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		//$this->lang->load('auth');
	}

	// redirect if needed, otherwise display the user list
	function index()
	{
                $q_cek2	= $this->db->query("SELECT * FROM instansi_pengguna WHERE id = 1 ");
		$j_cek2	= $q_cek2->num_rows();
		$d_cek2	= $q_cek2->row();
                $data = array(
                    'instansi_id' 	=> $d_cek2->id,
                    'instansi_nama' 	=> $d_cek2->nama,
                    'instansi_logo' 	=> $d_cek2->logo,
                    
                    );
		$this->load->view('login2', $data);
	}

	// log the user in
	function login()
	{
		$u      = $this->security->xss_clean($this->input->post('u'));
		$ta     = $this->security->xss_clean($this->input->post('ta'));
                $p      = md5($this->security->xss_clean($this->input->post('p')));
         
		$q_cek	= $this->db->query("SELECT * FROM admin WHERE username = '".$u."' AND password = '".$p."'");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
                $q_cek2	= $this->db->query("SELECT * FROM instansi_pengguna WHERE id = 1 ");
		$j_cek2	= $q_cek2->num_rows();
		$d_cek2	= $q_cek2->row();
		
        if($j_cek == 1) {
            $data = array(
                    'admin_id' 		=> $d_cek->id,
                    'admin_user' 	=> $d_cek->username,
                    'admin_nama' 	=> $d_cek->nama,
                    'admin_ta' 		=> $ta,
                    'admin_foto'        => $d_cek->foto_profil,
                    'admin_level' 	=> $d_cek->level,
                    'logo'              => $d_cek2->logo,
                    'nama'              => $d_cek2->nama,
                    'admin_valid' 	=> true
                    );
            $this->session->set_userdata($data);
            
      

            
            
            
            redirect('home');
        } else {	
			$this->session->set_flashdata("k", "<div id=\"alert\" class=\"alert alert-error\">username or password is not valid</div>");
			redirect(site_url('auth'));
		}
	}

	// log the user out
	function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('auth'));
	}

	// change password
	function change_password()
	{
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect(site_url('auth/login'));
		}
		
		$ke				= $this->uri->segment(3);
		$id_user		= $this->session->userdata('admin_id');
		
		//var post
		$p1				= md5($this->input->post('p1'));
		$p2				= md5($this->input->post('p2'));
		$p3				= md5($this->input->post('p3'));
		
		if ($ke == "simpan") {
			$cek_password_lama	= $this->db->query("SELECT password FROM admin WHERE id = $id_user")->row();
			//echo 
			
			if ($cek_password_lama->password != $p1) {
				$this->session->set_flashdata('k_passwod', '<div id="alert" class="alert alert-error">Password Lama tidak sama</div>');
				redirect(site_url('auth/change_password'));
			} else if ($p2 != $p3) {
				$this->session->set_flashdata('k_passwod', '<div id="alert" class="alert alert-error">Password Baru 1 dan 2 tidak cocok</div>');
				redirect(site_url('auth/change_password'));
			} else {
				$this->db->query("UPDATE admin SET password = '$p3' WHERE id = '1'");
				$this->session->set_flashdata('k_passwod', '<div id="alert" class="alert alert-success">Password berhasil diperbaharui</div>');
				redirect(site_url('auth/change_password'));
			}
		} else {
			$a['page']	= "f_passwod";
		}
		
		$this->template->load('template','ubah_password2', $a);
		//$this->load->view('template','ubah_password3', $a);
	}
	
}