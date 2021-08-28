@include("system::admin.layouts._header")
<body>
<div class="layuimini-container">
    <form id="app-form" class="layui-form layuimini-form" method="post">

        <div class="layui-form-item">
            <label class="layui-form-label required">名称</label>
            <div class="layui-input-block">
                <input type="text" name="name" class="layui-input" lay-verify="required" lay-reqtext="请输入名称" placeholder="请输入名称" value="{{$link->name}}">
                <tip>填写名称。</tip>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label required">URL</label>
            <div class="layui-input-block">
                <input type="text" name="url" class="layui-input" lay-verify="required" lay-reqtext="请输入URL" placeholder="请输入URL" value="{{$link->url}}">
                <tip>填写URL。</tip>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label required">打开方式</label>
            <div class="layui-input-block">
                <input type="radio" name="target" lay-skin="primary" value="_blank" @if($link->target == '_blank') checked @endif title="_blank">
                <input type="radio" name="target" lay-skin="primary" value="_self" @if($link->target == '_self') checked @endif title="_self">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label required">排序</label>
            <div class="layui-input-block">
                <input type="number" name="sort" class="layui-input" lay-verify="required" lay-reqtext="请输入排序" placeholder="请输入排序" value="{{$link->sort}}">
                <tip>填写排序。</tip>
            </div>
        </div>

        <div class="hr-line"></div>
        <div class="layui-form-item text-center">
            <input type="hidden" name="id" value="{{$link->id}}">
            <button type="submit" class="layui-btn layui-btn-normal layui-btn-sm" lay-submit>确认</button>
            <button type="reset" class="layui-btn layui-btn-primary layui-btn-sm">重置</button>
        </div>

    </form>
</div>
</body>
</html>
