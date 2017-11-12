<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <base href="http://www.sakill.com/">
<title>文章分类</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="public/admin/style/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i></i><em>文章分类</em></span>
    <span class="modular fr"><a href="admin/article/categoryadd" class="pt-link-btn">+添加新分类</a></span>
  </div>
  
  <table class="list-style">
   <tr>
    <th>分类名称</th>
    <th>分类标题</th>
    <th>分类描述</th>
    <th>是否显示</th>
    <th>排序</th>
    <th>操作</th>
   </tr>
    <?php
      foreach ($this->_vars['AllNav'] as $key => $value){ ?>
   <tr>
    <td>
     <input type="checkbox"/>
     <span><?php echo $value->name ?></span>
    </td>
    <td class="center"><?php echo $value->title ?></td>
    <td class="center"><?php echo $value->info ?></td>
    <td class="center"><img src="public/admin/images/yes.gif"/></td>
    <td class="center"><input type="text" value="<?php echo $value->sort;?>" style="width:50px;text-align:center;"/></td>
    <td class="center">
        <a title="编辑" href="admin/article/categoryupdate/id/<?php echo $value->id;?>"><img src="public/admin/images/icon_edit.gif"/></a>
        <a title="移除"><img src="public/admin/images/icon_trash.gif"/></a>
    </td>
   </tr>
   <?php }?>   
<!--      二级菜单-->
<!--   <tr>-->
<!--    <td style="text-indent:2em;">-->
<!--     <input type="checkbox"/>-->
<!--     <span>面包</span>-->
<!--    </td>-->
<!--    <td class="center">3</td>-->
<!--    <td class="center">盘</td>-->
<!--    <td class="center"><img src="images/no.gif"/></td>-->
<!--    <td class="center"><input type="text" value="0" style="width:50px;text-align:center;"/></td>-->
<!--    <td class="center"><a class="block" title="移除"><img src="images/icon_trash.gif"/></a></td>-->
<!--   </tr>-->
  </table>
  
  <!-- BatchOperation -->
  <div style="overflow:hidden;">
      <!-- Operation -->
	  <div class="BatchOperation fl">
	   <input type="checkbox" id="del"/>
	   <label for="del" class="btnStyle middle">全选</label>
	   <input type="button" value="批量删除" class="btnStyle"/>
	  </div>
  </div>
 </div>
</body>
</html>