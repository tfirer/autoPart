<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
/**
 * ������
 *
 * @author huoyan
 * @package application.libraries
 */

class Error
{
    private $error;
    private $status;

    /**
     * ���캯��
     * @param string $error 
     */
    public function __construct($error = null, $status=-1) {
        $this->error = $error;
        $this->status = $status;
    }

    public function getError() {
        return $this->error;
    }

    public function getStatus() {
        return $this->status;
    }
    
    /**
     * �ж϶����Ƿ�Ϊ�������
     * @param mixed $obj Ҫ��֤�Ķ�������
     * @return boolean ����$obj�Ƿ�ΪCError����
     */
    public static function isError($obj) {
        return ($obj instanceof self);
    }
}