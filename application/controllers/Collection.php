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
            'title'     =>  'All Collections',
            'subtitle'  =>  'Choose A Collection Below',
            'collections'   =>  $this->search_model->getCollections()
            );

        $this->load->view('template/Header', $data);
        $this->load->view('collection/Index', $data);
        $this->load->view('template/Footer');

    }

    public function percy (){

        $coll_name = $this->uri->segment(2);

        $data = array(
            'items' => $this->search_model->getCollection(1),
            'collections'   =>  $this->search_model->getCollections(),
            'collectionSample'   =>  $this->search_model->getCollectionSampleByName($coll_name),
            'collectionCount'   => $this->search_model->countAllRecordsByName($coll_name)
        );

        $this->load->view('template/Header', $data);
        $this->load->view('collection/Colltemplate', $data);
        $this->load->view('template/Footer');

    }


    public function foster (){

        $coll_name = $this->uri->segment(2);

        $data = array(
            'items' => $this->search_model->getCollection(5),
            'collections'   =>  $this->search_model->getCollections(),
            'collectionSample'   =>  $this->search_model->getCollectionSampleByName($coll_name),
            'collectionCount'   => $this->search_model->countAllRecordsByName($coll_name)
        );

        $this->load->view('template/Header', $data);
        $this->load->view('collection/Colltemplate', $data);
        $this->load->view('template/Footer');

    }

    public function orahilly (){

        $coll_name = $this->uri->segment(2);

        $data = array(
            'items' => $this->search_model->getCollection(3),
            'collections'   =>  $this->search_model->getCollections(),
            'collectionSample'   =>  $this->search_model->getCollectionSampleByName($coll_name),
            'collectionCount'   => $this->search_model->countAllRecordsByName($coll_name)
        );

        $this->load->view('template/Header', $data);
        $this->load->view('collection/Colltemplate', $data);
        $this->load->view('template/Footer');

    }


    public function wright (){

        $coll_name = $this->uri->segment(2);

        $data = array(
            'items' => $this->search_model->getCollection(4),
            'collections'   =>  $this->search_model->getCollections(),
            'collectionSample'   =>  $this->search_model->getCollectionSampleByName($coll_name),
            'collectionCount'   => $this->search_model->countAllRecordsByName($coll_name)
        );

        $this->load->view('template/Header', $data);
        $this->load->view('collection/Colltemplate', $data);
        $this->load->view('template/Footer');

    }

    public function macdouall (){

        $coll_name = $this->uri->segment(2);

        $data = array(
            'items' => $this->search_model->getCollection(2),
            'collections'   =>  $this->search_model->getCollections(),
            'collectionSample'   =>  $this->search_model->getCollectionSampleByName($coll_name),
            'collectionCount'   => $this->search_model->countAllRecordsByName($coll_name)
        );

        $this->load->view('template/Header', $data);
        $this->load->view('collection/Colltemplate', $data);
        $this->load->view('template/Footer');

    }
}