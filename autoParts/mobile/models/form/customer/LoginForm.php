<?php

class LoginForm extends BaseForm {
    public $userName;
    public $userPassword;

    function __construct() {
        parent::__construct();
    }

    public function rules() {
        return array(
            array('userName, userPassword', 'required') ,
        );
    }

    public function attributes() {
        return array(
            'userName'     => '用户名' ,
            'userPassword' => '用户密码' ,
        );
    }
}