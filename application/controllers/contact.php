<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('form');
        $this->load->model('search_model');
        //$this->output->enable_profiler(TRUE); 
    }

	public function index(){

		$data = array(
			'title'			=>	'Contact',
			'subtitle'		=>	'Get in touch below',
			'collections'   =>  $this->search_model->getCollections()
		);

		$this->load->view('template/header', $data);
		$this->load->view('Contact_view', $data);
		$this->load->view('template/footer');

	}


}
?>