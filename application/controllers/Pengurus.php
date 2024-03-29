<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengurus extends CI_Controller
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
        $this->load->model('user_model');
        $this->load->model('category_model');
        $this->load->model('kota_model');
        $this->load->model('meta_model');
        $this->load->library('pagination');
    }
    public function index()
    {
        $meta       = $this->meta_model->get_meta();
        $kota       = $this->kota_model->get_allkota();
        $kota_id    = $this->input->get('kota_id');
        $pengurus   = $this->user_model->cari_pengurus($kota_id);
        $dpp = $this->user_model->pengurus_dpp();
        // var_dump(count($dpp));
        // die;

        // Desktop View
        $data = array(
            'title'                       => 'Pengurus - ' . $meta->title,
            'deskripsi'                   => 'Pengurus - ' . $meta->description,
            'keywords'                    => 'Pengurus - ' . $meta->keywords,
            'paginasi'                    => $this->pagination->create_links(),
            'dpp'                      => $dpp,
            'kota_id'                      => $kota_id,
            'kota'                        => $kota,
            // 'kota_name'                 => $kota_name,
            'content'                     => 'front/pengurus/index'
        );
        $this->load->view('front/layout/wrapp', $data, FALSE);
    }
    // public function index()
    // {
    //     $meta       = $this->meta_model->get_meta();
    //     $kota       = $this->kota_model->get_allkota();
    //     $kota_id    = $this->input->get('kota_id');
    //     $pengurus   = $this->user_model->cari_pengurus($kota_id);
    //     // Desktop View
    //     $data = array(
    //         'title'                       => 'Pengurus - ' . $meta->title,
    //         'deskripsi'                   => 'Pengurus - ' . $meta->description,
    //         'keywords'                    => 'Pengurus - ' . $meta->keywords,
    //         'paginasi'                    => $this->pagination->create_links(),
    //         'pengurus'                      => $pengurus,
    //         'kota_id'                      => $kota_id,
    //         'kota'                        => $kota,
    //         // 'kota_name'                 => $kota_name,
    //         'content'                     => 'front/pengurus/index'
    //     );
    //     $this->load->view('front/layout/wrapp', $data, FALSE);
    // }
    public function dpd()
    {
        $meta       = $this->meta_model->get_meta();
        $kota       = $this->kota_model->get_allkota();
        $kota_id    = $this->input->get('kota_id');
        $pengurus   = $this->user_model->cari_pengurus($kota_id);

        $data = array(
            'title'                       => 'Pengurus - ' . $meta->title,
            'deskripsi'                   => 'Pengurus - ' . $meta->description,
            'keywords'                    => 'Pengurus - ' . $meta->keywords,
            'paginasi'                    => $this->pagination->create_links(),
            'pengurus'                      => $pengurus,
            'kota_id'                      => $kota_id,
            'kota'                        => $kota,
            // 'kota_name'                 => $kota_name,
            'content'                     => 'front/pengurus/dpd'
        );
        $this->load->view('front/layout/wrapp', $data, FALSE);
    }
}
