@extends('client.layouts.master')

@section('content')
    <div class="top-post-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-tittle mb-35">
                        <h2>Tin tức {{ $category->name }}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-lg-between">
                @foreach ($news as $newsDetail)
                    <div class="col-lg-12 col-md-8">
                        <!-- single-job-content -->
                        <div class="single-job-items mb-30">
                            <div class="job-items">
                                <div class="company-img">
                                    <a href="{{ route('news_detail', $newsDetail->id) }}">
                                        <img src="{{ $newsDetail->image }}" style="width: 180px; height: 100px;">
                                    </a>
                                </div>
                                <div class="job-tittle">
                                    <span>Trending</span>
                                    <a href="{{ route('news_detail', $newsDetail->id) }}">
                                        <h4>{{ $newsDetail->title }}</h4>
                                    </a>
                                    <p>{{ Str::limit($newsDetail->content, 100) }}</p>
                                    <p>{{ $newsDetail->published_date }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Top Posts End -->
    <!--Pagination Start  -->
    <div class="pagination-area text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start" id="myDIV">
                                <li class="page-item"><a class="page-link" href="#"><span
                                            class="ti-angle-left"></span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link" href="#"><span
                                            class="ti-angle-right"></span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
