<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myaccount extends CI_Controller
{
  /**
   * Development By Edi Prasetyo
   * edikomputer@gmail.com
   * 0812 3333 5523
   * https://edikomputer.com
   * https://grahastudio.com
   */

  public function __construct()
  {
    parent::__construct();
    $this->load->library('upload');
    $this->load->library('pagination');
    $this->load->model('meta_model');
    $this->load->model('jabatan_model');
  }

  public function index()
  {
    $id = $this->session->userdata('id');
    $user = $this->user_model->user_detail($id);
    $meta = $this->meta_model->get_meta();

    $data = array(
      'title'                           => 'Akun Saya',
      'deskripsi'                       => 'Berita - ' . $meta->description,
      'keywords'                        => 'Berita - ' . $meta->keywords,
      'user'                            => $user,
      'meta'                            => $meta,
      'content'                         => 'front/myaccount/index_account'
    );
    $this->load->view('front/layout/wrapp', $data, FALSE);
  }
  public function update()
  {
    $id = $this->session->userdata('id');
    $user = $this->user_model->user_detail($id);
    $meta = $this->meta_model->get_meta();




    $this->form_validation->set_rules(
      'user_name',
      'Nama',
      'required',
      [
        'required'                      => 'Nama harus di isi'
      ]
    );
    if ($this->form_validation->run()) {

      if (!empty($_FILES['user_image']['name'])) {
        $config['upload_path']          = './assets/img/avatars/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5000000;
        $config['max_width']            = 5000000;
        $config['max_height']           = 5000000;
        $config['remove_spaces']        = TRUE;
        $config['encrypt_name']         = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('user_image')) {



          // Desktop View
          $data = [
            'title'                     => 'Ubah Profile',
            'deskripsi'                 => 'Profile - ' . $meta->description,
            'keywords'                  => 'Profile - ' . $meta->keywords,
            'meta'                      => $meta,
            'error_upload'              => $this->upload->display_errors(),
            'content'                   => 'front/myaccount/update_account'
          ];
          $this->load->view('front/layout/wrapp', $data, FALSE);
        } else {


          $upload_data                  = array('uploads'  => $this->upload->data());
          $config['image_library']      = 'gd2';
          $config['source_image']       = './assets/img/avatars/' . $upload_data['uploads']['file_name'];
          $config['create_thumb']       = TRUE;
          $config['maintain_ratio']     = TRUE;
          $config['width']              = 500;
          $config['height']             = 500;
          $config['thumb_marker']       = '';
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          if ($user->user_image != "") {
            unlink('./assets/img/avatars/' . $user->user_image);
          }


          $user_whatsapp = $this->input->post('user_whatsapp');
          $phone = str_replace(' ', '', $user_whatsapp);
          $phone = str_replace('-', '', $user_whatsapp);

          // Ubah 0 menjadi 62
          // kadang ada penulisan no hp 0811 239 345
          $phone = str_replace(" ", "", $phone);
          // kadang ada penulisan no hp (0274) 778787
          $phone = str_replace("(", "", $phone);
          // kadang ada penulisan no hp (0274) 778787
          $phone = str_replace(")", "", $phone);
          // kadang ada penulisan no hp 0811.239.345
          $phone = str_replace(".", "", $phone);

          // cek apakah no hp mengandung karakter + dan 0-9
          if (!preg_match('/[^+0-9]/', trim($phone))) {
            // cek apakah no hp karakter 1-3 adalah +62
            if (substr(trim($phone), 0, 3) == '62') {
              $hp = trim($phone);
            }
            // cek apakah no hp karakter 1 adalah 0
            elseif (substr(trim($phone), 0, 1) == '0') {
              $hp = '62' . substr(trim($phone), 1);
            }
          }

          $data  = [
            'id'                        => $id,
            'user_name'                 => $this->input->post('user_name'),
            'email'                     => $this->input->post('email'),
            'user_image'                => $upload_data['uploads']['file_name'],
            'user_whatsapp'                => $hp,
            'user_address'              => $this->input->post('user_address'),
            'updated_at'              => date('Y-m-d H:i:s')
          ];
          $this->user_model->update($data);
          $this->session->set_flashdata('message', 'Data telah di Update');
          redirect(base_url('myaccount'), 'refresh');
        }
      } else {
        if ($user->user_image != "")

          $user_whatsapp = $this->input->post('user_whatsapp');
        $phone = str_replace(' ', '', $user_whatsapp);
        $phone = str_replace('-', '', $user_whatsapp);

        // Ubah 0 menjadi 62
        // kadang ada penulisan no hp 0811 239 345
        $phone = str_replace(" ", "", $phone);
        // kadang ada penulisan no hp (0274) 778787
        $phone = str_replace("(", "", $phone);
        // kadang ada penulisan no hp (0274) 778787
        $phone = str_replace(")", "", $phone);
        // kadang ada penulisan no hp 0811.239.345
        $phone = str_replace(".", "", $phone);

        // cek apakah no hp mengandung karakter + dan 0-9
        if (!preg_match('/[^+0-9]/', trim($phone))) {
          // cek apakah no hp karakter 1-3 adalah +62
          if (substr(trim($phone), 0, 3) == '62') {
            $hp = trim($phone);
          }
          // cek apakah no hp karakter 1 adalah 0
          elseif (substr(trim($phone), 0, 1) == '0') {
            $hp = '62' . substr(trim($phone), 1);
          }
        }
        $data  = [
          'id'                          => $id,
          'user_name'                   => $this->input->post('user_name'),
          'email'                       => $this->input->post('email'),
          'user_whatsapp'                  => $hp,
          'user_address'                => $this->input->post('user_address'),
          'updated_at'              => date('Y-m-d H:i:s')
        ];
        $this->user_model->update($data);
        $this->session->set_flashdata('message', 'Data telah di Update');
        redirect(base_url('myaccount'), 'refresh');
      }
    }

    // Desktop View
    $data = [
      'title'                           => 'Ubah Profile',
      'deskripsi'                       => 'Berita - ' . $meta->description,
      'keywords'                        => 'Berita - ' . $meta->keywords,
      'meta'                            => $meta,
      'user'                            => $user,
      'content'                         => 'front/myaccount/update_account'
    ];
    $this->load->view('front/layout/wrapp', $data, FALSE);
  }
  public function ubah_password()
  {
    $id                                 = $this->session->userdata('id');
    $user                               = $this->user_model->user_detail($id);
    $meta                               = $this->meta_model->get_meta();

    $this->form_validation->set_rules(
      'password1',
      'Password',
      'required|trim|min_length[3]|matches[password2]',
      [
        'required'                      => 'Password harus Di isi',
        'matches'                       => 'Password tidak sama',
        'min_length'                    => 'Password Min 3 karakter'
      ]
    );
    $this->form_validation->set_rules('password2', 'Ulangi Password', 'required|trim|matches[password1]');
    if ($this->form_validation->run() == false) {


      $data = array(
        'title'                         => 'Ubah Profile',
        'deskripsi'                     => 'Profile - ' . $meta->description,
        'keywords'                      => 'Profile - ' . $meta->keywords,
        'user'                          => $user,
        'meta'                          => $meta,
        'content'                       => 'front/myaccount/password_account'
      );
      $this->load->view('front/layout/wrapp', $data, FALSE);
    } else {
      $data = [
        'id'                            => $id,
        'password'                      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
      ];
      $this->user_model->update($data);
      $this->session->set_flashdata('message', 'Data telah di ubah');
      redirect(base_url('myaccount'), 'refresh');
    }
  }

  public function pengurus()
  {
    $id = $this->session->userdata('id');
    $user = $this->user_model->detail($id);
    $kota_id = $user->kota_id;
    $pengurus = $this->user_model->pengurus_dpd($kota_id);
    $data = [
      'title'                         => 'Data Pengurus',
      'deskripsi'                     => 'Pengurus',
      'keywords'                      => 'Pengurus',
      'pengurus'                          => $pengurus,
      'content'                       => 'front/myaccount/pengurus'
    ];
    $this->load->view('front/layout/wrapp', $data, FALSE);
  }

  public function add_pengurus()
  {

    $jabatan       = $this->jabatan_model->get_jabatan();
    $this->form_validation->set_rules(
      'name',
      'Nama',
      'required|trim',
      ['required' => 'nama harus di isi']
    );
    $this->form_validation->set_rules(
      'email',
      'Email',
      'required|trim|valid_email|is_unique[user.email]',
      [
        'required'     => 'Email Harus diisi',
        'valid_email'   => 'Email Harus Valid',
        'is_unique'    => 'Email Sudah ada, Gunakan Email lain'
      ]
    );
    $this->form_validation->set_rules(
      'password1',
      'Password',
      'required|trim|min_length[3]|matches[password2]',
      [
        'matches'     => 'Password tidak sama',
        'min_length'   => 'Password Min 3 karakter'
      ]
    );
    $this->form_validation->set_rules('password2', 'Ulangi Password', 'required|trim|matches[password1]');


    if ($this->form_validation->run()) {
      $config['upload_path']              = './assets/img/avatars/';
      $config['allowed_types']            = 'gif|jpg|png|jpeg';
      $config['max_size']                 = 500000; //Dalam Kilobyte
      $config['max_width']                = 500000; //Lebar (pixel)
      $config['max_height']               = 500000; //tinggi (pixel)
      $config['remove_spaces']            = TRUE;
      $config['encrypt_name']             = TRUE;
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('user_image')) {
        //End Validasi
        $data = [
          'title'                 => 'Tambah Pengurus',
          'deskripsi'                     => 'Pengurus',
          'keywords'                      => 'Pengurus',
          'jabatan'              => $jabatan,
          'error_upload'          => $this->upload->display_errors(),
          'content'               => 'front/myaccount/add_pengurus'
        ];
        $this->load->view('front/layout/wrapp', $data, FALSE);
        //Masuk Database
      } else {
        //Proses Manipulasi Gambar
        $upload_data    = array('uploads'  => $this->upload->data());
        $config['image_library']          = 'gd2';
        $config['source_image']           = './assets/img/avatars/' . $upload_data['uploads']['file_name'];
        $config['create_thumb']           = TRUE;
        $config['maintain_ratio']         = TRUE;
        $config['width']                  = 500;
        $config['height']                 = 500;
        $config['thumb_marker']           = '';
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $email = $this->input->post('email', true);

        $user_whatsapp = $this->input->post('user_whatsapp');
        $phone = str_replace(' ', '', $user_whatsapp);
        $phone = str_replace('-', '', $user_whatsapp);

        // Ubah 0 menjadi 62
        // kadang ada penulisan no hp 0811 239 345
        $phone = str_replace(" ", "", $phone);
        // kadang ada penulisan no hp (0274) 778787
        $phone = str_replace("(", "", $phone);
        // kadang ada penulisan no hp (0274) 778787
        $phone = str_replace(")", "", $phone);
        // kadang ada penulisan no hp 0811.239.345
        $phone = str_replace(".", "", $phone);

        // cek apakah no hp mengandung karakter + dan 0-9
        if (!preg_match('/[^+0-9]/', trim($phone))) {
          // cek apakah no hp karakter 1-3 adalah +62
          if (substr(trim($phone), 0, 3) == '62') {
            $hp = trim($phone);
          }
          // cek apakah no hp karakter 1 adalah 0
          elseif (substr(trim($phone), 0, 1) == '0') {
            $hp = '62' . substr(trim($phone), 1);
          }
        }

        $id = $this->session->userdata('id');
        $user = $this->user_model->detail($id);


        $data = [
          'provinsi_id'   => $user->provinsi_id,
          'kota_id'       => $user->kota_id,
          'user_create'   => $this->session->userdata('id'),
          'user_name'     => htmlspecialchars($this->input->post('name', true)),
          'gender'        => $this->input->post('gender'),
          'user_type'     => 'DPD',
          'user_dai'      => $this->input->post('user_dai'),
          'jabatan_id'    => $this->input->post('jabatan_id'),
          'email'         => htmlspecialchars($email),
          'user_image'    => $upload_data['uploads']['file_name'],
          'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
          'role_id'       => $this->input->post('role_id'),
          'user_phone'    => $this->input->post('user_phone'),
          'user_whatsapp' => $hp,
          'user_address'  => $this->input->post('user_address'),
          'is_active'     => 0,
          'is_locked'     => 0,
          'created_at'    => date('Y-m-d H:i:s')
        ];
        $this->db->insert('user', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Selamat Anda berhasil mendaftar, silahkan Aktivasi akun</div> ');
        redirect('myaccount/pengurus');
      }
    }
    $data = [
      'title'                 => 'Tambah Pengurus',
      'deskripsi'                     => 'Pengurus',
      'keywords'                      => 'Pengurus',
      'jabatan'               => $jabatan,
      'error_upload'          => $this->upload->display_errors(),
      'content'               => 'front/myaccount/add_pengurus'
    ];
    $this->load->view('front/layout/wrapp', $data, FALSE);
  }
  public function detail_pengurus($id)
  {
    $pengurus = $this->user_model->detail($id);
    $data = [
      'title'                 => 'Detail Pengurus',
      'deskripsi'             => 'Pengurus',
      'keywords'              => 'Pengurus',
      'pengurus'                  => $pengurus,
      'content'               => 'front/myaccount/detail_pengurus'
    ];
    $this->load->view('front/layout/wrapp', $data, FALSE);
  }
}
