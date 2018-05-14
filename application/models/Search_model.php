<?php

class Search_model extends CI_Model {

    // count all records in database
    public function countaAllRecords() {
        $this->db->select('ROUND(count(*), -2) as count');
        $this->db->from('records');
        $query = $this->db->get();
        return $query->row();
    }
    
    public function allCollRecords() {
        $this->db->select('*');
        $this->db->from('collections');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    
    public function countAllRecords() {
        $this->db->select('collections.collection_id, name, collections.url, coll_info, logo, count(coll_id) AS count');
        $this->db->from('collections');
        $this->db->join('records', 'collections.collection_id = records.coll_id', 'left');
        $this->db->group_by('collections.collection_id'); 
        $query = $this->db->get();
        return $query->result_object();
    }

    public function record_count($search_term, $coll_id, $start_year, $end_year) {

        $search_term = $this->session->userdata('search_word');
        $this->db->select('*');
        $this->db->from('records');
        $this->db->join('collections', 'records.coll_id = collections.collection_id', 'inner');
        if(!empty($coll_id)){
            $this->db->where('coll_id', $coll_id);
        }
        if(!empty($start_year) && empty($end_year)){
            $this->db->where('marc_260c_pub_year >= CAST('.$start_year.' AS int)', NULL,FALSE);
        }
        if(!empty($end_year) && empty($start_year)){
            $this->db->where('marc_260c_pub_year <= CAST('.$end_year.' AS int)', NULL,FALSE);
        }
        if(!empty($start_year) && !empty($end_year)){
            $this->db->where('marc_260c_pub_year >= CAST('.$start_year.' AS int)', NULL,FALSE);
            $this->db->where('marc_260c_pub_year <= CAST('.$end_year.' AS int)', NULL,FALSE);
        }
        $this->db->group_start() 
        ->like('marc_099_coll_ident', $search_term)
        ->or_like('marc_100_main_pers_name', $search_term)
        ->or_like('marc_100_main_pers_name', $search_term)
        ->or_like('marc_260c_pub_year', $search_term)
        ->or_like('marc_110_main_corp_name', $search_term)
        ->or_like('marc_700_add_pers_name', $search_term)
        ->or_like('marc_710_add_corp_name', $search_term)
        ->or_like('marc_600_subj_add_pers_name', $search_term)
        ->or_like('marc_610_subj_add_corp_name', $search_term)
        ->or_like('marc_245_title_stmt', $search_term)
        ->or_like('marc_130_main_uniform_title', $search_term)
        ->or_like('marc_240_uniform_title', $search_term)
        ->or_like('marc_242_trans_title', $search_term)
        ->or_like('marc_243_coll_uniform_title', $search_term)
        ->or_like('marc_246_var_form_title', $search_term)
        ->or_like('marc_730_add_uniform_title', $search_term)
        ->or_like('marc_740_add_related_title', $search_term)
        ->or_like('marc_250_edition_stmt', $search_term)
        ->or_like('marc_260_pub', $search_term)
        ->or_like('marc_264_rda_pub', $search_term)
        ->group_end();  
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function fetch_records($limit, $start, $search_term, $coll_id, $start_year, $end_year) {

        $search_term = $this->session->userdata('search_word');

        $this->db->select('*');
        $this->db->from('records');
        $this->db->join('collections', 'records.coll_id = collections.collection_id', 'inner');
        if(!empty($coll_id)){
            $this->db->where('coll_id', $coll_id);
        }
        if(!empty($start_year) && empty($end_year)){
            $this->db->where('marc_260c_pub_year >= CAST('.$start_year.' AS int)', NULL,FALSE);
        }
        if(!empty($end_year) && empty($start_year)){
            $this->db->where('marc_260c_pub_year <= CAST('.$end_year.' AS int)', NULL,FALSE);
        }
        if(!empty($start_year) && !empty($end_year)){
            $this->db->where('marc_260c_pub_year >= CAST('.$start_year.' AS int)', NULL,FALSE);
            $this->db->where('marc_260c_pub_year <= CAST('.$end_year.' AS int)', NULL,FALSE);
        }
        $this->db->group_start() 
        ->like('marc_099_coll_ident', $search_term)
        ->or_like('marc_100_main_pers_name', $search_term)
        ->or_like('marc_100_main_pers_name', $search_term)
        ->or_like('marc_260c_pub_year', $search_term)
        ->or_like('marc_110_main_corp_name', $search_term)
        ->or_like('marc_700_add_pers_name', $search_term)
        ->or_like('marc_710_add_corp_name', $search_term)
        ->or_like('marc_600_subj_add_pers_name', $search_term)
        ->or_like('marc_610_subj_add_corp_name', $search_term)
        ->or_like('marc_245_title_stmt', $search_term)
        ->or_like('marc_130_main_uniform_title', $search_term)
        ->or_like('marc_240_uniform_title', $search_term)
        ->or_like('marc_242_trans_title', $search_term)
        ->or_like('marc_243_coll_uniform_title', $search_term)
        ->or_like('marc_246_var_form_title', $search_term)
        ->or_like('marc_730_add_uniform_title', $search_term)
        ->or_like('marc_740_add_related_title', $search_term)
        ->or_like('marc_250_edition_stmt', $search_term)
        ->or_like('marc_260_pub', $search_term)
        ->or_like('marc_264_rda_pub', $search_term)
        ->group_end();  
        $this->db->order_by('marc_260c_pub_year', 'ASC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
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
        $this->db->select('marc_245_title_stmt, marc_260c_pub_year');
        $this->db->from('records');
        $this->db->join('collections', 'records.coll_id = collections.collection_id', 'inner');
        $this->db->where('collections.url', $coll_name);
        $this->db->order_by('rand()');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_results($search_term) {
        // the $search_term is sent by the controller
        $this->db->from('records');
        $this->db->join('collections', 'records.coll_id = collections.collection_id', 'inner');
        $this->db->like('marc_099_coll_ident', $search_term)
        ->or_like('marc_100_main_pers_name', $search_term)
        ->or_like('marc_260c_pub_year', $search_term)
        ->or_like('marc_110_main_corp_name', $search_term)
        ->or_like('marc_700_add_pers_name', $search_term)
        ->or_like('marc_710_add_corp_name', $search_term)
        ->or_like('marc_600_subj_add_pers_name', $search_term)
        ->or_like('marc_610_subj_add_corp_name', $search_term)
        ->or_like('marc_245_title_stmt', $search_term)
        ->or_like('marc_130_main_uniform_title', $search_term)
        ->or_like('marc_240_uniform_title', $search_term)
        ->or_like('marc_242_trans_title', $search_term)
        ->or_like('marc_243_coll_uniform_title', $search_term)
        ->or_like('marc_246_var_form_title', $search_term)
        ->or_like('marc_730_add_uniform_title', $search_term)
        ->or_like('marc_740_add_related_title', $search_term)
        ->or_like('marc_250_edition_stmt', $search_term)
        ->or_like('marc_260_pub', $search_term)
        ->or_like('marc_264_rda_pub', $search_term);

        $this->db->limit(100, $this->uri->segment(3));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function item_list_count($search_term) {
        $this->db->select('*');
        $this->db->from('records');
        $this->db->like('marc_099_coll_ident', $search_term)
        ->or_like('marc_100_main_pers_name', $search_term)
        ->or_like('marc_260c_pub_year', $search_term)
        ->or_like('marc_110_main_corp_name', $search_term)
        ->or_like('marc_700_add_pers_name', $search_term)
        ->or_like('marc_710_add_corp_name', $search_term)
        ->or_like('marc_600_subj_add_pers_name', $search_term)
        ->or_like('marc_610_subj_add_corp_name', $search_term)
        ->or_like('marc_245_title_stmt', $search_term)
        ->or_like('marc_130_main_uniform_title', $search_term)
        ->or_like('marc_240_uniform_title', $search_term)
        ->or_like('marc_242_trans_title', $search_term)
        ->or_like('marc_243_coll_uniform_title', $search_term)
        ->or_like('marc_246_var_form_title', $search_term)
        ->or_like('marc_730_add_uniform_title', $search_term)
        ->or_like('marc_740_add_related_title', $search_term)
        ->or_like('marc_250_edition_stmt', $search_term)
        ->or_like('marc_260_pub', $search_term)
        ->or_like('marc_264_rda_pub', $search_term);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function item_view_details($item_id) {
        $this->db->select('*');
        $this->db->from('records');
                $this->db->where('record_id', $item_id); // Produces: WHERE id = 'whatever is in $item_id' ($item_is set in the URL like /?item_id=86)
                return $this->db->get()->row();
            }

        }

?>