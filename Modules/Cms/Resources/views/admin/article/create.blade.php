@include("system::admin.layouts._header")
<body>
<div class="layuimini-container">
    <form id="app-form" class="layui-form layuimini-form" method="post">

        <div class="layui-form-item  layui-row layui-col-xs12">
            <label class="layui-form-label required">分类</label>
            <div class="layui-input-block">
                <select name="category_id">
                    @foreach($categories as $item)
                        <option value="{{$item['id']}}">{{$item['name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label required">标题</label>
            <div class="layui-input-block">
                <input type="text" name="title" class="layui-input" lay-verify="required" lay-reqtext="请输入标题" placeholder="请输入标题" value="">
                <tip>填写标题。</tip>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">作者</label>
            <div class="layui-input-block">
                <input type="text" name="author" class="layui-input" placeholder="请输入作者" value="{{auth()->guard('admin')->user()->name}}">
                <tip>填写作者。</tip>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">标签</label>
            <div class="layui-input-block">
                <input type="text" name="tags" class="layui-input" placeholder="请输入标签" value="">
                <tip>多个标签请用英文逗号（,）分开。</tip>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">缩略图</label>
            <div class="layui-input-block layuimini-upload">
                <input name="img" class="layui-input layui-col-xs6" placeholder="请上传缩略图" value="">
                <div class="layuimini-upload-btn">
                    <span><a class="layui-btn" data-upload="img" data-upload-number="one" data-upload-exts="ico|png|jpg|jpeg"><i class="fa fa-upload"></i> 上传</a></span>
                </div>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">浏览量</label>
            <div class="layui-input-block">
                <input type="text" name="view" class="layui-input" placeholder="请输入浏览量" value="0">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">描述</label>
            <div class="layui-input-block">
                <textarea name="description" class="layui-textarea" placeholder="请输入描述"></textarea>
                <tip>填写描述。</tip>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label required">内容</label>
            <div class="layui-input-block">
                <textarea id="content" name="content" rows="20" class="layui-textarea editor" placeholder="请输入内容"></textarea>
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
