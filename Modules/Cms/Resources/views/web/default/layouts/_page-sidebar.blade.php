<aside id="sidebar">

    <div class="widget">
        <div class="search-form clearfix">
            <input type="text" name="keyword" id="keyword" placeholder="Search...">
            <button type="button" onclick="location.href = '/search/' + $('#keyword').val();"><i class="fa fa-search"></i></button>
        </div>
    </div>

    <div class="widget">
        <h4>Case</h4>
        <p>在线计算网：<a href="https://www.zaixianjisuan.com/" target="_blank">https://www.zaixianjisuan.com/</a> </p>
        <p>程序员导航：<a href="https://nav.mycms.net.cn/" target="_blank">https://nav.mycms.net.cn/</a> </p>
    </div>

    <div class="widget">
        <h4>About</h4>
        <p>MyCms是一款基于Laravel8+layuimini开发的模块化后台管理系统。MyCms基于Apache2.0开源协议发布，免费且不限制商业使用，欢迎持续关注我们。源码地址：<a href="https://gitee.com/qq386654667/mycms" target="_blank" rel="nofollow" style="color: blue">Gitee</a>，技术交流QQ群：887522124 加群请备注来源：如gitee、github、官网等</p>
    </div>

    <div class="widget">
        {!! call_hook_function('ad','sidebar_ad') !!}
    </div>

    <div class="widget">
        <h4>Advantage</h4>
        <p>
            1.内置权限管理 & 使用Laravel中间件实现更智能的RBAC权限管理，自动读取更新，无需手动插入节点，告别手工插入时代<br/>
            2.模块化开发 & 万丈高楼平地起，打下扎实的基础，采用Laravel-module实现模块化，降低耦合度，分工更明确，为做大做强创造无限可能<br/>
            3.JS整合封装 & 后台采用Layuimini进行开发，对表格、表单进行封装，统一样式，统一交互，开发更快捷，使用更舒服<br/>
            4.响应式开发 & 后台页面基于Layui开发，手机、平板、PC均已自动适配，无需担心兼容性问题，专注业务逻辑代码开发<br/>
            5.更快的PHP7 & 系统基于PHP7.3+进行开发，相比PHP5有倍级的性能提升，更完善的类型声明，PHP是世界上最好的开发语言。<br/>
            6.高拓展性 & 基于Laravel8进行后台程序开发，让您从杂乱的代码解脱出来，高质量的文档，丰富的拓展包，开发更高效，代码更优雅<br/>
        </p>
    </div>
    <div class="widget">
        <h4>Latest Posts</h4>
        <ul>
            @foreach(cms_new_articles() as $article)
                <li><a href="{{cms_single_path($article->id)}}">{{$article->title}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="widget">
        <h4>Categories</h4>
        <ul>
            @foreach(cms_categories() as $category)
                <li><a href="{{cms_category_path($category->id)}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="widget tagcloud">
        <h4>Tags</h4>
        @foreach(cms_tags() as $tag)
            <a href="{{cms_tag_path($tag->id)}}">{{$tag->tag_name}}</a>
        @endforeach
    </div>
</aside>
