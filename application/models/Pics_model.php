<?php
//application/models/News_model.php
class Pics_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_pics($slug = FALSE)
    {
        $perPage = 25;
        $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
        $url.= '&api_key=' . $this->config->item('flickr_api_key');
        $url.= '&tags=' . $slug;
        $url.= '&per_page=' . $perPage;
        $url.= '&format=json';
        $url.= '&nojsoncallback=1';

        $response = json_decode(file_get_contents($url));
        $pics = $response->photos->photo;
        return $pics;
    }

    public function get_tags($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('sm18_pics');
            return $query->result_array();
        }

        $query = $this->db->get_where('sm18_pics', array('slug' => $slug));
        return $query->row_array();
    }

    // public function set_news()
    // {
    //     $this->load->helper('url');
    //
    //     $slug = url_title($this->input->post('title'), 'dash', TRUE);
    //
    //     $data = array(
    //         'title' => $this->input->post('title'),
    //         'slug' => $slug,
    //         'text' => $this->input->post('text')
    //     );
    //
    //
    //     if ($this->db->insert('sm18_news', $data))
    //     {//data inserted, pass back slug
    //         return $slug;
    //     } else {//failre, pass back false
    //         return false;
    //     }
    // }

}
