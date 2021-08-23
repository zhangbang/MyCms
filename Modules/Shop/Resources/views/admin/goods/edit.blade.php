@include("system::admin.layouts._header")
<body>
<div class="layuimini-container">
    <form id="app-form" class="layui-form layuimini-form" method="post">

        <div class="layui-form-item  layui-row layui-col-xs12">
            <label class="layui-form-label required">商品分类</label>
            <div class="layui-input-block">
                <select name="category_id">
                    @foreach($categories as $item)
                        <option value="{{$item['id']}}" @if($item['id']==$goods->id) selected @endif>{{$item['name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label required">名称</label>
            <div class="layui-input-block">
                <input type="text" name="goods_name" class="layui-input" lay-verify="required" lay-reqtext="请输入名称" placeholder="请输入名称" value="{{$goods->goods_name}}">
                <tip>填写名称。</tip>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label required">缩略图</label>
            <div class="layui-input-block layuimini-upload">
                <input name="goods_image" class="layui-input layui-col-xs6" placeholder="请上传缩略图" value="{{$goods->goods_image}}">
                <div class="layuimini-upload-btn">
                    <span><a class="layui-btn" data-upload="goods_image" data-upload-number="one" data-upload-exts="ico|png|jpg|jpeg"><i class="fa fa-upload"></i> 上传</a></span>
                </div>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label required">售价</label>
            <div class="layui-input-block">
                <input type="text" name="shop_price" class="layui-input" lay-verify="required" lay-reqtext="请输入售价" placeholder="请输入售价" value="{{$goods->shop_price}}">
                <tip>填写售价。</tip>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">市场价</label>
            <div class="layui-input-block">
                <input type="text" name="market_price" class="layui-input" lay-reqtext="请输入市场价" placeholder="请输入市场价" value="{{$goods->market_price}}">
                <tip>填写市场价。</tip>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">描述</label>
            <div class="layui-input-block">
                <textarea name="description" class="layui-textarea" placeholder="请输入描述">{{$goods->description}}</textarea>
                <tip>填写描述。</tip>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label required">详情</label>
            <div class="layui-input-block">
                <textarea id="content" name="content" rows="20" class="layui-textarea editor" placeholder="请输入内容">{{$goods->content}}</textarea>
            </div>
        </div>

        <div class="hr-line"></div>
        <div class="layui-form-item text-center">
            <input type="hidden" name="id" value="{{$goods->id}}">
            <button type="submit" class="layui-btn layui-btn-normal layui-btn-sm" lay-submit>确认</button>
            <button type="reset" class="layui-btn layui-btn-primary layui-btn-sm">重置</button>
        </div>

    </form>
</div>
</body>
</html>
