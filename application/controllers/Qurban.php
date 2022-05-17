<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Qurban extends CI_Controller
{
    /**
     * Development By Edi Prasetyo
     * edikomputer@gmail.com
     * 0812 3333 5523
     * https://edikomputer.com
     * https://grahastudio.com
     */
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(FALSE);
        $this->load->model('transaction_model');
        $this->load->model('bank_model');
    }
    public function index()
    {
        $bank = $this->bank_model->get_allbank();
        if (!$this->agent->is_mobile()) {



            $this->form_validation->set_rules(
                'category_name',
                'Nama Kategori',
                'required|is_unique[category.category_name]',
                array(
                    'required'                        => '%s Harus Diisi',
                    'is_unque'                        => '%s <strong>' . $this->input->post('category_name') .
                        '</strong>Nama Kategori Sudah Ada. Buat Nama yang lain!'
                )
            );
            if ($this->form_validation->run() === FALSE) {
                $data = [
                    'title'                       => 'Qurban',
                    'deskripsi'                   => 'Qurban di Bina Ummat',
                    'keywords'                    => 'qurban, idul adha, hari raya qurban, qurban berkah',
                    'bank'                        => $bank,
                    'content'                     => 'front/qurban/index'
                ];
                $this->load->view('admin/layout/wrapp', $data, FALSE);
            } else {

                $donasi_title = $this->input->post('qurban', ['']);
                $data  = [

                    'donasi_title'                   => $this->input->post('category_name'),

                ];
                $this->transaction_model->create($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data telah ditambahkan</div>');
                redirect(base_url('qurban/sukses'), 'refresh');
            }






            // Desktop View
            // $data = array(
            //     'title'                       => 'Qurban',
            //     'deskripsi'                   => 'Qurban di Bina Ummat',
            //     'keywords'                    => 'qurban, idul adha, hari raya qurban, qurban berkah',
            //     'bank'                        => $bank,
            //     'content'                     => 'front/qurban/index'
            // );
            // $this->load->view('front/layout/wrapp', $data, FALSE);
        } else {
            // Mobile View
            $data = array(
                'title'                       => 'Qurban',
                'deskripsi'                   => 'Qurban di Bina Ummat',
                'keywords'                    => 'qurban, idul adha, hari raya qurban, qurban berkah',
                'bank'                        => $bank,
                'content'                     => 'mobile/qurban/index'
            );
            $this->load->view('mobile/layout/wrapp', $data, FALSE);
        }
    }
    public function sukses()
    {
        echo "Sukses";
    }
}
