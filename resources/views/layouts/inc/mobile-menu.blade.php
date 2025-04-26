<!-- Mobile Menu -->
<nav id="mobile-nav">
    <div>
        <ul>
            <li>
                <a href="/">Home</a>
            </li>

            <li><a href="#">About</a></li>

            <li><a href="#">Contact</a></li>

            <li>
                <a href="#">Sources</a>
                <ul>
                    @foreach ($sources->take(10) as $source)
                        <li><a
                                href="{{ route('blog.posts', ['type' => 'source', 'source' => $source]) }}">{{ $source }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li>
                <a href="#">Categories</a>
                <ul>
                    @foreach ($categories->take(10) as $category)
                        <li><a
                                href="{{ route('blog.posts', ['type' => 'category', 'category' => $category]) }}">{{ $category }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- / Mobile Menu -->
