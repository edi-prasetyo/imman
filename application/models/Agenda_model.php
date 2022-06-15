<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda_model extends CI_Model
{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //List Semua Agenda dengan Limit Pagination
  public function get_agenda($limit, $start)
  {
    $this->db->select('agenda.*,user.user_name');
    $this->db->from('agenda');
    // Join
    $this->db->join('user', 'user.id = agenda.created_by', 'LEFT');
    //End Join
    $this->db->order_by('id', 'DESC');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }
  //Total Agenda Main Page
  public function total_row()
  {
    $this->db->select('agenda.*,user.user_name');
    $this->db->from('agenda');
    // Join
    $this->db->join('user', 'user.id = agenda.created_by', 'LEFT');
    //End Join
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  //Total Detail agenda
  public function agenda_detail($id)
  {
    $this->db->select('*');
    $this->db->from('agenda');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->row();
  }
  // Insert data agenda ke database
  public function create($data)
  {
    $this->db->insert('agenda', $data);
  }
  //Update Data agenda ke database
  public function update($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->update('agenda', $data);
  }
  //Hapus Data Dari Database
  public function delete($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->delete('agenda', $data);
  }
  // Data Agenda yang di tampilkan di Front End
  //listing Agenda Main Page
  public function agenda($limit, $start)
  {
    $this->db->select('agenda.*,user.user_name');
    $this->db->from('agenda');
    // Join
    $this->db->join('user', 'user.id = agenda.created_by', 'LEFT');
    //End Join
    $this->db->order_by('id', 'DESC');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }
  public function agenda_home()
  {
    $this->db->select('agenda.*, user.user_name');
    $this->db->from('agenda');
    // Join
    $this->db->join('user', 'user.id = agenda.created_by', 'LEFT');
    //End Join
    $this->db->order_by('agenda.id', 'DESC');
    $this->db->limit(2);
    $query = $this->db->get();
    return $query->result();
  }
  //Total Agenda Main Page
  public function total()
  {
    $this->db->select('agenda.*, user.user_name');
    $this->db->from('agenda');
    // Join
    $this->db->join('user', 'user.id = agenda.created_by', 'LEFT');
    //End Join
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  //Read Agenda
  public function read($agenda_slug)
  {
    $this->db->select('agenda.*, user.user_name');
    $this->db->from('agenda');
    // Join
    $this->db->join('user', 'user.id = agenda.created_by', 'LEFT');
    //End Join
    $this->db->where(array(
      'agenda.agenda_slug'      =>  $agenda_slug
    ));
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->row();
  }
}
