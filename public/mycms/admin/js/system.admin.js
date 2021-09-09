define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: '/system/admin',
        add_url: '/system/admin/create',
        edit_url: '/system/admin/edit',
        delete_url: '/system/admin/destroy',
        modify_url: '/system/admin/modify',
        export_url: '/system/admin/export',
        password_url: '/system/admin/password',
    };

    return {

        index: function () {

            ea.table.render({
                init: init,
                cols: [[
                    {type: "checkbox"},
                    {field: 'id', width: 80, title: 'ID'},
                    {field: 'name', minWidth: 80, title: '登录账户', search: true},
                    {field: 'role.role_name', minWidth: 80, title: '角色权限'},
                    {field: 'login_num', minWidth: 80, title: '登录次数'},
                    {field: 'remark', minWidth: 80, title: '备注信息'},
                    {
                        field: 'status',
                        title: '状态',
                        width: 85,
                        selectList: {0: '禁用', 1: '启用'},
                        templet: ea.table.switch
                    },
                    {field: 'last_login_time', minWidth: 80, title: '最后登录时间'},
                    {field: 'last_login_ip', minWidth: 80, title: '最后登录IP'},
                    {field: 'created_at', minWidth: 120, title: '创建时间'},
                    {field: 'updated_at', minWidth: 120, title: '更新时间'},
                    {
                        width: 250,
                        title: '操作',
                        templet: ea.table.tool,
                        operat: [
                            'edit',
                            [{
                                text: '设置密码',
                                url: init.password_url,
                                method: 'open',
                                auth: 'password',
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
        password: function () {
            ea.listen();
        }
    };
});
