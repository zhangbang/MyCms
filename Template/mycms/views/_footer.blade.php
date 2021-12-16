<!-- Start Footer
	============================================= -->
<footer>
    <div class="footer-widget">
        <div class="copyright">
            <p class="mb-0" style="text-align: center">
                @if($links = friend_link())
                    友情链接：
                    @foreach($links as $link)
                        <a href="{{$link->url}}" target="{{$link->target}}">{{$link->name}}</a>
                    @endforeach
                    <br/>
                @endif

                © Copyright <a href="https://www.mycms.net.cn/">MyCms</a> 2021. All Right Reserved.@if(($icp = system_config('site_icp')) !== null)<a
                    target="_blank" href="https://beian.miit.gov.cn">{{$icp}}</a>@endif</p>
        </div>
    </div>
</footer>
<!-- End Footer-->

<!-- Start Scroll top
============================================= -->
<a href="#bdy" id="scrtop" class="smooth-menu"><i class="ti-arrow-up"></i></a>
<!-- End Scroll top-->

<!-- jQuery Frameworks
============================================= -->
<script src="/mycms/cms/theme/mycms/assets/js/jquery-3.5.0.min.js"></script>
<script src="/mycms/cms/theme/mycms/assets/js/jquery.easing.min.js"></script>
<script src="/mycms/cms/theme/mycms/assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="/mycms/cms/theme/mycms/assets/js/popper.min.js"></script>
<script src="/mycms/cms/theme/mycms/assets/js/bootstrap.min.js"></script>
<script src="/mycms/cms/theme/mycms/assets/js/bootstrap-menu.js"></script>
<script src="/mycms/cms/theme/mycms/assets/js/wow.min.js"></script>
<script src="/mycms/cms/theme/mycms/assets/js/isotope.pkgd.min.js"></script>
<script src="/mycms/cms/theme/mycms/assets/js/jquery.fancybox.js"></script>
<script src="/mycms/cms/theme/mycms/assets/js/jquery.appear.js"></script>
<script src="/mycms/cms/theme/mycms/assets/js/count-to.js"></script>
<script src="/mycms/cms/theme/mycms/assets/js/owl.carousel.min.js"></script>
<script src="/mycms/cms/theme/mycms/assets/js/main.js"></script>

</body>

</html>
