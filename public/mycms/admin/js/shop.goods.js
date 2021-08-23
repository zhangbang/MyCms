define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: '/shop/admin/goods',
        add_url: '/shop/admin/goods/create',
        edit_url: '/shop/admin/goods/edit',
        delete_url: '/shop/admin/goods/destroy',
    };

    return {
        index: function () {

            ea.table.render({
                init: init,
                cols: [[
                    {type: "checkbox"},
                    {field: 'id', width: 80, title: '序号'},
                    {field: 'goods_name', minWidth: 80, title: '名称'},
                    {field: 'category.name', minWidth: 80, title: '分类'},
                    {field: 'shop_price', minWidth: 80, title: '价格'},
                    {field: 'market_price', minWidth: 80, title: '市场价'},
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
