<?php
//控制器基类
namespace core;
class Action {
	protected $_tpl = null;
	protected $_model = null;
	protected $_redirect = null;
    protected $_parms=array();
	
	protected function __construct() {
		$this->_tpl = new Templates();
        $this->_parms=Factory::$_parm;
		$this->_model = Factory::setModel();
		$this->_redirect = Redirect::getInstance($this->_tpl);
	}
	
	protected function page($_pagesize = PAGE_SIZE, $_model = null,$total=null) {
		$this->_model = Validate::isNullString($_model) ? $this->_model : $_model;
		if (!$total) $total=$this->_model->total();
		$_page = new Page($total,$_pagesize);
		$this->_model->setLimit($_page->getLimit());
		$this->_tpl->assign('page',$_page->showpage());
		$this->_tpl->assign('num',($_page->getPage()-1)*$_pagesize);
	}
	
	public function run() {
        $_m=Factory::$_method;
		method_exists($this, $_m) ? eval('$this->'.$_m.'();') : $this->index();
	}
}
?>