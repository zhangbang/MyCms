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
                            <div class="layui-card-header"><i class="fa fa-warning icon"></i>????????????</div>
                            <div class="layui-card-body">
                                <div class="welcome-module">
                                    <div class="layui-row layui-col-space10">
                                        <div class="layui-col-xs6">
                                            <div class="panel layui-bg-number">
                                                <div class="panel-body">
                                                    <div class="panel-title">
                                                        <span class="label pull-right layui-bg-blue">??????</span>
                                                        <h5>????????????</h5>
                                                    </div>
                                                    <div class="panel-content">
                                                        <h1 class="no-margins">1234</h1>
                                                        <small>????????????????????????</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="layui-col-xs6">
                                            <div class="panel layui-bg-number">
                                                <div class="panel-body">
                                                    <div class="panel-title">
                                                        <span class="label pull-right layui-bg-cyan">??????</span>
                                                        <h5>????????????</h5>
                                                    </div>
                                                    <div class="panel-content">
                                                        <h1 class="no-margins">1234</h1>
                                                        <small>????????????????????????</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="layui-col-xs6">
                                            <div class="panel layui-bg-number">
                                                <div class="panel-body">
                                                    <div class="panel-title">
                                                        <span class="label pull-right layui-bg-orange">??????</span>
                                                        <h5>????????????</h5>
                                                    </div>
                                                    <div class="panel-content">
                                                        <h1 class="no-margins">1234</h1>
                                                        <small>????????????????????????</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="layui-col-xs6">
                                            <div class="panel layui-bg-number">
                                                <div class="panel-body">
                                                    <div class="panel-title">
                                                        <span class="label pull-right layui-bg-green">??????</span>
                                                        <h5>????????????</h5>
                                                    </div>
                                                    <div class="panel-content">
                                                        <h1 class="no-margins">1234</h1>
                                                        <small>????????????????????????</small>
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
                            <div class="layui-card-header"><i class="fa fa-credit-card icon icon-blue"></i>????????????</div>
                            <div class="layui-card-body">
                                <div class="welcome-module">
                                    <div class="layui-row layui-col-space10 layuimini-qiuck">
                                        <div class="layui-col-xs3 layuimini-qiuck-module">
                                            <a href="javascript:;" data-title="????????????" data-icon="fa fa-window-maximize">
                                                <i class="fa fa-window-maximize"></i>
                                                <cite>????????????</cite>
                                            </a>
                                        </div>
                                        <div class="layui-col-xs3 layuimini-qiuck-module">
                                            <a href="javascript:;" data-title="????????????" data-icon="fa fa-gears">
                                                <i class="fa fa-gears"></i>
                                                <cite>????????????</cite>
                                            </a>
                                        </div>
                                        <div class="layui-col-xs3 layuimini-qiuck-module">
                                            <a href="javascript:;" data-title="????????????" data-icon="fa fa-file-text">
                                                <i class="fa fa-file-text"></i>
                                                <cite>????????????</cite>
                                            </a>
                                        </div>
                                        <div class="layui-col-xs3 layuimini-qiuck-module">
                                            <a href="javascript:;" data-title="????????????" data-icon="fa fa-dot-circle-o">
                                                <i class="fa fa-dot-circle-o"></i>
                                                <cite>????????????</cite>
                                            </a>
                                        </div>
                                        <div class="layui-col-xs3 layuimini-qiuck-module">
                                            <a href="javascript:;" data-title="????????????" data-icon="fa fa-calendar">
                                                <i class="fa fa-calendar"></i>
                                                <cite>????????????</cite>
                                            </a>
                                        </div>
                                        <div class="layui-col-xs3 layuimini-qiuck-module">
                                            <a href="javascript:;"  data-title="404??????" data-icon="fa fa-hourglass-end">
                                                <i class="fa fa-hourglass-end"></i>
                                                <cite>404??????</cite>
                                            </a>
                                        </div>
                                        <div class="layui-col-xs3 layuimini-qiuck-module">
                                            <a href="javascript:;" data-title="????????????" data-icon="fa fa-snowflake-o">
                                                <i class="fa fa-snowflake-o"></i>
                                                <cite>????????????</cite>
                                            </a>
                                        </div>
                                        <div class="layui-col-xs3 layuimini-qiuck-module">
                                            <a href="javascript:;" data-title="????????????" data-icon="fa fa-search">
                                                <i class="fa fa-search"></i>
                                                <cite>????????????</cite>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="layui-col-md12">
                        <div class="layui-card">
                            <div class="layui-card-header"><i class="fa fa-line-chart icon"></i>????????????</div>
                            <div class="layui-card-body">
                                <div id="echarts-records" style="width: 100%;min-height:500px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="layui-col-md4">

                <div class="layui-card">
                    <div class="layui-card-header"><i class="fa fa-bullhorn icon icon-tip"></i>?????????</div>
                    <div class="layui-card-body layui-text">
                        <p><a href="https://www.aliyun.com/minisite/goods?userCode=zk44pwi7" target="_blank"><img src="/mycms/admin/images/aliyun.jpg" style="width: 390px"></a></p>
                    </div>
                </div>

                <div class="layui-card">
                    <div class="layui-card-header"><i class="fa fa-fire icon"></i>????????????</div>
                    <div class="layui-card-body layui-text">
                        <table class="layui-table">
                            <colgroup>
                                <col width="100">
                                <col>
                            </colgroup>
                            <tbody>
                            <tr>
                                <td>????????????</td>
                                <td>
                                    MyCms
                                </td>
                            </tr>
                            <tr>
                                <td>????????????</td>
                                <td>{{config('app.version')}}</td>
                            </tr>
                            <tr>
                                <td>????????????</td>
                                <td>????????? / ????????? / ?????????</td>
                            </tr>
                            <tr>
                                <td>????????????</td>
                                <td>
                                    <a href="https://www.mycms.net.cn" target="_blank">????????????</a><br>
                                </td>
                            </tr>
                            <tr>
                                <td>????????????</td>
                                <td>
                                    <a href="https://gitee.com/qq386654667/mycms" target="_blank">gitee</a> <br>
                                </td>
                            </tr>
                            <tr>
                                <td>Gitee</td>
                                <td style="padding-bottom: 0;">
                                    <div class="layui-btn-container">
                                        <a href="https://gitee.com/qq386654667/mycms" target="_blank" style="margin-right: 15px"><img src="https://gitee.com/qq386654667/mycms/badge/star.svg?theme=dark" alt="star"></a>
                                        <a href="https://gitee.com/qq386654667/mycms" target="_blank"><img src="https://gitee.com/qq386654667/mycms/badge/fork.svg?theme=dark" alt="fork"></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>?????????</td>
                                <td>??????????????????9??????<a target="_blank" href="https://www.aliyun.com/minisite/goods?taskCode=yds2021-07zy&recordId=811068&userCode=zk44pwi7">????????????</a> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="layui-card">
                    <div class="layui-card-header"><i class="fa fa-paper-plane-o icon"></i>????????????</div>
                    <div class="layui-card-body layui-text layadmin-text">
                        <p>MyCms???????????????Laravel???????????????????????????????????????CMS????????????????????????????????????????????????????????????????????????????????????2021SR1543432???MyCms??????Apache2.0?????????????????????????????????????????????????????????????????????????????????</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>
