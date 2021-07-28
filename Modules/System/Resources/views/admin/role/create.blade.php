@include("system::admin.layouts._header")
<body>
<div class="layuimini-container">
    <form id="app-form" class="layui-form layuimini-form" method="post">

        <div class="layui-form-item">
            <label class="layui-form-label required">角色名称</label>
            <div class="layui-input-block">
                <input type="text" name="role_name" class="layui-input" lay-verify="required" lay-reqtext="请输入角色名称" placeholder="请输入角色名称" value="">
                <tip>填写角色名称。</tip>
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">角色说明</label>
            <div class="layui-input-block">
                <textarea name="role_desc" class="layui-textarea" placeholder="请输入角色说明"></textarea>
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
