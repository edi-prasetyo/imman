<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan_model extends CI_Model
{
    //load database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_jabatan()
    {
        $this->db->select('*');
        $this->db->from('jabatan');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
    public function detail_jabatan($id)
    {
        $this->db->select('*');
        $this->db->from('jabatan');
        $this->db->where('id', $id);
        $this->db->order_by('id');
        $query = $this->db->get();
        return $query->row();
    }
    //Read Berita
    public function read($jabatan_slug)
    {
        $this->db->select('*');
        $this->db->from('jabatan');
        $this->db->where(array(
            'jabatan.jabatan_slug'      =>  $jabatan_slug
        ));
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }
    public function create($data)
    {
        $this->db->insert('jabatan', $data);
    }
    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('jabatan', $data);
    }
    //Delete Data
    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('jabatan', $data);
    }
}
