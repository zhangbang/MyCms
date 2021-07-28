@include("system::admin.layouts._header")
<body>
<link rel="stylesheet" href="/mycms/admin/css/login.css?v=1.0.0" media="all">
<div class="main-body">
    <div class="login-main">
        <div class="login-top">
            <span>后台登录</span>
            <span class="bg1"></span>
            <span class="bg2"></span>
        </div>
        <form class="layui-form login-bottom" method="post">
            @csrf
            <div class="center">
                <div class="item">
                    <span class="icon icon-2"></span>
                    <input type="text" name="name" lay-verify="required" placeholder="请输入登录账号" maxlength="24"/>
                </div>

                <div class="item">
                    <span class="icon icon-3"></span>
                    <input type="password" name="password" lay-verify="required" placeholder="请输入密码" maxlength="20">
                    <span class="bind-password icon icon-4"></span>
                </div>

            </div>
            {{--<div class="tip">
                <span class="icon-nocheck"></span>
                <span class="login-tip">保持登录</span>
                <a href="javascript:" class="forget-password">忘记密码？</a>
            </div>--}}
            <div class="layui-form-item" style="text-align:center; width:100%;height:100%;margin:0px;">
                <button class="login-btn" lay-submit="" lay-filter="login">立即登录</button>
            </div>
        </form>
    </div>
</div>
<div class="footer">
    ©版权所有 2021 MyCms
</div>

<script>
    layui.use(['form', 'jquery'], function () {
        var $ = layui.jquery,
            form = layui.form,
            layer = layui.layer;

        // 登录过期的时候，跳出ifram框架
        if (top.location != self.location) top.location = self.location;

        // 进行登录操作
        form.on('submit(login)', function (data) {
            data = data.field;

            $.ajax({
                type: "post",
                url: '{{route("system.login")}}',
                data: data,
                dataType: "json",
                statusCode: {
                    204: function () {
                        location.href = "{{route('system.index')}}";
                    }
                }, error: function (response) {
                    layer.msg(response.responseText, {icon: 2});
                }
            });
            return false;
        });
    });
</script>
</body>
</html>
