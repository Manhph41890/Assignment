<div class="section-tittle mb-35">
    <h2>Tin mới nhất</h2>
</div>
<!-- Banner News Area Start -->
@foreach ($latestNews as $article)
    <article class="blog_item">
        <div class="blog_item_img">
            @if ($article->image && \Storage::exists($article->image))
                <img width="100px" src="{{ \Storage::url($article->image) }}" alt=""
                    style="width:100px;height:auto;">
            @endif
            <a href="#" class="blog_item_date">
                <h3>{{ date('d') }}</h3>
                <p>{{ date('M') }}
            </a>
        </div>
        <div class="blog_details">
            <a href="{{ route('news_detail', $article->id) }}" class="d-inline-block">
                <h2 class="blog-head" style="color: #2d2d2d;">{{ $article->title }}</h2>
            </a>
            <p>{{ $article->excerpt }}</p>
            <ul class="blog-info-link">
                <li><a href="#"><i class="fa fa-user"></i> {{ $article->author }}</a></li>
                <li><a href="#"><i class="fa fa-comments"></i> {{ $article->comments_count }} Comments</a></li>
            </ul>
        </div>
    </article>
@endforeach
<div class="latest-posts pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-tittle mb-35">
                    <h2>Tin được quan tâm</h2>
                </div>
            </div>
        </div>
        <!-- Slider -->
        <div class="row">

            <div class="col-lg-6">
                @foreach ($viewsOdd as $article)
                    <div class="latest-slider">
                        <div class="slider-active">
                            <!-- Single slider -->
                            <div class="single-slider">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img text-center">
                                        @if ($article->image && \Storage::exists($article->image))
                                            <img width="100px" src="{{ \Storage::url($article->image) }}"
                                                alt="" style="width:100px;height:auto;">
                                        @endif
                                        <div class="trend-top-cap">
                                            <span class="bgr" data-animation="fadeInUp" data-delay=".2s"
                                                data-duration="1000ms">Sport</span>
                                            <h2>
                                                <a href="{{ route('news_detail', $article->id) }}"
                                                    data-animation="fadeInUp" data-delay=".4s"
                                                    data-duration="1000ms">{{ $article->title }}</a>
                                            </h2>
                                            <p>Views: {{ $article->views }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single slider -->
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="col-lg-6">
                <!-- smoll items -->
                <div class="row">
                    @foreach ($viewsEven as $article)
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="single-baner-nw2 mb-30 ">
                                <div class="banner-img-cap2">
                                    <div class="banner-img">
                                        @if ($article->image && \Storage::exists($article->image))
                                            <img width="100px" src="{{ \Storage::url($article->image) }}"
                                                alt="" style="width:100px;height:auto;">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="single-baner-nw2 mb-30">
                                <div class="banner-img-cap2">
                                    <div class="banner-cap2 banner-cap3">
                                        <p>Trending</p>
                                        <h3><a
                                                href="{{ route('news_detail', $article->id) }}">{{ $article->title }}</a>
                                        </h3>
                                        <p class="text-truncate">{{ Str::limit($article->content, 300) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</div>

<!-- Want To work End -->
