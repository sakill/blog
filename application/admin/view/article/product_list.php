<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>文章列表</title>
    <base href="http://www.sakill.com/">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="public/admin/style/adminStyle.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/public.js"></script>
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i></i><em>文章列表</em></span>
    <span class="modular fr"><a href="admin/article/add" class="pt-link-btn">+添加文章</a></span>
  </div>
  <div class="operate">
   <form>
    <select class="inline-select">
     <option>A店铺</option>
     <option>B店铺</option>
    </select>
    <input type="text" class="textBox length-long" placeholder="输入文章名称..."/>
    <input type="button" value="查询" class="tdBtn"/>
   </form>
  </div>
  <table class="list-style Interlaced">
   <tr>
    <th>ID编号</th>
    <th>缩略图</th>
    <th>文章标题</th>
    <th>分类</th>
    <th>阅读量</th>
    <th>评论量</th>
    <th>精品</th>
    <th>新品</th>
    <th>热门</th>
    <th>操作</th>
   </tr>
 <?php foreach ($this->_vars['AllArticle'] as $key => $value){ ?>
   <tr>
    <td>
     <span>
     <input type="checkbox" class="middle children-checkbox"/>
     <i class="center block" ><?php echo $value->id ?></i>
     </span>
    </td>
    <td class="center pic-area">
        <?php
        $str=$value->post_content;
        $str=html_entity_decode($str);
        $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
        preg_match_all($pattern,$str,$match);
        if(count($match[0])){
            echo "<img src=\"".$match[0][1]."\" class=\"thumbnail\"/>";
        }else{
            echo "<img src=\"public/home/images//a".rand(1,10).".jpg\" alt=\"随机图片！\" class=\"thumbnail\"/>";
        }

        ?>
    </td>
    <td class="td-name">
      <span class="ellipsis td-name block center"><?php echo $value->post_title ?></span>
    </td>
    <td class="center">
     <span>
      <?php echo $value->post_category ?>
     </span>
    </td>
    <td class="center">
     <span>
      <i>589</i>
     </span>
    </td>
    <td class="center">
     <span>
      <i>0</i>
     </span>
    </td>
    <td class="center"><img src="public/admin/images/yes.gif"/></td>
    <td class="center"><img src="public/admin/images/no.gif"/></td>
    <td class="center"><img src="public/admin/images/yes.gif"/></td>
    <td class="center">
     <a title="查看" target="_blank"><img src="public/admin/images/icon_view.gif"/></a>
     <a title="编辑" href="admin/article/update/id/<?php echo $value->id ?>"><img src="public/admin/images/icon_edit.gif"/></a>
     <a title="删除" href="admin/article/delete/id/<?php echo $value->id ?>"><img src="public/admin/images/icon_drop.gif"/></a>
    </td>
   </tr>

<?php } ?>
  </table>
  <!-- BatchOperation -->
  <div style="overflow:hidden;">
      <!-- Operation -->
	  <div class="BatchOperation fl">
	   <input type="checkbox" id="del"/>
	   <label for="del" class="btnStyle middle">全选</label>
	   <input type="button" value="批量删除" class="btnStyle"/>
	  </div>
	  <!-- turn page -->
      
	  <div class="turnPage center fr">
          <?php echo $this->_vars['page']?>
	  </div>
  </div>
 </div>
</body>
</html>