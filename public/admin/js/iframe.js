//window.onload表示页面加载完毕后执行
//window.onresize表示窗口触发事件的时候执行
//两个函数，用闭包包裹起来()()
window.onload = function () {(window.onresize = function () {
    var width = document.documentElement.clientWidth - 210;
	//获取可见高度
    if (width >= 0) document.getElementById('main').style.width = width + 'px';
	var height =document.documentElement.scrollHeight||document.body.scrollHeight;
	if (height >= 0) {
		document.getElementById('main').style.height = height + 'px';
        document.getElementById('menu').style.height = height + 'px';
	}
})()};