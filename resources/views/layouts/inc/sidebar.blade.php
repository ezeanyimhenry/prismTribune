<div class="col-md-4" data-stickycolumn>
    <aside class="sidebar clearfix">

        <div class="widget adwidget">
            <a href="#"><img src="{{ asset('img/ban300.jpg') }}" alt="" /></a>
        </div>

        <div class="widget searchwidget">
            <form class="searchwidget-form" action="{{ route('blog.posts.search') }}">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>

        <div class="widget tabwidget">
            <ul class="nav nav-tabs" role="tablist" id="widget-tab">
                <li role="presentation" class="active"><a href="#tab-popular" aria-controls="tab-popular" role="tab"
                        data-toggle="tab">Popular</a>
                </li>
                <li role="presentation"><a href="#tab-recent" aria-controls="tab-recent" role="tab"
                        data-toggle="tab">Recent</a></li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="tab-popular">
                    @forelse ($randomArticlesSidebar as $articleSidebar)
                        <article class="widget-post clearfix">
                            <div class="simple-thumb">
                                <a href="{{ route('blog.show', $articleSidebar['id']) }}">
                                    <img src="{{ $articleSidebar['thumbnail'] }}" alt="{{ $articleSidebar['title'] }}">
                                </a>
                            </div>
                            <header>
                                <h3>
                                    <a
                                        href="{{ route('blog.show', $articleSidebar['id']) }}">{{ $articleSidebar['title'] }}</a>
                                </h3>
                                <p class="simple-share">
                                    <span><i class="fa fa-clock-o"></i>
                                        {{ \Carbon\Carbon::parse($articleSidebar['published_at'])->diffForHumans() }}</span>
                                </p>
                            </header>
                        </article>
                    @empty
                    @endforelse

                </div><!-- Popular posts -->
                <div role="tabpanel" class="tab-pane" id="tab-recent">
                    @forelse ($recentArticlesSidebar as $recent)
                        <article class="widget-post clearfix">
                            <div class="simple-thumb">
                                <a href="{{ route('blog.show', $recent['id']) }}">
                                    <img src="{{ $recent['thumbnail'] }}" alt="{{ $recent['title'] }}">
                                </a>
                            </div>
                            <header>
                                <h3>
                                    <a href="{{ route('blog.show', $recent['id']) }}">{{ $recent['title'] }}</a>
                                </h3>
                                <p class="simple-share">
                                    <span><i class="fa fa-clock-o"></i>
                                        {{ \Carbon\Carbon::parse($recent['published_at'])->diffForHumans() }}</span>
                                </p>
                            </header>
                        </article>
                    @empty
                    @endforelse

                </div><!-- Recent Posts -->
            </div>
        </div>

        <div class="widget tagwidget">
            <h3 class="block-title"><span>Categories</span></h3>
            <ul class="tags-widget">
                @foreach ($categories as $category)
                    <li><a
                            href="{{ route('blog.posts', ['type' => 'category', 'category' => $category]) }}">{{ $category }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        {{-- <script async="async" data-cfasync="false" src="//grownwrecking.com/af88a4e49525298d95e6d5fcbc8e5158/invoke.js">
        </script>
        <div id="container-af88a4e49525298d95e6d5fcbc8e5158"></div> --}}
        <div class="widget categorywidget">
            <h3 class="block-title"><span>Sources</span></h3>
            @php
                $sourceCounts = collect($featured['meta']['source_counts'] ?? []);
            @endphp
            <ul>
                @foreach ($sourceCounts as $source => $count)
                    <li>
                        <a href="{{ route('blog.posts', ['type' => 'source', 'source' => $source]) }}">{{ $source }}
                            <span class="count">{{ $count }}</span></a>
                    </li>
                @endforeach
            </ul>
        </div>

    </aside>
</div><!-- End last column -->
