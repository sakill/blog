<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <base href="http://www.sakill.com/">
    <title>文章列表</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" charset="utf-8" src="core/editor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="core/editor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="core/editor/lang/zh-cn/zh-cn.js"></script>
    <link href="public/admin/style/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="wrap">
    <div class="page-title">
        <span class="modular fl"><i class="add"></i><em>编辑/添加文章</em></span>
        <span class="modular fr"><a href="admin/article/index" class="pt-link-btn">文章列表</a></span>
    </div>
    <form action="admin/article/add" method="post">
        <table class="list-style">
            <tr>
                <td style="text-align:right;width:15%;">文章名称：</td>
                <td><input type="text" name="post_title" class="textBox length-long"/></td>
            </tr>
            <tr>
                <td style="text-align:right;">文章分类：</td>
                <td>
                    <select class="textBox" name="post_category">
                        <?php foreach ($this->_vars['AllNav'] as $key => $value){ ?>
                            <option value="<?php echo $value->name ?>"><?php echo $value->name ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="text-align:right;">文章关键词：</td>
                <td><input type="text" name="post_keyword" class="textBox length-long"/></td>
            </tr>
            <tr>
                <td style="text-align:right;">文章描述：</td>
                <td><input type="text" name="post_describe" class="textBox length-long"/></td>
            </tr>
            <tr>
                <td style="text-align:right;">推荐至：</td>
                <td>
                    <input type="checkbox" name="tuijian" id="jingpin"/>
                    <label for="jingpin">精品</label>
                    <input type="checkbox" name="tuijian" id="xinpin"/>
                    <label for="xinpin">新品</label>
                    <input type="checkbox" name="tuijian" id="rexiao"/>
                    <label for="rexiao">热销</label>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">
                    <script id="editor" name="post_content" type="text/plain"></script>
                    <!-- 实例化编辑器 -->
                    <script type="text/javascript">
                        var ue = UE.getEditor('editor',{
                            initialFrameHeight:'450',
                            elementPathEnabled:false,
                            autoHeightEnabled:false,
                            autoFloatEnabled:false
                        });
                    </script>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center"><input type="submit" name="send" value="发布文章" class="tdBtn"/></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>