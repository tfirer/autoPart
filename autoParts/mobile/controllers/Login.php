<?php

class Login extends Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('customer');
        $this->load->model('form/customer/loginForm');
    }

    public function index() {
        $form = New LoginForm();
        if ($form->submit()) {
            if ($form->validate()) {
                if (!$this->customer->check($form->userName, $form->userPassword)) {
                    var_dump($this->customer->getErrorMsg());
                } else {
                    echo 'success';
                }
            }
        } else {
            $this->load->view('login', array('form' => $form));
        }
    }
}