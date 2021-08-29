<footer id="footer-main">
    <div class="container">
        <div class="row">
            <div id="foot-left" style="padding: 0 15px;font-size: 14px;">
                <p>© 2021 MyCms. @if(($icp = system_config('site_icp')) !== null)<a target="_blank" href="https://beian.miit.gov.cn">{{$icp}}</a>@endif
                    @foreach(friend_link() as $link)
                        <a href="{{$link->url}}" target="{{$link->target}}">{{$link->name}}</a>
                    @endforeach
                </p>
            </div>
        </div>
    </div>
</footer>
