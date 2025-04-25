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

            <div class="row blog-content">
                <div class="col-md-8">
                    <h3 class="tag-title">Source: <span>iPhone 6</span></h3>

                    @foreach ($posts as $post)
                        <article class="simple-post simple-big clearfix">
                            <div class="simple-thumb">

                                <a href="#">
                                    <img src="img/medium-thumb/med_thumb3.jpg" alt="">
                                </a>
                            </div>
                            <header>
                                <p class="simple-share">
                                    <a href="#">{{ $post['data']['data']['category'] }}</a> /
                                    <a href="{{ $post['data']['data']['url'] }}">{{ $post['data']['data']['source'] }}</a> -
                                    <span><i
                                            class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($post['data']['data']['published_at'], 'Africa/Lagos')->diffForHumans() }}</span>
                                </p>

                                <h3>
                                    <a
                                        href="{{ route('blog.show', $post['data']['data']['id']) }}">{{ $post['data']['data']['title'] }}</a>
                                </h3>

                                <p class="excerpt">
                                    {{ Str::limit($post['data']['data']['content'] ?? '', 150) }}
                                </p>
                            </header>
                        </article>
                    @endforeach

                    <div class="load-more">
                        <button type="button" class="btn btn-lg btn-block">Load more</button>
                    </div>

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
                                        <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>

                        <div class="widget tabwidget">
                            <ul class="nav nav-tabs" role="tablist" id="widget-tab">
                                <li role="presentation" class="active"><a href="#tab-popular" aria-controls="tab-popular"
                                        role="tab" data-toggle="tab">Popular</a></li>
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
                                                <a href="#">9 Apps for Transforming Your Phone into The Ultimate
                                                    Toolkit</a>
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
                                                <a href="#">15 Books You Should Read Before They Become Movies This
                                                    Year</a>
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
                                                <a href="#">The 20 most important Instagram pictures of all time</a>
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
                                                <a href="#">7 Tips for Creating a Functional Home Workspace</a>
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
                            <h3 class="block-title"><span>Tags</span></h3>
                            <ul class="tags-widget">
                                <li><a href="#">Windows 10</a></li>
                                <li><a href="#">FIFA 2015</a></li>
                                <li><a href="#">iPhone 6</a></li>
                                <li><a href="#">Flappy Bird</a></li>
                                <li><a href="#">World Cup</a></li>
                                <li><a href="#">WeChat desktop</a></li>
                                <li><a href="#">Clash of Clans</a></li>
                                <li><a href="#">Apple Watch</a></li>
                                <li><a href="#">Oscar 2015</a></li>
                                <li><a href="#">Taken 3</a></li>
                                <li><a href="#">Lego</a></li>
                            </ul>
                        </div>

                        <div class="widget reviewwidget">
                            <h3 class="block-title"><span>Reviews</span></h3>

                            <article class="widget-post clearfix">
                                <div class="simple-thumb">
                                    <a href="#">
                                        <img src="img/small-thumb/small_thumb17.jpg" alt="">
                                    </a>
                                </div>
                                <header>
                                    <h3>
                                        <a href="#">Nikon D5000 review: Design, Controls, Screen</a>
                                    </h3>
                                    <p class="simple-share">
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

                            <article class="widget-post clearfix">
                                <div class="simple-thumb">
                                    <a href="#">
                                        <img src="img/small-thumb/small_thumb18.jpg" alt="">
                                    </a>
                                </div>
                                <header>
                                    <h3>
                                        <a href="#">Apple iOS 8 Review</a>
                                    </h3>
                                    <p class="simple-share">
                                        <span class="star-reviews">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </span>
                                    </p>
                                </header>
                            </article>

                            <article class="widget-post clearfix">
                                <div class="simple-thumb">
                                    <a href="#">
                                        <img src="img/small-thumb/small_thumb19.jpg" alt="">
                                    </a>
                                </div>
                                <header>
                                    <h3>
                                        <a href="#">Canon 70D review</a>
                                    </h3>
                                    <p class="simple-share">
                                        <span class="star-reviews">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </p>
                                </header>
                            </article>

                            <article class="widget-post clearfix">
                                <div class="simple-thumb">
                                    <a href="#">
                                        <img src="img/small-thumb/small_thumb20.jpg" alt="">
                                    </a>
                                </div>
                                <header>
                                    <h3>
                                        <a href="#">iMac review</a>
                                    </h3>
                                    <p class="simple-share">
                                        <span class="star-reviews">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </span>
                                    </p>
                                </header>
                            </article>

                        </div><!-- End review widget -->

                        <div class="widget categorywidget">
                            <h3 class="block-title"><span>Categories</span></h3>
                            <ul>
                                <li>
                                    <a href="#">Tech <span class="count">25</span></a>
                                </li>
                                <li>
                                    <a href="#">Lifestyle <span class="count">23</span></a>
                                </li>
                                <li>
                                    <a href="#">Business <span class="count">19</span></a>
                                </li>
                                <li>
                                    <a href="#">Entertainment <span class="count">20</span></a>
                                </li>
                            </ul>
                        </div>

                        <div class="widget adwidget subscribewidget">
                            <h3 class="block-title"><span>Subscribe</span></h3>
                            <p>The more you tighten your grip, Tarkin, the more star systems will slip through your fingers.
                            </p>
                            <form class="form-inline">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter your email">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Subscribe</button>
                                    </span>
                                </div>
                            </form>
                        </div>

                    </aside>
                </div><!-- End last column -->
            </div><!-- .main-body -->

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
