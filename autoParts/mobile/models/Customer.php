<?php

/**
 * customer 类
 */
class Customer extends Basemodel {
    const STATUS_VALIDATE = 1000;  // 有效
    const STATUS_FROAENED = 1100;  // 冻结
    const STATUS_DELETED  = 9000;  // 已删除

    function __construct() {
        parent::__construct();
        $this->load->model('module/customerModule');
    }

    public function check($name, $password) {
        $customer = $this->customerModule->getByName($name);
        if (!$customer) {
            return $this->setError('用户名不正确');
        }

        if (md5($password) !== $customer->password_hash) {
            return $this->setError('密码不正确');
        }

        if ($customer->status == self::STATUS_FROAENED) {
            return $this->setError('帐号已冻结');
        }

        return true;
    }
}