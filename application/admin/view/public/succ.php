<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <base href="http://www.sakill.com/">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<meta http-equiv="refresh" content="3;url=<?php echo $this->_vars['url'];?>" />
<link rel="stylesheet" type="text/css" href="public/admin/style/basic.css" />
<link rel="stylesheet" type="text/css" href="public/admin/style/succ.css" />
</head>
<body>

<h2>成功 -- 提示页</h2>

<div id="list" class="succ">
        <p><?php echo $this->_vars['suc_message']; ?></p>
	<p><a href="<?php echo $this->_vars['url'];?>">[如果浏览器没有及时跳转，请点击这里]</a></p>
</div>

</body>
</html>