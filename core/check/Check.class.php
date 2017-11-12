<?php
//验证基类
namespace core;
class Check extends Validate {
	//判断验证是否通过，默认通过
	protected $_flag = true;
	//错误消息集
	protected $_message = array();
	//模版对象
	private $_tpl = null;
	
	public function __construct() {
        $this->_tpl = new Templates();
	}
	
	public function setMessage($_message) {
		$this->_message[] = $_message;
	}
	
	public function oneCheck(Model &$_model, Array $_param) {
		if (!$_model->isOne($_param)) {
			$this->_message[] = '找不到指定的数据！';
			$this->_flag = false;
		}
		return $this->_flag;
	}
	
 	//验证数据的合法性
 	public function error($_url = '') {
 		if (empty($_url)) {
			$this->_tpl->assign('message', $this->_message);
			$this->_tpl->assign('prev', Tool::getPrevPage());
			$this->_tpl->display('public/error.php');
			exit();
 		} else {
 			Redirect::getInstance()->succ($_url);
 		}
 	}
}
?>