<?php
/**
 * User: SAKILL
 * Url：http://www.sakill.com
 * QQ : 1017615760;
 * Date: 2017/8/9
 */
namespace home;
use core;
class IndexAction extends core\Action {
    private $article=null;
    private $category=null;
    function __construct()
    {
        parent::__construct();
        $this->article=new \admin\ArticleModel();
        $this->category=new \admin\CategoryModel();
    }

    public function index(){
        parent::page(5,$this->article);
        $this->_tpl->assign('AllArticle', $this->article->findAll());
        $this->_tpl->assign('AllNav', $this->category->findAll());
        $this->_tpl->display('index.php');
    }
    public function detail(){
        $this->_tpl->assign('detail', $this->article->findOne());
        $this->_tpl->assign('AllNav', $this->category->findAll());
        $this->_tpl->display('detail.php');
    }
    public function category(){
        parent::page(5,$this->article,$this->article->totalcategory());
        $this->_tpl->assign('AllArticle', $this->article->findCategory());
        $this->_tpl->assign('AllNav', $this->category->findAll());
        $this->_tpl->assign('OneNav', $this->category->findOne());
        $this->_tpl->display('category.php');
    }


}