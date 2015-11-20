<?php 
namespace Libraries\DB;
Class Foundation2Item {
	private $_table = '';
	public $_data = [];

	public function __construct($table, $data = null) {
		if ($data != null) {
			$this->_table = $table;
			$this->_data = $data;
		}
	}
	
	public function __get($key) {
		try {
			return $this->_data[$key];
		} catch (Exception $e) {
			throw new DBException($e);
		}
	}

	public function __set($key,$value) {
		try {
			$this->_data[$key] = $value;
		} catch (Exception $e) {
			throw new DBException($e);
		}
	}

	public function __isset($key) {
		if (isSet($this->_data[$key])) {
			return true;
		}
		return false;
	}

	public function __debugInfo() {
		return (array)$this->_data;
	}

	public function __tostring() {
		return var_export($this->_data,true);
	}

	public function toArray() {
		return $this->_data;
	}

	public function toJson() {
		return json_encode($this->_data);
	}

	public function toObject($data = null) {
		return (object) $this->_data;
	}
}
?>