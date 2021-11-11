define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: '/article/admin/comment',
        modify_url: '/article/admin/comment/modify',
        config_url: '/article/admin/comment/config',
        delete_url: '/article/admin/comment/destroy',
    };

    return {
        index: function () {

            ea.table.render({
                init: init,
                toolbar: ['refresh','config','delete'],
                cols: [[
                    {type: "checkbox"},
                    {field: 'id', width: 80, title: '序号'},
                    {field: 'user.name', minWidth: 80, title: '用户'},
                    {field: 'content', minWidth: 80, title: '内容'},
                    {
                        field: 'status',
                        minWidth: 80,
                        title: '状态',
                        selectList: {0: '待审核', 1: '已通过'},
                        templet: ea.table.switch
                    },
                    {field: 'article.title', minWidth: 120, title: '文章'},
                    {field: 'created_at', minWidth: 120, title: '时间'},
                    {
                        width: 250,
                        title: '操作',
                        templet: ea.table.tool,
                        operat: [
                            'delete'
                        ]
                    }
                ]],
            });

            ea.listen();
        },
        config: function () {
            ea.listen();
        }
    };
});
