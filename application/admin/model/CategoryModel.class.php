<?php
/**
 * User: SAKILL
 * Url：http://www.sakill.com
 * QQ : 1017615760;
 * Date: 2017/8/12
 */
namespace admin;
use core;
//导航条实体类
class CategoryModel extends core\Model {
    public function __construct() {
        parent::__construct();
        $this->_fields = array('id','name','info','sort','sid','display','title','keywords');
        $this->_tables = array(DB_FREFIX.'category');
        $this->_check = new core\CategoryCheck();
        list(
            $this->_R['id'],
            $this->_R['navid'],
            $this->_R['sid'],
            $this->_R['name'],
            $this->_R['info'],
            $this->_R['sort'],
            $this->_R['display'],
            $this->_R['title'],
            $this->_R['keywords']
            ) = $this->getRequest()->getParam(array(
            isset($this->_parms['id']) ? $this->_parms['id'] : null,
            isset($_GET['navid']) ? $_GET['navid'] : null,
            isset($_GET['sid']) ? $_GET['sid'] : 0,
            isset($_POST['name']) ? $_POST['name'] : null,
            isset($_POST['info']) ? $_POST['info'] : null,
            isset($_POST['sort']) ? $_POST['sort'] : null,
            isset($_POST['display']) ? $_POST['display'] : null,
            isset($_POST['title']) ? $_POST['title'] : null,
            isset($_POST['keywords']) ? $_POST['keywords'] : null
        ));
    }

    public function findAll() {
        return parent::select(array('id','name','info','sort','sid','display','title','keywords'),
            array('order'=>'sort ASC'));
    }

    public function findOne() {
        $_where = array("id='{$this->_R['id']}'");
        if (!$this->_check->oneCheck($this, $_where)) $this->_check->error();
        return parent::select(array('id','name','info','sort','sid','display','title','keywords'),
            array('where'=>$_where, 'limit'=>'1'));
    }

    public function total() {
        return parent::total(array('where'=>array("sid='{$this->_R['sid']}'")));
    }

    public function add() {
        $_where = array("name='{$this->_R['name']}'");
        if (!$this->_check->addCheck($this, $_where)) $this->_check->error();
        $_addData = $this->getRequest()->filter($this->_fields);
        $_addData['date'] = core\Tool::getDate();
        $_addData['updated'] = core\Tool::getDate();
        return parent::add($_addData);
    }

    public function update() {
        $_where = array("id='{$this->_R['id']}'");
        if (!$this->_check->oneCheck($this, $_where)) $this->_check->error();
        if (!$this->_check->updateCheck($this)) $this->_check->error();
        $_updateData = $this->getRequest()->filter($this->_fields);
        return parent::update($_where, $_updateData);
    }

    public function delete() {
        $_where = array("id='{$this->_R['id']}'");
        return parent::delete($_where);
    }

    public function sort() {
        foreach ($_POST['sort'] as $_key=>$_value) {
            if (!is_numeric($_value)) continue;
            $_setField = array('sort'=>$_value);
            $_where = array("id='$_key'");
            parent::update($_where, $_setField);
        }
        return true;
    }

    public function isName() {
        $_where = array("name='{$this->_R['name']}'");
        $this->_check->ajax($this, $_where);
    }
}
?>