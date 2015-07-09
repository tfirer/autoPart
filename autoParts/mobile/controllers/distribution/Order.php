<?php

class Order extends Controller {
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
    	$this->load->view('distribution/order_list');
    }
}