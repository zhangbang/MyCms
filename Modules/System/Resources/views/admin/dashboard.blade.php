@include("system::admin.layouts._header")
<style>
    body {
        margin: 15px 15px 15px 15px;
        background: #f2f2f2;
    }
    .layui-card {border:1px solid #f2f2f2;border-radius:5px;}
    .icon {margin-right:10px;color:#1aa094;}
    .icon-cray {color:#ffb800!important;}
    .icon-blue {color:#1e9fff!important;}
    .icon-tip {color:#ff5722!important;}
    .layuimini-qiuck-module {text-align:center;margin-top: 10px}
    .layuimini-qiuck-module a i {display:inline-block;width:100%;height:60px;line-height:60px;text-align:center;border-radius:2px;font-size:30px;background-color:#F8F8F8;color:#333;transition:all .3s;-webkit-transition:all .3s;}
    .layuimini-qiuck-module a cite {position:relative;top:2px;display:block;color:#666;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;font-size:14px;}
    .welcome-module {width:100%;height:210px;}
    .panel {background-color:#fff;border:1px solid transparent;border-radius:3px;-webkit-box-shadow:0 1px 1px rgba(0,0,0,.05);box-shadow:0 1px 1px rgba(0,0,0,.05)}
    .panel-body {padding:10px}
    .panel-title {margin-top:0;margin-bottom:0;font-size:12px;color:inherit}
    .label {display:inline;padding:.2em .6em .3em;font-size:75%;font-weight:700;line-height:1;color:#fff;text-align:center;white-space:nowrap;vertical-align:baseline;border-radius:.25em;margin-top: .3em;}
    .layui-red {color:red}
    .main_btn > p {height:40px;}
    .layui-bg-number {background-color:#F8F8F8;}
    .layuimini-notice:hover {background:#f6f6f6;}
    .layuimini-notice {padding:7px 16px;clear:both;font-size:12px !important;cursor:pointer;position:relative;transition:background 0.2s ease-in-out;}
    .layuimini-notice-title,.layuimini-notice-label {
        padding-right: 70px !important;text-overflow:ellipsis!important;overflow:hidden!important;white-space:nowrap!important;}
    .layuimini-notice-title {line-height:28px;font-size:14px;}
    .layuimini-notice-extra {position:absolute;top:50%;margin-top:-8px;right:16px;display:inline-block;height:16px;color:#999;}
</style>
<body>
<div class="layuimini-container">
    <div class="layuimini-main">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md8">
                <div class="layui-row layui-col-space15">
                    <div class="layui-col-md6">
                        <div class="layui-card">
                            <div class="layui-card-header"><i class="fa fa-warning icon"></i>数据统计</div>
                            <div class="layui-card-body">
                                <div class="welcome-module">
                                    <div class="layui-row layui-col-space10">
                                        <div class="layui-col-xs6">
                                            <div class="panel layui-bg-number">
                                                <div class="panel-body">
                                                    <div class="panel-title">
                                                        <span class="label pull-right layui-bg-blue">实时</span>
                                                        <h5>用户统计</h5>
                                                    </div>
                                                    <div class="panel-content">
                                                        <h1 class="no-margins">1234</h1>
                                                        <small>当前分类总记录数</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="layui-col-xs6">
                                            <div class="panel layui-bg-number">
                                                <div class="panel-body">
                                                    <div class="panel-title">
                                                        <span class="label pull-right layui-bg-cyan">实时</span>
                                                        <h5>商品统计</h5>
                                                    </div>
                                                    <div class="panel-content">
                                                        <h1 class="no-margins">1234</h1>
                                                        <small>当前分类总记录数</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="layui-col-xs6">
                                            <div class="panel layui-bg-number">
                                                <div class="panel-body">
                                                    <div class="panel-title">
                                                        <span class="label pull-right layui-bg-orange">实时</span>
                                                        <h5>浏览统计</h5>
                                                    </div>
                                                    <div class="panel-content">
                                                        <h1 class="no-margins">1234</h1>
                                                        <small>当前分类总记录数</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="layui-col-xs6">
                                            <div class="panel layui-bg-number">
                                                <div class="panel-body">
                                                    <div class="panel-title">
                                                        <span class="label pull-right layui-bg-green">实时</span>
                                                        <h5>订单统计</h5>
                                                    </div>
                                                    <div class="panel-content">
                                                        <h1 class="no-margins">1234</h1>
                                                        <small>当前分类总记录数</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="layui-col-md6">
                        <div class="layui-card">
                            <div class="layui-card-header"><i class="fa fa-credit-card icon icon-blue"></i>快捷入口</div>
                            <div class="layui-card-body">
                                <div class="welcome-module">
                                    <div class="layui-row layui-col-space10 layuimini-qiuck">
                                        <div class="layui-col-xs3 layuimini-qiuck-module">
                                            <a href="javascript:;" data-title="菜单管理" data-icon="fa fa-window-maximize">
                                                <i class="fa fa-window-maximize"></i>
                                                <cite>菜单管理</cite>
                                            </a>
                                        </div>
                                        <div class="layui-col-xs3 layuimini-qiuck-module">
                                            <a href="javascript:;" data-title="系统设置" data-icon="fa fa-gears">
                                                <i class="fa fa-gears"></i>
                                                <cite>系统设置</cite>
                                            </a>
                                        </div>
                                        <div class="layui-col-xs3 layuimini-qiuck-module">
                                            <a href="javascript:;" data-title="表格示例" data-icon="fa fa-file-text">
                                                <i class="fa fa-file-text"></i>
                                                <cite>表格示例</cite>
                                            </a>
                                        </div>
                                        <div class="layui-col-xs3 layuimini-qiuck-module">
                                            <a href="javascript:;" data-title="图标列表" data-icon="fa fa-dot-circle-o">
                                                <i class="fa fa-dot-circle-o"></i>
                                                <cite>图标列表</cite>
                                            </a>
                                        </div>
                                        <div class="layui-col-xs3 layuimini-qiuck-module">
                                            <a href="javascript:;" data-title="表单示例" data-icon="fa fa-calendar">
                                                <i class="fa fa-calendar"></i>
                                                <cite>表单示例</cite>
                                            </a>
                                        </div>
                                        <div class="layui-col-xs3 layuimini-qiuck-module">
                                            <a href="javascript:;"  data-title="404页面" data-icon="fa fa-hourglass-end">
                                                <i class="fa fa-hourglass-end"></i>
                                                <cite>404页面</cite>
                                            </a>
                                        </div>
                                        <div class="layui-col-xs3 layuimini-qiuck-module">
                                            <a href="javascript:;" data-title="按钮示例" data-icon="fa fa-snowflake-o">
                                                <i class="fa fa-snowflake-o"></i>
                                                <cite>按钮示例</cite>
                                            </a>
                                        </div>
                                        <div class="layui-col-xs3 layuimini-qiuck-module">
                                            <a href="javascript:;" data-title="百度搜索" data-icon="fa fa-search">
                                                <i class="fa fa-search"></i>
                                                <cite>百度搜索</cite>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="layui-col-md12">
                        <div class="layui-card">
                            <div class="layui-card-header"><i class="fa fa-line-chart icon"></i>报表统计</div>
                            <div class="layui-card-body">
                                <div id="echarts-records" style="width: 100%;min-height:500px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="layui-col-md4">

                <div class="layui-card">
                    <div class="layui-card-header"><i class="fa fa-bullhorn icon icon-tip"></i>系统公告</div>
                    <div class="layui-card-body layui-text">
                        <div class="layuimini-notice">
                            <div class="layuimini-notice-title">修改选项卡样式</div>
                            <div class="layuimini-notice-extra">2019-07-11 23:06</div>
                            <div class="layuimini-notice-content layui-hide">
                                界面足够简洁清爽。<br>
                                一个接口几行代码而已直接初始化整个框架，无需复杂操作。<br>
                                支持多tab，可以打开多窗口。<br>
                                支持无限级菜单和对font-awesome图标库的完美支持。<br>
                                失效以及报错菜单无法直接打开，并给出弹出层提示完美的线上用户体验。<br>
                                url地址hash定位，可以清楚看到当前tab的地址信息。<br>
                                刷新页面会保留当前的窗口，并且会定位当前窗口对应左侧菜单栏。<br>
                                移动端的友好支持。<br>
                            </div>
                        </div>
                        <div class="layuimini-notice">
                            <div class="layuimini-notice-title">新增系统404模板</div>
                            <div class="layuimini-notice-extra">2019-07-11 12:57</div>
                            <div class="layuimini-notice-content layui-hide">
                                界面足够简洁清爽。<br>
                                一个接口几行代码而已直接初始化整个框架，无需复杂操作。<br>
                                支持多tab，可以打开多窗口。<br>
                                支持无限级菜单和对font-awesome图标库的完美支持。<br>
                                失效以及报错菜单无法直接打开，并给出弹出层提示完美的线上用户体验。<br>
                                url地址hash定位，可以清楚看到当前tab的地址信息。<br>
                                刷新页面会保留当前的窗口，并且会定位当前窗口对应左侧菜单栏。<br>
                                移动端的友好支持。<br>
                            </div>
                        </div>
                        <div class="layuimini-notice">
                            <div class="layuimini-notice-title">新增treetable插件和菜单管理样式</div>
                            <div class="layuimini-notice-extra">2019-07-05 14:28</div>
                            <div class="layuimini-notice-content layui-hide">
                                界面足够简洁清爽。<br>
                                一个接口几行代码而已直接初始化整个框架，无需复杂操作。<br>
                                支持多tab，可以打开多窗口。<br>
                                支持无限级菜单和对font-awesome图标库的完美支持。<br>
                                失效以及报错菜单无法直接打开，并给出弹出层提示完美的线上用户体验。<br>
                                url地址hash定位，可以清楚看到当前tab的地址信息。<br>
                                刷新页面会保留当前的窗口，并且会定位当前窗口对应左侧菜单栏。<br>
                                移动端的友好支持。<br>
                            </div>
                        </div>
                        <div class="layuimini-notice">
                            <div class="layuimini-notice-title">修改logo缩放问题</div>
                            <div class="layuimini-notice-extra">2019-07-04 11:02</div>
                            <div class="layuimini-notice-content layui-hide">
                                界面足够简洁清爽。<br>
                                一个接口几行代码而已直接初始化整个框架，无需复杂操作。<br>
                                支持多tab，可以打开多窗口。<br>
                                支持无限级菜单和对font-awesome图标库的完美支持。<br>
                                失效以及报错菜单无法直接打开，并给出弹出层提示完美的线上用户体验。<br>
                                url地址hash定位，可以清楚看到当前tab的地址信息。<br>
                                刷新页面会保留当前的窗口，并且会定位当前窗口对应左侧菜单栏。<br>
                                移动端的友好支持。<br>
                            </div>
                        </div>
                        <div class="layuimini-notice">
                            <div class="layuimini-notice-title">修复左侧菜单缩放tab无法移动</div>
                            <div class="layuimini-notice-extra">2019-06-17 11:55</div>
                            <div class="layuimini-notice-content layui-hide">
                                界面足够简洁清爽。<br>
                                一个接口几行代码而已直接初始化整个框架，无需复杂操作。<br>
                                支持多tab，可以打开多窗口。<br>
                                支持无限级菜单和对font-awesome图标库的完美支持。<br>
                                失效以及报错菜单无法直接打开，并给出弹出层提示完美的线上用户体验。<br>
                                url地址hash定位，可以清楚看到当前tab的地址信息。<br>
                                刷新页面会保留当前的窗口，并且会定位当前窗口对应左侧菜单栏。<br>
                                移动端的友好支持。<br>
                            </div>
                        </div>
                        <div class="layuimini-notice">
                            <div class="layuimini-notice-title">修复多模块菜单栏展开有问题</div>
                            <div class="layuimini-notice-extra">2019-06-13 14:53</div>
                            <div class="layuimini-notice-content layui-hide">
                                界面足够简洁清爽。<br>
                                一个接口几行代码而已直接初始化整个框架，无需复杂操作。<br>
                                支持多tab，可以打开多窗口。<br>
                                支持无限级菜单和对font-awesome图标库的完美支持。<br>
                                失效以及报错菜单无法直接打开，并给出弹出层提示完美的线上用户体验。<br>
                                url地址hash定位，可以清楚看到当前tab的地址信息。<br>
                                刷新页面会保留当前的窗口，并且会定位当前窗口对应左侧菜单栏。<br>
                                移动端的友好支持。<br>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="layui-card">
                    <div class="layui-card-header"><i class="fa fa-fire icon"></i>版本信息</div>
                    <div class="layui-card-body layui-text">
                        <table class="layui-table">
                            <colgroup>
                                <col width="100">
                                <col>
                            </colgroup>
                            <tbody>
                            <tr>
                                <td>框架名称</td>
                                <td>
                                    layuimini
                                </td>
                            </tr>
                            <tr>
                                <td>当前版本</td>
                                <td>v2.0.0</td>
                            </tr>
                            <tr>
                                <td>主要特色</td>
                                <td>零门槛 / 响应式 / 清爽 / 极简</td>
                            </tr>
                            <tr>
                                <td>演示地址</td>
                                <td>
                                    iframe版-v2：<a href="http://layuimini.99php.cn/iframe/v2/index.html" target="_blank">点击查看</a><br>
                                    单页版-v2：<a href="http://layuimini.99php.cn/onepage/v2/index.html" target="_blank">点击查看</a><br>
                                </td>
                            </tr>
                            <tr>
                                <td>下载地址</td>
                                <td>
                                    iframe版-v2：<a href="https://github.com/zhongshaofa/layuimini/tree/v2" target="_blank">github</a> / <a href="https://gitee.com/zhongshaofa/layuimini/tree/v2" target="_blank">gitee</a><br>
                                    单页版-v2：<a href="https://github.com/zhongshaofa/layuimini/tree/v2-onepage" target="_blank">github</a> / <a href="https://gitee.com/zhongshaofa/layuimini/tree/v2-onepage" target="_blank">gitee</a><br>
                                </td>
                            </tr>
                            <tr>
                                <td>Gitee</td>
                                <td style="padding-bottom: 0;">
                                    <div class="layui-btn-container">
                                        <a href="https://gitee.com/zhongshaofa/layuimini" target="_blank" style="margin-right: 15px"><img src="https://gitee.com/zhongshaofa/layuimini/badge/star.svg?theme=dark" alt="star"></a>
                                        <a href="https://gitee.com/zhongshaofa/layuimini" target="_blank"><img src="https://gitee.com/zhongshaofa/layuimini/badge/fork.svg?theme=dark" alt="fork"></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Github</td>
                                <td style="padding-bottom: 0;">
                                    <div class="layui-btn-container">
                                        <iframe src="https://ghbtns.com/github-btn.html?user=zhongshaofa&repo=layuimini&type=star&count=true" frameborder="0" scrolling="0" width="100px" height="20px"></iframe>
                                        <iframe src="https://ghbtns.com/github-btn.html?user=zhongshaofa&repo=layuimini&type=fork&count=true" frameborder="0" scrolling="0" width="100px" height="20px"></iframe>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="layui-card">
                    <div class="layui-card-header"><i class="fa fa-paper-plane-o icon"></i>作者心语</div>
                    <div class="layui-card-body layui-text layadmin-text">
                        <p>MyCms是一款基于Laravel8+layuimini开发的模块化后台管理系统。MyCms基于Apache2.0开源协议发布，免费且不限制商业使用，欢迎持续关注我们。</p>
                        <p>喜欢此后台模板的可以给我的GitHub和Gitee加个Star支持一下</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>
