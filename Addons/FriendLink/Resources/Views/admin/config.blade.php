@include("system::admin.layouts._header")
<body>
<div class="layuimini-container">
    <form id="app-form" class="layui-form layuimini-form" method="post">

        <div class="layui-form-item">
            <label class="layui-form-label required">显示页面</label>
            <div class="layui-input-block">
                <input type="radio" name="friend_link_show" lay-skin="primary" value="all" @if(isset($config['friend_link_show']) && $config['friend_link_show'] == 'all') checked @endif title="全部页面">
                <input type="radio" name="friend_link_show" lay-skin="primary" value="home" @if(isset($config['friend_link_show']) && $config['friend_link_show'] == 'home') checked @endif title="首页">
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
