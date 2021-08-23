define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: '/shop/admin/category',
        add_url: '/shop/admin/category/create',
        edit_url: '/shop/admin/category/edit',
        delete_url: '/shop/admin/category/destroy',
    };

    return {
        index: function () {

            ea.table.render({
                init: init,
                cols: [[
                    {type: "checkbox"},
                    {field: 'id', width: 80, title: '序号'},
                    {field: 'name', minWidth: 80, title: '名称'},
                    {field: 'pid', minWidth: 80, title: '父级ID'},
                    {field: 'description', minWidth: 80, title: '描述'},
                    {field: 'created_at', minWidth: 120, title: '创建时间'},
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
