<!-- Footer -->
<footer class="footer source-org vcard copyright clearfix" id="footer" role="contentinfo">
    <div class="footer-main">
        <div class="fixed-main">
            <div class="container">
                <div class="mag-content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="footer-block clearfix">
                                <p class="clearfix">
                                    <a class="logo" href="/" title="prismTribune - Home for updated news"
                                        rel="home">
                                        <img src="{{ asset('img/logo-white.png') }}" alt="Logo"
                                            style="width: 150px;">
                                    </a><!-- .logo -->
                                </p>
                                <p class="description">
                                    Your comprehensive news hub. We curate stories from diverse sources across the web,
                                    bringing multiple perspectives together in one convenient location. Stay informed
                                    with our regularly updated collection of today's essential headlines.
                                </p>
                                <ul class="social-list clearfix">
                                    <li class="social-facebook">
                                        <a href="https://www.facebook.com/share/19us78UWDJ/?mibextid=wwXIfr"
                                            data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="Facebook">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="social-twitter" data-toggle="tooltip" data-placement="bottom"
                                        title="" data-original-title="Twitter">
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="social-instagram">
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="Instagram">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div><!-- Footer Block -->
                        </div>
                        <div class="col-md-2">
                            <div class="footer-block clearfix">
                                <h3 class="footer-title">Categories</h3>
                                <ul class="footer-menu">
                                    @foreach ($categories->take(10) as $category)
                                        <li><a
                                                href="{{ route('blog.posts', ['type' => 'category', 'category' => $category]) }}">{{ $category }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div><!-- Footer Block -->
                        </div>

                        <div class="col-md-3">
                            <div class="footer-block clearfix">
                                <h3 class="footer-title">Sources</h3>
                                <ul class="tags-widget">
                                    @foreach ($sources->take(15) as $source)
                                        <li><a
                                                href="{{ route('blog.posts', ['type' => 'source', 'source' => $source]) }}">{{ $source }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div><!-- Footer Block -->
                        </div>

                        <div class="col-md-3">
                            <div class="footer-block clearfix">
                                <h3 class="footer-title">Pages</h3>
                                <ul class="tags-widget">
                                    <li><a href="{{ route('page', 'policy') }}">Privacy policy</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                </ul>
                            </div><!-- Footer Block -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom clearfix">
        <div class="fixed-main">
            <div class="container">
                <div class="mag-content">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Copyright prismTribune © {{ date('Y') }}. All Rights Reserved</p>
                        </div>

                        <div class="col-md-6">
                            <div class="social-icons pull-right">
                                <a href="https://www.facebook.com/share/19us78UWDJ/?mibextid=wwXIfr"><i
                                        class="fa fa-facebook"></i></a>
                                <a href="https://x.com/prismtribune?s=21&t=lHyHeLDt-9jfvOkkM_sPHA"><i
                                        class="fa fa-twitter"></i></a>
                                <a href="https://www.instagram.com/prismtribune?igsh=MWNrcWhrM3U0azUwNg=="><i
                                        class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->
