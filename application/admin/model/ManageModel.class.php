<?php
/**
 * User: SAKILL
 * Url：http://www.sakill.com
 * QQ : 1017615760;
 * Date: 2017/8/12
 */
namespace admin;
use core;
//管理员实体类
class ManageModel extends core\Model {
    public function __construct() {
        parent::__construct();
        $this->_fields = array('id','user','email','pass','login_count','last_ip','last_time','reg_time');
        $this->_tables = array(DB_FREFIX.'manage');
        $this->_check = new core\ManageCheck();
        list(
            $this->_R['id'],
            $this->_R['user'],
            $this->_R['pass'],
            $this->_R['code']
            ) = $this->getRequest()->getParam(array(
            isset($this->_parms['id']) ? $this->_parms['id'] : null,
            isset($_POST['user']) ? $_POST['user'] : null,
            isset($_POST['pass']) ? $_POST['pass'] : null,
            isset($_POST['code']) ? $_POST['code'] : null
        ));
    }

    public function findAll() {
        $this->_tables = array(DB_FREFIX.'manage a');
        return parent::select(array('a.id','a.user','a.email','a.reg_time','a.level','a.login_count','a.last_ip','a.last_time'),
            array('order'=>'a.reg_time DESC'));
    }

    public function findOne() {
        $_where = array("id='{$this->_R['id']}'");
        if (!$this->_check->oneCheck($this, $_where)) $this->_check->error();
        return parent::select(array('id','user','email'),
            array('where'=>$_where, 'limit'=>'1'));
    }

    public function findLogin() {
        $this->_tables = array(DB_FREFIX.'manage a');
        return parent::select(array('a.user','a.id'),
            array('where'=>array("user='{$this->_R['user']}'"), 'limit'=>'1'));
    }

    public function countLogin() {
        $_where = array("user='{$this->_R['user']}'");
        $_updateData['login_count'] = array('login_count+1');
        $_updateData['last_ip'] = core\Tool::getIP();
        $_updateData['last_time'] =core\Tool::getDate();
        parent::update($_where, $_updateData);
    }

    public function total() {
        return parent::total();
    }

    public function add() {
        $_where = array("user='{$this->_R['user']}'");
        if (!$this->_check->addCheck($this, $_where)) $this->_check->error();
        $_addData = $this->getRequest()->filter($this->_fields);
        $_addData['pass'] = sha1($_addData['pass']);
        $_addData['email'] = $_addData['email'];
        $_addData['last_ip'] = core\Tool::getIP();
        $_addData['reg_time'] = core\Tool::getDate();
        return parent::add($_addData);
    }

    public function update() {
        $_where = array("id='{$this->_R['id']}'");
        if (!$this->_check->oneCheck($this, $_where)) $this->_check->error();
        if (!$this->_check->updateCheck($this)) $this->_check->error();
        $_updateData = $this->getRequest()->filter($this->_fields);
        $_updateData['pass'] = sha1($_updateData['pass']);
        return parent::update($_where, $_updateData);
    }

    public function delete() {
        $_where = array("id='{$this->_R['id']}'");
        return parent::delete($_where);
    }

    public function isUser() {
        $_where = array("user='{$this->_R['user']}'");
        $this->_check->ajax($this, $_where);
    }

    public function login() {
        $_where = array("user='{$this->_R['user']}'", "pass='".sha1($this->_R['pass'])."'");
        if (!$this->_check->loginCheck($this, $_where)) {
            $this->_check->error();
        } else {
            return true;
        }
    }

    public function ajaxLogin() {
        $_where = array("user='{$this->_R['user']}'", "pass='".sha1($this->_R['pass'])."'");
        $this->_check->ajaxLogin($this, $_where);
    }

    public function ajaxCode() {
        $this->_check->ajaxcode($this, $this->_R['code']);
    }
}