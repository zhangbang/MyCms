@include("system::admin.layouts._header")
<body>
<div class="layuimini-container">
    <form id="app-form" class="layui-form layuimini-form" method="post">

        <div class="layui-form-item">
            <label class="layui-form-label">地图</label>
            <div class="layui-input-block">
                <input type="text" class="layui-input" readonly value="{{request()->server('HTTP_HOST')}}/sitemap/sitemap.xml">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">生成地址</label>
            <div class="layui-input-block">
                <input type="text" class="layui-input" value="{{route('addon.site_map.make')}}">
                <tip>可添加到服务器定时任务.</tip>
            </div>
        </div>

        <div class="hr-line"></div>
        <div class="layui-form-item text-center">
            <button type="submit" class="layui-btn layui-btn-normal layui-btn-sm" lay-submit>生成</button>
            <button type="reset" class="layui-btn layui-btn-primary layui-btn-sm">重置</button>
        </div>

    </form>
</div>
</body>
</html>
