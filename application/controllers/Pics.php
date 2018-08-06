<?php
//application/controllers/News.php
class Pics extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('pics_model');
            $this->load->helper('url_helper');
    }

    public function index()
    {

        /*
        flickr-api-test.php

        original from: http://lifesforlearning.com/connecting-to-the-flickr-api-with-php/

        */

        $data['tags'] = $this->pics_model->get_tags();
        $data['title'] = 'Pics from Flickr';

        $this->load->view('pics/index', $data);
        //
        // $this->load->view('templates/header', $data);
        // $this->load->view('pics/index', $data);
        // $this->load->view('templates/footer', $data);
    }

    public function view($slug = NULL)
    {
        //$tags = 'bears,polar';
            // $data['pics'] = $this->pics_model->get_pics($slug);
            $data['pics'] = $this->pics_model->get_pics($slug);

            if (empty($data['pics']))
            {
                    show_404();
            }

            $data['pics']['title'] = "Pictures with tag: $slug";

            // $this->load->view('templates/header', $data);
            $this->load->view('pics/view', $data);
            // $this->load->view('templates/footer', $data);
    }



    // public function create()
    // {
    //     $this->load->helper('form');
    //     $this->load->library('form_validation');
    //
    //     $data['title'] = 'Create a news item';
    //
    //     $this->form_validation->set_rules('title', 'Title', 'required');
    //     $this->form_validation->set_rules('text', 'Text', 'required');
    //
    //     if ($this->form_validation->run() === FALSE)
    //     {
    //         // $this->load->view('templates/header', $data);
    //         $this->load->view('news/create', $data);
    //         // $this->load->view('templates/footer', $data);
    //
    //     }
    //     else
    //     {
    //         $slug = $this->news_model->set_news();
    //
    //         if($slug !== false) {
    //             feedback('News item successfully created','info');
    //             redirect('/news/view/' . $slug);
    //         }else{
    //             feedback('News item NOT created!','error');
    //             redirect('news/create');
    //         }
    //     }
    // }
}
