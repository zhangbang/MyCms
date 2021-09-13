define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: '/addon/ads',
        add_url: '/addon/ads/create',
        edit_url: '/addon/ads/edit',
        delete_url: '/addon/ads/destroy',
        review_url: '/addon/ads/review',
    };

    return {

        index: function () {

            ea.table.render({
                init: init,
                cols: [[
                    {field: 'id', minWidth: 80, title: '序号'},
                    {field: 'code', minWidth: 80, title: '标识'},
                    {field: 'name', minWidth: 80, title: '名称'},
                    {field: 'description', minWidth: 80, title: '描述'},
                    {field: 'created_at', minWidth: 120, title: '时间'},
                    {
                        width: 250,
                        title: '操作',
                        templet: ea.table.tool,
                        operat: [
                            [{
                                text: '预览',
                                url: init.review_url,
                                method: 'open',
                                auth: 'review',
                                class: 'layui-btn layui-btn-normal layui-btn-xs',
                            }],
                            'edit',
                            'delete'
                        ]
                    }
                ]],
            });

            ea.listen();
        },
        create: function () {
            ea.listen();
        }, edit: function () {
            ea.listen();
        }

    };
});
