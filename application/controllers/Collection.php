<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collection extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('search_model');
        $this->load->helper('url');
        $this->load->helper('form');
        //$this->output->enable_profiler(TRUE);  
    }

    public function index (){

        $data = array(
            'title'     	=>  'All Collections',
            'subtitle'  	=>  'Choose A Collection Below',
            'collections'   =>  $this->search_model->getCollections()
            );

        $this->load->view('template/Header', $data);
        $this->load->view('collection/Index', $data);
        $this->load->view('template/Footer');

    }

    public function percy ($item = NULL, $item_id = NULL){
 
        $coll_name = $this->uri->segment(2);
				
		// if url does not contain record id
		if ($this->uri->uri_string() == 'collection/'.$coll_name.'/item') {
			show_404();
		}
		
		// if item and item_id are in url
		if ($item == 'item' && is_numeric($item_id) ) {
			$item_id = $this->uri->segment(4);
			$data = array(
				'title' 		=> 'Item View',
				'subtitle'   	=>  'Item Name',
				'itemInfo'  	=>  $this->search_model->getRecordById($coll_name, $item_id),
				'collections'   =>  $this->search_model->getCollections()
			);
			$this->load->view('template/Header', $data);
			$this->load->view('collection/Item_view', $data);
			$this->load->view('template/Footer');
		}
		
		// if not paramaters passed
		if ( is_null($item) && is_null($item_id) ) {
        $data = array(
            'items' 			=> 	$this->search_model->getCollectionByName($coll_name),
            'collections'   	=>  $this->search_model->getCollections(),
            'collectionSample'  =>  $this->search_model->getCollectionSampleByName($coll_name),
            'collectionCount'   => 	$this->search_model->countAllRecordsByName($coll_name)
        );

        $this->load->view('template/Header', $data);
        $this->load->view('collection/Colltemplate', $data);
        $this->load->view('template/Footer');
		}
	

    }

    public function foster ($item = NULL, $item_id = NULL){

        $coll_name = $this->uri->segment(2);
				
		// if url does not contain record id
		if ($this->uri->uri_string() == 'collection/'.$coll_name.'/item') {
			show_404();
		}
		
		// if item and item_id are in url
		if ($item == 'item' && is_numeric($item_id) ) {
			$item_id = $this->uri->segment(4);
			$data = array(
				'title' 		=> 'Item View',
				'subtitle'   	=>  'Item Name',
				'itemInfo'  	=>  $this->search_model->getRecordById($coll_name, $item_id),
				'collections'   =>  $this->search_model->getCollections()
			);
			$this->load->view('template/Header', $data);
			$this->load->view('collection/Item_view', $data);
			$this->load->view('template/Footer');
		}
		
		// if not paramaters passed
		if ( is_null($item) && is_null($item_id) ) {
        $data = array(
            'items' 			=> $this->search_model->getCollectionByName($coll_name),
            'collections'   	=>  $this->search_model->getCollections(),
            'collectionSample'  =>  $this->search_model->getCollectionSampleByName($coll_name),
            'collectionCount'   => $this->search_model->countAllRecordsByName($coll_name)
        );

        $this->load->view('template/Header', $data);
        $this->load->view('collection/Colltemplate', $data);
        $this->load->view('template/Footer');
		}

    }

    public function orahilly ($item = NULL, $item_id = NULL){

        $coll_name = $this->uri->segment(2);
		
		// if url does not contain record id
		if ($this->uri->uri_string() == 'collection/'.$coll_name.'/item') {
			show_404();
		}
		
		// if item and item_id are in url
		if ($item == 'item' && is_numeric($item_id) ) {
			$item_id = $this->uri->segment(4);
			$data = array(
				'title' 		=> 'Item View',
				'subtitle'   	=>  'Item Name',
				'itemInfo'  	=>  $this->search_model->getRecordById($coll_name, $item_id),
				'collections'   =>  $this->search_model->getCollections()
			);
			$this->load->view('template/Header', $data);
			$this->load->view('collection/Item_view', $data);
			$this->load->view('template/Footer');
		}
		
		// if not paramaters passed
		if ( is_null($item) && is_null($item_id) ) {
        $data = array(
            'items' 			=> $this->search_model->getCollectionByName($coll_name),
            'collections'   	=>  $this->search_model->getCollections(),
            'collectionSample' 	=>  $this->search_model->getCollectionSampleByName($coll_name),
            'collectionCount'   => $this->search_model->countAllRecordsByName($coll_name)
        );

        $this->load->view('template/Header', $data);
        $this->load->view('collection/Colltemplate', $data);
        $this->load->view('template/Footer');
		}

    }


    public function wright ($item = NULL, $item_id = NULL){

        $coll_name = $this->uri->segment(2);
		
		// if url does not contain record id
		if ($this->uri->uri_string() == 'collection/'.$coll_name.'/item') {
			show_404();
		}
		
		// if item and item_id are in url
		if ($item == 'item' && is_numeric($item_id) ) {
			$item_id = $this->uri->segment(4);
			$data = array(
				'title' 		=> 'Item View',
				'subtitle'   	=>  'Item Name',
				'itemInfo'  	=>  $this->search_model->getRecordById($coll_name, $item_id),
				'collections'   =>  $this->search_model->getCollections()
			);
			$this->load->view('template/Header', $data);
			$this->load->view('collection/Item_view', $data);
			$this->load->view('template/Footer');
		}
		
		// if not paramaters passed
		if ( is_null($item) && is_null($item_id) ) {
        $data = array(
            'items' 			=> $this->search_model->getCollectionByName($coll_name),
            'collections'   	=>  $this->search_model->getCollections(),
            'collectionSample'  =>  $this->search_model->getCollectionSampleByName($coll_name),
            'collectionCount'   => $this->search_model->countAllRecordsByName($coll_name)
        );

        $this->load->view('template/Header', $data);
        $this->load->view('collection/Colltemplate', $data);
        $this->load->view('template/Footer');
		}

    }

    public function macdouall ($item = NULL, $item_id = NULL){

        $coll_name = $this->uri->segment(2);
		
		// if url does not contain record id
		if ($this->uri->uri_string() == 'collection/'.$coll_name.'/item') {
			show_404();
		}
		
		// if item and item_id are in url
		if ($item == 'item' && is_numeric($item_id) ) {
			$item_id = $this->uri->segment(4);
			$data = array(
				'title' 		=> 'Item View',
				'subtitle'   	=>  'Item Name',
				'itemInfo'  	=>  $this->search_model->getRecordById($coll_name, $item_id),
				'collections'   =>  $this->search_model->getCollections()
			);
			$this->load->view('template/Header', $data);
			$this->load->view('collection/Item_view', $data);
			$this->load->view('template/Footer');
		}
		
		// if not paramaters passed
		if ( is_null($item) && is_null($item_id) ) {
        $data = array(
            'items' 			=> $this->search_model->getCollectionByName($coll_name),
            'collections'   	=>  $this->search_model->getCollections(),
            'collectionSample'  =>  $this->search_model->getCollectionSampleByName($coll_name),
            'collectionCount'   => $this->search_model->countAllRecordsByName($coll_name)
        );

        $this->load->view('template/Header', $data);
        $this->load->view('collection/Colltemplate', $data);
        $this->load->view('template/Footer');
		}

    }
}