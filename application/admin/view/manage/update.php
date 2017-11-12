<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <base href="http://www.sakill.com/">
<title>修改密码</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="public/admin/style/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="user"></i><em>修改密码</em></span>
  </div>
     <form method="post" action="admin/manage/update/id/<?php echo $this->_vars['OneManage'][0]->id; ?>">
  <table class="noborder">
   <tr>
    <td width="15%" style="text-align:right;">账号：</td>
    <td><input type="text" name="user" value="<?php echo $this->_vars['OneManage'][0]->user?>" class="textBox length-middle"/></td>
   </tr>
   <tr>
    <td style="text-align:right;">邮箱：</td>
    <td><input type="text" name="email" class="textBox length-middle" value="<?php echo $this->_vars['OneManage'][0]->email?>"/></td>
   </tr>
   <tr>
    <td style="text-align:right;">新密码：</td>
    <td><input type="password" name="pass" class="textBox length-middle"/></td>
   </tr>
   <tr>
    <td style="text-align:right;">再次确认密码：</td>
    <td><input type="password" name="notpass" class="textBox length-middle"/></td>
   </tr>
   <tr>
    <td style="text-align:right;"></td>
    <td><input type="submit" class="tdBtn" name="send" value="保存"/></td>
   </tr>
  </table>
     </form>
 </div>
</body>
</html>