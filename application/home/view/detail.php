<!DOCTYPE html>
<html lang="en">
<head>
    <?php foreach ($this->_vars['detail'] as $key => $value){ ?>
    <base href="http://www.sakill.com/">
    <meta charset="UTF-8">
    <meta name="keywords" content="<?php echo $value->post_keyword?>" />
    <meta name="description" content="<?php echo $value->post_describe?>" />
    <?php }?>
    <title>sakill'blog</title>
    <link rel="shortcut icon" href="favicon.ico" >
    <link rel="stylesheet" href="public/home/css/base.css">
    <link rel="stylesheet" href="public/home/css/article.css">
    <link rel="stylesheet" href="public/home/css/public.css">
    <link href="public/home/css/font-awesome.min.css" rel="stylesheet" />
    <script src="public/home/js/base.js"></script>
    <script src="public/home/js/index.js"></script>
    <!--[if IE]>
    <link href="fontawesome-4.2.0/css/font-awesome-ie7.min.css" rel="stylesheet" />
    <!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
<![endif]-->
    <![endif]-->
</head>
<body>
	<header>
		<div class="header_top">
			<div class="autobox">
				<div class="welcome"><span class="tip_mark"><i class="fa fa-volume-up"></i></span>您好，欢迎来到我的博客！</div>
				<div class="right pt_7 mr_20">
					<div class="orange">
						<a href="#">English</a>
						<span class="zhuce">
							<i class="fa fa-user-o"></i>
							<a href="#" class="orange">注册</a>
						</span>
						|
						<a href="#" class="orange">登录</a>
					</div>
				</div>
			</div>
		</div>
		<nav class="autobox">
			<div class="nav_bar">
				<ul class="clear" id="onav">
                    <li ><a href="#">首页</a></li>
                    <?php foreach ($this->_vars['AllNav'] as $key => $value){
                        if ($value->name==$this->_vars['detail'][0]->post_category){
                            echo "<li class=\"active\"><a  href=\"home/index/category/id/".$value->id."\">".$value->name."</a></li>";
                        }else{
                            echo "<li><a  href=\"home/index/category/id/".$value->id."\">".$value->name."</a></li>";
                        }
                    } ?>
				</ul>
			</div>
			<div class="search">
				<form method="get" id="searchform" action="#">
				<div class="search_text"><input type="text" value="" name="s" id="s" placeholder="输入搜索内容" required=""></div>
				<div class="search_button"><button type="submit" id="searchsubmit">搜索</button></div>
				</form>
			</div>
		</nav>
	</header>
	<section class="clear mb_10">
		<div class="autobox">
            <?php foreach ($this->_vars['detail'] as $key => $value){ ?>
            <div class="content w850 left">
                <div class="breadcrumbs">
                    <a title="返回首页" href="http://www.sakill.com"><i class="fa fa-home"></i></a>
                    <small>&gt;</small>
                    <a href="javascript:void(0)"><?php echo $value->post_category?></a>
                    <small>&gt;</small>
                    <span><?php echo $value->post_title?></span>
                </div>
                <header class="article-header">
                    <h1 class="article-title"><a href="javascript:void(0)"><?php echo $value->post_title?></a></h1>
                    <div class="meta">
                        <span><i class="fa fa-list-alt">&nbsp;</i><a href="javascript:void(0)"> <?php echo $value->post_category?></a></span>
                        <span><i class="fa fa-user">&nbsp;</i><a href="javascript:void(0)"><?php echo $value->post_author?></a></span>
                        <span><i class="fa fa-clock-o">&nbsp;</i><?php echo $value->post_date?></span>
                        <span><i class="fa fa-eye">&nbsp;</i> 172℃</span>
                        <span><i class="fa fa-smile-o">&nbsp;</i><a target="_blank" title="点击查看" rel="external nofollow" href="#">百度已收录</a><span class="muted"></span>
                    </div>
                </header>
                <article>
                    <article class="article-content">
                        <?php echo html_entity_decode($value->post_content)?>
                    </article>

                </article>
            <?php }?>
            <!--高速版-->
            <div id="SOHUCS" sid="<?php echo $value->id?>"></div>
            <script charset="utf-8" type="text/javascript" src="http://changyan.sohu.com/upload/changyan.js" ></script>
            <script type="text/javascript">
                window.changyan.api.config({
                    appid: 'cytdbaqWW',
                    conf: 'prod_e1c6f19849be32d1e60c58b9745f237f'
                });
            </script>

            </div>
			<div class="right w340">
				<aside class="right">
					<div class="introduce	border">
						<div class="p_10 pb_0">
							<div class="bg_me">
								<img src="public/home/images/public_qr.png" alt="公众号二维码">
							</div>
							<div class="mb_10">
								<h6 class="f_center f_size_16 f_bold mb_10">SAKILL_Blog</h6>
								<p>关注前端技术和分享前端技术，致力作为一名优秀的前端工程师。</p>
							</div>
							<div class="follow clear">
								<span class="t_qq"><a href="http://wpa.qq.com/msgrd?V=3&amp;uin=1017615760&amp;Site=QQ&amp;Menu=yes"><i class="fa fa-qq"></i></a></span>
								<span class="t_weibo"><a href="http://weibo.com/573530077"><i class="fa fa-weibo"></i></a></span>
								<span class="t_github"><a href="http://github.com/sakill/"><i class="fa fa-github"></i></a></span>
								<span class="t_rss"><a href="http://weibo.com/573530077"><i class="fa fa-rss"></i></a></span>
							</div>
						</div>
						<div class="introduce_footer">
							<span>文章&nbsp;488</span>
							<span>留言&nbsp;655</span>
						</div>
					</div>
				</aside>
				<aside class="right  mt_10">
					<div class="ranking  border">
						<div class="rank_top clear">
							<ul class="clear" id="rank_ul">
								<li class="rank_active">阅读排行</li>
								<li>热评排行</li>
								<li>推荐文章</li>
							</ul>
						</div>
						<div class="rank_article" style="display:block;">
							<ul>
								<li><span class="li-icon li-icon-1">1</span><a href="#">大型日志文本转存elasticsearch</a></li>
								<li><span class="li-icon li-icon-2">2</span><a href="#">Apk 逆向破解工具–apk改之理</a></li>
								<li><span class="li-icon li-icon-3">3</span><a href="#">简单VIP歌曲下载方法</a></li>
								<li><span class="li-icon">4</span><a href="#">Segmentation fault (core dumped) 处理</a></li>
								<li><span class="li-icon">5</span><a href="#">油猴子插件与百度云网页下载插件</a></li>
								<li><span class="li-icon ">6</span><a href="#">大型日志文本转存elasticsearch</a></li>
								<li><span class="li-icon">7</span><a href="#">Apk 逆向破解工具–apk改之理</a></li>
								<li><span class="li-icon">8</span><a href="#">简单VIP歌曲下载方法</a></li>
								<li><span class="li-icon">9</span><a href="#">Segmentation fault (core dumped) 处理</a></li>
							</ul>
						</div>
						<div class="rank_article" >
							<ul>
								<li><span class="li-icon li-icon-1">1</span><a href="#">2大型日志文本转存elasticsearch</a></li>
								<li><span class="li-icon li-icon-2">2</span><a href="#">Apk 逆向破解工具–apk改之理</a></li>
								<li><span class="li-icon li-icon-3">3</span><a href="#">简单VIP歌曲下载方法</a></li>
								<li><span class="li-icon">4</span><a href="#">Segmentation fault (core dumped) 处理</a></li>
								<li><span class="li-icon">5</span><a href="#">油猴子插件与百度云网页下载插件</a></li>
								<li><span class="li-icon ">6</span><a href="#">大型日志文本转存elasticsearch</a></li>
								<li><span class="li-icon">7</span><a href="#">Apk 逆向破解工具–apk改之理</a></li>
								<li><span class="li-icon">8</span><a href="#">简单VIP歌曲下载方法</a></li>
								<li><span class="li-icon">9</span><a href="#">Segmentation fault (core dumped) 处理</a></li>
							</ul>
						</div>
						<div class="rank_article" >
							<ul>
								<li><span class="li-icon li-icon-1">1</span><a href="#">3大型日志文本转存elasticsearch</a></li>
								<li><span class="li-icon li-icon-2">2</span><a href="#">Apk 逆向破解工具–apk改之理</a></li>
								<li><span class="li-icon li-icon-3">3</span><a href="#">简单VIP歌曲下载方法</a></li>
								<li><span class="li-icon">4</span><a href="#">Segmentation fault (core dumped) 处理</a></li>
								<li><span class="li-icon">5</span><a href="#">油猴子插件与百度云网页下载插件</a></li>
								<li><span class="li-icon ">6</span><a href="#">大型日志文本转存elasticsearch</a></li>
								<li><span class="li-icon">7</span><a href="#">Apk 逆向破解工具–apk改之理</a></li>
								<li><span class="li-icon">8</span><a href="#">简单VIP歌曲下载方法</a></li>
								<li><span class="li-icon">9</span><a href="#">Segmentation fault (core dumped) 处理</a></li>
							</ul>
						</div>
					</div>
				</aside>
				<aside class="right mt_10">
					<div class="payme	border">
						<h3>赞助SAKILL</h3>
						<p>你的赞赏将带给我全新的动力！</p>
						<p>请用<span style="color:orange">微信</span>或者<span style="color:#33cccc">支付宝</span>客户端扫描二维码</p>
						<p style="color:red;">一分一毛也是情义</p>
						<img src="public/home/images/sakill_pay.png" alt="">
						<p style="color:#ff6600">祝您生意兴隆，身体安康！</p>
					</div>
				</aside>
				<aside class="right mt_10">
					<div class="link	border">
						<h3>友情链接 <span><a href="#">[申请友联]</a></span></h3>
						<ul class="clear">
							<li><a href="http://www.erhuo.org">许繁博客</a></li>
							<li><a href="http://www.inzhuo.cn">宇卓博客</a></li>
							<li><a href="http://www.chengyin.org">诚殷网络论坛</a></li>
						</ul>
					</div>
				</aside>
			</div>
		</div>
	</section>

	<footer class="index_footer">
		<p>theme by sakill.欢迎光临！</p>
		<p>技术交流QQ群：212495556</p>
		<p>© 2014-2017 <a href="http://www.sakill.com" style="color:#76838f;">sakill</a>版权所有</p>
		<p>网站备案号：渝ICP备15004066号</p>
	</footer>

	<ul id="scroll">
		<li id="scroll_top"><a class="scroll-h" title="返回顶部"><i class="fa fa-arrow-up"></i></a></li>
		<li id="scroll_bottom"><a class="scroll-b" title="转到底部"><i class="fa fa-arrow-down"></i></a></li>
		<li class="qqonline">
			<a href="javascript:void(0)" id="contact_a"><i class="fa fa-qq"></i></a>
			<div class="qqonline-main"  id="contact_b" style="display:none;">
				<div class="nline-wiexin">
					<h4>微信</h4>
					<img title="微信" src="public/home/images/me.jpg">
				</div>
				<div class="nline-qq">
					<a target="blank" href="http://wpa.qq.com/msgrd?V=3&amp;uin=1017615760&amp;Site=QQ&amp;Menu=yes">
					<i class="fa fa-qq"></i>在线咨询</a>
				</div>
			</div>
		</li>
		<li >
			<a href="javascript:void(0)" id="qra" class="qr" title="二维码"><i class="fa fa-qrcode"></i></a>
			<div id="qrb" class="qr_code" style="display:none;">
				<img src="public/home/images/public_qr.png" alt="">
			</div>
		</li>
	</ul>
	<script>
		window.onload=function (){
			nav();
			scroll();
			rank_change();
		};
	</script>

</body>
</html>

