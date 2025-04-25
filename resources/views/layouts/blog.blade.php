<!doctype html>
<html>
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

@include('layouts.inc.head')

<body>
    <div id="main" class="header-style1">

        @include('layouts.inc.header')

        @yield('content')

        @include('layouts.inc.footer')

    </div><!-- End Main -->

    <!-- Mobile Menu -->
    <nav id="mobile-nav">
        <div>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                    <ul>
                        <li><a href="index.html">Home - All Block</a></li>
                        <li>
                            <a href="#">Home - Grid Style</a>
                            <ul>
                                <li><a href="grid_sidebar.html">With Sidebar</a></li>
                                <li><a href="grid.html">No Sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Home - Blog Style</a>
                            <ul>
                                <li><a href="blog_classic.html">Classic Blog</a></li>
                                <li><a href="blog_modern.html">Modern Blog</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Home - Minimal Style</a>
                            <ul>
                                <li><a href="minimal.html">2 Columns</a></li>
                                <li><a href="minimal_sidebar.html">2 Columns With Sidebar</a></li>
                                <li><a href="minimal_full.html">3 Columns</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Home - Fixed Sidebar</a>
                            <ul>
                                <li><a href="fixed_left.html">Fixed Left Sidebar</a></li>
                                <li><a href="fixed_right.html">Fixed Right Sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Home - 3 Different Columns</a>
                            <ul>
                                <li><a href="left_big.html">Left Big Column</a></li>
                                <li><a href="right_big.html">Right Big Column</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="grid.html">Tech</a>
                    <ul>
                        <li><a href="#">Reviews</a></li>
                        <li><a href="#">Apps</a></li>
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Gadgets</a></li>
                        <li><a href="#">Mobile</a></li>
                    </ul>
                </li>

                <li>
                    <a href="minimal_blog.html">Lifestyle</a>
                    <ul>
                        <li><a href="#">Love</a></li>
                        <li><a href="#">Advice</a></li>
                        <li><a href="#">Food</a></li>
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Fashion</a></li>
                    </ul>
                </li>

                <li><a href="blog_modern.html">Business</a></li>

                <li><a href="header-style3.html">Entertainment</a></li>

                <li>
                    <a href="#">Features</a>
                    <ul>
                        <li>
                            <a href="index.html">Header Style</a>
                            <ul>
                                <li><a href="index.html">Header Style 1</a></li>
                                <li><a href="header-style2.html">Header Style 2</a></li>
                                <li><a href="header-style3.html">Header Style 3</a></li>
                                <li><a href="fixed_left.html">Header Style 4</a></li>
                            </ul>
                        </li><!-- .dropdown-submenu -->
                        <li>
                            <a href="index.html">Footer Style</a>
                            <ul>
                                <li><a href="index.html#footer">Footer Style 1</a></li>
                                <li><a href="footer-style2.html#footer">Footer Style 2</a></li>
                            </ul>
                        </li><!-- .dropdown-submenu -->

                        <li>
                            <a href="#">Pages</a>
                            <ul>
                                <li><a href="page.html">About Page</a></li>
                                <li><a href="page_contact.html">Contact Page</a></li>
                                <li><a href="page_author.html">Author page</a></li>
                                <li><a href="page_tags.html">Tags page</a></li>
                                <li><a href="page_search.html">Search page</a></li>
                                <li><a href="page_404.html">404 page</a></li>
                            </ul>
                        </li><!-- .dropdown-submenu -->

                        <li>
                            <a href="#">Posts</a>
                            <ul>
                                <li><a href="post_simple.html">Simple Post</a></li>
                                <li><a href="post_review.html">Review Post</a></li>
                                <li><a href="post_parallax.html">Parallax post</a></li>
                                <li><a href="post_fullwidth.html">Full Width Post</a></li>
                                <li><a href="post_fixed.html">Fixed Sidebar Post</a></li>
                                <li><a href="post_slider.html">Gallery Post</a></li>
                                <li><a href="post_video.html">Video Post</a></li>
                            </ul>
                        </li><!-- .dropdown-submenu -->

                        <li>
                            <a href="#">Category Layouts</a>
                            <ul>
                                <li><a href="blog_classic.html">Classic blog</a></li>
                                <li><a href="blog_modern.html">Modern blog</a></li>
                                <li><a href="grid_sidebar.html">Grid blog</a></li>
                                <li><a href="minimal_blog.html">Minimal blog</a></li>
                                <li><a href="fixed_blog.html">Fixed sidebar blog</a></li>
                                <li><a href="big_blog.html">Left big column blog</a></li>
                            </ul>
                        </li><!-- .dropdown-submenu -->

                        <li><a href="page_typography.html">Typography</a></li>
                        <li><a href="page_shortcodes.html">Shortcodes</a></li>
                    </ul><!-- dropdown-menu -->
                </li>
            </ul>
        </div>
    </nav>
    <!-- / Mobile Menu -->
    <div id="go-top-button" class="fa fa-angle-up" title="Scroll To Top"></div>

    <div class="mobile-overlay" id="mobile-overlay"></div>



    <!-- Style Customizer -->

    <div class="customizer">

        <div id="customizer-button" class="customizer-button">

            <i class="fa fa-cog"></i>

        </div>

        <div class="customizer-content clearfix">

            <div class="customizer-item clearfix">

                <h5>Layout Style</h5>

                <ul>

                    <li class="active" data-class="boxed"><span>Boxed</span></li>

                    <li data-class="wide"><span>Wide</span></li>

                </ul>

            </div>



            <div class="customizer-item clearfix">

                <h5>Template Style</h5>

                <ul>

                    <li class="active" data-class="light"><span>Light</span></li>

                    <li data-class="dark-skin"><span>Dark</span></li>

                </ul>

            </div>



            <div class="customizer-item clearfix">

                <h5>Sticky Header</h5>

                <ul>

                    <li class="active" data-class="fixed-header"><span>Enable</span></li>

                    <li data-class="relative-header"><span>Disable</span></li>

                </ul>

            </div>



            <div class="customizer-item clearfix customizer-colors">

                <h5>Template Color</h5>

                <ul>

                    <li class="template-color1 active" data-class="body-color1"><span></span></li>

                    <li class="template-color2" data-class="body-color2"><span></span></li>

                    <li class="template-color3" data-class="body-color3"><span></span></li>

                    <li class="template-color4" data-class="body-color4"><span></span></li>

                    <li class="template-color5" data-class="body-color5"><span></span></li>

                    <li class="template-color6" data-class="body-color6"><span></span></li>

                </ul>

            </div>



            <div class="customizer-item clearfix customizer-colors customizer-bg">

                <h5>Background Images</h5>

                <ul>

                    <li class="no-background" data-class="no-background" class="active"><span></span></li>

                    <li class="background-image1" data-class="background-image1"><span></span></li>

                    <li class="background-image2" data-class="background-image2"><span></span></li>

                    <li class="background-image3" data-class="background-image3"><span></span></li>

                    <li class="background-image4" data-class="background-image4"><span></span></li>

                </ul>

            </div>

        </div>

    </div>



    <!-- Jquery js -->

    <script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>



    <!-- Modernizr -->

    <script src="{{ asset('js/modernizr.min.js') }}"></script>



    <!-- Bootstrap js -->

    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>



    <!-- Google map api -->

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>



    <!-- Theme js -->

    <script src="{{ asset('js/script.min.js') }}"></script>

    <script>
        function allConsentGranted() {
            gtag('consent', 'update', {
                'ad_user_data': 'granted',
                'ad_personalization': 'granted',
                'ad_storage': 'granted',
                'analytics_storage': 'granted'
            });
        }
    </script>

    <!-- Cookie Consent by TermsFeed https://www.TermsFeed.com -->
    <script type="text/javascript" src="https://www.termsfeed.com/public/cookie-consent/4.2.0/cookie-consent.js"
        charset="UTF-8"></script>
    <script type="text/javascript" charset="UTF-8">
        document.addEventListener('DOMContentLoaded', function() {
            cookieconsent.run({
                "notice_banner_type": "simple",
                "consent_type": "express",
                "palette": "dark",
                "language": "en",
                "page_load_consent_levels": ["strictly-necessary"],
                "notice_banner_reject_button_hide": false,
                "preferences_center_close_button_hide": false,
                "page_refresh_confirmation_buttons": false,
                "website_name": "prismTribune",
                "website_privacy_policy_url": "https://prismtribune-main-2nezb2.laravel.cloud/page/policy"
            });
        });
    </script>

    <!-- Google Analytics -->
    <script type="text/plain" data-cookie-consent="strictly-necessary" async src="https://www.googletagmanager.com/gtag/js?id=G-7XWQ73NQBE"></script>
    <script type="text/plain" data-cookie-consent="strictly-necessary">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-7XWQ73NQBE');

        gtag('consent', 'update', {
            'ad_user_data': 'granted',
            'ad_personalization': 'granted',
            'ad_storage': 'granted',
            'analytics_storage': 'granted'
        });
    </script>
    <!-- end of Google Analytics-->

    <noscript>Free cookie consent management tool by <a href="https://www.termsfeed.com/">TermsFeed
            Generator</a></noscript>
    <!-- End Cookie Consent by TermsFeed https://www.TermsFeed.com -->





    <!-- Below is the link that users can use to open Preferences Center to change their preferences. Do not modify the ID parameter. Place it where appropriate, style it as needed. -->

    <a href="#" id="open_preferences_center">Update cookies preferences</a>


</body>

</html>
