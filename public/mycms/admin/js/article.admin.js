define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: '/article/admin',
        add_url: '/article/admin/create',
        edit_url: '/article/admin/edit',
        delete_url: '/article/admin/destroy',
    };

    return {
        index: function () {

            ea.table.render({
                init: init,
                cols: [[
                    {type: "checkbox"},
                    {field: 'id', width: 80, title: '序号'},
                    {field: 'title', minWidth: 80, title: '标题'},
                    {field: 'author', minWidth: 80, title: '作者'},
                    {field: 'category.name', minWidth: 80, title: '分类'},
                    {field: 'view', minWidth: 80, title: '浏览'},
                    {field: 'created_at', minWidth: 120, title: '时间'},
                    {
                        width: 250,
                        title: '操作',
                        templet: ea.table.tool,
                        operat: [
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
        },
        edit: function () {
            ea.listen();
        },
    };
});
