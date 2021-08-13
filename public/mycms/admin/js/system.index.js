define(["jquery", "easy-admin", "echarts", "echarts-theme", "miniAdmin", "miniTab"], function ($, ea, echarts, undefined, miniAdmin, miniTab) {

    return {
        index: function () {
            var options = {
                iniUrl: '/system/index',    // 初始化接口
                //clearUrl: ea.url("ajax/clearCache"), // 缓存清理接口
                urlHashLocation: true,      // 是否打开hash定位
                bgColorDefault: false,      // 主题默认配置
                multiModule: true,          // 是否开启多模块
                menuChildOpen: false,       // 是否默认展开菜单
                loadingTime: 0,             // 初始化加载时间
                pageAnim: true,             // iframe窗口动画
                maxTabNum: 20,              // 最大的tab打开数量
            };
            miniAdmin.render(options);

            $('.login-out').on("click", function () {
                ea.request.get({
                    url: '/system/logout',
                    prefix: true,
                }, function (res) {
                    ea.msg.success(res.msg, function () {
                        window.location = ea.url('/system/login');
                    })
                });
            });
        },
        dashboard: function () {

            miniTab.listen();

            /**
             * 报表功能
             */
            var echartsRecords = echarts.init(document.getElementById('echarts-records'), 'walden');
            var optionRecords = {
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    data: ['邮件营销', '联盟广告', '视频广告', '直接访问', '搜索引擎']
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                toolbox: {
                    feature: {
                        saveAsImage: {}
                    }
                },
                xAxis: {
                    type: 'category',
                    boundaryGap: false,
                    data: ['周一', '周二', '周三', '周四', '周五', '周六', '周日']
                },
                yAxis: {
                    type: 'value'
                },
                series: [
                    {
                        name: '邮件营销',
                        type: 'line',
                        data: [120, 132, 101, 134, 90, 230, 210]
                    },
                    {
                        name: '联盟广告',
                        type: 'line',
                        data: [220, 182, 191, 234, 290, 330, 310]
                    },
                    {
                        name: '视频广告',
                        type: 'line',
                        data: [150, 232, 201, 154, 190, 330, 410]
                    },
                    {
                        name: '直接访问',
                        type: 'line',
                        data: [320, 332, 301, 334, 390, 330, 320]
                    },
                    {
                        name: '搜索引擎',
                        type: 'line',
                        data: [820, 932, 901, 934, 1290, 1330, 1320]
                    }
                ]
            };
            echartsRecords.setOption(optionRecords);

            // echarts 窗口缩放自适应
            window.onresize = function () {
                echartsRecords.resize();
            }
        }
    };
});
