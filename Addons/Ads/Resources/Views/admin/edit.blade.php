@include("system::admin.layouts._header")
<body>
<div class="layuimini-container">
    <form id="app-form" class="layui-form layuimini-form" method="post">

        <div class="layui-form-item">
            <label class="layui-form-label required">名称</label>
            <div class="layui-input-block">
                <input type="text" name="name" class="layui-input" lay-verify="required" lay-reqtext="请输入名称" placeholder="请输入名称" value="{{$ad->name}}">
                <tip>填写名称。</tip>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label required">标识</label>
            <div class="layui-input-block">
                <input type="text" name="code" class="layui-input" lay-verify="required" lay-reqtext="请输入标识" placeholder="请输入标识" value="{{$ad->code}}">
                <tip>填写标识（字母）。</tip>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">描述</label>
            <div class="layui-input-block">
                <textarea name="description" class="layui-textarea" placeholder="请输入描述">{{$ad->description}}</textarea>
                <tip>填写描述。</tip>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label required">内容</label>
            <div class="layui-input-block">
                <textarea id="content" name="content" rows="20" class="layui-textarea editor" placeholder="请输入内容">{{$ad->content}}</textarea>
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
