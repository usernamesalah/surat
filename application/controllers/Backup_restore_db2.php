<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Backup_restore_db extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->load->library('upload');
        
        //upload config 
		$config['upload_path'] 		= './upload/temp/';
		$config['allowed_types'] 	= 'txt';
		$config['max_size']		= '8000';
		$config['max_width']  		= '13000';
		$config['max_height'] 		= '13000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
    }

    public function index()
    {
        if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("auth");
		}
        
    }

    public function tool() {
            if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("auth");
		}
		$this->load->helper('download');
		$this->load->dbutil();	
			
		
                
                
                $a['page']		= "backup_restore_db_form";
		
		$mau_ke			= $this->uri->segment(3);
		
		if ($mau_ke == "backup") {
			$nama_file	= 'bck_surat_'.date('Y-m-d-h-i-s');
			$prefs = array(
					'format'      => 'txt',             // gzip, zip, txt
					'filename'    => $nama_file.'.sql',    // File name - NEEDED ONLY WITH ZIP FILES
					'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
					'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
					'newline'     => "\n"               // Newline character used in backup file
				);

			$this->dbutil->backup($prefs);
			$backup =& $this->dbutil->backup(); 
			force_download($nama_file.'.sql', $backup);
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Backup database berhasil</div>");
			redirect('backup_restore_db/tool');
		} else if ($mau_ke == "optimize") {
			$result = $this->dbutil->optimize_database();
			if ($result !== FALSE) {
				$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Optimize database selesai</div>");
				redirect('backup_restore_db/tool');
			} else {
				$this->session->set_flashdata("k", "<div class=\"alert alert-error\">Optimize database gagal</div>");
				redirect('backup_restore_db/tool');
			}
 		} else if ($mau_ke == "restore") {
		
			if ($this->upload->do_upload('file_foto_profil')) {
				$up_data	 	= $this->upload->data();
				
				$direktori		= './upload/temp/'.$up_data['file_name'];
				
				$isi_file		= file_get_contents($direktori);
				$_satustelu		= substr($isi_file, 0, 103);
				
				$string_query	= rtrim($isi_file, "\n;" );
				$array_query	= explode(";", $string_query);
				
				foreach ($array_query as $query){
					$this->db->query(trim($query));
				}
				
				$path			= './upload/temp/';
				$this->load->helper("file"); // load the helper
				delete_files($path, true);
				$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Restore data sukses</div>");
				redirect('backup_restore_db/tool');
			} else {
				$this->session->set_flashdata("k", "<div class=\"alert alert-danger\" id=\"alert\">".$this->upload->display_errors()."</div>");
				redirect('backup_restore_db/tool');
			}
		}
		$this->template->load('template', 'backup_restore_db_form', $a);
		//$this->load->view('Backup_restore_db_form', $a);
	}
    
    public function create_action() 
    {
       
		
		
        if ($this->upload->do_upload('file_foto_profil')) {
				$up_data	 	= $this->upload->data();
				
            
				$this->db->query("INSERT INTO admin VALUES (NULL, '$username', '$password', '$nama', '$nip', '$level', '".$up_data['file_name']."' )");
			} else {
				$this->db->query("INSERT INTO admin VALUES (NULL, '$username', '$password', '$nama', '$nip', '$level', '' )");
			}	
			
			
            $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added. ".$this->upload->display_errors()."</div>");
            redirect(site_url('admin'));
        
        
        
    }
    
    
    
    
  
}



/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-04-23 17:30:50 */
/* http://harviacode.com */