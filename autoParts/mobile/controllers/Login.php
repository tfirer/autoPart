<?php

class Login extends Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('login');
    }
}