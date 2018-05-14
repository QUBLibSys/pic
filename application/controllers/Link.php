<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('search_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->output->enable_profiler(TRUE);  
    }

    public function index() {
        $this->load->view('template/header'); 

        // get this from the url
        $query_id = $this->input->get('q');

        $data = array(
            'results'   =>  $this->search_model->get_by_id($query_id),
            'term'      =>  $query_id
        );

        $this->load->view('link_view',$data);
        $this->load->view('template/footer');
    }

}