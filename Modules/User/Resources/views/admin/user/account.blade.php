@include("system::admin.layouts._header")
<body>
<div class="layuimini-container">
    <form id="app-form" class="layui-form layuimini-form" method="post">

        <div class="layui-form-item">
            <label class="layui-form-label required">用户名</label>
            <div class="layui-input-block">
                <input type="text" class="layui-input" readonly value="{{$user->name}}">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">余额</label>
            <div class="layui-input-block">
                <input type="text" name="balance" class="layui-input" lay-verify="required" lay-reqtext="请输入变动金额" placeholder="请输入变动金额" value="0">
                <tip>当前余额{{$user->balance}}。</tip>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">积分</label>
            <div class="layui-input-block">
                <input type="text" name="point" class="layui-input" lay-verify="required" lay-reqtext="请输入变动积分" placeholder="请输入变动积分" value="0">
                <tip>当前余额{{$user->point}}。</tip>
            </div>
        </div>

        <div class="hr-line"></div>
        <div class="layui-form-item text-center">
            <input type="hidden" name="id" value="{{$user->id}}">
            <button type="submit" class="layui-btn layui-btn-normal layui-btn-sm" lay-submit>确认</button>
            <button type="reset" class="layui-btn layui-btn-primary layui-btn-sm">重置</button>
        </div>

    </form>
</div>
</body>
</html>
