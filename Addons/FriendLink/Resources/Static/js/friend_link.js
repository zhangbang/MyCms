define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: '/addon/friend_link',
        add_url: '/addon/friend_link/create',
        edit_url: '/addon/friend_link/edit',
        delete_url: '/addon/friend_link/destroy',
        config_url: '/addon/friend_link/config',
    };

    return {

        index: function () {

            ea.table.render({
                init: init,
                toolbar: ['refresh', 'add', 'delete', 'config'],
                cols: [[
                    {field: 'id', minWidth: 80, title: '序号'},
                    {field: 'name', minWidth: 80, title: '名称'},
                    {field: 'url', minWidth: 80, title: 'URL'},
                    {field: 'target', minWidth: 80, title: '打开方式'},
                    {field: 'sort', minWidth: 80, title: '排序'},
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
        }, edit: function () {
            ea.listen();
        },config: function () {
            ea.listen();
        },

    };
});
