<?php
/**
 * User: SAKILL
 * Url：http://www.sakill.com
 * QQ : 1017615760;
 * Date: 2017/8/19
 */
namespace admin;
use core;
class UserAction extends core\Action {
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->_tpl->display('user/user_list.php');
    }
    public function add(){
        $this->_tpl->display('user/add_user.php');
    }
    public function update(){
        $this->_tpl->display('user/user_.php');
    }
    public function rank(){
        $this->_tpl->display('user/user_rank.php');
    }
    public function message(){
        $this->_tpl->display('user/user_message.php');
    }
}