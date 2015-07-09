<?php

/**
 * model 基类
 */
class Basemodel extends CI_Model {
    public $error;

    function __construct() {

    }

    public function setError($msg, $status=0) {
        $this->error = new Error($msg, $status);
        return false;
    }

    public function getErrorMsg() {
        return $this->error->getError();
    }

    public function getErrorStatus() {
        return $this->error->getStatus();
    }
}