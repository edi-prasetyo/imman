<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
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
        $this->load->model('jabatan_model');
    }

    public function index()
    {
        $jabatan = $this->jabatan_model->get_jabatan();

        $this->form_validation->set_rules(
            'jabatan_name',
            'Nama Kategori',
            'required|is_unique[jabatan.jabatan_name]',
            array(
                'required'                        => '%s Harus Diisi',
                'is_unque'                        => '%s <strong>' . $this->input->post('jabatan_name') .
                    '</strong>Nama Kategori Sudah Ada. Buat Nama yang lain!'
            )
        );
        if ($this->form_validation->run() === FALSE) {
            $data = [
                'title'                           => 'Jabatan Artikel',
                'jabatan'                        => $jabatan,
                'content'                         => 'admin/jabatan/index'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {
            $slugcode = random_string('numeric', 5);
            $jabatan_slug  = url_title($this->input->post('jabatan_name'), 'dash', TRUE);
            $data  = [
                'jabatan_slug'                   => $slugcode . '-' . $jabatan_slug,
                'jabatan_name'                   => $this->input->post('jabatan_name'),
                'created_at'                    => date('Y-m-d H:i:s')
            ];
            $this->jabatan_model->create($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah ditambahkan</div>');
            redirect(base_url('admin/jabatan'), 'refresh');
        }
    }

    public function update($id)
    {
        $jabatan = $this->jabatan_model->detail_jabatan($id);

        $this->form_validation->set_rules(
            'jabatan_name',
            'Nama Kategori',
            'required',
            array('required'                  => '%s Harus Diisi')
        );
        if ($this->form_validation->run() === FALSE) {

            $data = [
                'title'                         => 'Edit kategori Berita',
                'jabatan'                      => $jabatan,
                'content'                       => 'admin/jabatan/update'
            ];
            $this->load->view('admin/layout/wrapp', $data, FALSE);
        } else {
            $data  = [
                'id'                            => $id,
                'jabatan_name'                 => $this->input->post('jabatan_name'),
                'updated_at'                  => date('Y-m-d H:i:s')
            ];
            $this->jabatan_model->update($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah di Update</div>');
            redirect(base_url('admin/jabatan'), 'refresh');
        }
    }

    public function delete($id)
    {
        is_login();
        $jabatan = $this->jabatan_model->detail_jabatan($id);
        $data = ['id'   => $jabatan->id];
        $this->jabatan_model->delete($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Data telah di Hapus</div>');
        redirect(base_url('admin/jabatan'), 'refresh');
    }
}
