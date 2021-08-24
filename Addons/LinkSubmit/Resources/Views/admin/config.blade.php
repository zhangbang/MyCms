@include("system::admin.layouts._header")
<body>
<div class="layuimini-container">
    <form id="app-form" class="layui-form layuimini-form" method="post">

        <div class="layui-form-item">
            <label class="layui-form-label required">网址</label>
            <div class="layui-input-block">
                <input type="text" name="link_submit_url" class="layui-input" lay-verify="required" lay-reqtext="请输入网址" placeholder="请输入网址" value="{{$systemConfig['link_submit_url'] ?? ''}}">
                <tip>http://data.zz.baidu.com/urls?site=<em style="color: red">https://domain.com</em>&token=xxxxxxx</tip>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label required">Token</label>
            <div class="layui-input-block">
                <input type="text" name="link_submit_token" class="layui-input" lay-verify="required" lay-reqtext="请输入Token" placeholder="请输入Token" value="{{$systemConfig['link_submit_token'] ?? ''}}">
                <tip>http://data.zz.baidu.com/urls?site=https://domain.com&token=<em style="color: red">xxxxxxx</em></tip>
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
