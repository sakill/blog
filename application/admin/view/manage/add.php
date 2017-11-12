<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <base href="http://www.sakill.com/">
<title>添加管理员</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="public/admin/style/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="user"></i><em>添加管理员</em></span>
    <span class="modular fr"><a href="admin/manage/index" class="pt-link-btn">管理员列表</a></span>
  </div>
     <form action="admin/manage/add" method="post">
          <table class="noborder">
           <tr>
            <td width="15%" style="text-align:right;">账号：</td>
            <td><input type="text" name="user" class="textBox length-middle"/></td>
           </tr>
           <tr>
            <td style="text-align:right;">邮箱：</td>
            <td><input type="text" name="email" class="textBox length-middle"/></td>
           </tr>
           <tr>
            <td style="text-align:right;">密码：</td>
            <td><input type="password" name="pass" class="textBox length-middle"/></td>
           </tr>
           <tr>
            <td style="text-align:right;">确认密码：</td>
            <td><input type="password" name="notpass" class="textBox length-middle"/></td>
           </tr>
           <tr>
            <td style="text-align:right;"></td>
            <td><input type="submit" name="send" class="tdBtn" value="保存"/></td>
           </tr>
          </table>
     </form>
 </div>
</body>
</html>