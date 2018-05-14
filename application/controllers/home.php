<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // connect to database
        $this->load->model('search_model');
        $this->load->helper('url');
        $this->load->helper('form');
        // $this->output->enable_profiler(TRUE);
    }

    public function index(){

        $data = array(
            'collections'   =>  $this->search_model->getCollections(),
            'collectionInfo'    =>  $this->search_model->countAllRecords(),
            'recordCount'   => $this->search_model->countaAllRecords()
        );

        $this->load->view('template/header', $data);
        $this->load->view('Home_view', $data);
        $this->load->view('template/footer');
    }
}
?>