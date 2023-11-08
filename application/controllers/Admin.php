<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
        
        //upload config 
		$config['upload_path'] 		= './upload/foto_profil/';
		$config['allowed_types'] 	= 'gif|jpeg|png|jpg';
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
        $admin = $this->Admin_model->get_all();

        $data = array(
            'admin_data' => $admin
        );

        $this->template->load('template','admin_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Admin_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'username' => $row->username,
		'password' => $row->password,
		'nama' => $row->nama,
		'nip' => $row->nip,
		'level' => $row->level,
	    );
            $this->template->load('template','admin_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul' => 'Tambah',
            'button' => 'Create',
            'action' => site_url('admin/create_action'),
	    'id' => set_value('id'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'nama' => set_value('nama'),
	    'nip' => set_value('nip'),
	    'level' => set_value('level'),
	);
        $this->template->load('template','admin_form', $data);
    }
    
    public function create_action() 
    {
       /* $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => md5($this->input->post('password',TRUE)),
		'nama' => $this->input->post('nama',TRUE),
		'nip' => $this->input->post('nip',TRUE),
		'level' => $this->input->post('level',TRUE),
	    );

            $this->Admin_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin'));
        }*/
        
              //ambil variabel Postingan
                $idp			= addslashes($this->input->post('idp'));
		$username		= addslashes($this->input->post('username'));
		$password               = md5($this->input->post('password'));
		$nama                   = addslashes($this->input->post('nama'));
		$nip			= addslashes($this->input->post('nip'));
		$level			= addslashes($this->input->post('level'));
		
		
        if ($this->upload->do_upload('file_foto_profil')) {
				$up_data	 	= $this->upload->data();
				
            
				$this->db->query("INSERT INTO admin VALUES (NULL, '$username', '$password', '$nama', '$nip', '$level', '".$up_data['file_name']."' )");
			} else {
				$this->db->query("INSERT INTO admin VALUES (NULL, '$username', '$password', '$nama', '$nip', '$level', '' )");
			}	
			
			
            $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added. ".$this->upload->display_errors()."</div>");
            redirect(site_url('admin'));
        
        
        
    }
    
    public function update($id) 
    {
        $row = $this->Admin_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul' => 'Edit',
                'button' => 'Update',
                'action' => site_url('admin/update_action'),
		'id' => set_value('id', $row->id),
		'username' => set_value('username', $row->username),
		'password' => set_value('password'),
		'nama' => set_value('nama', $row->nama),
		'nip' => set_value('nip', $row->nip),
		'level' => set_value('level', $row->level),
	    );
            $this->template->load('template','admin_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin'));
        }
    }
    
    public function update_action() 
    {
      /*  $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => md5($this->input->post('password',TRUE)),
		'nama' => $this->input->post('nama',TRUE),
		'nip' => $this->input->post('nip',TRUE),
		'level' => $this->input->post('level',TRUE),
	    );

            $this->Admin_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin'));
           
        }*/
        
         //ambil variabel Postingan
                $idp			= addslashes($this->input->post('id'));
		$username		= addslashes($this->input->post('username'));
		$password               = md5($this->input->post('password'));
		$nama                   = addslashes($this->input->post('nama'));
		$nip			= addslashes($this->input->post('nip'));
		$level			= addslashes($this->input->post('level'));
		
		
        if ($this->upload->do_upload('file_foto_profil')) {
				$up_data	 	= $this->upload->data();
				
            
				
			
                                $this->db->query("UPDATE admin SET username = '$username', password = '$password', nama = '$nama', nip = '$nip', level = '$level', foto_profil = '".$up_data['file_name']."' WHERE id = '$idp'");
			} else {
				$this->db->query("UPDATE admin SET username = '$username', password = '$password', nama = '$nama', nip = '$nip', level = '$level' WHERE id = '$idp'");
			}	
                        
                        
			
            $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added. ".$this->upload->display_errors()."</div>");
            redirect(site_url('admin'));
        
        
        
    }
    
    public function delete($id) 
    {
        $row = $this->Admin_model->get_by_id($id);

        if ($row) {
            $this->Admin_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('nip', 'nip', 'trim|required');
	$this->form_validation->set_rules('level', 'level', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "admin.xls";
        $judul = "admin";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Nip");
	xlsWriteLabel($tablehead, $kolomhead++, "Level");

	foreach ($this->Admin_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nip);
	    xlsWriteLabel($tablebody, $kolombody++, $data->level);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=admin.doc");

        $data = array(
            'admin_data' => $this->Admin_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('admin_doc',$data);
    }

    function pdf()
    {
        
        $this->load->library('fpdf_gen');
       
       
        $res['data'] = $this->Admin_model->get_all();
        $this->load->view('Admin_pdf',$res);
        
        
        
   }
    
    
  
}



/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-04-23 17:30:50 */
/* http://harviacode.com */