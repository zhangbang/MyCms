@include("system::admin.layouts._header")
<body class="layui-layout-body layuimini-all">

<div class="layuimini-container">
    <form id="app-form" class="layui-form layuimini-form" method="post">

        <div class="layui-form-item">
            <label class="layui-form-label required">菜单显示</label>
            <div class="layui-input-block">
                <input type="radio" name="menu_show_type" @if(isset($config['menu_show_type']) && $config['menu_show_type'] == 1 ) checked @endif value="1" title="模块模式">
                <input type="radio" name="menu_show_type" @if(!isset($config['menu_show_type']) || $config['menu_show_type'] == 0 ) checked @endif value="0" title="默认模式">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label required">默认展开</label>
            <div class="layui-input-block">
                <input type="radio" name="menu_default_open" @if(isset($config['menu_default_open']) && $config['menu_default_open'] == 1 ) checked @endif value="1" title="是">
                <input type="radio" name="menu_default_open" @if(!isset($config['menu_default_open']) || $config['menu_default_open'] == 0 ) checked @endif value="0" title="否">
            </div>
        </div>

        <div class="hr-line"></div>
        <div class="layui-form-item text-center">
            <button type="submit" class="layui-btn layui-btn-normal layui-btn-sm" lay-submit>确认</button>
            <button type="reset" class="layui-btn layui-btn-primary layui-btn-sm">重置</button>
        </div>

    </form>
</div>
</body>
</html>
