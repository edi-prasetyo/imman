<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $this->load->model('user_model');
        $this->load->model('meta_model');
        $this->load->library('pagination');
    }
    public function index()
    {
        $meta                           = $this->meta_model->get_meta();
        $user_id = $this->input->get('id');
        $user = $this->user_model->detail_encrypt($user_id);
        // var_dump($user);
        // die;

        // Desktop View
        $data = array(
            'title'                       => $meta->title,
            'deskripsi'                   => $meta->description,
            'keywords'                    => $meta->keywords,
            'paginasi'                    => $this->pagination->create_links(),
            'user'                      => $user,
            'content'                     => 'front/pengurus/detail'
        );
        $this->load->view('front/layout/wrapp', $data, FALSE);
    }
}
