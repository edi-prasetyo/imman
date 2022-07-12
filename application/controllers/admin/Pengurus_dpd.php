<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengurus_dpd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('user_model');
        $this->load->model('main_model');
        $this->load->model('jabatan_model');
    }
    public function index()
    {
        $id = $this->session->userdata('id');
        $user = $this->user_model->detail($id);
        $kota_id = $user->kota_id;
        $pengurus_dpd = $this->user_model->pengurus_dpd($kota_id);
        $data = [
            'title'                 => 'Data Pengurus_dpd',
            'pengurus_dpd'              => $pengurus_dpd,
            'content'               => 'admin/pengurus/index_dpd'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }
    // Create Pengurus
    public function create()
    {
        $jabatan       = $this->jabatan_model->get_jabatan();
        $this->form_validation->set_rules(
            'jabatan_id',
            'Jabatan',
            'required',
            ['required' => 'Form harus di pilih']
        );
        $this->form_validation->set_rules(
            'user_dai',
            'Jabatan',
            'required',
            ['required' => 'Form harus di pilih']
        );
        $this->form_validation->set_rules(
            'role_id',
            'Hak Akses',
            'required',
            ['required' => 'Hak Akses harus di pilih']
        );
        $this->form_validation->set_rules(
            'name',
            'Nama',
            'required',
            ['required' => 'Nama harus di isi']
        );
        $this->form_validation->set_rules(
            'gender',
            'Nama',
            'required',
            ['required' => 'Jenis Kelamin harus di pilih']
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
            'user_whatsapp',
            'Nomor Whatsapp',
            'required|is_unique[user.user_whatsapp]',
            [
                'required'     => 'Nomor HP Harus diisi',
                'is_unique'    => 'Nomor HP Sudah Terdaftar, Gunakan lain'
            ]
        );
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[3]|matches[password2]',
            [
                'required'      => 'Password Harus Di isi',
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
                    'content'               => 'admin/pengurus/add_pengurus'
                ];
                $this->load->view('admin/layout/wrapp', $data, FALSE);
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
                    'is_active'     => 1,
                    'is_locked'     => 1,
                    'created_at'    => date('Y-m-d H:i:s')
                ];
                $this->db->insert('user', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success">Selamat Anda berhasil mendaftar, silahkan Aktivasi akun</div> ');
                redirect('admin/pengurus_dpd');
            }
        }
        $data = [
            'title'                 => 'Tambah Pengurus',
            'deskripsi'             => 'Pengurus',
            'keywords'              => 'Pengurus',
            'jabatan'               => $jabatan,
            'error_upload'          => $this->upload->display_errors(),
            'content'               => 'admin/pengurus/add_pengurus'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }

    // Update Anggota
    public function update($id)
    {

        $jabatan = $this->jabatan_model->get_jabatan();
        $pengurus_dpd = $this->user_model->detail($id);

        //Validasi
        $valid = $this->form_validation;

        $valid->set_rules(
            'name',
            'Nama',
            'required',
            array('required'      => '%s harus diisi')
        );

        if ($valid->run()) {
            //Kalau nggak Ganti gambar
            if (!empty($_FILES['user_image']['name'])) {

                $config['upload_path']          = './assets/img/avatars/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000000; //Dalam Kilobyte
                $config['max_width']            = 5000000; //Lebar (pixel)
                $config['max_height']           = 5000000; //tinggi (pixel)
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('user_image')) {

                    //End Validasi
                    $data = array(
                        'title'             => 'Update',
                        'jabatan'           => $jabatan,
                        'pengurus_dpd'      => $pengurus_dpd,
                        'error_upload'      => $this->upload->display_errors(),
                        'content'           => 'admin/pengurus/update_pengurus'
                    );
                    $this->load->view('admin/layout/wrapp', $data, FALSE);
                } else {

                    $upload_data    = array('uploads'  => $this->upload->data());

                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/img/avatars/' . $upload_data['uploads']['file_name'];
                    $config['create_thumb']     = TRUE;
                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = 200;
                    $config['height']           = 200;
                    $config['thumb_marker']     = '';

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();

                    if ($pengurus_dpd->user_image != "") {
                        unlink('./assets/img/avatars/' . $pengurus_dpd->user_image);
                    }

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

                    $data  = array(
                        'id'      => $id,
                        'provinsi_id'   => $user->provinsi_id,
                        'kota_id'       => $user->kota_id,
                        'user_update'   => $this->session->userdata('id'),
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
                        'is_active'     => 1,
                        'is_locked'     => 1,
                        'updated_at'    => date('Y-m-d H:i:s')

                    );
                    $this->user_model->update($data);
                    $this->session->set_flashdata('sukses', 'Data telah Diedit');
                    redirect(base_url('admin/pengurus_dpd'), 'refresh');
                }
            } else {
                if ($pengurus_dpd->user_image != "")

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

                $data  = array(
                    'id'      => $id,
                    'provinsi_id'   => $user->provinsi_id,
                    'kota_id'       => $user->kota_id,
                    'user_update'   => $this->session->userdata('id'),
                    'user_name'     => htmlspecialchars($this->input->post('name', true)),
                    'gender'        => $this->input->post('gender'),
                    'user_type'     => 'DPD',
                    'user_dai'      => $this->input->post('user_dai'),
                    'jabatan_id'    => $this->input->post('jabatan_id'),
                    'email'         => htmlspecialchars($email),
                    // 'user_image'    => $upload_data['uploads']['file_name'],
                    'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role_id'       => $this->input->post('role_id'),
                    'user_phone'    => $this->input->post('user_phone'),
                    'user_whatsapp' => $hp,
                    'is_active'     => 1,
                    'is_locked'     => 1,
                    'updated_at'    => date('Y-m-d H:i:s')

                );
                $this->user_model->update($data);
                $this->session->set_flashdata('sukses', 'Data telah Diedit');
                redirect(base_url('admin/pengurus_dpd'), 'refresh');
            }
        }
        //End Masuk Database
        $data = array(
            'title'             => 'Update',
            'pengurus_dpd'              => $pengurus_dpd,
            'jabatan'           => $jabatan,
            'content'           => 'admin/pengurus/update_pengurus'
        );
        $this->load->view('admin/layout/wrapp', $data, FALSE);
    }
    // Detail Kurir
    public function detail($id)
    {
        $user_id = $this->session->userdata('id');
        $user = $this->user_model->user_detail($user_id);
        $kota_id = $user->kota_id;
        // var_dump($user->kota_id);
        // die;
        $pengurus_dpd      = $this->user_model->detail($id);

        if ($pengurus_dpd->kota_id == $kota_id) {
            $data = [
                'title'                 => 'Detail',
                'pengurus_dpd'              => $pengurus_dpd,
                'content'               => 'admin/pengurus/detail_pengurus'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {
            $data = [
                'title'                 => 'Unautorized',
                'content'               => 'admin/error/unauthorized'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        }
    }

    public function activated($id)
    {
        $user = $this->session->userdata('id');

        $kurir =  $this->user_model->detail($id);
        $kurir_id = $kurir->id;
        $user_code = str_pad($kurir_id, 6, '0', STR_PAD_LEFT);

        if ($kurir->id_agen == $user) {

            is_login();
            $data = [
                'id'                    => $id,
                'user_code'          => $user_code,
                'is_active'             => 1,
                'is_locked'             => 1,
            ];
            $this->user_model->update($data);
            $this->session->set_flashdata('message', 'User Telah di Aktifkan');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            redirect(base_url('404'));
        }
    }

    public function banned($id)
    {
        $user = $this->session->userdata('id');
        $kurir =  $this->user_model->detail($id);
        if ($kurir->id_agen == $user) {
            //Proteksi delete
            is_login();
            $data = [
                'id'                    => $id,
                'is_active'             => 0,
                'is_locked'             => 0,
            ];
            $this->user_model->update($data);
            $this->session->set_flashdata('message', 'User Telah di banned');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            redirect(base_url('404'));
        }
    }
}
