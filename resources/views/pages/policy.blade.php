@extends('layouts.blog')

@section('content')
    <!-- Parallax Header -->
    <div class="parallax-header page-wrapper">

        <!-- Parallax image -->
        <div class="parallax-image" id="parallax-image" data-stellar-ratio="0.5" data-image="{{ asset('img/page1.jpg') }}">
        </div>

        <!-- Post title and meta -->
        <div class="parallax-wrapper">
            <div class="container">
                <div class="mag-content parallax-box">
                    <div class="row">
                        <div class="col-md-12 parallax-box">
                            <header class="page-header">
                                <h1 class="page-title">
                                    Privacy Policy
                                </h1><!-- .post-title -->

                                <p class="page-description">
                                    Our Privacy policy.
                                </p>
                            </header><!-- .post-header -->
                        </div><!-- .col-md-12 -->
                    </div><!-- .row -->
                </div>
            </div><!-- .container -->

        </div><!-- .parallax-wrapper -->
    </div><!-- .parallax-header -->


    <!-- Post body -->
    <div class="container">
        <div class="main-content mag-content clearfix">
            <div class="row">
                <div class="col-md-12">
                    <article class="post-wrapper">
                        <div class="post-content clearfix">

                            <h1>Privacy Policy</h1>
                            <p class="updated">Last Updated: April 23, 2025</p>

                            <p>Welcome to PrismTribune ("we," "our," or "us"). We respect your privacy and are committed
                                to protecting your personal information. This Privacy Policy explains how we collect,
                                use, disclose, and safeguard your information when you visit our website.</p>

                            <h2>Information We Collect</h2>
                            <p>We may collect information about you in a variety of ways. The information we may collect
                                via the website includes:</p>
                            <p><strong>Personal Data:</strong> While using our website, we may ask you to provide
                                certain personally identifiable information that can be used to contact or identify you.
                                This may include your name, email address, and optional demographic information if you
                                choose to subscribe to our newsletter or create an account.</p>
                            <p><strong>Usage Data:</strong> We automatically collect information about how you interact
                                with our website, including your IP address, browser type, pages viewed, time spent on
                                pages, and referring website address.</p>
                            <p><strong>Cookies:</strong> We use cookies and similar tracking technologies to track
                                activity on our website and hold certain information. Cookies are files with small
                                amounts of data that may include an anonymous unique identifier.</p>

                            <h2>How We Use Your Information</h2>
                            <p>We may use the information we collect about you for various purposes, including to:</p>
                            <p>- Provide, maintain, and improve our website</p>
                            <p>- Personalize your experience</p>
                            <p>- Send periodic emails if you opt-in to our newsletter</p>
                            <p>- Monitor and analyze usage patterns and trends</p>
                            <p>- Address technical issues</p>

                            <h2>Disclosure of Your Information</h2>
                            <p>We may share information we have collected about you in certain situations. Your
                                information may be disclosed as follows:</p>
                            <p><strong>By Law or to Protect Rights:</strong> We may disclose your information where
                                required to do so by law or when we believe disclosure is necessary to protect our
                                rights or the rights of others.</p>
                            <p><strong>Third-Party Service Providers:</strong> We may share your information with third
                                parties that perform services for us or on our behalf, including payment processing,
                                data analysis, email delivery, hosting services, and customer service.</p>
                            <p><strong>Marketing Communications:</strong> With your consent, we may share your
                                information with third parties for marketing purposes.</p>

                            <h2>Security of Your Information</h2>
                            <p>We use administrative, technical, and physical security measures to protect your personal
                                information. While we have taken reasonable steps to secure the information you provide
                                to us, please be aware that no security measures are perfect or impenetrable, and we
                                cannot guarantee the security of your information.</p>

                            <h2>Your Choices About Your Information</h2>
                            <p><strong>Cookies:</strong> Most web browsers are set to accept cookies by default. You can
                                usually choose to set your browser to remove or reject cookies.</p>
                            <p><strong>Email Communications:</strong> You can unsubscribe from our marketing email list
                                at any time by clicking on the unsubscribe link in the emails that we send.</p>
                            <p><strong>Account Information:</strong> You can review and change your personal information
                                by logging into your account settings.</p>

                            <h2>Children's Privacy</h2>
                            <p>Our website is not intended for children under 13 years of age. We do not knowingly
                                collect personal information from children under 13.</p>

                            <h2>Changes to This Privacy Policy</h2>
                            <p>We may update our Privacy Policy from time to time. We will notify you of any changes by
                                posting the new Privacy Policy on this page and updating the "Last Updated" date.</p>

                            <h2>Contact Us</h2>
                            <p>If you have questions or concerns about this Privacy Policy, please contact us at:</p>
                            <p>PrismTribune<br>
                                Email: privacy@prismtribune.com</p>


                        </div><!-- .post-content -->

                    </article><!-- .post-wrapper -->

                </div><!-- .col-md-12 -->

            </div><!-- .row -->

        </div><!-- .main-content -->

    </div><!-- .container -->
@endsection
