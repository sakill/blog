<?php
/**
 * User: SAKILL
 * Url：http://www.sakill.com
 * QQ : 1017615760;
 * Date: 2017/8/9
 */
namespace core;
class Templates {
    private $_vars = array();
    private $_config = array(); //配置变量；
    private $_cache = null;
    public function __construct() {
        if ( !is_dir(CACHE_DIR)) {
            exit('ERROR：缓存目录不存在！请手工设置！');
        }
    }

    //assign()添加变量方法；
    public function assign($_var, $_value) {
        if (isset($_var) && !empty($_var)) {
            $this->_vars[$_var] = $_value;
        } else {
            exit('ERROR：请设置模板变量');
        }
    }

    //display()方法
    public function display($_file) {
        //给include进来的tpl传一个模板操作的对象
        $_tpl = $this;
        //设置模板的路径
        $_tplFile = APP_PATH.Factory::$_moudle.'/view/'.$_file;
        $_path=$_SERVER['PATH_INFO'];
        //缓存文件
        $_cacheFile = CACHE_DIR.md5($_path).'.html';
        //判断模板是否存在
        if (!file_exists($_tplFile)) {
            exit('ERROR：模板文件不存在！');
        }
        if (IS_CAHCE) {
            //缓存文件和编译文件都要存在
            if (file_exists($_cacheFile) && file_exists($_tplFile)) {
                //判断模板文件是否修改过，判断编译文件是否修改过
                if ( filemtime($_cacheFile) >= filemtime($_tplFile)) {
                    //载入缓存文件
                    include $_cacheFile;
                    exit();
                }
            }
        }
        include $_tplFile;
        if (IS_CAHCE) {
            //获取缓冲区内的数据，并且创建缓存文件
            file_put_contents($_cacheFile,ob_get_contents());
            //清除缓冲区(清除了编译文件加载的内容)
            ob_end_clean();
            //载入缓存文件
            include $_cacheFile;
        }
    }

    //创建create方法，用于header和footer这种模块模板解析使用，而不需要生成缓存文件
    public function create($_file) {
        //设置模板的路径
        $_tplFile = TPL_DIR.$_file;
        //判断模板是否存在
        if (!file_exists($_tplFile)) {
            exit('ERROR：模板文件不存在！');
        }
        //编译文件
        $_parFile = TPL_C_DIR.md5($_file).$_file.'.php';
        //当编译文件不存在，或者模板文件修改过，则生成编译文件
        if (!file_exists($_parFile) || filemtime($_parFile) < filemtime($_tplFile)) {
            //引入模板解析类
            require_once ROOT_PATH.'/includes/Parser.class.php';
            $_parser = new Parser($_tplFile);   //模板文件
            $_parser->compile($_parFile);  //编译文件
        }
        //载入编译文件
        include $_parFile;
    }
}