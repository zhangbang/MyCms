define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: '/user/admin/balance',
    };

    return {
        index: function () {

            ea.table.render({
                init: init,
                search:false,
                toolbar:['refresh'],
                cols: [[
                    {type: "checkbox"},
                    {field: 'id', width: 80, title: '序号'},
                    {field: 'user_id', minWidth: 80, title: '用户ID'},
                    {field: 'user.name', minWidth: 80, title: '用户名'},
                    {field: 'before', minWidth: 80, title: '变动前'},
                    {field: 'balance', minWidth: 80, title: '变动金额'},
                    {field: 'after', minWidth: 80, title: '变动后'},
                    {field: 'created_at', minWidth: 120, title: '变动时间'},
                ]],
            });

            ea.listen();
        }
    };
});
