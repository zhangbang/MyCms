@include("system::admin.layouts._header")
<body>
<div class="layuimini-container">
    <form id="app-form" class="layui-form layuimini-form" method="post">
        <div class="layui-form-item">
            <div class="layui-input-block">
                {!! $ad->content !!}
            </div>
        </div>
    </form>
</div>
</body>
</html>
