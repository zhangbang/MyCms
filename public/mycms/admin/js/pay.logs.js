define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: '/shop/admin/pay/logs',
    };

    return {
        index: function () {

            ea.table.render({
                init: init,
                cols: [[
                    {type: "checkbox"},
                    {field: 'id', width: 80, title: '序号'},
                    {field: 'trade_no', minWidth: 80, title: '支付单号', search: true},
                    {field: 'user.name', minWidth: 80, title: '用户'},
                    {field: 'goods_name', minWidth: 80, title: '商品'},
                    {field: 'total_amount', minWidth: 80, title: '金额'},
                    {
                        field: 'status', minWidth: 80, title: '状态', templet: function (d) {
                            return d.status == 1 ? '<span style="color: green">是</span>' : '<span style="color: red">否</span>';
                        }
                    },
                    {field: 'created_at', minWidth: 120, title: '创建时间'},
                    {field: 'pay_time', minWidth: 80, title: '支付时间'}
                ]],
            });

            ea.listen();
        }
    };
});
