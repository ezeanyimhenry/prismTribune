@extends('layouts.blog')

@section('content')
    <div class="container main-wrapper">

        <!-- End Main Banner -->
        <div class="mag-content clearfix">
            <div class="row">
                <div class="col-md-12">
                    <div class="ad728-wrapper">
                        <a href="#">
                            <img src="{{ asset('img/ban728.jpg') }}" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Banner -->
        <div class="main-content mag-content clearfix">

            <div class="row blog-content">
                <div class="col-md-12 post-wrapper fullwidth-header">
                    <header class="post-header">
                        <h1 class="post-title">
                            {{ $article['data']['title'] }}
                        </h1><!-- .post-title -->

                        <a href="#" class="category bgcolor2">
                            {{ $article['data']['category'] }}
                        </a>

                        <p class="simple-share">
                            <span> <a
                                    href="{{ $article['data']['url'] }}"><b>{{ $article['data']['source'] }}</b></a></span>
                            <span class="article-date"><i class="fa fa-clock-o"></i>
                                {{ \Carbon\Carbon::parse($article['data']['published_at'], 'Africa/Lagos')->diffForHumans() }}</span>
                            {{-- <span><i class="fa fa-eye"></i> 1349 views</span> --}}
                            {{-- <a class="comments-count" href="#comments">4</a> --}}
                        </p>

                        <figure class="image-overlay">
                            <img src="{{ $article['data']['thumbnail'] }}" alt="{{ $article['data']['title'] }}">
                        </figure>
                    </header><!-- .post-header -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <article class="post-wrapper clearfix">

                        <div class="post-content clearfix">
                            {!! formatContentToParagraphs($article['data']['content']) !!}

                        </div><!-- .post-content -->

                    </article><!-- .post-wrapper -->


                    <!-- Mid ad -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ad728-wrapper mid-wrapper">
                                <a href="#">
                                    <img src="{{ asset('img/ban728.jpg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Mid ad -->

                </div>

            </div><!-- .blog-content -->

        </div><!-- .main-content -->

        <!-- End Main Banner -->
        <div class="mag-content clearfix">
            <div class="row">
                <div class="col-md-12">
                    <div class="ad728-wrapper">
                        <a href="#">
                            <img src="{{ asset('img/ban728.jpg') }}" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Banner -->
    </div><!-- .main-wrapper -->
@endsection
