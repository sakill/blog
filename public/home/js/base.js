// 网址：www.sakill.com
// 作者：sakill；
// 标签切换使用；
function change_active (abj,obj,className) {
	for (var i=0;i<abj.length;i++){ 
		abj[i].className=" ";
	}
	obj.className=className;
}
//getbyclass
function getByClass(sClass)
{
	var aEle=document.getElementsByTagName('*');
	var i=0;
	var aResult=[];
	
	for(i=0;i<aEle.length;i++)
	{
		if(aEle[i].className==sClass)
		{
			aResult.push(aEle[i]);
		}
	}
	
	return aResult;
}
//简易弹性运动框架
function simpleMove(obj, iTarget){
	clearInterval(obj.timer);
	var iSpeed=0;
	var	left=0;
	obj.timer=setInterval(function (){
		iSpeed+=(iTarget-obj.offsetLeft)/5;
		iSpeed*=0.7;
		
		left+=iSpeed;
		
		if(Math.abs(iSpeed)<1 && Math.abs(left-iTarget)<1)
		{
			clearInterval(obj.timer);
			
			obj.style.left=iTarget+'px';
		}
		else
		{
			obj.style.left=left+'px';
		}
	}, 30);
}

//获取样式值
function getStyle(obj, attr)
{
	if(obj.currentStyle)
	{
		return obj.currentStyle[attr];
	}
	else
	{
		return getComputedStyle(obj, false)[attr];
	}
}

 //完美运动框架：
function perfectMove(obj, json, fn){
	clearInterval(obj.timer);
	obj.timer=setInterval(function (){
		var bStop=true;		//这一次运动就结束了――所有的值都到达了
		for(var attr in json)
		{
			//1.取当前的值
			var iCur=0;
			
			if(attr=='opacity')
			{
				iCur=parseInt(parseFloat(getStyle(obj, attr))*100);
			}
			else
			{
				iCur=parseInt(getStyle(obj, attr));
			}
			
			//2.算速度
			var iSpeed=(json[attr]-iCur)/8;
			iSpeed=iSpeed>0?Math.ceil(iSpeed):Math.floor(iSpeed);
			
			//3.检测停止
			if(iCur!=json[attr])
			{
				bStop=false;
			}
			
			if(attr=='opacity')
			{
				obj.style.filter='alpha(opacity:'+(iCur+iSpeed)+')';
				obj.style.opacity=(iCur+iSpeed)/100;
			}
			else
			{
				obj.style[attr]=iCur+iSpeed+'px';
			}
		}
		
		if(bStop)
		{
			clearInterval(obj.timer);
			
			if(fn)
			{
				fn();
			}
		}
	}, 30)
}


// 上下滚动条
function scroll(){
	var oTop=document.getElementById('scroll_top');
	var oBottom=document.getElementById('scroll_bottom');
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
			var iSpeed=Math.ceil((scrollHeight-clientHeight-scrollTop)/8);
			if(iSpeed==0)
			{
				clearInterval(timer);
			}
			bSys=true;
			document.documentElement.scrollTop=document.body.scrollTop=scrollTop+iSpeed;
		}, 20);
	};
}

// 移入显示，移出消失框架
function display(obj_a,obj_b){
		var timer;
		obj_b.onmouseover=obj_a.onmouseover=function(){
			clearTimeout(timer);
			obj_b.style.display='block';
		}
		obj_b.onmouseout=obj_a.onmouseout=function(){
				timer=setTimeout(function(){
				obj_b.style.display='none';
			},1000)
		}
}

// ajax的函数库
function ajax(url, fnSucc, fnFaild)
{
    //1.创建ajax对象
    var oAjax=null;

    if(window.XMLHttpRequest)
    {
        oAjax=new XMLHttpRequest();
    }
    else
    {   //ie.6.5
        oAjax=new ActiveXObject("Microsoft.XMLHTTP");
    }

    //2.连接服务器
    //open(方法, url, 是否异步)
    oAjax.open('GET', url, true);

    //3.发送请求
    oAjax.send();

    //4.接收返回
    //OnReadyStateChange
    oAjax.onreadystatechange=function ()
    {
        if(oAjax.readyState==4)
        {
            if(oAjax.status==200)
            {
                //alert('成功：'+oAjax.responseText);
                alert(oAjax.responseText);
            }
            else
            {
                if(fnFaild)
                {
                    fnFaild();
                }
            }
        }
    };
}