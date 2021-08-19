@include("system::admin.layouts._header")
<body>
<div class="layuimini-container">
    <form id="app-form" class="layui-form layuimini-form" method="post">

        <div class="layui-form-item">
            <label class="layui-form-label required">用户名</label>
            <div class="layui-input-block">
                <input type="text" name="name" class="layui-input" lay-verify="required" lay-reqtext="请输入用户名" placeholder="请输入用户名" value="">
                <tip>填写用户名。</tip>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label required">手机号码</label>
            <div class="layui-input-block">
                <input type="text" name="mobile" class="layui-input" lay-verify="required" lay-reqtext="请输入手机号码" placeholder="请输入手机号码" value="">
                <tip>填写手机号码。</tip>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label required">登录密码</label>
            <div class="layui-input-block">
                <input type="password" name="password" class="layui-input" lay-reqtext="请输入登录密码" placeholder="请输入登录密码" value="">
                <tip>填写登录密码。</tip>
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
