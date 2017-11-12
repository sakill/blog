<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://www.sakill.com/">
    <meta charset="UTF-8">
    <meta name="keywords" content="HTML5, CSS3, XML,JavaScript,js,jquery,bootstrap,php,技术问题解决" />
    <meta name="description" content="免费的 web 技术教程。" />
    <title>sakill'blog</title>
    <link rel="shortcut icon" href="favicon.ico" >
    <link rel="stylesheet" href="public/home/css/base.css">
    <link rel="stylesheet" href="public/home/css/article.css">
    <link rel="stylesheet" href="public/home/css/index.css">
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
                    if ($value->name==$this->_vars['OneNav'][0]->name){
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

<section  class="clear mb_20">
    <div class="autobox" >
        <div style="display: none;"><div class="left w850">
                <div class="banner_wrap clear">
                    <div class="slides_wrap" id="play">
                        <div class="top_title">
                            <ul id="title_ul">
                                <li><a href="#">日子在艰难也要过呀。。。</a></li>
                                <li><a href="#">我努力干活，只是想得到我曾经梦想的东西；</a></li>
                                <li><a href="#">我洗刷刷洗刷啥U，你看啥呢么女；</a></li>
                                <li><a href="#">只想得到不想付出，只因为我是一个帅哥</a></li>
                                <li><a href="#">走自己的路让别人说去吧。</a></li>
                            </ul>
                        </div>
                        <div class="slide_inner">
                            <ul class="clear" id="s_ul">
                                <li><a href="#"><img src="public/home/images//s1.jpg" alt=""></a></li>
                                <li><a href="#"><img src="public/home/images//s2.jpg" alt=""></a></li>
                                <li><a href="#"><img src="public/home/images//s3.jpg" alt=""></a></li>
                                <li><a href="#"><img src="public/home/images//s4.jpg" alt=""></a></li>
                                <li><a href="#"><img src="public/home/images//s5.jpg" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="bottom_mark" >
                            <ul id="mark_ul">
                                <li class="mark_active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="recommend">
                        <div class="rgb_83AF9B">
                            <h3><a href="#">魅族MX4 Pro降价300元</a></h3>
                            <p>不管魅族会不会在接下来推出改良款MX44 Pro，如果说你很急切入手会不会在接下来推出改良款MX4 Pro，如果说你很急切入手</p>
                        </div>
                        <div class="rgb_F77825">
                            <h3><a href="#">魅族Ubuntu MX4 将亮</a></h3>
                            <p>2015 世界移动通信大会将在 3 月 2 号至 3 月 5 号于西班牙巴塞罗那举行。届时，会在全...</p>
                        </div>
                    </div>
                </div>
                <div class="article_list" id="thumbnail">
                    <h2>
                        <strong id="list_nav_big">最新文章</strong>
                        <ul id="list_nav">
                            <li class="f_color_0033ff">最新文章</li>
                            <li>前端技术</li>
                            <li>技术文章</li>
                            <li>产品研发</li>
                        </ul>
                    </h2>
                    <?php foreach ($this->_vars['AllArticle'] as $key => $value){ ?>
                        <article>
                            <figure>
                                <a href="home/index/detail/id/<?php echo $value->id;?>">
                                    <?php
                                    $str=$value->post_content;
                                    $str=html_entity_decode($str);
                                    $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
                                    preg_match_all($pattern,$str,$match);
                                    if(count($match[0])){
                                        echo $match[0][0];
                                    }else{
                                        echo "<img src=\"public/home/images//a".rand(1,10).".jpg\" alt=\"随机图片！\">";
                                    }
                                    ?>
                                </a>
                            </figure>
                            <header>
                                <h3><a href="home/index/detail/id/<?php echo $value->id;?>"><?php echo $value->post_title ?></a></h3>
                            </header>
                            <div class="archive-content">
                                <p>
                                    <?php
                                    $str=$value->post_content;
                                    $str=html_entity_decode($str);
                                    echo mb_substr(strip_tags($str),0,200,'utf-8').'......';
                                    ?>
                                </p>
                            </div>
                            <div class="archive_mark clear">
                                <span><a href="home/index/detail/id/<?php echo $value->id;?>"><i class="fa fa-comments"></i></a></span>
                                <span><i class="fa fa-eye"></i>&nbsp;1,395</span>
                                <span><i class="fa fa-clock-o"></i>&nbsp;<?php echo $value->post_date ?></span>
                                <span><a href="#"><i class="fa fa-server"></i>&nbsp;<?php echo $value->post_category ?></a></span>
                            </div>
                        </article>
                    <?php }?>
                    <!--					<article>-->
                    <!--						<figure>-->
                    <!--							<a href="#"><img src="public/home/images//a2.jpg" alt=""></a>-->
                    <!--						</figure>-->
                    <!--						<header>-->
                    <!--							<h3><a href="#">Apk 逆向破解工具–apk改之理</a></h3>-->
                    <!--						</header>-->
                    <!--						<div class="archive-content">-->
                    <!--							<p>最近心情很沉重，估计是因为被自己蠢哭了吧，我越发的感觉到自己的智商不够用呀，太痛苦了。 前面的都是废话，请不要被我消极的心态所影响。 有时候我们在破解apk需要一款好用的软件来反编译，那么apk改之理绝对可行。 接下来给你们看看界面： 载入apk反编译后的效果 接下来可以看看它...</p>-->
                    <!--						</div>-->
                    <!--						<div class="archive_mark clear">-->
                    <!--							<span><a href="#"><i class="fa fa-comments"></i>&nbsp;评论</a></span>-->
                    <!--							<span><i class="fa fa-eye"></i>&nbsp;1,395</span>-->
                    <!--							<span><i class="fa fa-clock-o"></i>&nbsp;2017-06-30</span>-->
                    <!--							<span><a href="#"><i class="fa fa-server"></i>&nbsp;设计</a></span>-->
                    <!--						</div>-->
                    <!--					</article>-->
                    <!--					<article>-->
                    <!--						<figure>-->
                    <!--							<a href="#"><img src="public/home/images//a3.jpg" alt=""></a>-->
                    <!--						</figure>-->
                    <!--						<header>-->
                    <!--							<h3><a href="#">简单VIP歌曲下载方法</a></h3>-->
                    <!--						</header>-->
                    <!--						<div class="archive-content">-->
                    <!--							<p>对于现在我喜欢的歌曲，一点击下载就要开会员什么的，看着就心烦。比如说，我喜欢胡歌的一首歌《她的眼睛会下雨》，就算你下载了播放器，也没办法下载。因为那是要付费的。 对于我这种穷人，只能通过其它方法来达到目的。 f12一下，或者右键审查源码。点到network这一项； 点到也要...</p>-->
                    <!--						</div>-->
                    <!--						<div class="archive_mark clear">-->
                    <!--							<span><a href="#"><i class="fa fa-comments"></i>&nbsp;评论</a></span>-->
                    <!--							<span><i class="fa fa-eye"></i>&nbsp;1,395</span>-->
                    <!--							<span><i class="fa fa-clock-o"></i>&nbsp;2017-06-30</span>-->
                    <!--							<span><a href="#"><i class="fa fa-server"></i>&nbsp;设计</a></span>-->
                    <!--						</div>-->
                    <!--					</article>-->
                    <!--					<article>-->
                    <!--						<figure>-->
                    <!--							<a href="#"><img src="public/home/images//a4.jpg" alt=""></a>-->
                    <!--						</figure>-->
                    <!--						<header>-->
                    <!--							<h3><a href="#">Segmentation fault (core dumped) 处理</a></h3>-->
                    <!--						</header>-->
                    <!--						<div class="archive-content">-->
                    <!--							<p>对于这个问题，我也是昨天才遇到的。比如指针非法，数组越界。反正就是调用了不该调用的内存地址。导致程序突然中止运行； 解决办法就是运行过程产生core文件再用gdb分析core文件。我将演示整个流程。 我们的程序已经出现错误 我们再看看ulimit 可以看出来，cor...</p>-->
                    <!--						</div>-->
                    <!--						<div class="archive_mark clear">-->
                    <!--							<span><a href="#"><i class="fa fa-comments"></i>&nbsp;评论</a></span>-->
                    <!--							<span><i class="fa fa-eye"></i>&nbsp;1,395</span>-->
                    <!--							<span><i class="fa fa-clock-o"></i>&nbsp;2017-06-30</span>-->
                    <!--							<span><a href="#"><i class="fa fa-server"></i>&nbsp;设计</a></span>-->
                    <!--						</div>-->
                    <!--					</article>-->
                    <!--					<article>-->
                    <!--						<figure>-->
                    <!--							<a href="#"><img src="public/home/images//a5.jpg" alt=""></a>-->
                    <!--						</figure>-->
                    <!--						<header>-->
                    <!--							<h3><a href="#">油猴子插件与百度云网页下载插件</a></h3>-->
                    <!--						</header>-->
                    <!--						<div class="archive-content">-->
                    <!--							<p>这个月好久没有更新了，不好意思，最近很忙，我觉得很忙，却都是一些鸡毛蒜皮的小事情。 直接上插件：链接：http://pan.baidu.com/s/1miLrrde 密码：0uy3 我们点击一个vip视频观看 点击旁边就可以那个按钮就可以跳到其它解析网站进行观看。 接下来...</p>-->
                    <!--						</div>-->
                    <!--						<div class="archive_mark clear">-->
                    <!--							<span><a href="#"><i class="fa fa-comments"></i>&nbsp;评论</a></span>-->
                    <!--							<span><i class="fa fa-eye"></i>&nbsp;1,395</span>-->
                    <!--							<span><i class="fa fa-clock-o"></i>&nbsp;2017-06-30</span>-->
                    <!--							<span><a href="#"><i class="fa fa-server"></i>&nbsp;设计</a></span>-->
                    <!--						</div>-->
                    <!--					</article>-->
                </div>
                <div class="turnPage center fr">
                    <?php echo $this->_vars['page']?>
                </div>
            </div></div>
        <div class="left w850">
            <div class="article_list" id="thumbnail" style="margin-top:0;">
                <?php foreach ($this->_vars['AllArticle'] as $key => $value){ ?>
                    <article>
                        <figure>
                            <a href="home/index/detail/id/<?php echo $value->id;?>">
                                <?php
                                $str=$value->post_content;
                                $str=html_entity_decode($str);
                                $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
                                preg_match_all($pattern,$str,$match);
                                if(count($match[0])){
                                    echo $match[0][0];
                                }else{
                                    echo "<img src=\"public/home/images//a".rand(1,10).".jpg\" alt=\"随机图片！\">";
                                }
                                ?>
                            </a>
                        </figure>
                        <header>
                            <h3><a href="home/index/detail/id/<?php echo $value->id;?>"><?php echo $value->post_title ?></a></h3>
                        </header>
                        <div class="archive-content">
                            <p>
                                <?php
                                $str=$value->post_content;
                                $str=html_entity_decode($str);
                                echo mb_substr(strip_tags($str),0,200,'utf-8').'......';
                                ?>
                            </p>
                        </div>
                        <div class="archive_mark clear">
                            <span><a href="home/index/detail/id/<?php echo $value->id;?>"><i class="fa fa-comments"></i></a></span>
                            <span><i class="fa fa-eye"></i>&nbsp;1,395</span>
                            <span><i class="fa fa-clock-o"></i>&nbsp;<?php echo $value->post_date ?></span>
                            <span><a href="#"><i class="fa fa-server"></i>&nbsp;<?php echo $value->post_category ?></a></span>
                        </div>
                    </article>
                <?php }?>
                <!--					<article>-->
                <!--						<figure>-->
                <!--							<a href="#"><img src="public/home/images//a2.jpg" alt=""></a>-->
                <!--						</figure>-->
                <!--						<header>-->
                <!--							<h3><a href="#">Apk 逆向破解工具–apk改之理</a></h3>-->
                <!--						</header>-->
                <!--						<div class="archive-content">-->
                <!--							<p>最近心情很沉重，估计是因为被自己蠢哭了吧，我越发的感觉到自己的智商不够用呀，太痛苦了。 前面的都是废话，请不要被我消极的心态所影响。 有时候我们在破解apk需要一款好用的软件来反编译，那么apk改之理绝对可行。 接下来给你们看看界面： 载入apk反编译后的效果 接下来可以看看它...</p>-->
                <!--						</div>-->
                <!--						<div class="archive_mark clear">-->
                <!--							<span><a href="#"><i class="fa fa-comments"></i>&nbsp;评论</a></span>-->
                <!--							<span><i class="fa fa-eye"></i>&nbsp;1,395</span>-->
                <!--							<span><i class="fa fa-clock-o"></i>&nbsp;2017-06-30</span>-->
                <!--							<span><a href="#"><i class="fa fa-server"></i>&nbsp;设计</a></span>-->
                <!--						</div>-->
                <!--					</article>-->
                <!--					<article>-->
                <!--						<figure>-->
                <!--							<a href="#"><img src="public/home/images//a3.jpg" alt=""></a>-->
                <!--						</figure>-->
                <!--						<header>-->
                <!--							<h3><a href="#">简单VIP歌曲下载方法</a></h3>-->
                <!--						</header>-->
                <!--						<div class="archive-content">-->
                <!--							<p>对于现在我喜欢的歌曲，一点击下载就要开会员什么的，看着就心烦。比如说，我喜欢胡歌的一首歌《她的眼睛会下雨》，就算你下载了播放器，也没办法下载。因为那是要付费的。 对于我这种穷人，只能通过其它方法来达到目的。 f12一下，或者右键审查源码。点到network这一项； 点到也要...</p>-->
                <!--						</div>-->
                <!--						<div class="archive_mark clear">-->
                <!--							<span><a href="#"><i class="fa fa-comments"></i>&nbsp;评论</a></span>-->
                <!--							<span><i class="fa fa-eye"></i>&nbsp;1,395</span>-->
                <!--							<span><i class="fa fa-clock-o"></i>&nbsp;2017-06-30</span>-->
                <!--							<span><a href="#"><i class="fa fa-server"></i>&nbsp;设计</a></span>-->
                <!--						</div>-->
                <!--					</article>-->
                <!--					<article>-->
                <!--						<figure>-->
                <!--							<a href="#"><img src="public/home/images//a4.jpg" alt=""></a>-->
                <!--						</figure>-->
                <!--						<header>-->
                <!--							<h3><a href="#">Segmentation fault (core dumped) 处理</a></h3>-->
                <!--						</header>-->
                <!--						<div class="archive-content">-->
                <!--							<p>对于这个问题，我也是昨天才遇到的。比如指针非法，数组越界。反正就是调用了不该调用的内存地址。导致程序突然中止运行； 解决办法就是运行过程产生core文件再用gdb分析core文件。我将演示整个流程。 我们的程序已经出现错误 我们再看看ulimit 可以看出来，cor...</p>-->
                <!--						</div>-->
                <!--						<div class="archive_mark clear">-->
                <!--							<span><a href="#"><i class="fa fa-comments"></i>&nbsp;评论</a></span>-->
                <!--							<span><i class="fa fa-eye"></i>&nbsp;1,395</span>-->
                <!--							<span><i class="fa fa-clock-o"></i>&nbsp;2017-06-30</span>-->
                <!--							<span><a href="#"><i class="fa fa-server"></i>&nbsp;设计</a></span>-->
                <!--						</div>-->
                <!--					</article>-->
                <!--					<article>-->
                <!--						<figure>-->
                <!--							<a href="#"><img src="public/home/images//a5.jpg" alt=""></a>-->
                <!--						</figure>-->
                <!--						<header>-->
                <!--							<h3><a href="#">油猴子插件与百度云网页下载插件</a></h3>-->
                <!--						</header>-->
                <!--						<div class="archive-content">-->
                <!--							<p>这个月好久没有更新了，不好意思，最近很忙，我觉得很忙，却都是一些鸡毛蒜皮的小事情。 直接上插件：链接：http://pan.baidu.com/s/1miLrrde 密码：0uy3 我们点击一个vip视频观看 点击旁边就可以那个按钮就可以跳到其它解析网站进行观看。 接下来...</p>-->
                <!--						</div>-->
                <!--						<div class="archive_mark clear">-->
                <!--							<span><a href="#"><i class="fa fa-comments"></i>&nbsp;评论</a></span>-->
                <!--							<span><i class="fa fa-eye"></i>&nbsp;1,395</span>-->
                <!--							<span><i class="fa fa-clock-o"></i>&nbsp;2017-06-30</span>-->
                <!--							<span><a href="#"><i class="fa fa-server"></i>&nbsp;设计</a></span>-->
                <!--						</div>-->
                <!--					</article>-->
            </div>
            <div class="turnPage center fr">
                <?php echo $this->_vars['page']?>
            </div>
        </div>
        <div class="right w340">
            <aside class="right">
                <div class="introduce	border">
                    <div class="p_10 pb_0">
                        <div class="bg_me">
                            <img src="public/home/images//public_qr.png" alt="公众号二维码">
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
            <aside class="right mt_10">
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
                    <img src="public/home/images//sakill_pay.png" alt="">
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
                <img title="微信" src="public/home/images//me.jpg">
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
            <img src="public/home/images//public_qr.png" alt="">
        </div>
    </li>
</ul>
<script>
    window.onload=function (){
        nav();
        slide_move();
        list_nav();
        thumbnail();
        scroll();
        rank_change();
    };
</script>

</body>
</html>

