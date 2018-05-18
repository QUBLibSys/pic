<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('search_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        //$this->output->enable_profiler(TRUE);  
    }

    public function index() {
        if (!$this->input->get()) { redirect('search/results', 'refresh');}
    }

    public function results() {

      if($this->input->ip_address('143.117.194.36')) {
        // $this->output->enable_profiler(TRUE);  
      }
      
        //  if q is empty set search_term to NULL, else set it to value of q
      $search_term  = trim(empty($this->input->get('q')) ? NULL : $this->input->get('q'));
      $coll_id      = trim(empty($this->input->get('coll_id')) ? NULL : $this->input->get('coll_id'));
      $start_year   = trim(empty($this->input->get('start_year')) ? NULL : $this->input->get('start_year'));
      $end_year     = trim(empty($this->input->get('end_year')) ? NULL : $this->input->get('end_year'));

      $this->session->set_tempdata("search_word","$search_term");

      $config['uri_segment']      = 3;
      $config['base_url']         = base_url().'search/results';
      $config['use_page_numbers'] = FALSE; 
      $config['reuse_query_string'] = TRUE;
      $config['total_rows']       = $this->search_model->record_count($search_term, $coll_id, $start_year, $end_year);
      $config['per_page']         = 50;
      $config['num_links']        = 3;
      $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
      $config['full_tag_close']   = '</ul></nav></div>';
      $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
      $config['num_tag_close']    = '</span></li>';
      $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
      $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
      $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
      $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['prev_tagl_close']  = '</span></li>';
      $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
      $config['first_tagl_close'] = '</span></li>';
      $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['last_tagl_close']  = '</span></li>';

      $this->load->library('pagination');
      $this->pagination->initialize($config);

      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

      $data = array(
        'results'       =>  $this->search_model->fetch_records($config["per_page"], $page, $search_term, $coll_id, $start_year, $end_year),
        'term'          =>  $search_term,
        'total'         =>  $config['total_rows'],
        'start'         =>  (int)$this->uri->segment(3) + 1,
        'links'         =>  $this->pagination->create_links(),
        'collection'    =>  $this->search_model->getCollection($coll_id),
        'collections'   =>  $this->search_model->getCollections()
      );
        // configure results overview 'x of x returned..'
      if ($this->uri->segment(3) + $config['per_page'] > $config['total_rows']) {
        $data['end'] = $config['total_rows'];
      } else {
        $data['end'] = (int)$this->uri->segment(3) + $config['per_page'];
      }

      $data['resultCount'] = 'Showing '. $data['start'] .' to '. $data['end'] .' of '. $data['total'] .' </strong> ';
      $data['getCollections'] = $this->search_model->getCollections();
      $data['coll_id'] = $this->input->get('coll_id');

      $this->load->view('template/header', $data);
      $this->load->view('search_results_view',$data);
      $this->load->view('template/footer');
    }

}