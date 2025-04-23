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
                            <img src="img/ban728.jpg" alt="" />
                        </a>
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
                            <li><a href="page_tags.html">{{ $source }}</a></li>
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
                                                    <a href="{{ $sub['id'] }}" class="featured-href">
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
                                                        <a href="{{ $article['id'] }}">{{ $article['title'] }}</a>
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
                                        <a href="{{ $mainArticle['id'] }}" class="overlay-link">
                                            <figure class="image-overlay">
                                                <img src="{{ $mainArticle['thumbnail'] }}"
                                                    alt="{{ $mainArticle['title'] }}">
                                            </figure>
                                        </a>
                                        <a href="#" class="category">
                                            {{ $mainArticle['category'] }}
                                        </a>
                                        <div class="news-details">
                                            <h3 class="news-title">
                                                <a href="{{ $mainArticle['id'] }}">{{ $mainArticle['title'] }}</a>
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
                                            <a href="{{ $article['id'] }}"><img src="{{ $article['thumbnail'] }}"
                                                    alt="{{ $article['title'] }}"></a>
                                        </div>
                                        <header>
                                            <h3><a href="{{ $article['id'] }}">{{ $article['title'] }}</a></h3>
                                            <p class="simple-share">
                                                <a href="#">{{ $article['category'] }}</a> /
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
                                <h3 class="block-title"><span><a href="#">{{ $secondRandomCategory }}</a></span></h3>

                                @if ($secondMain)
                                    <article class="news-block big-block">
                                        <a href="{{ $secondMain['id'] }}" class="overlay-link">
                                            <figure class="image-overlay">
                                                <img src="{{ $secondMain['thumbnail'] }}"
                                                    alt="{{ $secondMain['title'] }}">
                                            </figure>
                                        </a>
                                        <a href="#" class="category">
                                            {{ $secondMain['category'] }}
                                        </a>
                                        <header class="news-details">
                                            <h3 class="news-title">
                                                <a href="{{ $secondMain['id'] }}">{{ $secondMain['title'] }}</a>
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
                                        <a href="{{ $sub['id'] }}" class="overlay-link">
                                            <figure class="image-overlay">
                                                <img src="{{ $sub['thumbnail'] }}" alt="{{ $sub['title'] }}">
                                            </figure>
                                        </a>
                                        <a href="#" class="category">
                                            {{ $sub['category'] }}
                                        </a>
                                        <header class="news-details">
                                            <h3 class="news-title">
                                                <a href="{{ $sub['id'] }}">{{ $sub['title'] }}</a>
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

                <div class="col-md-4" data-stickycolumn>
                    <aside class="sidebar clearfix">

                        <div class="widget adwidget">
                            <a href="#"><img src="img/ban300.jpg" alt="" /></a>
                        </div>

                        <div class="widget searchwidget">
                            <form class="searchwidget-form">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i
                                                class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>

                        <div class="widget tabwidget">
                            <ul class="nav nav-tabs" role="tablist" id="widget-tab">
                                <li role="presentation" class="active"><a href="#tab-popular"
                                        aria-controls="tab-popular" role="tab" data-toggle="tab">Popular</a>
                                </li>
                                <li role="presentation"><a href="#tab-recent" aria-controls="tab-recent" role="tab"
                                        data-toggle="tab">Recent</a></li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="tab-popular">

                                    <article class="widget-post clearfix">
                                        <div class="simple-thumb">
                                            <a href="#">
                                                <img src="img/small-thumb/small_thumb13.jpg" alt="">
                                            </a>
                                        </div>
                                        <header>
                                            <h3>
                                                <a href="#">The 10 most beautiful cars money can buy</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-eye"></i> 1,129,753 views</span>
                                            </p>
                                        </header>
                                    </article>

                                    <article class="widget-post clearfix">
                                        <div class="simple-thumb">
                                            <a href="#">
                                                <span class="play-button"><i class="fa fa-play"></i></span>
                                                <img src="img/small-thumb/small_thumb12.jpg" alt="">
                                            </a>
                                        </div>
                                        <header>
                                            <h3>
                                                <a href="#">Asian Startup Companies Boom</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-eye"></i> 989,039 views</span>
                                            </p>
                                        </header>
                                    </article>

                                    <article class="widget-post clearfix">
                                        <div class="simple-thumb">
                                            <a href="#">
                                                <img src="img/small-thumb/small_thumb14.jpg" alt="">
                                            </a>
                                        </div>
                                        <header>
                                            <h3>
                                                <a href="#">9 Apps for Transforming Your Phone into The
                                                    Ultimate Toolkit</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-clock-o"></i> 920,540 views</span>
                                            </p>
                                        </header>
                                    </article>

                                    <article class="widget-post clearfix">
                                        <div class="simple-thumb">
                                            <a href="#">
                                                <img src="img/small-thumb/small_thumb15.jpg" alt="">
                                            </a>
                                        </div>
                                        <header>
                                            <h3>
                                                <a href="#">15 Books You Should Read Before They Become
                                                    Movies This Year</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-clock-o"></i> 780,540 views</span>
                                            </p>
                                        </header>
                                    </article>

                                    <article class="widget-post clearfix">
                                        <div class="simple-thumb">
                                            <a href="#">
                                                <img src="img/small-thumb/small_thumb16.jpg" alt="">
                                            </a>
                                        </div>
                                        <header>
                                            <h3>
                                                <a href="#">The 20 most important Instagram pictures of all
                                                    time</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-clock-o"></i> 725,566 views</span>
                                            </p>
                                        </header>
                                    </article>

                                </div><!-- Popular posts -->
                                <div role="tabpanel" class="tab-pane" id="tab-recent">

                                    <article class="widget-post clearfix">
                                        <div class="simple-thumb">
                                            <a href="#">
                                                <img src="img/small-thumb/small_thumb8.jpg" alt="">
                                            </a>
                                        </div>
                                        <header>
                                            <h3>
                                                <a href="#">7 Tips for Creating a Functional Home
                                                    Workspace</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-clock-o"></i> 2 minutes ago</span>
                                            </p>
                                        </header>
                                    </article>

                                    <article class="widget-post clearfix">
                                        <div class="simple-thumb">
                                            <a href="#">
                                                <img src="img/small-thumb/small_thumb5.jpg" alt="">
                                            </a>
                                        </div>
                                        <header>
                                            <h3>
                                                <a href="#">Does going to the gym count as a sport?</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-clock-o"></i> 2 minutes ago</span>
                                            </p>
                                        </header>
                                    </article>

                                    <article class="widget-post clearfix">
                                        <div class="simple-thumb">
                                            <a href="#">
                                                <img src="img/small-thumb/small_thumb7.jpg" alt="">
                                            </a>
                                        </div>
                                        <header>
                                            <h3>
                                                <a href="#">Older actors still hot in Hollywood</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-clock-o"></i> 3 minutes ago</span>
                                            </p>
                                        </header>
                                    </article>

                                    <article class="widget-post clearfix">
                                        <div class="simple-thumb">
                                            <a href="#">
                                                <img src="img/small-thumb/small_thumb10.jpg" alt="">
                                            </a>
                                        </div>
                                        <header>
                                            <h3>
                                                <a href="#">5 Gadget Gifts for Father's Day</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-clock-o"></i> 3 minutes ago</span>
                                            </p>
                                        </header>
                                    </article>

                                    <article class="widget-post clearfix">
                                        <div class="simple-thumb">
                                            <a href="#">
                                                <img src="img/small-thumb/small_thumb6.jpg" alt="">
                                            </a>
                                        </div>
                                        <header>
                                            <h3>
                                                <a href="#">Inside U2's Ambitious Upcoming Tour Strategy</a>
                                            </h3>
                                            <p class="simple-share">
                                                <span><i class="fa fa-clock-o"></i> 5 minutes ago</span>
                                            </p>
                                        </header>
                                    </article>

                                </div><!-- Recent Posts -->
                            </div>
                        </div>

                        <div class="widget tagwidget">
                            <h3 class="block-title"><span>Categories</span></h3>
                            <ul class="tags-widget">
                                @foreach ($categories as $category)
                                    <li><a href="#">{{ $category }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="widget categorywidget">
                            <h3 class="block-title"><span>Sources</span></h3>
                            @php
                                $sourceCounts = collect($featured['meta']['source_counts'] ?? []);
                            @endphp
                            <ul>
                                @foreach ($sourceCounts as $source => $count)
                                    <li>
                                        <a href="#">{{ $source }} <span
                                                class="count">{{ $count }}</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </aside>
                </div><!-- End last column -->
            </div><!-- .main-body -->

            @php
                // Filter articles for this second category
                $thirdFilteredArticles = $thirdRandomCategoryArticles; // 1 big + 6 small

                $thirdMain = $thirdFilteredArticles->first();
                $thirdSubs = $thirdFilteredArticles->slice(1);
            @endphp
            <section class="admag-block">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="block-title"><span>{{ $thirdRandomCategory }}</span></h3>
                    </div>
                </div>

                <div class="row">
                    @if ($thirdMain)
                        <div class="col-md-8">
                            <article class="featured-small box-news box-big">
                                <a href="{{ $thirdMain['id'] }}">
                                    <img src="{{ $thirdMain['thumbnail'] }}" alt="{{ $thirdMain['title'] }}">
                                </a>
                                <header class="featured-header">
                                    <a class="category bgcolor2" href="#">{{ $thirdMain['category'] }}</a>
                                    <h2><a href="{{ $thirdMain['id'] }}">{{ $thirdMain['title'] }}</a></h2>
                                    <p class="simple-share">
                                        <a href="{{ $thirdMain['url'] }}"><b>{{ $thirdMain['source'] }}</b></a> -
                                        <span
                                            class="article-date">{{ \Carbon\Carbon::parse($thirdMain['published_at'])->diffForHumans() }}</span>
                                    </p>
                                </header>
                            </article>
                        </div>
                    @endif

                    <div class="col-md-4">
                        <article class="featured-small box-news">
                            <a href="#">
                                <img src="img/big-thumb/big_thumb11.jpg" alt="">
                            </a>
                            <header class="featured-header">
                                <a class="category bgcolor2" href="#">Apps</a>
                                <h2><a href="#">Apple iOS 8 Review</a></h2>
                                <p class="simple-share">
                                    by <a href="#"><b>John Doe</b></a> -
                                    <span class="article-date">34 minutes ago</span>
                                    <span class="star-reviews">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </span>
                                </p>
                            </header>
                        </article>
                    </div>

                </div><!--End small box -->

                <div class="row">

                    <div class="col-md-4">
                        <article class="featured-small box-news">
                            <a href="#">
                                <img src="img/big-thumb/big_thumb8.jpg" alt="">
                            </a>
                            <header class="featured-header">
                                <a class="category bgcolor2" href="#">Mobile</a>
                                <h2><a href="#">The Partnership of Coffee and Tech</a></h2>
                                <p class="simple-share">
                                    by <a href="#"><b>John Doe</b></a> -
                                    <span class="article-date">52 minutes ago</span>
                                </p>
                            </header>
                        </article>
                    </div>

                    <div class="col-md-4">
                        <article class="featured-small box-news">
                            <a href="#">
                                <span class="play-button"><i class="fa fa-play"></i></span>
                                <img src="img/big-thumb/big_thumb9.jpg" alt="">
                            </a>
                            <header class="featured-header">
                                <a class="category bgcolor2" href="#">Design</a>
                                <h2><a href="#">Nikon D5000 review: Design, Controls, Screen</a></h2>
                                <p class="simple-share">
                                    by <a href="#"><b>John Doe</b></a> -
                                    <span class="article-date">1 hour ago</span>
                                    <span class="star-reviews">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </span>
                                </p>
                            </header>
                        </article>
                    </div>

                    <div class="col-md-4">
                        <article class="featured-small box-news">
                            <a class="play-button" href="#"><i class="fa fa-camera"></i></a>
                            <a href="#">
                                <img src="img/big-thumb/big_thumb7.jpg" alt="">
                            </a>
                            <header class="featured-header">
                                <a class="category bgcolor2" href="#">Mobile</a>
                                <h2><a href="#">What the Viny "Comeback" Really Looks Like</a></h2>
                                <p class="simple-share">
                                    by <a href="#"><b>John Doe</b></a> -
                                    <span class="article-date">2 hours ago</span>
                                </p>
                            </header>
                        </article>
                    </div>
                </div><!-- End big box -->
            </section><!-- .admag-block -->

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
                                    <a href="{{ $thirdMain['id'] }}">
                                        <img src="{{ $thirdMain['thumbnail'] }}" alt="{{ $thirdMain['title'] }}">
                                    </a>
                                </div>
                                <header>
                                    <h3>
                                        <a href="{{ $thirdMain['id'] }}">{{ $thirdMain['title'] }}</a>
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
                                        <a href="{{ $sub['id'] }}">{{ $sub['title'] }}</a>
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
                                    <a href="{{ $fourthMain['id'] }}">
                                        <img src="{{ $fourthMain['thumbnail'] }}" alt="{{ $fourthMain['title'] }}">
                                    </a>
                                </div>
                                <header>
                                    <h3>
                                        <a href="{{ $fourthMain['id'] }}">{{ $fourthMain['title'] }}</a>
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
                                        <a href="{{ $sub['id'] }}">{{ $sub['title'] }}</a>
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
                                    <a href="{{ $fifthMain['id'] }}">
                                        <img src="{{ $fifthMain['thumbnail'] }}" alt="{{ $fifthMain['title'] }}">
                                    </a>
                                </div>
                                <header>
                                    <h3>
                                        <a href="{{ $fifthMain['id'] }}">{{ $fifthMain['title'] }}</a>
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
                                        <a href="{{ $sub['id'] }}">{{ $sub['title'] }}</a>
                                    </h3>
                                </header>
                            </article>
                        @endforeach
                    </div>
                </div><!-- End news list -->
            </section><!-- .admag-block -->

            <div class="row" data-stickyparent>
                <div class="col-md-8">
                    <section class="admag-block">
                        <h3 class="block-title"><span>Business</span></h3>

                        <article class="news-block big-block">
                            <a href="#" class="overlay-link">
                                <figure class="image-overlay">
                                    <img src="img/big-thumb/big_thumb14.jpg" alt="">
                                </figure>
                            </a>
                            <a href="#" class="category">
                                Business
                            </a>
                            <header class="news-details">
                                <h3 class="news-title">
                                    <a href="#">
                                        3 things I learned about running startup board meetings
                                    </a>
                                </h3>
                                <p>As you wish. Dantooine. They're on Dantooine. Alderaan? I'm not going to
                                    Alderaan. I've got to go home. It's late, I'm in for it as it is. Red Five
                                    standing by.</p>
                                <p class="simple-share">
                                    by <a href="#"><b>John Doe</b></a> -
                                    <span class="article-date"><i class="fa fa-clock-o"></i> 10 minutes
                                        ago</span>
                                </p>
                            </header>
                        </article>

                        <article class="simple-post simple-big clearfix">
                            <div class="simple-thumb">

                                <a href="#">
                                    <img src="img/medium-thumb/med_thumb3.jpg" alt="">
                                </a>
                            </div>
                            <header>
                                <p class="simple-share">
                                    <a href="#">Business</a> /
                                    by <a href="#">John Doe</a> -
                                    <span><i class="fa fa-clock-o"></i> 23 minutes ago</span>
                                </p>

                                <h3>
                                    <a href="#">How Technology Is Revolutionizing the Franchise World</a>
                                </h3>

                                <p class="excerpt">
                                    Partially, but it also obeys your commands. What?! Alderaan? I'm not going to
                                    Alderaan. I've got to go home. It's late, I'm in for it as it is.
                                </p>
                            </header>
                        </article>

                        <article class="simple-post simple-big clearfix">
                            <div class="simple-thumb">
                                <a href="#">
                                    <img src="img/medium-thumb/med_thumb1.jpg" alt="">
                                </a>
                            </div>
                            <header>
                                <p class="simple-share">
                                    <a href="#">Business</a> /
                                    by <a href="#">John Doe</a> -
                                    <span><i class="fa fa-clock-o"></i> 49 minutes ago</span>
                                </p>

                                <h3>
                                    <a href="#">8 Ways to Know If Your Business Is Ready to Franchise</a>
                                </h3>

                                <p class="excerpt">
                                    Partially, but it also obeys your commands. What?! Alderaan? I'm not going to
                                    Alderaan. I've got to go home. It's late, I'm in for it as it is.
                                </p>
                            </header>
                        </article>

                        <article class="simple-post simple-big clearfix">
                            <div class="simple-thumb">
                                <a href="#">
                                    <span class="play-button"><i class="fa fa-play"></i></span>
                                    <img src="img/medium-thumb/med_thumb2.jpg" alt="">
                                </a>
                            </div>
                            <header>
                                <p class="simple-share">
                                    <a href="#">Business</a> /
                                    by <a href="#">John Doe</a> -
                                    <span><i class="fa fa-clock-o"></i> 1 hour ago</span>
                                </p>

                                <h3>
                                    <a href="#">9 Business Leaders Share the Best and Worst Advice They've
                                        Heard</a>
                                </h3>

                                <p class="excerpt">
                                    Partially, but it also obeys your commands. What?! Alderaan? I'm not going to
                                    Alderaan. I've got to go home. It's late, I'm in for it as it is.
                                </p>
                            </header>
                        </article>

                        <article class="simple-post simple-big clearfix">
                            <div class="simple-thumb">
                                <a href="#">
                                    <img src="img/medium-thumb/med_thumb54.jpg" alt="">
                                </a>
                            </div>
                            <header>
                                <p class="simple-share">
                                    <a href="#">Business</a> /
                                    by <a href="#">John Doe</a> -
                                    <span><i class="fa fa-clock-o"></i> 2 hours ago</span>
                                </p>

                                <h3>
                                    <a href="#">Mainland Stock Buyers Hunt Bargains in Hong Kong</a>
                                </h3>

                                <p class="excerpt">
                                    Partially, but it also obeys your commands. What?! Alderaan? I'm not going to
                                    Alderaan. I've got to go home. It's late, I'm in for it as it is.
                                </p>
                            </header>
                        </article>

                        <article class="simple-post simple-big clearfix">
                            <div class="simple-thumb">
                                <a href="#">
                                    <span class="play-button"><i class="fa fa-play"></i></span>
                                    <img src="img/medium-thumb/med_thumb55.jpg" alt="">
                                </a>
                            </div>
                            <header>
                                <p class="simple-share">
                                    <a href="#">Business</a> /
                                    by <a href="#">John Doe</a> -
                                    <span><i class="fa fa-clock-o"></i> 2 hours ago</span>
                                </p>

                                <h3>
                                    <a href="#">Tickets and prices for Metro and public transport in
                                        Milan</a>
                                </h3>

                                <p class="excerpt">
                                    Partially, but it also obeys your commands. What?! Alderaan? I'm not going to
                                    Alderaan. I've got to go home. It's late, I'm in for it as it is.
                                </p>
                            </header>
                        </article>
                    </section><!-- .admag-block -->

                    <div class="load-more">
                        <button type="button" class="btn btn-lg btn-block">Load more</button>
                    </div>

                </div>
                <div class="col-md-4" data-stickycolumn>
                    <aside class="sidebar">
                        <div class="widget social-links">
                            <h3 class="block-title"><span>Follow us</span></h3>
                            <ul class="social-list">

                                <li class="social-facebook">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                        data-original-title="Facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="social-twitter" data-toggle="tooltip" data-placement="bottom" title=""
                                    data-original-title="Twitter">
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="social-gplus">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                        data-original-title="Google+">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li class="social-youtube">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                        data-original-title="Youtube">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                </li>
                                <li class="social-instagram">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                        data-original-title="Instagram">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <li class="social-pinterest">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                        data-original-title="Pinterest">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </li>
                                <li class="social-rss">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                        data-original-title="RSS">
                                        <i class="fa fa-rss"></i>
                                    </a>
                                </li>
                            </ul>
                        </div><!-- .widget .social-links -->

                        <div class="widget adwidget">
                            <a href="#"><img src="img/ban300.jpg" alt=""></a>
                        </div><!-- .widget .adwidget -->

                        <div class="widget bannerwidget">
                            <div class="widget-125 clearfix">
                                <a href="#" target="_blank"><img src="img/theme_forest_125x125.jpg"
                                        alt="Banner"></a>
                                <a href="#" target="_blank"><img src="img/audio_jungle_125x125.jpg" alt="Banner"
                                        title="Banner" width="125" height="125" class="visible animated"></a>
                                <a href="#" target="_blank"><img src="img/code_canyon_125x125.jpg" alt="Banner"
                                        title="Banner" width="125" height="125" class="visible animated"></a>
                                <a href="#" target="_blank"><img src="img/graphic_river_125x125.jpg"
                                        alt="Banner" title="Banner" width="125" height="125"
                                        class="visible animated"></a>
                            </div>
                        </div>

                    </aside><!-- End sidebar -->
                </div><!-- .col-md-4 .sticky-div -->
            </div>

        </div><!-- .main-content -->

        <!-- End Main Banner -->
        <div class="mag-content clearfix">
            <div class="row">
                <div class="col-md-12">
                    <div class="ad728-wrapper">
                        <a href="#">
                            <img src="img/ban728.jpg" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Banner -->
    </div><!-- .main-wrapper -->
@endsection
