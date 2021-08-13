define(["easy-admin"], function (ea) {

    return {
        index: function () {

            if (top.location !== self.location) {
                top.location = self.location;
            }

            $('.bind-password').on('click', function () {
                if ($(this).hasClass('icon-5')) {
                    $(this).removeClass('icon-5');
                    $("input[name='password']").attr('type', 'password');
                } else {
                    $(this).addClass('icon-5');
                    $("input[name='password']").attr('type', 'text');
                }
            });

            $('.icon-nocheck').on('click', function () {
                if ($(this).hasClass('icon-check')) {
                    $(this).removeClass('icon-check');
                } else {
                    $(this).addClass('icon-check');
                }
            });

            $('.login-tip').on('click', function () {
                $('.icon-nocheck').click();
            });

            ea.listen(function (data) {
                data['keep_login'] = $('.icon-nocheck').hasClass('icon-check') ? 1 : 0;
                return data;
            }, function (res) {
                ea.msg.success(res.msg || '操作成功', function () {
                    window.location = '/system/index';
                })
            }, function (res) {
                ea.msg.error(res.msg || '操作失败', function () {
                    $('#refreshCaptcha').trigger("click");
                });
            });

        },
    };
});
