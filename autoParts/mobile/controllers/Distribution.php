<?php

class Distribution extends Controller {
    function __construct() {
        parent::__construct();
    }
    
    public function order_list() {
    	$this->load->view('distribution/order_list');
    }
    
    public function order_detail() {
    	$this->load->view('distribution/order_detail');
    }
}