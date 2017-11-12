<?php
/**
 * User: SAKILL
 * Url：http://www.sakill.com
 * QQ : 1017615760;
 * Date: 2017/8/19
 */
namespace admin;
use core;
class ArticleAction extends core\Action {
    private $category=null;
    function __construct()
    {
        parent::__construct();
        $this->category=new CategoryModel();
    }
//        文章发布
    public function index(){
        parent::page();
        $this->_tpl->assign('AllArticle', $this->_model->findAll());
        $this->_tpl->display('article/product_list.php');
    }
    public function add(){
        if (isset($_POST['send'])) $this->_model->add() ? $this->_redirect->succ(core\Tool::getPrevPage(), '文章新增成功！') : $this->_redirect->error('文章新增失败！');
        $this->_tpl->assign('AllNav', $this->category->findAll());
        $this->_tpl->display('article/edit_product.php');
    }
    public function delete(){
        if (isset($this->_parms['id'])) $this->_model->delete() ? $this->_redirect->succ(core\Tool::getPrevPage(), '文章删除成功！') : $this->_redirect->error('文章删除失败！');
    }
    public function update(){
        if (isset($_POST['send'])) $this->_model->update() ? $this->_redirect->succ(core\Tool::getPrevPage(), '文章修改成功！') : $this->_redirect->error('文章修改失败！');
        $this->_tpl->assign('AllNav', $this->category->findAll());
        $this->_tpl->assign('OneArticle', $this->_model->findOne());
        $this->_tpl->display('article/update_article.php');
    }
//    文章分类
    public function category(){
        $this->_tpl->assign('AllNav', $this->category->findAll());
        $this->_tpl->display('article/product_category.php');
    }
    public function categoryadd(){
        if (isset($_POST['send'])) $this->category->add() ? $this->_redirect->succ(core\Tool::getPrevPage(), '导航新增成功！') : $this->_redirect->error('导航新增失败！');
        $this->_tpl->display('article/add_category.php');
    }
    public function categorydelete(){
        $this->_tpl->display('article/add_category.php');
    }
    public function categoryupdate(){
        if (isset($_POST['send'])) $this->category->update() ? $this->_redirect->succ(core\Tool::getPrevPage(), '导航修改成功！') : $this->_redirect->error('导航修改失败！');
        $this->_tpl->assign('OneNav', $this->category->findOne());
        $this->_tpl->display('article/update_category.php');
    }
//        文章回收
    public function recycle(){
        $this->_tpl->display('article/recycle_bin.php');
    }
    public function recycledelete(){
        $this->_tpl->display('article/recycle_bin.php');
    }
    public function recyclerecovery(){
        $this->_tpl->display('article/recycle_bin.php');
    }
}