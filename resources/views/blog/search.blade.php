@extends('layouts.blog')

@section('content')
    <!-- Begin Main Wrapper -->
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
                <div class="col-md-8">
                    <h3 class="tag-title">Search results: <span>{{ $search ?? '' }}</span></h3>

                    @foreach ($posts['data']['data'] as $post)
                        <article class="simple-post simple-big clearfix">
                            <div class="simple-thumb">

                                <a href="#">
                                    <img src="{{ $post['thumbnail'] }}" alt="{{ $post['title'] }}">
                                </a>
                            </div>
                            <header>
                                <p class="simple-share">
                                    <a href="#">{{ $post['category'] }}</a> /
                                    <a href="{{ $post['url'] }}">{{ $post['source'] }}</a> -
                                    <span><i
                                            class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($post['published_at'], 'Africa/Lagos')->diffForHumans() }}</span>
                                </p>

                                <h3>
                                    <a href="{{ route('blog.show', $post['id']) }}">{{ $post['title'] }}</a>
                                </h3>

                                <p class="excerpt">
                                    {{ Str::limit($post['content'] ?? '', 150) }}
                                </p>
                            </header>
                        </article>
                    @endforeach

                    {{-- <div class="load-more">
                        <a href="https://grownwrecking.com/ut548hvj?key=c1165ba68652ab5bf106deb1f21309d4" target="_blank"
                            type="button" class="btn btn-lg btn-block">Load more</a>
                    </div> --}}

                </div><!-- End Left big column -->

                @include('layouts.inc.sidebar')
            </div><!-- .main-body -->

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
