<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Input_surat_keluar_model extends CI_Model
{

    public $table = 'input_surat_keluar';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_all_pdf()
    {
        $this->db->order_by($this->id, asc);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('kode', $q);
	$this->db->or_like('no_agenda', $q);
	$this->db->or_like('isi_ringkas', $q);
	$this->db->or_like('tujuan', $q);
	$this->db->or_like('no_surat', $q);
	$this->db->or_like('tgl_surat', $q);
	$this->db->or_like('tgl_catat', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('file', $q);
	$this->db->or_like('pengolah', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('kode', $q);
	$this->db->or_like('no_agenda', $q);
	$this->db->or_like('isi_ringkas', $q);
	$this->db->or_like('tujuan', $q);
	$this->db->or_like('no_surat', $q);
	$this->db->or_like('tgl_surat', $q);
	$this->db->or_like('tgl_catat', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('file', $q);
	$this->db->or_like('pengolah', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    
    function tampil_surat_keluar()
    {
	return $this->db->get('input_surat_keluar');
    }

}

/* End of file Input_surat_keluar_model.php */
/* Location: ./application/models/Input_surat_keluar_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-04-17 02:48:00 */
/* http://harviacode.com */