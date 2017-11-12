<?php
/**
 * User: SAKILL
 * Url：http://www.sakill.com
 * QQ : 1017615760;
 * Date: 2017/8/9
 */
namespace admin;
use core;
class IndexAction extends core\Action {
    private $_manage = null;
    function __construct()
    {
        parent::__construct();
        $this->_manage=new ManageModel();
    }

    //后台初始页面
    public function index(){
        if (isset($_SESSION['admin'])) {
            $this->_tpl->assign('admin', $_SESSION['admin']);
            $this->_tpl->display('public/index.php');
        } else {
            $this->_redirect->succ('/admin/index/login');
        }
    }

    //后台登录
    public function login() {
        if (isset($_POST['send'])) {
            if ($this->_manage->login()) {
                $_login = $this->_manage->findLogin();
                $_SESSION['admin']['user'] = $_login[0]->user;
                $_SESSION['admin']['id'] = $_login[0]->id;
                $this->_manage->countLogin();
                $this->_redirect->succ('/admin/index/', '后台登录成功！');
            }
        }
        $this->_tpl->display('public/login.php');
    }

    //后台退出
    public function logout()
    {
        if (isset($_SESSION['admin'])) session_destroy();
        $this->_redirect->succ('/admin/index/login');
    }

    //后台main主页
    public function main()
    {
        $this->_tpl->display('public/main.php');
    }

    //缓存清除；

    public function cleanCache()
    {
            $dir = CORE_PATH . "cache/"; //你的临时目录位置
            $handle = opendir("{$dir}/");
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != ".." && !is_dir("{$dir}/{$file}")) {
                    @unlink("{$dir}/{$file}");
                }
            }
            closedir($handle); //关闭由 opendir() 函数打开的目录
            $this->_redirect->succ('/admin/index/main',"清除缓存成功！");
    }
}