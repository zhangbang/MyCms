@include("system::admin.layouts._header")
<body>
<div class="layuimini-container">
    <form id="app-form" class="layui-form layuimini-form" method="post">

        <div class="layui-form-item">
            <label class="layui-form-label required">登录账户</label>
            <div class="layui-input-block">
                <input type="text" name="name" class="layui-input" lay-verify="required" lay-reqtext="请输入登录账户" placeholder="请输入登录账户" value="">
                <tip>填写登录账户。</tip>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label required">登录密码</label>
            <div class="layui-input-block">
                <input type="password" name="password" class="layui-input" lay-reqtext="请输入登录密码" placeholder="请输入登录密码" value="">
                <tip>填写登录密码。</tip>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">角色权限</label>
            <div class="layui-input-block">
                @foreach ($roles as $role)
                <input type="radio" name="role_id" lay-skin="primary" value="{{$role->id}}" title="{{$role->role_name}}">
                @endforeach
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">备注信息</label>
            <div class="layui-input-block">
                <textarea name="remark" class="layui-textarea" placeholder="请输入备注信息"></textarea>
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
