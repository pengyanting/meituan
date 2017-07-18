window.onload = function () {
    var windowH = document.documentElement.clientHeight;
    document.getElementsByClassName("container")[0].style.height = windowH + "px";
    var designWidth = 480;//默认分辨率
    var fontSize = 10;//根字体大小
    function reSize() {
        var deviceWidth = document.documentElement.clientWidth;
        var ratio = deviceWidth / designWidth//
        var newFontSize = fontSize * ratio;
        document.documentElement.style.fontSize = newFontSize + "px";
    }
    reSize();
    window.onresize = reSize;
}