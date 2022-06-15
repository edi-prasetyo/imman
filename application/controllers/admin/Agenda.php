<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{
  /**
   * Development By Edi Prasetyo
   * edikomputer@gmail.com
   * 0812 3333 5523
   * https://edikomputer.com
   * https://grahastudio.com
   */
  //load data
  public function __construct()
  {
    parent::__construct();
    $this->load->model('agenda_model');
    $this->load->library('pagination');
  }

  public function index()
  {
    $config['base_url']         = base_url('admin/agenda/index/');
    $config['total_rows']       = count($this->agenda_model->total_row());
    $config['per_page']         = 5;
    $config['uri_segment']      = 4;

    $config['first_link']       = 'First';
    $config['last_link']        = 'Last';
    $config['next_link']        = 'Next';
    $config['prev_link']        = 'Prev';
    $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']   = '</ul></nav></div>';
    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']    = '</span></li>';
    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']  = '</span>Next</li>';
    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close'] = '</span></li>';
    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']  = '</span></li>';

    $limit                      = $config['per_page'];
    $start                      = ($this->uri->segment(4)) ? ($this->uri->segment(4)) : 0;

    $this->pagination->initialize($config);
    $agenda = $this->agenda_model->get_agenda($limit, $start);
    $data = [
      'title'                   => 'Data Agenda',
      'agenda'                  => $agenda,
      'pagination'              => $this->pagination->create_links(),
      'content'                 => 'admin/agenda/index'
    ];
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }

  public function create()
  {
    $this->form_validation->set_rules(
      'agenda_title',
      'Judul Agenda',
      'required',
      [
        'required'              => 'Judul Agenda harus di isi',
      ]
    );
    $this->form_validation->set_rules(
      'agenda_desc',
      'Deskripsi Agenda',
      'required',
      [
        'required'              => 'Deskripsi Agenda harus di isi',
      ]
    );
    if ($this->form_validation->run()) {

      $config['upload_path']      = './assets/img/artikel/';
      $config['allowed_types']    = 'gif|jpg|png|jpeg';
      $config['max_size']         = 5000000;
      $config['max_width']        = 5000000;
      $config['max_height']       = 5000000;
      $config['remove_spaces']    = TRUE;
      $config['encrypt_name']     = TRUE;
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('agenda_image')) {

        $data = [
          'title'                 => 'Tambah Agenda',
          'error_upload'          => $this->upload->display_errors(),
          'content'               => 'admin/agenda/create'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
      } else {
        $upload_data                = array('uploads'  => $this->upload->data());
        $config['image_library']    = 'gd2';
        $config['source_image']     = './assets/img/artikel/' . $upload_data['uploads']['file_name'];
        $config['create_thumb']     = TRUE;
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 500;
        $config['height']           = 500;
        $config['thumb_marker']     = '';
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        $slugcode = random_string('numeric', 5);
        $agenda_slug  = url_title($this->input->post('agenda_title'), 'dash', TRUE);
        $data  = [
          'created_by'                 => $this->session->userdata('id'),
          'agenda_slug'             => $slugcode . '-' . $agenda_slug,
          'agenda_title'            => $this->input->post('agenda_title'),
          'agenda_desc'             => $this->input->post('agenda_desc'),
          'agenda_image'           => $upload_data['uploads']['file_name'],
          'agenda_date'             => $this->input->post('agenda_date'),
          'agenda_jam'             => $this->input->post('agenda_jam'),
          'agenda_location'             => $this->input->post('agenda_location'),
          'agenda_map'             => $this->input->post('agenda_map'),
          'created_at'            => date('Y-m-d H:i:s')
        ];
        $this->agenda_model->create($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data Agenda telah ditambahkan</div>');
        redirect(base_url('admin/agenda'), 'refresh');
      }
    }

    $data = [
      'title'                       => 'Tambah Agenda',
      'content'                     => 'admin/agenda/create'
    ];
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }

  public function Update($id)
  {
    $agenda = $this->agenda_model->agenda_detail($id);

    $valid = $this->form_validation;
    $valid->set_rules(
      'agenda_title',
      'Judul Agenda',
      'required',
      ['required'                   => '%s harus diisi']
    );
    $valid->set_rules(
      'agenda_desc',
      'Isi Agenda',
      'required',
      ['required'                   => '%s harus diisi']
    );
    if ($valid->run()) {

      if (!empty($_FILES['agenda_image']['name'])) {

        $config['upload_path']        = './assets/img/artikel/';
        $config['allowed_types']      = 'gif|jpg|png|jpeg';
        $config['max_size']           = 5000000;
        $config['max_width']          = 5000000;
        $config['max_height']         = 5000000;
        $config['remove_spaces']      = TRUE;
        $config['encrypt_name']       = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('agenda_image')) {

          $data = [
            'title'                   => 'Edit Agenda',
            'agenda'                  => $agenda,
            'error_upload'            => $this->upload->display_errors(),
            'content'                 => 'admin/agenda/update'
          ];
          $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {

          $upload_data                = array('uploads'  => $this->upload->data());
          $config['image_library']    = 'gd2';
          $config['source_image']     = './assets/img/artikel/' . $upload_data['uploads']['file_name'];
          $config['create_thumb']     = TRUE;
          $config['maintain_ratio']   = TRUE;
          $config['width']            = 500;
          $config['height']           = 500;
          $config['thumb_marker']     = '';
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          if ($agenda->agenda_image != "") {
            unlink('./assets/img/artikel/' . $agenda->agenda_image);
          }

          $data  = [
            'id'                      => $id,
            'created_by'                 => $this->session->userdata('id'),
            'agenda_title'            => $this->input->post('agenda_title'),
            'agenda_desc'             => $this->input->post('agenda_desc'),
            'agenda_image'           => $upload_data['uploads']['file_name'],
            'agenda_date'             => $this->input->post('agenda_date'),
            'agenda_jam'             => $this->input->post('agenda_jam'),
            'agenda_location'             => $this->input->post('agenda_location'),
            'agenda_map'             => $this->input->post('agenda_map'),
            'updated_at'            => date('Y-m-d H:i:s')
          ];
          $this->agenda_model->update($data);
          $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di Update</div>');
          redirect(base_url('admin/agenda'), 'refresh');
        }
      } else {

        if ($agenda->agenda_image != "")
          $data  = [
            'id'                        => $id,
            'created_by'                 => $this->session->userdata('id'),
            'agenda_title'            => $this->input->post('agenda_title'),
            'agenda_desc'             => $this->input->post('agenda_desc'),
            // 'agenda_image'           => $upload_data['uploads']['file_name'],
            'agenda_date'             => $this->input->post('agenda_date'),
            'agenda_jam'             => $this->input->post('agenda_jam'),
            'agenda_location'             => $this->input->post('agenda_location'),
            'agenda_map'             => $this->input->post('agenda_map'),
            'updated_at'            => date('Y-m-d H:i:s')
          ];
        $this->agenda_model->update($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di Update</div>');
        redirect(base_url('admin/agenda'), 'refresh');
      }
    }

    $data = [
      'title'                         => 'Update Agenda',
      'agenda'                        => $agenda,
      'content'                       => 'admin/agenda/update'
    ];
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }

  public function delete($id)
  {
    is_login();
    $agenda = $this->agenda_model->agenda_detail($id);

    if ($agenda->agenda_image != "") {
      unlink('./assets/img/artikel/' . $agenda->agenda_image);
    }

    $data = ['id'                   => $agenda->id];
    $this->agenda_model->delete($data);
    $this->session->set_flashdata('message', '<div class="alert alert-danger">Data telah di Hapus</div>');
    redirect($_SERVER['HTTP_REFERER']);
  }
}
