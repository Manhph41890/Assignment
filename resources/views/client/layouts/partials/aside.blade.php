<!-- Aside start -->
<div class="col-lg-4">
    <div class="blog_right_sidebar">
        <aside class="single_sidebar_widget popular_post_widget">
            <h3 class="widget_title" style="color: #2d2d2d;">Bài đăng gần đây</h3>
            @foreach ($latestNews as $aside)
                <div class="media post_item">
                    @if ($aside->image && \Storage::exists($aside->image))
                        <img width="100px" src="{{ \Storage::url($aside->image) }}" alt=""
                            style="width:100px;height:auto;">
                    @endif
                    <div class="media-body">
                        <a href="{{ route('news_detail', $aside->id) }}">
                            <h3 class="text-truncate" style="color: #2d2d2d;">
                                {{ Str::limit($aside->title, 20) }}</h3>
                        </a>
                        <p>{{ $aside->published_date }}</p>
                        <p>{{ $aside->views }}</p>

                    </div>
                </div>
            @endforeach

        </aside>
        <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title" style="color: #2d2d2d;">Category</h4>
            <ul class="list cat-list">
                @foreach ($categories as $li)
                    <li>
                        <a href="{{ route('category_blog', $li->id) }}" class="d-flex">
                            <p>{{ $li->name }}</p>
                        </a>
                    </li>
                @endforeach

            </ul>
        </aside>

        <aside class="single_sidebar_widget tag_cloud_widget">
            <h4 class="widget_title" style="color: #2d2d2d;">Tag Clouds</h4>
            <ul class="list">
                <li>
                    <a href="#">project</a>
                </li>
                <li>
                    <a href="#">love</a>
                </li>
                <li>
                    <a href="#">technology</a>
                </li>
                <li>
                    <a href="#">travel</a>
                </li>
                <li>
                    <a href="#">restaurant</a>
                </li>
                <li>
                    <a href="#">life style</a>
                </li>
                <li>
                    <a href="#">design</a>
                </li>
                <li>
                    <a href="#">illustration</a>
                </li>
            </ul>
        </aside>

        <aside class="single_sidebar_widget instagram_feeds">
            <h4 class="widget_title" style="color: #2d2d2d;">Instagram Feeds</h4>
            <ul class="instagram_row flex-wrap">
                <li>
                    <a href="#">
                        <img class="img-fluid" src="/template/assets/img/post/post_5.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img class="img-fluid" src="/template/assets/img/post/post_6.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img class="img-fluid" src="/template/assets/img/post/post_7.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img class="img-fluid" src="/template/assets/img/post/post_8.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img class="img-fluid" src="/template/assets/img/post/post_9.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img class="img-fluid" src="/template/assets/img/post/post_10.png" alt="">
                    </a>
                </li>
            </ul>
        </aside>
        <aside class="single_sidebar_widget newsletter_widget">
            <h4 class="widget_title" style="color: #2d2d2d;">Newsletter</h4>
            <form action="#">
                <div class="form-group">
                    <input type="email" class="form-control" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                </div>
                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                    type="submit">Subscribe</button>
            </form>
        </aside>
    </div>
</div>
