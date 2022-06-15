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
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(FALSE);
        $this->load->model('meta_model');
        $this->load->model('agenda_model');
        $this->load->library('pagination');
    }
    public function index()
    {

        $config['base_url']             = base_url('agenda/index/');
        $config['total_rows']           = count($this->agenda_model->total());
        $config['per_page']             = 6;
        $config['uri_segment']          = 3;

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
        $limit                          = $config['per_page'];
        $start                          = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
        $this->pagination->initialize($config);
        $agenda = $this->agenda_model->get_agenda($limit, $start);


        if (!$this->agent->is_mobile()) {
            // Desktop View
            $data = array(
                'title'                       => 'Berita - ',
                'deskripsi'                   => 'Berita - ',
                'keywords'                    => 'Berita - ',
                'agenda'                      => $agenda,
                'paginasi'                    => $this->pagination->create_links(),
                'content'                     => 'front/agenda/index'
            );
            $this->load->view('front/layout/wrapp', $data, FALSE);
        } else {
            // Mobile View
            $data = array(
                'title'                       => 'Berita - ',
                'deskripsi'                   => 'Berita - ',
                'keywords'                    => 'Berita - ',
                'agenda'                      => $agenda,
                'paginasi'                    => $this->pagination->create_links(),

                'content'                     => 'front/agenda/index'
            );
            $this->load->view('front/layout/wrapp', $data, FALSE);
        }
    }
    public function detail($agenda_slug = NULL)
    {
        if (!empty($agenda_slug)) {
            $agenda_slug;
        } else {
            redirect(base_url('agenda'));
        }

        $agenda                         = $this->agenda_model->read($agenda_slug);
        $data                           = array(
            'title'                       => $agenda->agenda_title,
            'deskripsi'                   => $agenda->agenda_title,
            'keywords'                    => $agenda->agenda_title,
            'agenda'                      => $agenda,
            'content'                     => 'front/agenda/detail'
        );
        $this->load->view('front/agenda/detail', $data);
    }
}
