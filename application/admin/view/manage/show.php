<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>管理员列表</title>
    <base href="http://www.sakill.com/">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="public/admin/style/adminStyle.css" rel="stylesheet" type="text/css" />
<script src="public/admin/js/jquery.js"></script>
<script src="public/admin/js/public.js"></script>
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="user"></i><em>管理员列表</em></span>
    <span class="modular fr"><a href="admin/manage/add" class="pt-link-btn">+添加管理员</a></span>
  </div>
  <table class="list-style Interlaced">
   <tr>
    <th>管理员账号</th>
    <th>电子邮箱地址</th>
    <th>加入时间</th>
    <th>最后登陆时间</th>
    <th>操作</th>
   </tr>
   <?php
        foreach ($this->_vars['AllManage'] as $key => $value){
            echo "<tr>";
            echo "<td class=\"center\">$value->user</td>";
            echo "<td class=\"center\">$value->email</td>";
            echo "<td class=\"center\">$value->reg_time</td>";
            echo "<td class=\"center\">$value->last_time</td>";
            echo "<td class=\"center\">";
            echo "<a href=\"admin/manage/update/id/$value->id\"><img src=\"public/admin/images/icon_edit.gif\"/></a>";
            echo "<a href=\"admin/manage/delete/id/$value->id\"><img src=\"public/admin/images/icon_drop.gif\"/></a>";
            echo "</td>";
            echo "</tr>";
        }

   ?>
  </table>
 </div>
</body>
</html>