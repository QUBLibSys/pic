<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('form');
        $this->load->model('Search_model');
        //$this->output->enable_profiler(TRUE); 
    }

	public function index(){

		$data = array(
			'title'			=>	'About',
			'subtitle'		=>	'Personal and Institutional Collections. Queen\'s University Belfast',
			'collections'   =>  $this->Search_model->getCollections()
		);

		$this->load->view('template/Header', $data);
		$this->load->view('About_view', $data);
		$this->load->view('template/Footer');

	}


}
?>