<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Instansi_pengguna extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Instansi_pengguna_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
        
        //upload config 
		$config['upload_path'] 		= './upload/foto_instansi/';
		$config['allowed_types'] 	= 'gif|jpeg|png|jpg';
		$config['max_size']		= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
  
    }

    public function index()
    {
        $instansi_pengguna = $this->Instansi_pengguna_model->get_all();

        $data = array(
            'instansi_pengguna_data' => $instansi_pengguna
        );

        $this->template->load('template','instansi_pengguna_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Instansi_pengguna_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
		'alamat' => $row->alamat,
		'kadinkes' => $row->kadinkes,
		'nip_kadinkes' => $row->nip_kadinkes,
		'logo' => $row->logo,
	    );
            $this->template->load('template','instansi_pengguna_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('instansi_pengguna'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('instansi_pengguna/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	    'alamat' => set_value('alamat'),
	    'kadinkes' => set_value('kadinkes'),
	    'nip_kadinkes' => set_value('nip_kadinkes'),
	    'logo' => set_value('logo'),
	);
        $this->template->load('template','instansi_pengguna_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'kadinkes' => $this->input->post('kadinkes',TRUE),
		'nip_kadinkes' => $this->input->post('nip_kadinkes',TRUE),
		'logo' => $this->input->post('logo',TRUE),
	    );

            $this->Instansi_pengguna_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('instansi_pengguna'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Instansi_pengguna_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('instansi_pengguna/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
		'alamat' => set_value('alamat', $row->alamat),
		'kadinkes' => set_value('kadinkes', $row->kadinkes),
		'nip_kadinkes' => set_value('nip_kadinkes', $row->nip_kadinkes),
		'logo' => set_value('logo', $row->logo),
	    );
            $this->template->load('template','instansi_pengguna_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('instansi_pengguna'));
        }
    }
    
    public function update_action()
    {
       //ambil variabel Postingan
		$idp					= addslashes($this->input->post('id'));
		$nama					= addslashes($this->input->post('nama'));
		$alamat					= addslashes($this->input->post('alamat'));
		$kadinkes				= addslashes($this->input->post('kadinkes'));
		$nip_kadinkes				= addslashes($this->input->post('nip_kadinkes'));
		
	//upload config 
		//$config['upload_path'] 		= './upload/foto_instansi';
		//$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		

		//$this->load->library('upload', $config);	
       
            if ($this->upload->do_upload('logo')) {
				$up_data	 	= $this->upload->data();
				
				$this->db->query("UPDATE instansi_pengguna SET nama = '$nama', alamat = '$alamat', kadinkes = '$kadinkes', nip_kadinkes = '$nip_kadinkes', logo = '".$up_data['file_name']."' WHERE id = '$idp'");

			} else {
				$this->db->query("UPDATE instansi_pengguna SET nama = '$nama', alamat = '$alamat', kadinkes = '$kadinkes', nip_kadinkes = '$nip_kadinkes' WHERE id = '$idp'");
			}		

			
            $this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added. ".$this->upload->display_errors()."</div>");
			redirect(site_url('instansi_pengguna'));
    }
    
    public function update_action2() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'kadinkes' => $this->input->post('kadinkes',TRUE),
		'nip_kadinkes' => $this->input->post('nip_kadinkes',TRUE),
		'logo' => $this->input->post('logo',TRUE),
	    );

            $this->Instansi_pengguna_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('instansi_pengguna'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Instansi_pengguna_model->get_by_id($id);

        if ($row) {
            $this->Instansi_pengguna_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('instansi_pengguna'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('instansi_pengguna'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('kadinkes', 'kadinkes', 'trim|required');
	$this->form_validation->set_rules('nip_kadinkes', 'nip kadinkes', 'trim|required');
	$this->form_validation->set_rules('logo', 'logo', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Instansi_pengguna.php */
/* Location: ./application/controllers/Instansi_pengguna.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-06-01 14:17:03 */
/* http://harviacode.com */