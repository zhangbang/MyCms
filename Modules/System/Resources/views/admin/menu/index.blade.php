@include("system::admin.layouts._header")

<body class="layui-layout-body layuimini-all">
<link rel="stylesheet" href="/mycms/plugs/lay-module/treetable-lay/treetable.css?v={:time()}" media="all">
<style>
    .layui-btn:not(.layui-btn-lg ):not(.layui-btn-sm):not(.layui-btn-xs) {
        height: 34px;
        line-height: 34px;
        padding: 0 8px;
    }
</style>
<div class="layuimini-container">
    <div class="layuimini-main">
        <table id="currentTable" class="layui-table layui-hide"
               lay-filter="currentTable">
        </table>
    </div>
</div>
<script type="text/html" id="toolbar">
    <button class="layui-btn layui-btn-sm layuimini-btn-primary" data-treetable-refresh><i class="fa fa-refresh"></i> </button>
    <button class="layui-btn layui-btn-normal layui-btn-sm" data-open="/system/menu/create" data-title="添加" data-full="true"><i class="fa fa-plus"></i> 添加</button>
    <button class="layui-btn layui-btn-sm layui-btn-danger" data-url="/system/menu/destroy" data-treetable-delete="currentTableRenderId"><i class="fa fa-trash-o"></i> 删除</button>
</script>

</body>
</html>
