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

    @include('layouts.inc.mobile-menu')
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

    <script type="text/javascript">
        var infolinks_pid = 3435614;
        var infolinks_wsid = 0;
    </script>
    <script type="text/javascript" src="//resources.infolinks.com/js/infolinks_main.js"></script>
    {{-- <script>
        setTimeout(function() {
            window.open("https://grownwrecking.com/vhp3u9k0?key=05f98bb82899f55f118a2f1f6312cf13", "_blank");
        }, 5000);
    </script> --}}
</body>

</html>
