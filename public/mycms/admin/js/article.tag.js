define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: '/article/admin/tag',
        add_url: '/article/admin/tag/create',
        edit_url: '/article/admin/tag/edit',
        delete_url: '/article/admin/tag/destroy',
    };

    return {
        index: function () {

            ea.table.render({
                init: init,
                cols: [[
                    {type: "checkbox"},
                    {field: 'id', width: 80, title: '序号'},
                    {field: 'tag_name', minWidth: 80, title: '名称'},
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
