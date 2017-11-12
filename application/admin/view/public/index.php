<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <base href="http://www.sakill.com/">
<title>后台管理系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="public/admin/style/adminStyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="public/admin/js/iframe.js"></script>
<style>html,body{width:100%;height:100%;}</style>
</head>
<body>
<div class="header">
    <div class="logo">
        <img src="public/admin/images/admin_logo.png" title="在哪儿"/>
    </div>
    <div class="fr top-link">
        <a href="/home/index/" target="_blank" title="访问站点"><i class="shopLinkIcon"></i><span>访问站点</span></a>
        <a href="javascript:void(0);" target="in" title="<?php echo $this->_vars['admin']['user']; ?>"><i class="adminIcon"></i><span>管理员：<?php echo $this->_vars['admin']['user']; ?></span></a>
        <a href="/admin/index/cleanCache" target="in" title="清除缓存"><i class="clearIcon"></i><span>清除缓存</span></a>
        <a href="/admin/manage/update/id/<?php echo $this->_vars['admin']['id'];?>" target="in" title="修改密码"><i class="revisepwdIcon"></i><span>修改密码</span></a>
        <a href="/admin/index/logout" title="安全退出" style="background:rgb(60,60,60);"><i class="quitIcon"></i><span>安全退出</span></a>
    </div>
</div>
<div class="menu-list" id="menu">
    <a href="admin/index/main" target="in" class="block menu-list-title center" style="border:none;margin-bottom:8px;color:#fff;">起始页</a>
    <ul>
        <li class="menu-list-title">
            <span>订单管理</span>
            <i>◢</i>
        </li>
        <li>
            <ul class="menu-children">
                <li><a href="order_list.html" title="商品列表" target="mainCont">订单列表</a></li>
            </ul>
        </li>

        <li class="menu-list-title">
            <span>文章管理</span>
            <i>◢</i>
        </li>
        <li>
            <ul class="menu-children">
                <li><a href="admin/article/index" title="文章列表" target="in">文章列表</a></li>
                <li><a href="admin/article/category" title="文章分类" target="in">文章分类</a></li>
                <li><a href="admin/article/recycle" title="文章回收" target="in">文章回收</a></li>
            </ul>
        </li>

        <li class="menu-list-title">
            <span>会员管理</span>
            <i>◢</i>
        </li>
        <li>
            <ul class="menu-children">
                <li><a href="admin/user/index" title="会员列表" target="in">会员列表</a></li>
                <li><a href="admin/user/add" title="添加会员" target="in">添加会员</a></li>
                <li><a href="admin/user/rank" title="会员等级" target="in">会员等级</a></li>
                <li><a href="admin/user/message" title="会员留言" target="in">会员留言</a></li>
            </ul>
        </li>

        <li class="menu-list-title">
            <span>系统设置</span>
            <i>◢</i>
        </li>
        <li>
            <ul class="menu-children">
                <li><a href="admin/manage/sys" title="站点基本设置" target="in">站点基本设置</a></li>
                <li><a href="admin/manage/index" title="站点基本设置" target="in">站点管理员</a></li>
            </ul>
        </li>

        <li class="menu-list-title">
            <span>广告管理</span>
            <i>◢</i>
        </li>
        <li>
            <ul class="menu-children">
                <li><a href="advertising_list.html" title="站点基本设置" target="mainCont">广告列表</a></li>
            </ul>
        </li>

    </ul>
    <div class="bar">
        <a href="#">
            <img src="public/admin/images/arrow_left.gif" alt="">
        </a>
    </div>
</div>
<div id="main">
    <iframe src="/admin/index/main" frameborder="0"  scrolling="no" name="in"></iframe>
</div>
</body>
</html>