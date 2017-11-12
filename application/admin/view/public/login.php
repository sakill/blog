<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <base href="http://www.sakill.com/">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台登录</title>
<link rel="stylesheet" type="text/css" href="public/admin/style/basic.css" />
<link rel="stylesheet" type="text/css" href="public/admin/style/login.css" />
<script type="text/javascript" src="view/admin/js/ajax.js"></script>
<script type="text/javascript" src="view/admin/js/login.js"></script>
</head>
<body>

<div id="login">
	<form method="post" name="login" action="/admin/index/login">
		<input type="hidden" name="ajaxlogin" id="ajaxlogin" />
		<input type="hidden" name="ajaxcode" id="ajaxcode" />
		<dl>
			<dd>管理员姓名：<input type="text" name="user" id="user" onblur="checkLogin();" class="text" /></dd>
			<dd>管理员密码：<input type="password" name="pass" id="pass" onblur="checkLogin();" class="text" /></dd>
			<dd>验　证　码：<input type="text" style="text-transform:uppercase;" name="code" id="code" onblur="checkCode();" class="text" /></dd>
			<dd class="code"><img src="/admin/call/validateCode" title="看不清？点击刷新" onclick="javascript:this.src='/admin/call/validateCode/tm/'+Math.random()" /></dd>
			<dd><input type="submit" class="submit" name="send" onclick="return adminLogin();" value="进入管理中心" /></dd>
		</dl>
	</form>
</div>

</body>
</html>