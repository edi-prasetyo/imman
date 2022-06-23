<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
  //load database
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  //listing Pendaftaran
  public function listUser()
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function get_admin()
  {
    $this->db->select('user.*, user_role.role');
    $this->db->from('user');
    // join
    $this->db->join('user_role', 'user_role.id = user.role_id', 'LEFT');
    // End Join
    $this->db->where('role_id', 1);
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function get_pengurus()
  {
    $this->db->select('user.*, user_role.role, jabatan.jabatan_name');
    $this->db->from('user');
    // join
    $this->db->join('user_role', 'user_role.id = user.role_id', 'LEFT');
    $this->db->join('jabatan', 'jabatan.id = user.jabatan_id', 'LEFT');
    // End Join
    $this->db->where('role_id', 3);
    $this->db->or_where('role_id', 2);
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function pengurus($kota_id)
  {
    $this->db->select('user.*, user_role.role, jabatan.jabatan_name');
    $this->db->from('user');
    // join
    $this->db->join('user_role', 'user_role.id = user.role_id', 'LEFT');
    $this->db->join('jabatan', 'jabatan.id = user.jabatan_id', 'LEFT');
    // End Join
    $this->db->where('kota_id', $kota_id);
    $this->db->or_where('role_id', 2);
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function cari_pengurus($kota_id = null)
  {
    $this->db->select('*');
    $this->db->from('user');
    // $this->db->where('user_type', 'DPP');
    if (!empty($kota_id)) {
      $this->db->like('md5(kota_id)', $kota_id);
      $this->db->where('user_type', 'DPD');
    }
    return $this->db->get()->result_array();
  }
  // public function cari_pengurus($kota_id = null)
  // {
  //   $this->db->select('*');
  //   $this->db->from('user');
  //   $this->db->where('md5(kota_id)', $kota_id);
  //   $query = $this->db->get();
  //   return $query->result();
  // }
  public function get_anggota()
  {
    $this->db->select('user.*, user_role.role');
    $this->db->from('user');
    // join
    $this->db->join('user_role', 'user_role.id = user.role_id', 'LEFT');
    // End Join
    $this->db->where('role_id', 4);
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function home_dpp()
  {
    $this->db->select('user.*, user_role.role, jabatan.jabatan_name');
    $this->db->from('user');
    // join
    $this->db->join('user_role', 'user_role.id = user.role_id', 'LEFT');
    $this->db->join('jabatan', 'jabatan.id = user.jabatan_id', 'LEFT');
    // End Join
    $this->db->where('user_type', 'DPP');
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function update($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->update('user', $data);
  }
  // Dashboard
  public function user_member()
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('role_id', 3);
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  // Product User Read
  public function detail($id)
  {
    $this->db->select('user.*, jabatan.jabatan_name');
    $this->db->from('user');
    // join
    $this->db->join('jabatan', 'jabatan.id = user.jabatan_id', 'LEFT');
    // End Join
    $this->db->where('user.id', $id);
    $query = $this->db->get();
    return $query->row();
  }
  public function user_detail($user_id)
  {
    $this->db->select('user.*, jabatan.jabatan_name, kota.kota_name, user_role.role');
    $this->db->from('user');
    // join
    $this->db->join('jabatan', 'jabatan.id = user.jabatan_id', 'LEFT');
    $this->db->join('user_role', 'user_role.id = user.role_id', 'LEFT');
    $this->db->join('kota', 'kota.id = user.kota_id', 'LEFT');
    // End Join
    $this->db->where('user.id', $user_id);
    $query = $this->db->get();
    return $query->row();
  }
  public function detail_encrypt($user_id)
  {
    $this->db->select('user.*, jabatan.jabatan_name');
    $this->db->from('user');
    // join
    $this->db->join('jabatan', 'jabatan.id = user.jabatan_id', 'LEFT');
    // End Join
    $this->db->where('md5(user.id)', $user_id);
    $query = $this->db->get();
    return $query->row();
  }
  public function pengurus_dpd($kota_id)
  {
    $this->db->select('user.*, jabatan.jabatan_name, kota.kota_name');
    $this->db->from('user');
    // join
    $this->db->join('jabatan', 'jabatan.id = user.jabatan_id', 'LEFT');
    $this->db->join('kota', 'kota.id = user.kota_id', 'LEFT');
    // End Join
    $this->db->where(['role_id' => 3, 'kota_id' => $kota_id, 'user_type' => 'DPD']);
    $this->db->or_where('role_id', 2);
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
}
