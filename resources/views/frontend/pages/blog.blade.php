@extends('frontend.layouts.master')

@section('title','E-SHOP || Blog Page')

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Blog Grid Sidebar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Blog Single -->
    <section class="blog-single shop-blog grid section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="row">
                        <!-- Blog: T-Shirts -->
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="shop-single-blog">
                                <img src="{{ asset('frontend/img/tshirts.jpg') }}" alt="T-Shirts">

                                <div class="content">
                                    <p class="date"><i class="fa fa-calendar" aria-hidden="true"></i> 10 Dec, 2024. Mon
                                        <span class="float-right">
                                            <i class="fa fa-user" aria-hidden="true"></i> Admin
                                        </span>
                                    </p>
                                    <a href="{{route('blog.detail','t-shirts')}}" class="title">T-Shirts</a>
                                    <p>Discover our latest collection of stylish and comfortable T-Shirts, perfect for every occasion. Explore the range now.</p>
                                    <a href="{{route('blog.detail','t-shirts')}}" class="more-btn">Continue Reading</a>
                                </div>
                            </div>
                        </div>

                        <!-- Blog: Watches -->
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="shop-single-blog">
                                <img src="{{ asset('frontend/img/watch.png') }}" alt="Watches">
                                <div class="content">
                                    <p class="date"><i class="fa fa-calendar" aria-hidden="true"></i> 11 Dec, 2024. Tue
                                        <span class="float-right">
                                            <i class="fa fa-user" aria-hidden="true"></i> Admin
                                        </span>
                                    </p>
                                    <a href="{{route('blog.detail','watches')}}" class="title">Watches</a>
                                    <p>Time to upgrade your style with our premium selection of watches. Check out the finest designs to match your look.</p>
                                    <a href="{{route('blog.detail','watches')}}" class="more-btn">Continue Reading</a>
                                </div>
                            </div>
                        </div>

                        <!-- Blog: Trousers -->
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="shop-single-blog">
                                <img src="{{ asset('frontend/img/trouser.png') }}" alt="Trousers">
                                <div class="content">
                                    <p class="date"><i class="fa fa-calendar" aria-hidden="true"></i> 12 Dec, 2024. Wed
                                        <span class="float-right">
                                            <i class="fa fa-user" aria-hidden="true"></i> Admin
                                        </span>
                                    </p>
                                    <a href="{{route('blog.detail','trousers')}}" class="title">Trousers</a>
                                    <p>Find your perfect fit with our exclusive collection of trousers. Comfort and elegance combined for any event.</p>
                                    <a href="{{route('blog.detail','trousers')}}" class="more-btn">Continue Reading</a>
                                </div>
                            </div>
                        </div>

                        <!-- Blog: Shoes -->
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="shop-single-blog">
                                <img src="{{ asset('frontend/img/shoes.png') }}" alt="Shoes">
                                <div class="content">
                                    <p class="date"><i class="fa fa-calendar" aria-hidden="true"></i> 13 Dec, 2024. Thu
                                        <span class="float-right">
                                            <i class="fa fa-user" aria-hidden="true"></i> Admin
                                        </span>
                                    </p>
                                    <a href="{{route('blog.detail','shoes')}}" class="title">Shoes</a>
                                    <p>Step into style with our latest range of shoes. Designed for comfort and crafted with perfection, just for you.</p>
                                    <a href="{{route('blog.detail','shoes')}}" class="more-btn">Continue Reading</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <!-- Pagination -->
                            {{-- {{$posts->appends($_GET)->links()}} --}}
                            <!--/ End Pagination -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="main-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget search">
                            <form class="form" method="GET" action="{{route('blog.search')}}">
                                <input type="text" placeholder="Search Here..." name="search">
                                <button class="button" type="sumbit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h3 class="title">Blog Categories</h3>
                            <ul class="categor-list">
                                @if(!empty($_GET['category']))
                                    @php
                                        $filter_cats=explode(',',$_GET['category']);
                                    @endphp
                                @endif
                                <form action="{{route('blog.filter')}}" method="POST">
                                    @csrf
                                    @foreach(Helper::postCategoryList('posts') as $cat)
                                        <li>
                                            <a href="{{route('blog.category',$cat->slug)}}">{{$cat->title}}</a>
                                        </li>
                                    @endforeach
                                </form>
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget recent-post">
                            <h3 class="title">Recent post</h3>
                            @foreach($recent_posts as $post)
                                <div class="single-post">
                                    <div class="image">
                                        <img src="{{$post->photo}}" alt="{{$post->photo}}">
                                    </div>
                                    <div class="content">
                                        <h5><a href="#">{{$post->title}}</a></h5>
                                        <ul class="comment">
                                            <li><i class="fa fa-calendar" aria-hidden="true"></i>{{$post->created_at->format('d M, y')}}</li>
                                            <li><i class="fa fa-user" aria-hidden="true"></i>{{$post->author_info->name ?? 'Anonymous'}}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--/ End Single Widget -->
                        <div class="single-widget side-tags">
                            <h3 class="title">Tags</h3>
                            <ul class="tag">
                                @if(!empty($_GET['tag']))
                                    @php
                                        $filter_tags=explode(',',$_GET['tag']);
                                    @endphp
                                @endif
                                <form action="{{route('blog.filter')}}" method="POST">
                                    @csrf
                                    @foreach(Helper::postTagList('posts') as $tag)
                                        <li>
                                            <a href="{{route('blog.tag',$tag->title)}}">{{$tag->title}}</a>
                                        </li>
                                    @endforeach
                                </form>
                            </ul>
                        </div>
                        <div class="single-widget newsletter">
                            <h3 class="title">Newsletter</h3>
                            <div class="letter-inner">
                                <h4>Subscribe & get news <br> latest updates.</h4>
                                <form method="POST" action="{{route('subscribe')}}" class="form-inner">
                                    @csrf
                                    <input type="email" name="email" placeholder="Enter your email">
                                    <button type="submit" class="btn " style="width: 100%">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Blog Single -->
@endsection

@push('styles')
    <style>
        .pagination {
            display: inline-flex;
        }
    </style>
@endpush
