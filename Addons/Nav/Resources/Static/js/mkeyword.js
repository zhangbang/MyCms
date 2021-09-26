$(document).ready(function () {
    /*--------------------搜索框样式控制js------------------------*/
    var search_types = {
        "types": [{
            name: "wd",
            action: "https://www.baidu.com/s",
            stype: "/mycms/addons/nav/images/scbaidugray.png",
            type: "baidu"
        },
            {
                name: "query",
                action: "https://www.sogou.com/web",
                stype: "/mycms/addons/nav/images/scsougougray.png",
                type: "sogou"
            },
            {
                name: "q",
                action: "https://cn.bing.com/search",
                stype: "/mycms/addons/nav/images/scbinggray.png",
                type: "bing"
            },
            {name: "q", action: "https://www.so.com/s", stype: "/mycms/addons/nav/images/sc360gray.png", type: "so"},
            {
                name: "q",
                action: "https://www.google.com/search",
                stype: "/mycms/addons/nav/images/scgooglegray.png",
                type: "google"
            },
        ]
    };
    var checktype = $(".sChoiceBtnImg");
    var type = $(".scSmallBox");
    var seach_type = $(".scBigBox");
    var form = $("#search_bg #button_bg form");
    var textb = $("#search_bg #button_bg form .textb");
    var subb = $("#search_bg #button_bg form .subb");
    var tbcolor = "#126AC1";

    var selType = get_cookie("sel"), obj = null;
    search_types.types.forEach(function (e) {
        if (e.type == selType) {
            obj = e;
        }
    })
    if (obj != null) {
        form.attr("action", obj.action);//改变表单提交位置
        textb.attr("name", obj.name);//改变表单变量名
        checktype.attr("src", obj.stype);

    }
    textb.focus();//文档加载完毕 搜索框获取焦点
    //alert(search_types.types[1].value);
    //选择搜索类型按钮被点击
    checktype.click(function () {
        seach_type.css({"display": "block", height: 0});
        seach_type.animate({
            height: (type.height()) * type.length,
        }, 300);

    });

    type.click(function () {
        //alert(search_types.types[$(this).index()].value)
        var type = search_types.types[$(this).index()].type, exp = null;
        exp = new Date();
        exp.setTime(exp.getTime() + 2592000 * 1000);//过期时间1分钟
        document.cookie = "sel=" + type + ";path=/;expires=" + exp.toGMTString();
        form.attr("action", search_types.types[$(this).index()].action);//改变表单提交位置
        textb.attr("name", search_types.types[$(this).index()].name);//改变表单变量名
        checktype.attr("src", search_types.types[$(this).index()].stype);

        seach_type.animate({
            height: 0,
        }, 500, function () {
            seach_type.css({"display": "none", height: 0});
        });
    });

    seach_type.mouseleave(function () {
        seach_type.animate({
            height: 0,
        }, 500, function () {
            seach_type.css({"display": "none", height: 0});
        });
    });
    textb.focus(function () {

        //
        seach_type.animate({
            height: 0,
        }, 500, function () {
            seach_type.css({"display": "none", height: 0});
        });
    });
    textb.blur(function () {
        keyword.css({"display": "none", height: 0});
    });
    /*-----------------获取关键词js---------------------*/
    var textb = $("#search_bg #button_bg form .textb");
    textb.keyup(function (event) {
        if (textb.val() == "" || textb.val() == " ") {
            return;
        }
        if (event.which != 39 && event.which != 40 && event.which != 37 && event.which != 38 && event.which != 13)
            $.ajax({
                url: "http://suggestion.baidu.com/su",
                type: "GET",
                dataType: "jsonp",
                jsonp: 'jsoncallback',
                async: false,
                timeout: 5000,//请求超时
                data: {
                    "wd": textb.val(),
                    "cb": "keydata"
                },
                success: function (json) {
                },
                error: function (xhr) {
                    return;
                }

            });
    });

});

function get_cookie(Name) {
    var search = Name + "="//查询检索的值
    var returnvalue = "";//返回值
    if (document.cookie.length > 0) {
        sd = document.cookie.indexOf(search);
        if (sd != -1) {
            sd += search.length;
            end = document.cookie.indexOf(";", sd);
            if (end == -1)
                end = document.cookie.length;
            //unescape() 函数可对通过 escape() 编码的字符串进行解码。
            returnvalue = unescape(document.cookie.substring(sd, end))
        }
    }
    return returnvalue;
}


//打印关键词

function keydata(keys) {
    var len = keys.s.length;
    var keywordbox = $("#search_bg #button_bg .keyword");//关键词盒子
    var keywordClose = $("#search_bg #button_bg .keywordClose");
    var textb = $("#search_bg #button_bg form .textb");
    var subb = $("#search_bg #button_bg form .subb");
    if (len == 0) {
        keywordbox.css({display: "none"});
        keywordClose.css({display: "none"});
    } else {
        keywordbox.css({display: "block"});
        keywordClose.css({display: "block"});
    }
    var spans = "";
    for (var i = 0; i < len; i++) {
        spans += "<span>" + keys.s[i] + "</span>"
    }
    keywordbox.html(spans);//把关键词写入关键词盒子
    keywordbox.animate({
        height: (keywordbox.children().height() + 1) * len//关键词下滑效果
    }, 100);
    //点击候选词汇
    keywordbox.children().click(function () {
        textb.val($(this).html());//选中词汇放入输入框

        keywordbox.animate({
            height: 0//关键盒子收缩效果
        }, 10, function () {
            keywordbox.css({display: "none", height: "auto"});
            keywordClose.css({display: "none"});
            keywordbox.empty();//清空盒子内容
        });

        textb.focus();//输入框获取焦点*/
        $("#search_bg #button_bg form").submit();//提交搜索
    });

    //提交按钮获取焦点后
    subb.focus(function () {//提交按钮获取焦点后
        keywordbox.animate({
            height: 0//关键盒子收缩效果
        }, 10, function () {
            keywordbox.css({display: "none", height: "auto"});
            keywordClose.css({display: "none"});
            keywordbox.empty();//清空盒子内容
        });
    });


    var numspan = 0;//用来指定选择候选词（通过方向键改变）
    textb.keydown(function (event) {//如果使用回车提交时，关键词盒子也可以自动收缩

        if (event.which == 13) {
            keywordbox.animate({
                height: 0//关键盒子收缩效果
            }, 10, function () {
                keywordbox.css({display: "none", height: "auto"});
                keywordbox.empty();//清空盒子内容
            });
        }

    });
    keywordbox.children().mouseover(function () {
        numspan = $(this).index();
        for (var i = 0; i < len; i++) {
            if (numspan == i) {
                keywordbox.children().eq(i).css({
                    "background-color": "#f1f1f1"
                });
            } else {
                keywordbox.children().eq(i).css({
                    "background-color": "rgba(255,255,255,0.3)"
                });
            }
        }

    });

}
