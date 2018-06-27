<?php

class Search_model extends CI_Model {

    // count all records in database
    public function countAllRecords() {
        $this->db->select('ROUND(count(*), -2) as count');
        $this->db->from('records');
        $query = $this->db->get();
        return $query->row();
    }
    
    // get all collection details
    public function getCollInfo() {
        $this->db->select('collections.collection_id, name, coll_name, collections.url, coll_info, logo, count(coll_id) AS count');
        $this->db->from('collections');
        $this->db->join('records', 'collections.collection_id = records.coll_id', 'left');
        $this->db->group_by('collections.collection_id'); 
        $query = $this->db->get();
        return $query->result_object();
    }
   
    // get records based on search input
    public function fetch_records($limit, $start, $search_term, $coll_id, $start_year, $end_year) {

        $search_term = $this->session->userdata('search_word');

        $this->db->select('*');
        $this->db->from('records');
        $this->db->join('collections', 'records.coll_id = collections.collection_id', 'inner');
        if(!empty($coll_id)){
            $this->db->where('coll_id', $coll_id);
        }
        if(!empty($start_year) && empty($end_year)){
            $this->db->where('marc_260c_pub_year >= CAST('.$start_year.' AS SIGNED)', NULL,FALSE);
        }
        if(!empty($end_year) && empty($start_year)){
            $this->db->where('marc_260c_pub_year <= CAST('.$end_year.' AS SIGNED)', NULL,FALSE);
        }
        if(!empty($start_year) && !empty($end_year)){
            $this->db->where('marc_260c_pub_year >= CAST('.$start_year.' AS SIGNED)', NULL,FALSE);
            $this->db->where('marc_260c_pub_year <= CAST('.$end_year.' AS SIGNED)', NULL,FALSE);
        }
        if(!empty($search_term)){
            $this->db->group_start() 
            ->where('MATCH (marc_099_coll_ident) AGAINST ("'. $search_term .'")', NULL, FALSE)
            ->or_where('MATCH (marc_245_title_stmt) AGAINST ("'. $search_term .'")', NULL, FALSE)
            ->group_end();
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // count number of records based on search input
    public function record_count($search_term, $coll_id, $start_year, $end_year) {

        $search_term = $this->session->userdata('search_word');
        $this->db->select('*');
        $this->db->from('records');
        $this->db->join('collections', 'records.coll_id = collections.collection_id', 'inner');
        if(!empty($coll_id)){
            $this->db->where('coll_id', $coll_id);
        }
        if(!empty($start_year) && empty($end_year)){
            $this->db->where('marc_260c_pub_year >= CAST('.$start_year.' AS SIGNED)', NULL,FALSE);
        }
        if(!empty($end_year) && empty($start_year)){
            $this->db->where('marc_260c_pub_year <= CAST('.$end_year.' AS SIGNED)', NULL,FALSE);
        }
        if(!empty($start_year) && !empty($end_year)){
            $this->db->where('marc_260c_pub_year >= CAST('.$start_year.' AS SIGNED)', NULL,FALSE);
            $this->db->where('marc_260c_pub_year <= CAST('.$end_year.' AS SIGNED)', NULL,FALSE);
        }
        if(!empty($search_term)){
            $this->db->group_start() 
            ->where('MATCH (marc_099_coll_ident) AGAINST ("'. $search_term .'")', NULL, FALSE)
            ->or_where('MATCH (marc_245_title_stmt) AGAINST ("'. $search_term .'")', NULL, FALSE)
            ->group_end();
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    // get collection info by collection url
    public function getCollectionByName($coll_name) {
        $this->db->select('*');
        $this->db->from('collections');
        $this->db->where('url', $coll_name);
        $query = $this->db->get();
        return $query->result_array();
    }

    // get collection count by url
    public function countAllRecordsByName($coll_name) {
        $this->db->select('count(coll_id) AS count');
        $this->db->from('records');
        $this->db->join('collections', 'records.coll_id = collections.collection_id', 'inner');
        $this->db->where('collections.url', $coll_name);
        $query = $this->db->get();
        return $query->row();
    }

    // get collection info by collection id
    public function getCollection($coll_id) {
        $this->db->select('*');
        $this->db->from('collections');
        $this->db->where('collection_id', $coll_id);
        $query = $this->db->get();
        return $query->row();
    }

    // single collection details based on URL query string (eg &coll_id=2)
    public function getCollections(){
        $query = $this->db->get('collections');
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    // get a random collection of records based on collection name
    public function getCollectionSampleByName($coll_name) {
        $this->db->select('*');
        $this->db->from('records');
        $this->db->join('collections', 'records.coll_id = collections.collection_id', 'inner');
        $this->db->where('collections.url', $coll_name);
        $this->db->order_by('rand()');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result_array();
    }

    // get collection info by collection id
    public function getRecordById($coll_name, $item_id) {
        $this->db->select('*');
        $this->db->from('records');
		$this->db->join('collections', 'records.coll_id = collections.collection_id', 'inner');
        $this->db->where('record_id', $item_id);
		$this->db->where('collections.url', $coll_name);
        $query = $this->db->get();
        return $query->result_array();
    }

        }

?>