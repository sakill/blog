<?php
/**
 * User: SAKILL
 * Url：http://www.sakill.com
 * QQ : 1017615760;
 * Date: 2017/8/12
 */
namespace core;
use home;
class Factory {
	static private $_obj = null;
	static public $_moudle=null;
	static public $_controller=null;
	static public $_method=null;
	static public $_parm=array();
	static private $_flag;
	static private $_kk=array();
	static public function setAction() {
	    self::getM();
		self::getA();
		self::getF();
		self::getP();
		if (!file_exists(APP_PATH.self::$_moudle.'/controller/'.self::$_controller.'Action.class.php')){
            self::$_controller = 'Index';
            self::$_moudle='home';
        }
        $Td=self::$_moudle.'\\'.ucfirst(self::$_controller).'Action';
        self::$_obj=new $Td();
		return self::$_obj;
	}

	static public function setModel() {
		if (file_exists(APP_PATH.self::$_moudle.'/model/'.self::$_controller.'Model.class.php')) {
            $Td=self::$_moudle.'\\'.ucfirst(self::$_controller).'Model';
            self::$_obj=new $Td();
        }
        return self::$_obj;
	}

	//获取模块
    static public function getM() {
        if (!@$_SERVER['PATH_INFO']){
            self::$_moudle= 'home';
        }else{
            $i=$_SERVER['PATH_INFO'];
            self::$_kk=explode('/',$i);
            array_shift(self::$_kk);
            self::$_moudle=array_shift(self::$_kk);
            if (!Validate::inArray(self::$_moudle, array('admin','home'))) {
                self::$_moudle='home';
            }
        }
	}

    //获取控制器
	static public function getA(){
        if (!empty(self::$_kk)){
            $i=array_shift(self::$_kk);
            if (!empty($i)) {
                self::$_controller=ucfirst($i);
            }else{
                self::$_controller='Index';
            }
        }else{
            self::$_controller='Index';
        }

	}

	//获取方法；
    static public function getF(){
        if (!empty(self::$_kk)){
            $i=array_shift(self::$_kk);
            if (!empty($i)) {
                self::$_method=$i;
            }else{
                self::$_method='Index';
            }
        }else{
            self::$_method='Index';
        }
    }
    //获取参数；
    static public function getP(){
        if (!empty(self::$_kk)){
            while (count(self::$_kk)){
                self::$_parm[array_shift(self::$_kk)]=array_shift(self::$_kk);
            }
        }
    }

}
?>