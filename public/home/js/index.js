function nav(){
	var oUl=document.getElementById('onav');
	var aLi=oUl.getElementsByTagName('li');
	var i=0;

		for(i=0;i<aLi.length;i++)
		{
			aLi[i].onclick=function(){
			change_active(aLi,this,'active');
		}
	}
}

// 轮播图
function slide_move(){
	var timer=null;
	var Ptimer=null;
	var num=0;
	var mark=0;
	var zx=33;
	var oUl=document.getElementById('s_ul');
	var aLi=oUl.getElementsByTagName('li');
	var omUl=document.getElementById('mark_ul');
	var amLi=omUl.getElementsByTagName('li');
	var oPlay=document.getElementById('play');
	oUl.style.width=aLi[0].offsetWidth*aLi.length+'px';
	var oTitle=document.getElementById('title_ul');
	var atLi=oTitle.getElementsByTagName('li');
	oPlay.onmouseover = function()
    {
        clearInterval(timer);
    }
    oPlay.onmouseout = function()
    {  
        if(timer)
        {
            clearInterval(timer);
        }
        timer = setInterval(function(){
        	calc();
        },5000);
    }

	timer=setInterval(function(){calc();},5000);

	for (var i = 0; i < aLi.length; i++) {
		amLi[i].index=i;
		amLi[i].onmouseover=amLi[i].onclick=function(){
			if (timer) {
				clearInterval(timer);
			};
			autoPlay(this.index);
			num=this.index;
			change_active(amLi,this,'mark_active');
			atLi[num].style.zIndex=zx++;
		}
		amLi[i].onmouseout=function(){
			timer=setInterval(function(){
				calc();
			},5000);
		};
	};

	function calc(){
		var oUl=document.getElementById('s_ul');
		var aLi=oUl.getElementsByTagName('li');
		var omUl=document.getElementById('mark_ul');
		var amLi=omUl.getElementsByTagName('li');
		var oTitle=document.getElementById('title_ul');
		var atLi=oTitle.getElementsByTagName('li');
		num++;	
		if (num>=aLi.length) {num=0;};
		autoPlay(num);
		atLi[num].style.zIndex=zx++;
		change_active(amLi,amLi[num],'mark_active');
	}

	function autoPlay(kk){
		var oUl=document.getElementById('s_ul');
		var iLiWidth=oUl.getElementsByTagName('li')[0].offsetWidth;
		var iTarget=0;
		var speed=0;
		var left=0;
		iTarget=-kk*iLiWidth;
		simpleMove(oUl,iTarget);
	}
}


//文章目录小导航切换

function list_nav(){
	var oNav=document.getElementById('list_nav');
	var bNav=document.getElementById('list_nav_big');
	var aNav=oNav.getElementsByTagName('li');
	for (var i = 0; i < aNav.length; i++) {
		aNav[i].onclick=function(){
			change_active(aNav,this,'f_color_0033ff');
			bNav.innerHTML=this.innerHTML;
		}
	};
}

function rank_change(){
	var oUl=document.getElementById('rank_ul');
	var aReult=getByClass('rank_article');
	var aLi=oUl.getElementsByTagName('li');
	for (var i = 0; i < aLi.length; i++) {
		aLi[i].index=i;
		aLi[i].onclick=function(){
			var k=this.index;
			change_active(aLi,this,'rank_active');
			for (var i = 0; i < aReult.length; i++) {
				aReult[i].style.display='none';
			};
			aReult[k].style.display='block';
		}
	};
}
//文章列表图片缩放

function thumbnail(){
	var oThumbnail=document.getElementById('thumbnail');
	var aImg=oThumbnail.getElementsByTagName('img');
	for (var i = 0; i < aImg.length; i++) {
		aImg[i].onmouseover=function(){
			perfectMove(this,{width:270,height:200,marginLeft: -50, marginTop: -50});
		}
		aImg[i].onmouseout=function(){
			perfectMove(this,{width:220,height:150,marginLeft: 0, marginTop: 0});
		}
	};
}

// 上下滚动条
function scroll(){
	var oTop=document.getElementById('scroll_top');
	var oBottom=document.getElementById('scroll_bottom');
	var oQra=document.getElementById('qra');
	var oQrb=document.getElementById('qrb');
	var oCa=document.getElementById('contact_a');
	var oCb=document.getElementById('contact_b');
	display(oQra,oQrb);
	display(oCa,oCb);
	var bSys=true;
	var timer=null;
	
	//如何检测用户拖动了滚动条
	window.onscroll=function ()
	{
		if(!bSys)
		{
			clearInterval(timer);
		}
		bSys=false;
	};
	
	oTop.onclick=function ()
	{	
		clearInterval(timer);
		timer=setInterval(function (){
			var scrollTop=document.documentElement.scrollTop||document.body.scrollTop;
			var iSpeed=Math.floor(-scrollTop/8);
			
			if(scrollTop==0)
			{
				clearInterval(timer);
			}
			
			bSys=true;
			document.documentElement.scrollTop=document.body.scrollTop=scrollTop+iSpeed;
		}, 20);
	};

	oBottom.onclick=function ()
	{	
		clearInterval(timer);
		timer=setInterval(function (){
			var scrollTop=document.documentElement.scrollTop||document.body.scrollTop;
			var clientHeight=document.documentElement.clientHeight||document.body.clientHeight;
			var scrollHeight=document.documentElement.scrollHeight||document.body.scrollHeight;
			var calc=scrollHeight-clientHeight-scrollTop;
			var iSpeed=Math.ceil(calc/8);
			if(calc==0)
			{
				clearInterval(timer);
			}
			bSys=true;
			document.documentElement.scrollTop=document.body.scrollTop=scrollTop+iSpeed;
		}, 20);
	};
}	