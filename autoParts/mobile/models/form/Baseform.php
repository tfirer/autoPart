<?php
/**
 * 表单处理基类
 *
 * @author huoyan
 * @package application.core
*/

class BaseForm extends Basemodel
{
	public function __construct() {
		$this->_CI =& get_instance();
		$this->_CI->load->library('form_validation');
		$this->_CI->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->_CI->form_validation->set_message('required', "%s不能为空");
		$this->_CI->form_validation->set_message('numeric', "%s必须未整数");
	}

	public function submitQuery($data = null) {
		if (!$data) {
			$data = $_POST;
		}
		foreach ($data as $key => $value) {
			$this->$key = $value;
		}
	}

	public function submit() {
		if (empty($_POST)) {
			return false;
		}
		$this->submitQuery();
		return true;
	}

	public function validate() {
		$rules = $this->rules();
		if (empty($rules)) {
			return true;
		}

		foreach ($rules as $rule) {
			$keys = explode(',', $rule[0]);
			$validation = $rule[1];
			foreach ($keys as $key) {
				$key = trim($key);
				$attributes = $this->attributes();
				$attrName = isset($attributes[$key]) ? $attributes[$key] : ucfirst($key);
				$this->_CI->form_validation->set_rules($key, $attrName, $validation);
			}
		}
		return $this->_CI->form_validation->run();
	}

	public function getErrors() {
		return validation_errors();
	}

	public function buildHttpQuery($filter = ReflectionProperty::IS_PUBLIC) {
		$result = array();
		$reflect = new ReflectionClass($this);
		$properties = $reflect->getProperties($filter);
		if (!empty($properties))
		{
			foreach ($properties as $propery)
			{
				$reflectionProperty = $reflect->getProperty($propery->name);
				$value = $reflectionProperty->getValue($this);
				$result[$propery->name] = (null !== $value) ? $value : '';
			}
		}
		return http_build_query($result);
	}

	private $_CI;
}