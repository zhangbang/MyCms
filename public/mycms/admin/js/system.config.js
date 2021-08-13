define(["jquery", "easy-admin", "vue"], function ($, ea, Vue) {

    var form = layui.form;

    return {
        index: function () {

            var app = new Vue({
                el: '#app',
                data: {
                    upload_type: 'local'
                }
            });

            form.on("radio(upload_type)", function (data) {
                app.upload_type = this.value;
            });

            ea.listen();
        }
    };
});
