@extends('layouts.blog')

@section('content')
    <!-- Begin Main Wrapper -->
    <div class="container main-wrapper">

        <!-- End Main Banner -->
        <div class="mag-content clearfix">
            <div class="row">
                <div class="col-md-12">
                    <div class="ad728-wrapper">
                        {{-- <script type="text/javascript">
                            atOptions = {
                                'key': '42a2f6395a93dc8b234e167f5fc3d6cd',
                                'format': 'iframe',
                                'height': 90,
                                'width': 728,
                                'params': {}
                            };
                        </script>
                        <script type="text/javascript" src="//grownwrecking.com/42a2f6395a93dc8b234e167f5fc3d6cd/invoke.js"></script> --}}
                        {{-- <a href="#">
                            <img src="img/ban728.jpg" alt="" />
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Banner -->
        <div class="main-content mag-content clearfix">

            <div class="row">
                <div class="col-sm-12">
                    <ul class="tag-list clearfix">
                        <li class="trending">#Sources</li>
                        @foreach ($sources as $source)
                            <li><a
                                    href="{{ route('blog.posts', ['type' => 'source', 'source' => $source]) }}">{{ $source }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row featured-wrapper">
                <div class="col-md-12">
                    <div class="flexslider">
                        <div class="featured-slider">
                            @php
                                $articles = collect($featured['data']['data']);
                                $chunks = $articles->chunk(3)->take(5);
                            @endphp
                            @foreach ($chunks as $group)
                                @php
                                    $main = $group->first();
                                    $subs = $group->slice(1);
                                @endphp
                                <div class="slider-item">
                                    <div class="row">
                                        <div class="col-md-8 omega">
                                            <div class="featured-big">
                                                @php
                                                    $id = $main['id'];
                                                @endphp
                                                <a href="{{ route('blog.show', $id) }}" class="featured-href">

                                                    <img src="{{ $main['thumbnail'] }}" alt="{{ $main['title'] }}">
                                                    <div class="featured-header">
                                                        <span class="category bgcolor2">{{ $main['category'] }}</span>
                                                        <h2>{{ $main['title'] }}</h2>
                                                        <p class="simple-share">
                                                            {{ $main['source'] }} -
                                                            <span
                                                                class="article-date">{{ \Carbon\Carbon::parse($main['published_at'], 'Africa/Lagos')->diffForHumans() }}</span>
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-4 alpha">
                                            @foreach ($subs as $sub)
                                                <div class="featured-small {{ $loop->first ? 'featured-top' : '' }}">
                                                    <a href="{{ route('blog.show', $sub['id']) }}" class="featured-href">
                                                        <img src="{{ $sub['thumbnail'] }}" alt="{{ $sub['title'] }}">
                                                        <div class="featured-header">
                                                            <span class="category bgcolor5">{{ $sub['category'] }}</span>
                                                            <h2>{{ $sub['title'] }}</h2>
                                                            <p class="simple-share">
                                                                {{ $sub['source'] }} -
                                                                <span
                                                                    class="article-date">{{ \Carbon\Carbon::parse($sub['published_at'])->timezone('Africa/Lagos')->diffForHumans() }}</span>
                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div><!-- .row -->
                                </div><!-- .slider-item -->
                            @endforeach
                        </div><!-- .featured-slider -->
                    </div><!-- .flexslider -->
                </div>
            </div><!-- .featured-wrapper -->

            <div class="row main-body" data-stickyparent>
                <div class="col-md-8">
                    <section class="admag-block">
                        <div class="row">
                            @php
                                $recentArticles = collect($featured['data']['data'] ?? [])
                                    ->sortByDesc('published_at')
                                    ->take(12);
                            @endphp
                            <div class="col-md-3">
                                <div class="news-feed">
                                    <h3 class="block-title"><span>Just Posted</span></h3>
                                    <ul class="widget-content">
                                        @foreach ($recentArticles as $article)
                                            <li>
                                                <article>
                                                    <h3>
                                                        <a
                                                            href="{{ route('blog.show', $article['id']) }}">{{ $article['title'] }}</a>
                                                    </h3>
                                                    <p><span><i class="fa fa-clock-o"></i>
                                                            {{ \Carbon\Carbon::parse($article['published_at'])->timezone('Africa/Lagos')->diffForHumans() }}</span>
                                                    </p>
                                                </article>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @php

                                // Get all articles from $data['data'] with that category
                                $filteredArticles = $randomCategoryArticles;

                                // Separate the main article from the rest
                                $mainArticle = $filteredArticles->first();
                                $simplePosts = $filteredArticles->slice(1);

                            @endphp
                            <div class="col-md-9">

                                @if ($mainArticle)
                                    <article class="news-block">
                                        <a href="{{ route('blog.show', $mainArticle['id']) }}" class="overlay-link">
                                            <figure class="image-overlay">
                                                <img src="{{ $mainArticle['thumbnail'] }}"
                                                    alt="{{ $mainArticle['title'] }}">
                                            </figure>
                                        </a>
                                        <a href="{{ route('blog.posts', ['type' => 'category', 'category' => $mainArticle['category']]) }}"
                                            class="category">
                                            {{ $mainArticle['category'] }}
                                        </a>
                                        <div class="news-details">
                                            <h3 class="news-title">
                                                <a
                                                    href="{{ route('blog.show', $mainArticle['id']) }}">{{ $mainArticle['title'] }}</a>
                                            </h3>
                                            <p>{{ Str::limit($mainArticle['content'] ?? '', 150) }}</p>
                                            <p class="simple-share">
                                                <a
                                                    href="{{ $mainArticle['url'] }}"><b>{{ $mainArticle['source'] }}</b></a>
                                                -
                                                <span class="article-date">
                                                    <i class="fa fa-clock-o"></i>
                                                    {{ \Carbon\Carbon::parse($mainArticle['published_at'])->timezone('Africa/Lagos')->diffForHumans() }}
                                                </span>
                                            </p>
                                        </div>
                                    </article>
                                @endif

                                @foreach ($simplePosts as $article)
                                    <article class="simple-post clearfix">
                                        <div class="simple-thumb">
                                            <a href="{{ route('blog.show', $article['id']) }}"><img
                                                    src="{{ $article['thumbnail'] }}" alt="{{ $article['title'] }}"></a>
                                        </div>
                                        <header>
                                            <h3><a
                                                    href="{{ route('blog.show', $article['id']) }}">{{ $article['title'] }}</a>
                                            </h3>
                                            <p class="simple-share">
                                                <a
                                                    href="{{ route('blog.posts', ['type' => 'category', 'category' => $article['category']]) }}">{{ $article['category'] }}</a>
                                                /
                                                <a href="{{ $article['url'] }}">{{ $article['source'] }}</a> -
                                                <span><i class="fa fa-clock-o"></i>
                                                    {{ \Carbon\Carbon::parse($article['published_at'])->timezone('Africa/Lagos')->diffForHumans() }}
                                                </span>
                                            </p>
                                        </header>
                                    </article>
                                @endforeach

                            </div><!-- End mid column -->
                        </div>
                    </section>
                    @php
                        // Filter articles for this second category
                        $secondFilteredArticles = $secondRandomCategoryArticles; // 1 big + 6 small

                        $secondMain = $secondFilteredArticles->first();
                        $secondSubs = $secondFilteredArticles->slice(1);
                    @endphp
                    <!-- BEGIN BLOCK 2 -->
                    <section class="news-text-block">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="block-title"><span><a
                                            href="{{ route('blog.posts', ['type' => 'category', 'category' => $secondRandomCategory]) }}">{{ $secondRandomCategory }}</a></span>
                                </h3>

                                @if ($secondMain)
                                    <article class="news-block big-block">
                                        <a href="{{ route('blog.show', $secondMain['id']) }}" class="overlay-link">
                                            <figure class="image-overlay">
                                                <img src="{{ $secondMain['thumbnail'] }}"
                                                    alt="{{ $secondMain['title'] }}">
                                            </figure>
                                        </a>
                                        <a href="{{ route('blog.posts', ['type' => 'category', 'category' => $secondMain['category']]) }}"
                                            class="category">
                                            {{ $secondMain['category'] }}
                                        </a>
                                        <header class="news-details">
                                            <h3 class="news-title">
                                                <a
                                                    href="{{ route('blog.show', $secondMain['id']) }}">{{ $secondMain['title'] }}</a>
                                            </h3>
                                            <p>{{ \Illuminate\Support\Str::limit($secondMain['content'], 200) }}</p>
                                            <p class="simple-share">
                                                {{ $secondMain['source'] ?? 'Unknown' }} -
                                                <span class="article-date">
                                                    <i class="fa fa-clock-o"></i>
                                                    {{ \Carbon\Carbon::parse($secondMain['published_at'])->diffForHumans() }}
                                                </span>
                                            </p>
                                        </header>
                                    </article>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            @foreach ($secondSubs as $sub)
                                <div class="col-md-6">
                                    <article class="news-block small-block">
                                        <a href="{{ route('blog.show', $sub['id']) }}" class="overlay-link">
                                            <figure class="image-overlay">
                                                <img src="{{ $sub['thumbnail'] }}" alt="{{ $sub['title'] }}">
                                            </figure>
                                        </a>
                                        <a href="{{ route('blog.posts', ['type' => 'category', 'category' => $sub['category']]) }}"
                                            class="category">
                                            {{ $sub['category'] }}
                                        </a>
                                        <header class="news-details">
                                            <h3 class="news-title">
                                                <a href="{{ route('blog.show', $sub['id']) }}">{{ $sub['title'] }}</a>
                                            </h3>
                                            <p class="simple-share">
                                                {{ $sub['source'] ?? 'Unknown' }} -
                                                <span class="article-date">
                                                    <i class="fa fa-clock-o"></i>
                                                    {{ \Carbon\Carbon::parse($sub['published_at'])->diffForHumans() }}
                                                </span>
                                            </p>
                                        </header>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </section>

                    <!-- END BLOCK 2 -->

                </div><!-- End Left big column -->

                @include('layouts.inc.sidebar')
            </div><!-- .main-body -->

            @php
                // Filter articles for this second category
                $thirdFilteredArticles = $thirdRandomCategoryArticles; // 1 big + 6 small

                $thirdMain = $thirdFilteredArticles->first();
                $thirdSubs = $thirdFilteredArticles->slice(1);

                // Filter articles for this second category
                $fourthFilteredArticles = $fourthRandomCategoryArticles; // 1 big + 6 small

                $fourthMain = $fourthFilteredArticles->first();
                $fourthSubs = $fourthFilteredArticles->slice(1);

                // Filter articles for this second category
                $fifthFilteredArticles = $fifthRandomCategoryArticles; // 1 big + 6 small

                $fifthMain = $fifthFilteredArticles->first();
                $fifthSubs = $fifthFilteredArticles->slice(1);
            @endphp
            <section class="admag-block">
                <div class="row">
                    <div class="col-md-4 news-text-block">
                        <h3 class="block-title"><span>{{ $thirdRandomCategory }}</span></h3>
                        @if ($thirdMain)
                            <article class="widget-post clearfix">
                                <div class="simple-thumb">
                                    <a href="{{ route('blog.show', $thirdMain['id']) }}">
                                        <img src="{{ $thirdMain['thumbnail'] }}" alt="{{ $thirdMain['title'] }}">
                                    </a>
                                </div>
                                <header>
                                    <h3>
                                        <a
                                            href="{{ route('blog.show', $thirdMain['id']) }}">{{ $thirdMain['title'] }}</a>
                                    </h3>
                                    <p class="simple-share">
                                        <span><i class="fa fa-clock-o"></i>
                                            {{ \Carbon\Carbon::parse($thirdMain['published_at'])->diffForHumans() }}</span>
                                    </p>
                                </header>
                            </article>
                        @endif
                        @foreach ($thirdSubs as $sub)
                            <article class="widget-post clearfix">
                                <header>
                                    <h3>
                                        <a href="{{ route('blog.show', $sub['id']) }}">{{ $sub['title'] }}</a>
                                    </h3>
                                </header>
                            </article>
                        @endforeach
                    </div>

                    <div class="col-md-4 news-text-block">
                        <h3 class="block-title"><span>{{ $fourthRandomCategory }}</span></h3>
                        @if ($fourthMain)
                            <article class="widget-post clearfix">
                                <div class="simple-thumb">
                                    <a href="{{ route('blog.show', $fourthMain['id']) }}">
                                        <img src="{{ $fourthMain['thumbnail'] }}" alt="{{ $fourthMain['title'] }}">
                                    </a>
                                </div>
                                <header>
                                    <h3>
                                        <a
                                            href="{{ route('blog.show', $fourthMain['id']) }}">{{ $fourthMain['title'] }}</a>
                                    </h3>
                                    <p class="simple-share">
                                        <span><i class="fa fa-clock-o"></i>
                                            {{ \Carbon\Carbon::parse($fourthMain['published_at'])->diffForHumans() }}</span>
                                    </p>
                                </header>
                            </article>
                        @endif
                        @foreach ($fourthSubs as $sub)
                            <article class="widget-post clearfix">
                                <header>
                                    <h3>
                                        <a href="{{ route('blog.show', $sub['id']) }}">{{ $sub['title'] }}</a>
                                    </h3>
                                </header>
                            </article>
                        @endforeach
                    </div>
                    <div class="col-md-4 news-text-block">
                        <h3 class="block-title"><span>{{ $fifthRandomCategory }}</span></h3>
                        @if ($fifthMain)
                            <article class="widget-post clearfix">
                                <div class="simple-thumb">
                                    <a href="{{ route('blog.show', $fifthMain['id']) }}">
                                        <img src="{{ $fifthMain['thumbnail'] }}" alt="{{ $fifthMain['title'] }}">
                                    </a>
                                </div>
                                <header>
                                    <h3>
                                        <a
                                            href="{{ route('blog.show', $fifthMain['id']) }}">{{ $fifthMain['title'] }}</a>
                                    </h3>
                                    <p class="simple-share">
                                        <span><i class="fa fa-clock-o"></i>
                                            {{ \Carbon\Carbon::parse($fifthMain['published_at'])->diffForHumans() }}</span>
                                    </p>
                                </header>
                            </article>
                        @endif
                        @foreach ($fifthSubs as $sub)
                            <article class="widget-post clearfix">
                                <header>
                                    <h3>
                                        <a href="{{ route('blog.show', $sub['id']) }}">{{ $sub['title'] }}</a>
                                    </h3>
                                </header>
                            </article>
                        @endforeach
                    </div>
                </div><!-- End news list -->
            </section><!-- .admag-block -->

        </div><!-- .main-content -->

        <!-- End Main Banner -->
        {{-- <div class="mag-content clearfix">
            <div class="row">
                <div class="col-md-12">
                    <div class="ad728-wrapper">
                        <a href="#">
                            <img src="img/ban728.jpg" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <script type="text/javascript">
            atOptions = {
                'key': '42a2f6395a93dc8b234e167f5fc3d6cd',
                'format': 'iframe',
                'height': 90,
                'width': 728,
                'params': {}
            };
        </script>
        <script type="text/javascript" src="//www.highperformanceformat.com/42a2f6395a93dc8b234e167f5fc3d6cd/invoke.js">
        </script> --}}
        <!-- End Main Banner -->
    </div><!-- .main-wrapper -->
@endsection
