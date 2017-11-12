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
class ArticleModel extends core\Model {
    private $category=null;
    public function __construct() {
        parent::__construct();
        $this->_fields = array('id','post_author','post_content','post_title','post_keyword','post_describe','post_category','post_date','post_updated','post_comment');
        $this->_tables = array(DB_FREFIX.'post');
        $this->_check = new core\ArticleCheck();
        $this->category=new CategoryModel();
        list(
            $this->_R['id'],
            $this->_R['post_content'],
            $this->_R['post_title'],
            $this->_R['post_keyword'],
            $this->_R['post_describe'],
            $this->_R['post_category']
            ) = $this->getRequest()->getParam(array(
            isset($this->_parms['id']) ? $this->_parms['id'] : null,
            isset($_POST['post_content']) ? $_POST['post_content'] : null,
            isset($_POST['post_title']) ? $_POST['post_title'] : null,
            isset($_POST['post_keyword']) ? $_POST['post_keyword'] : null,
            isset($_POST['post_describe']) ? $_POST['post_describe'] : null,
            isset($_POST['post_category']) ? $_POST['post_category'] : null
        ));
    }

    public function findAll() {
        return parent::select(array('id','post_author','post_content','post_title','post_keyword','post_describe','post_category','post_date','post_updated','post_comment'),
            array('limit'=>$this->_limit,'order'=>'post_date DESC'));
    }

    public function findCategory() {
        $OneNav=$this->category->findOne();
        $_where = array("post_category='{$OneNav[0]->name}'");
        return parent::select(array('id','post_author','post_content','post_title','post_keyword','post_describe','post_category','post_date','post_updated','post_comment'),
            array('where'=>$_where,'limit'=>$this->_limit,'order'=>'post_date DESC'));
    }

    public function findOne() {
        $_where = array("id='{$this->_R['id']}'");
        if (!$this->_check->oneCheck($this, $_where)) $this->_check->error();
        return parent::select(array('id','post_author','post_content','post_title','post_keyword','post_describe','post_category','post_date','post_updated','post_comment'),
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

    public function totalcategory() {
        $OneNav=$this->category->findOne();
        $_where = array("post_category='{$OneNav[0]->name}'");
        return parent::total(array('where'=>$_where));
    }

    public function add() {
        $_addData = $this->getRequest()->filter($this->_fields);
        $_addData['post_author'] =$_SESSION['admin']['user'];
        $_addData['post_date'] = core\Tool::getDate();
        $_addData['post_updated'] = core\Tool::getDate();
        return parent::add($_addData);
    }

    public function update() {
        $_where = array("id='{$this->_R['id']}'");
        if (!$this->_check->oneCheck($this, $_where)) $this->_check->error();
        $_updateData = $this->getRequest()->filter($this->_fields);
        $_updateData['post_updated'] = core\Tool::getDate();;
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