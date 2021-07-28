define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: '/system/role',
        add_url: '/system/role/create',
        edit_url: '/system/role/edit',
        delete_url: '/system/role/destroy',
        export_url: '/system/role/export',
        modify_url: '/system/role/modify',
        authorize_url: '/system/role/auth',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: "checkbox"},
                    {field: 'id', width: 80, title: 'ID'},
                    {field: 'role_name', minWidth: 80, title: '权限名称'},
                    {field: 'role_desc', minWidth: 80, title: '备注信息'},
                    {field: 'created_at', minWidth: 80, title: '创建时间'},
                    {field: 'updated_at', minWidth: 80, title: '更新时间'},
                    {
                        width: 250,
                        title: '操作',
                        templet: ea.table.tool,
                        operat: [
                            'edit',
                            [{
                                text: '授权',
                                url: init.authorize_url,
                                method: 'open',
                                auth: 'auth',
                                class: 'layui-btn layui-btn-normal layui-btn-xs',
                            }],
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
        auth: function () {
            var tree = layui.tree;

            ea.request.get(
                {
                    url: window.location.href,
                }, function (res) {
                    res.data = res.data || [];
                    tree.render({
                        elem: '#node_ids',
                        data: res.data,
                        showCheckbox: true,
                        id: 'nodeDataId',
                    });
                }
            );

            ea.listen(function (data) {
                var checkedData = tree.getChecked('nodeDataId');
                var ids = [];
                $.each(checkedData, function (i, v) {
                    ids.push(v.id);
                    if (v.children !== undefined && v.children.length > 0) {
                        $.each(v.children, function (ii, vv) {
                            ids.push(vv.id);
                        });
                    }
                });
                data.node = JSON.stringify(ids);
                return data;
            });

        }
    };
    return Controller;
});
