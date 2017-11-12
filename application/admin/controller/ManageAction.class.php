<?php
/**
 * User: SAKILL
 * Url：http://www.sakill.com
 * QQ : 1017615760;
 * Date: 2017/8/12
 */
namespace admin;
use core;
class ManageAction extends core\Action {
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
//        parent::page();
        $this->_tpl->assign('AllManage', $this->_model->findAll());
        $this->_tpl->display('manage/show.php');
    }
    //增加管理员
    public function add(){
        if (isset($_POST['send'])) $this->_model->add() ? $this->_redirect->succ('/admin/manage/index', '管理员新增成功！') : $this->_redirect->error('管理员新增失败！');
        $this->_tpl->display('manage/add.php');
    }
    //删除管理员
    public function delete() {
        if (isset($this->_parms['id'])) $this->_model->delete() ? $this->_redirect->succ(core\Tool::getPrevPage(), '管理员删除成功！') : $this->_redirect->error('管理员删除失败！');
    }
    //修改管理员
    public function update() {
        if (isset($_POST['send'])) $this->_model->update() ? $this->_redirect->succ('/admin/manage/index', '管理员修改成功！') : $this->_redirect->error('管理员修改失败！');
        if (isset($this->_parms['id'])) {
            $this->_tpl->assign('OneManage', $this->_model->findOne());
            $this->_tpl->display('manage/update.php');
        }
    }
    public function sys(){
        $this->_tpl->display('manage/sys_setting.php');
    }
}