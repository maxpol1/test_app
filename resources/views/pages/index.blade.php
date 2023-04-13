@extends('layout')
@section('content')

    <!--main content start-->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @foreach($posts as $post)
                        <article class="post">
                            <div class="post-thumb">
                                <a href="{{ route ( 'post.show', $post->slug)}}"><img src={{ $post->getImage() }} alt=""></a>

                                <a href="{{ route ( 'post.show', $post->slug)}}" class="post-thumb-overlay text-center">
                                    <div class="text-uppercase text-center">View Post</div>
                                </a>
                            </div>
{{--                            @dd($post->category->title)--}}

                            <div class="post-content">
                                <header class="entry-header text-center text-uppercase">
                                    <h6><a href="#">{{ $post->getCategoryTitle( )}}</a></h6>

                                    <h1 class="entry-title"><a href="{{ route ( 'post.show', $post->slug)}}">{{ $post->title }}</a></h1>


                                </header>
                                <div class="entry-content">
                                    <p>{{ $post->description }}</p>

                                    <div class="btn-continue-reading text-center text-uppercase">
                                        <a href="{{ route ( 'post.show', $post->slug)}}" class="more-link">Continue Reading</a>
                                    </div>
                                </div>
                                <div class="social-share">
                                    <span class="social-share-title pull-left text-capitalize">By
                                        <a href="#">Rubel</a> On {{ $post->getDate() }}</span>
                                    <ul class="text-center pull-right">
                                        <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    @endforeach
                    {{ $posts->links() }}
{{--                    <ul class="pagination">--}}
{{--                        <li class="active"><a href="#">1</a></li>--}}
{{--                        <li><a href="#">2</a></li>--}}
{{--                        <li><a href="#">3</a></li>--}}
{{--                        <li><a href="#">4</a></li>--}}
{{--                        <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>--}}
{{--                    </ul>--}}
                </div>
                <div class="col-md-4" data-sticky_column>
                    <div class="primary-sidebar">

                        <aside class="widget news-letter">
                            <h3 class="widget-title text-uppercase text-center">Get Newsletter</h3>

                            <form action="#">
                                <input type="email" placeholder="Your email address">
                                <input type="submit" value="Subscribe Now"
                                       class="text-uppercase text-center btn btn-subscribe">
                            </form>

                        </aside>
                        <aside class="widget">
                            <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>

                            <div class="popular-post">


                                <a href="#" class="popular-img"><img src={{ asset('front/images/p1.jpg') }} alt="">

                                    <div class="p-overlay"></div>
                                </a>

                                <div class="p-content">
                                    <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                    <span class="p-date">February 15, 2016</span>

                                </div>
                            </div>
                            <div class="popular-post">

                                <a href="#" class="popular-img"><img src={{ asset('front/images/p1.jpg') }} alt="">

                                    <div class="p-overlay"></div>
                                </a>

                                <div class="p-content">
                                    <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                    <span class="p-date">February 15, 2016</span>
                                </div>
                            </div>
                            <div class="popular-post">


                                <a href="#" class="popular-img"><img src={{ asset('front/images/p1.jpg') }} alt="">

                                    <div class="p-overlay"></div>
                                </a>

                                <div class="p-content">
                                    <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                    <span class="p-date">February 15, 2016</span>
                                </div>
                            </div>
                        </aside>
                        <aside class="widget">
                            <h3 class="widget-title text-uppercase text-center">Featured Posts</h3>

                            <div id="widget-feature" class="owl-carousel">
                                <div class="item">
                                    <div class="feature-content">
                                        <img src={{ asset('front/images/p1.jpg') }} alt="">

                                        <a href="#" class="overlay-text text-center">
                                            <h5 class="text-uppercase">Home is peaceful</h5>

                                            <p>Lorem ipsum dolor sit ametsetetur sadipscing elitr, sed </p>
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="feature-content">
                                        <img src={{ asset('front/images/p2.jpg') }} alt="">

                                        <a href="#" class="overlay-text text-center">
                                            <h5 class="text-uppercase">Home is peaceful</h5>

                                            <p>Lorem ipsum dolor sit ametsetetur sadipscing elitr, sed </p>
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="feature-content">
                                        <img src={{ asset('front/images/p3.jpg') }} alt="">

                                        <a href="#" class="overlay-text text-center">
                                            <h5 class="text-uppercase">Home is peaceful</h5>

                                            <p>Lorem ipsum dolor sit ametsetetur sadipscing elitr, sed </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <aside class="widget pos-padding">
                            <h3 class="widget-title text-uppercase text-center">Recent Posts</h3>

                            <div class="thumb-latest-posts">


                                <div class="media">
                                    <div class="media-left">
                                        <a href="#" class="popular-img"><img
                                                src={{ asset('front/images/r-p.jpg') }} alt="">
                                            <div class="p-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="p-content">
                                        <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                        <span class="p-date">February 15, 2016</span>
                                    </div>
                                </div>
                            </div>
                            <div class="thumb-latest-posts">


                                <div class="media">
                                    <div class="media-left">
                                        <a href="#" class="popular-img"><img
                                                src={{ asset('front/images/r-p.jpg') }} alt="">
                                            <div class="p-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="p-content">
                                        <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                        <span class="p-date">February 15, 2016</span>
                                    </div>
                                </div>
                            </div>
                            <div class="thumb-latest-posts">


                                <div class="media">
                                    <div class="media-left">
                                        <a href="#" class="popular-img"><img
                                                src={{ asset('front/images/r-p.jpg') }} alt="">
                                            <div class="p-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="p-content">
                                        <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                        <span class="p-date">February 15, 2016</span>
                                    </div>
                                </div>
                            </div>
                            <div class="thumb-latest-posts">


                                <div class="media">
                                    <div class="media-left">
                                        <a href="#" class="popular-img"><img
                                                src={{ asset('front/images/r-p.jpg') }} alt="">
                                            <div class="p-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="p-content">
                                        <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                        <span class="p-date">February 15, 2016</span>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <aside class="widget border pos-padding">
                            <h3 class="widget-title text-uppercase text-center">Categories</h3>
                            <ul>
                                <li>
                                    <a href="#">Food & Drinks</a>
                                    <span class="post-count pull-right"> (2)</span>
                                </li>
                                <li>
                                    <a href="#">Travel</a>
                                    <span class="post-count pull-right"> (2)</span>
                                </li>
                                <li>
                                    <a href="#">Business</a>
                                    <span class="post-count pull-right"> (2)</span>
                                </li>
                                <li>
                                    <a href="#">Story</a>
                                    <span class="post-count pull-right"> (2)</span>
                                </li>
                                <li>
                                    <a href="#">DIY & Tips</a>
                                    <span class="post-count pull-right"> (2)</span>
                                </li>
                                <li>
                                    <a href="#">Lifestyle</a>
                                    <span class="post-count pull-right"> (2)</span>
                                </li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main content-->
@endsection