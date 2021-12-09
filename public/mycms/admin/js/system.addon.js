define(["jquery", "easy-admin", "miniTab"], function ($, ea, miniTab) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: '/system/addon',
        modify_url: '/system/addon/modify',
    };

    return {

        index: function () {

            miniTab.listen();

            ea.table.render({
                init: init,
                search: false,
                toolbar: ['refresh'],
                cols: [[
                    {field: 'name', minWidth: 80, title: '名称'},
                    {field: 'ident', minWidth: 80, title: '标识'},
                    {field: 'version', minWidth: 80, title: '版本'},
                    {field: 'author', minWidth: 80, title: '作者'},
                    {
                        field: 'is_menu',
                        selectList: {0: '否', 1: '是'},
                        templet: ea.table.switch,
                        minWidth: 80,
                        title: '显示到菜单'
                    },
                    {field: 'description', minWidth: 80, title: '描述'},
                    {field: 'operation', minWidth: 120, title: '操作'},
                ]],
            });

            ea.listen();
        }

    };
});
