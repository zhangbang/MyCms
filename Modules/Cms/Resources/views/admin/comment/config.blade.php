@include("system::admin.layouts._header")
<body>
<div class="layuimini-container">
    <form id="app-form" class="layui-form layuimini-form" method="post">

        <div class="layui-form-item">
            <label class="layui-form-label required">开启评论</label>
            <div class="layui-input-block">
                <input type="radio" name="is_allow_comment" lay-skin="primary" value="1" @if(isset($config['is_allow_comment']) && $config['is_allow_comment'] == '1') checked @endif title="开启">
                <input type="radio" name="is_allow_comment" lay-skin="primary" value="-1" @if(isset($config['is_allow_comment']) && $config['is_allow_comment'] == '-1') checked @endif title="关闭">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label required">评论状态</label>
            <div class="layui-input-block">
                <input type="radio" name="is_auto_status" lay-skin="primary" value="1" @if(isset($config['is_auto_status']) && $config['is_auto_status'] == '1') checked @endif title="通过">
                <input type="radio" name="is_auto_status" lay-skin="primary" value="-1" @if(isset($config['is_auto_status']) && $config['is_auto_status'] == '-1') checked @endif title="待审核">
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
