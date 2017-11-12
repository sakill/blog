<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <base href="http://www.sakill.com/">
<title>新增分类</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="public/admin/style/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i></i><em>添加分类</em></span>
    <span class="modular fr"><a href="admin/article/category" class="pt-link-btn">分类列表</a></span>
  </div>
     <form action="admin/article/categoryadd" method="post">
  <table class="list-style">
   <tr>
    <td style="text-align:right;width:15%;">分类名称：</td>
    <td>
     <input type="text" name="name" class="textBox"/>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;width:10%;">上级分类：</td>
    <td>
     <select class="textBox">
      <option>顶级分类</option>
      <option>某分类</option>
     </select>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;">排序：</td>
    <td>
     <input type="text" name="sort" class="textBox length-short"/>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;">是否显示：</td>
    <td>
     <input type="radio" name="display" id="yes" checked/>
     <label for="yes">是</label>
     <input type="radio" name="display" id="no"/>
     <label for="no">否</label>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;">分类页面标题：</td>
    <td>
     <input type="text" name="title" class="textBox length-long"/>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;">分类页面关键词：</td>
    <td>
     <input type="text" name="keywords" class="textBox length-long"/>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;">分类页面描述：</td>
    <td>
     <textarea name="info" class="textarea"></textarea>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;"></td>
    <td><input type="submit" name="send" value="保存" class="tdBtn"/></td>
   </tr>
  </table>
     </form>
 </div>
</body>
</html>