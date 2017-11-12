<?php
/**
 * User: SAKILL
 * Url：http://www.sakill.com
 * QQ : 1017615760;
 * Date: 2017/8/12
 */
//Model基类
namespace core;
class Model extends DB {
    protected $_db = null;
    protected $_fields = array();
    protected $_tables = array();
    protected $_R = array();
    protected $_check = null;
    protected $_limit = '';
    protected $_parms=array();

    protected function __construct() {
        $this->_db = parent::getInstance();
        $this->_parms=Factory::$_parm;
    }

    protected function add(Array $_addData) {
        return $this->_db->add($this->_tables, $_addData);
    }

    protected function update(Array $_param, Array $_updateData) {
        return $this->_db->update($this->_tables, $_param, $_updateData);
    }

    protected function select(Array $_field, Array $_param = array()) {
        return $this->_db->select($this->_tables, $_field, $_param);
    }

    protected function total(Array $_param = array()) {
        return $this->_db->total($this->_tables, $_param);
    }

    protected function nextId() {
        return $this->_db->nextId($this->_tables);
    }

    protected function getRequest() {
        return Request::getInstance($this, $this->_check);
    }

    protected function delete(Array $_param) {
        return $this->_db->delete($this->_tables, $_param);
    }

    public function isOne(Array $_param) {
        return $this->_db->isOne($this->_tables, $_param);
    }

    public function setLimit($_limit) {
        $this->_limit = $_limit;
    }
}
?>