<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author huoyan
 * @version
 * @package
 */
class BaseModule extends Basemodel {
    const TABLE_CUSTOMER     = 'customer';
    const TABLE_DISTRIBUTION = 'distribution';
    const TABLE_GARAGE_ORDER = 'garage_order';

    function __construct() {
        parent::__construct();
    }

    private static $key2IdMaps = array(
    );

    private static $id2KeyMaps = array(
    );

    public function get_id($scope, $key) {
        if (!isset(self::$key2IdMaps[$scope])) {
            throw new Exception('The attribute specification scope: '.$scope.' not exist.');
        }

        $map = self::$key2IdMaps[$scope];
        if (!isset($map[$key])) {
            throw new Exception('The attribute specification key: '.$key.' not exist.');
        }

        return $map[$key];
    }

    public function get_key($id) {
        if (!isset(self::$id2KeyMaps[$id])) {
            throw new Exception('The attribute specification id: '.$id.' not exist.');
        }

        return self::$id2KeyMaps[$id];
    }

    public function mysql_now() {
        return date('Y-m-d H:i:s');
    }
}
