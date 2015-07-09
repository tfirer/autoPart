<?php

class CustomerModule extends BaseModule {
    function __construct() {
        parent::__construct();
    }

    public function getByName($name) {
        $this->db->where('username', $name);
        $query = $this->db->get(self::TABLE_CUSTOMER);
        return $query->row();
    }
}