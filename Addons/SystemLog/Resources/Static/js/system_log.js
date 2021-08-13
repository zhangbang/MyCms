define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: '/addon/system_log',
        show_url: '/addon/system_log/show',
    };

    return {

        index: function () {

            ea.table.render({
                init: init,
                toolbar:['refresh'],
                cols: [[
                    {field: 'id', minWidth: 80, title: '流水号'},
                    {field: 'admin_id', minWidth: 80, title: '管理员ID'},
                    {field: 'admin_name', minWidth: 80, title: '管理员名称'},
                    {field: 'method', minWidth: 80, title: '请求方式'},
                    {field: 'url', minWidth: 80, title: '请求URL'},
                    {field: 'ip', minWidth: 120, title: 'ip地址'},
                    {field: 'created_at', minWidth: 120, title: '时间'},
                    {
                        width: 250,
                        title: '操作',
                        templet: ea.table.tool,
                        operat: [
                            [{
                                text: '详情',
                                url: init.show_url,
                                method: 'open',
                                auth: 'show',
                                class: 'layui-btn layui-btn-normal layui-btn-xs',
                            }],
                        ]
                    }
                ]],
            });

            ea.listen();
        },show: function () {
            ea.listen();
        },

    };
});
