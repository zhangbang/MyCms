@include("system::admin.layouts._header")
<body>
<div class="layuimini-container">
    <div class="layuimini-main" id="app">

        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <li class="layui-this">系统设置</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <form id="app-form" class="layui-form layuimini-form" method="post">
                        @csrf
                        <div class="layui-form-item">
                            <label class="layui-form-label required">站点名称</label>
                            <div class="layui-input-block">
                                <input type="text" name="site_name" class="layui-input" lay-verify="required" placeholder="请输入站点名称" value="{{$systemConfig['site_name']}}">
                                <tip>填写站点名称</tip>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label required">站点网址</label>
                            <div class="layui-input-block">
                                <input type="text" name="site_url" class="layui-input" lay-verify="required" placeholder="请输入站点网址" value="{{$systemConfig['site_url']}}">
                                <tip>填写站点网址</tip>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">站点Logo</label>
                            <div class="layui-input-block layuimini-upload">
                                <input name="site_logo" class="layui-input layui-col-xs6" placeholder="请上传LOGO图标" value="{{$systemConfig['site_logo']}}">
                                <div class="layuimini-upload-btn">
                                    <span><a class="layui-btn" data-upload="site_logo" data-upload-number="one" data-upload-exts="ico|png|jpg|jpeg"><i class="fa fa-upload"></i> 上传</a></span>
                                </div>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">备案号</label>
                            <div class="layui-input-block">
                                <input type="text" name="site_icp" class="layui-input" placeholder="请输入站点网址" value="{{$systemConfig['site_icp']}}">
                            </div>
                        </div>

                        @if ($themes = system_themes())
                        <div class="layui-form-item">
                            <label class="layui-form-label">模板主题</label>
                            <div class="layui-input-block">
                                <select name="cms_theme">
                                    @foreach($themes as $theme)
                                    <option value="{{$theme['ident']}}" @if((!isset($systemConfig['cms_theme']) && $theme['ident'] == 'default') || (isset($systemConfig['cms_theme']) && $theme['ident'] == $systemConfig['cms_theme'])) selected @endif>{{$theme['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif

                        <div class="layui-form-item">
                            <label class="layui-form-label">首页模板</label>
                            <div class="layui-input-block">
                                <select name="site_home_theme">
                                    <option value="default" @if(isset($systemConfig['site_home_theme']) && $systemConfig['site_home_theme'] == 'default') selected @endif>默认首页</option>
                                    <option value="cms" @if(isset($systemConfig['site_home_theme']) && $systemConfig['site_home_theme'] == 'cms') selected @endif>CMS首页</option>
                                    <option value="{{$systemConfig['site_home_theme'] ?? ''}}" @if(isset($systemConfig['site_home_theme']) && !in_array($systemConfig['site_home_theme'],['cms','default'])) selected @endif>插件首页</option>
                                </select>
                            </div>
                        </div>

                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">版权信息</label>
                            <div class="layui-input-block">
                                <textarea name="site_copyright" class="layui-textarea">{{$systemConfig['site_copyright']}}</textarea>
                            </div>
                        </div>

                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">头部自定义js</label>
                            <div class="layui-input-block">
                                <textarea name="site_header_js" class="layui-textarea">{{$systemConfig['site_header_js'] ?? ''}}</textarea>
                                <tip>常用于放置统计代码</tip>
                            </div>
                        </div>

                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">文件上传</label>
                            <div class="layui-input-block">
                                <select name="site_upload_disk">
                                    <option value="root" @if(isset($systemConfig['site_upload_disk']) && $systemConfig['site_upload_disk'] == 'root') selected @endif>本地</option>
                                    <option value="oss" @if(isset($systemConfig['site_upload_disk']) && $systemConfig['site_upload_disk'] == 'oss') selected @endif>阿里云OSS</option>
                                </select>
                            </div>
                        </div>


                        <div class="hr-line"></div>
                        <div class="layui-form-item text-center">
                            <button type="submit" class="layui-btn layui-btn-normal layui-btn-sm" lay-submit data-refresh="false">确认</button>
                            <button type="reset" class="layui-btn layui-btn-primary layui-btn-sm">重置</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>

    </div>
</div>
</body>
</html>
