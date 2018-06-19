<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // connect to database
        $this->load->model('Search_model');
        $this->load->helper('url');
        $this->load->helper('form');
        // $this->output->enable_profiler(TRUE);
    }

    public function index(){

        $data = array(
            'collections'   =>  $this->Search_model->getCollections(),
            'collectionInfo'    =>  $this->Search_model->getCollInfo(),
            'recordCount'   => $this->Search_model->countAllRecords()
        );

        $this->load->view('template/Header', $data);
        $this->load->view('Home_view', $data);
        $this->load->view('template/Footer');
    }
}
?>