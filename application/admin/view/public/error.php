<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<base href="http://www.sakill.com/">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link rel="stylesheet" type="text/css" href="public/admin/style/basic.css" />
<link rel="stylesheet" type="text/css" href="public/admin/style/error.css" />
</head>
<body>

<h2>错误 -- 提示页</h2>

<div id="list" class="error">
    <?php
        if (is_array($this->_vars['message'])){
            foreach ($this->_vars['message'] as $key=>$value){
                echo "<p>$key===$value</p>";
            }
        }else{
            echo $this->_vars['message'];
        }

	?>
	<p><a href="<?php echo $this->_vars['prev']; ?>">[返回]</a></p>
</div>

</body>
</html>