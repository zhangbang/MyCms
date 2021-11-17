@include("template::mycms.views._header")

<main class="main">

    <!-- start login or register  -->
    <section class="maan-user-account-section">
        <div class="container">
            <div class="maan-user-account-wraper wow fadeInUp">
                <div class="user-header-area">
                    <a href="/" class="logo d-none d-sm-block"><img src="{{system_config('site_logo')}}" style="height: 46px" alt="Logo"></a>
                    <nav>
                        <div class="nav nav-tabs maan-swetch-btn" id="nav-tab" role="tablist">
                            <button class="nav-link  login-btn active" id="registration-tab" data-bs-toggle="tab" data-bs-target="#forget" type="button" role="tab" aria-selected="true">忘记密码</button>
                            <button class="nav-link registration-btn maan-btn " id="Login-tab" data-bs-toggle="tab" data-bs-target="#Login" type="button" role="tab" aria-selected="false">登录</button>

                        </div>
                    </nav>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="forget" role="tabpanel" aria-labelledby="registration-tab">
                        <form method="post" id="reg" onsubmit="return forget();">
                            <div class="maan-input-group">
                                <input type="text" required name="mobile" id="mobile" placeholder="请输入手机号码">
                                <span><i class="fas fa-mobile"></i></span>
                            </div>
                            <div class="maan-input-group">
                                <input type="text" required name="reg_code" placeholder="请输入验证码">
                                <span><a href="javascript:sms()" id="send_btn">马上发送</a></span>
                            </div>
                            <div class="maan-input-group">
                                <input type="password" required name="password" placeholder="请输入密码">
                                <span><i class="fa fa-eye-slash"></i></span>
                            </div>
                            <button type="submit" style="border: none" class="maan-primary-btn maan-btn">修改密码</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="Login" role="tabpanel" aria-labelledby="Login-tab">
                        <form method="post" id="login" onsubmit="return login();">
                            <div class="maan-input-group">
                                <input type="text" required name="name" placeholder="请输入用户名">
                                <span><i class="fas fa-user"></i></span>
                            </div>
                            <div class="maan-input-group">
                                <input type="password" required name="password" placeholder="* * * * * * * * * * * * *">
                                <span><i class="fa fa-eye-slash"></i></span>
                            </div>
                            <button type="submit" style="border: none" class="maan-primary-btn maan-btn">登录</button>
                            <span class="forget-pass">忘记密码 ? <a href="{{route('user.forget')}}">找回密码</a></span>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end login or register  -->

</main>

<div class="clearfix"></div>

<script>
    function login()
    {
        $.ajax({
            url: '{{user_login_path()}}',
            type: 'post',
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            dataType: "json",
            data: $('#login').serialize(),
            timeout: 60000,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (res) {
                alert(res.msg);
                location.href = '{{user_index_path()}}';
            },
            error: function (xhr) {
                alert(xhr.responseJSON.msg);
                return false;
            }
        });

        return false;
    }

    function forget()
    {

        $.ajax({
            url: '{{user_forget_path()}}',
            type: 'post',
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            dataType: "json",
            data: $('#reg').serialize(),
            timeout: 60000,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (res) {
                alert(res.msg);
                location.href = '{{user_login_path()}}';
            },
            error: function (xhr) {
                alert(xhr.responseJSON.msg);
                return false;
            }
        });

        return false;
    }
    function sms(obj)
    {
        var mobile = $('#mobile').val();

        if (mobile.length != 11) {
            alert('手机格式不正确');
            return false;
        }

        if (send_lock) {
            return false;
        }

        send_lock = true;

        $.ajax({
            url: '{{user_reg_code_path()}}',
            type: 'post',
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            dataType: "json",
            data: {"mobile":mobile},
            timeout: 60000,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (res) {
                countDown();
            },
            error: function (xhr) {
                alert(xhr.responseJSON.msg);
                return false;
            }
        });
    }

    var time = 60;
    var send_lock = false;
    function countDown()
    {
        if (time > 0) {
            $('#send_btn').text(time + "(S)");
            time--;
            setTimeout(countDown,1000);
        } else {
            time = 60;
            send_lock = false;
            $('#send_btn').text("马上发送");
        }
    }
</script>

@include("template::mycms.views._footer")
