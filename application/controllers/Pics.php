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

    }

    public function view($slug = NULL)
    {
            $data['pics'] = $this->pics_model->get_pics($slug);

            if (empty($data['pics']))
            {
                    show_404();
            }

            $data['pics']['title'] = "Pictures with tag: $slug";
            $this->load->view('pics/view', $data);
    }
}
