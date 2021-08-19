@include("system::admin.layouts._header")
<body class="layui-layout-body layuimini-all">
<style>
    .layui-iconpicker-body.layui-iconpicker-body-page .hide {
        display: none;
    }
</style>
<link rel="stylesheet" href="/mycms/plugs/lay-module/autocomplete/autocomplete.css?v={$version}" media="all">
<div class="layuimini-container">
    <form id="app-form" class="layui-form layuimini-form" method="post">

        <div class="layui-form-item  layui-row layui-col-xs12">
            <label class="layui-form-label required">上级菜单</label>
            <div class="layui-input-block">
                <select name="pid">
                    <option value="0">顶级菜单</option>
                    @foreach($menus as $menu)
                    <option value="{{$menu['id']}}">{{$menu['title']}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label required">菜单名称</label>
            <div class="layui-input-block">
                <input type="text" name="title" class="layui-input" lay-verify="required" lay-reqtext="请输入菜单名称" placeholder="请输入菜单名称" value="">
                <tip>填写菜单名称。</tip>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">菜单链接</label>
            <div class="layui-input-block">
                <input type="text" id="href" name="url" class="layui-input" lay-reqtext="请输入菜单链接" placeholder="请输入菜单链接" value="">
                <tip>填写菜单链接。</tip>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">选择图标</label>
            <div class="layui-input-block">
                <input type="text" id="icon" name="icon" lay-filter="icon" class="hide" value="fa fa-list">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label required">打开方式</label>
            <div class="layui-input-block">
                @foreach(['_self','_blank'] as $vo)
                <input type="radio" name="target" value="{{$vo}}" title="{{$vo}}">
                @endforeach
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">菜单排序</label>
            <div class="layui-input-block">
                <input type="number" name="sort" lay-reqtext="菜单排序不能为空" placeholder="请输入菜单排序" value="0" class="layui-input">
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
