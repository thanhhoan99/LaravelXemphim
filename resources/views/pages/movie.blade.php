@extends('layout')
@section('content')
<div class="row container" id="wrapper">
            <div class="halim-panel-filter">
               <div class="panel-heading">
                  <div class="row">
                     <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs">
                           <span>
                              <span>
                                 <a href="{{route('category',[$movie->category->slug])}}">{{$movie->category->title}}</a> »
                                  <span><a href="{{route('country',[$movie->country->slug])}}">{{$movie->country->title}}</a> »
                                     <span class="breadcrumb_last" aria-current="page">{{$movie->title}}
                                    </span>
                                 </span>
                              </span>
                           </span>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                  <div class="ajax"></div>
               </div>
            </div>
            <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
               <section id="content" class="test">
                  <div class="clearfix wrap-content">

                     <div class="halim-movie-wrapper">
                        <div class="title-block">
                           <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                              <div class="halim-pulse-ring"></div>
                           </div>
                           <div class="title-wrapper" style="font-weight: bold;">
                              Bookmark
                           </div>
                        </div>
                        @if(isset($episode_tapdau))
                        <div class="movie_info col-xs-12">
                           <div class="movie-poster col-md-3">
                              <a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$episode_tapdau->episode)}}" class="bwac-btn">
                                 <img class="movie-thumb" src="{{asset('uploads/movie/'.$movie->image)}}" alt="{{$movie->title}}"></a>
                             @if($movie->resolution!=5)
                              @if(isset($episode->movie))
                              <div class="bwa-content">
                                 <div class="loader"></div>

                                 <a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$episode_tapdau->episode)}}" class="bwac-btn">
                                 <i class="fa fa-play"></i>
                                 </a>
                              </div>
                              @endif
                              @else
                              <a href="#watch_trailer" style="display: block" class="btn btn-primary watch_trailer">Xem Trailer</a>
                              @endif
                           </div>
                           <div class="film-poster col-md-9">
                              <h1 class="movie-title title-1" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{$movie->title}}</h1>
                              <h2 class="movie-title title-2" style="font-size: 12px;">{{$movie->name_eng}}</h2>
                              <ul class="list-info-group">
                                 <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality">
                                     @if($movie->resolution==0)
                                    HD
                                @elseif($movie->resolution==1)
                                    SD
                                @elseif($movie->resolution==2)
                                    HDcam
                                @elseif($movie->resolution==3)
                                    Cam
                                @elseif($movie->resolution==4)
                                    Full HD
                                    @else
                                    Trailer
                                @endif
                              </span>
                              @if($movie->resolution!=5)
                                    <span class="episode">
                                       @if($movie->phude==0)
                                       Vietsub
                                       @if($movie->season !=0)
                                       -Season {{$movie->season}}
                                     @endif
                                     @else
                                       Thuyết minh
                                       @if($movie->season !=0)
                                       -Season {{$movie->season}}
                                     @endif
                                      @endif
                                    </span>
                                    @endif
                                 </li>

                                 <li class="list-info-group-item"><span>Thời lượng</span> : {{$movie->thoiluong}}</li>
                                 @if($movie->category->title == 'Phim Bộ')
                                    @if($episode_curren_list_count==$movie->sotap)
                                 <li class="list-info-group-item"><span>Số tập</span> : {{$episode_curren_list_count}}/{{$movie->sotap}}  <b>-  Hoàn Thành</b></li>
                                    @else
                                    <li class="list-info-group-item"><span>Số tập</span> : {{$episode_curren_list_count}}/{{$movie->sotap}}<b> - Đang cập nhật</b></li>
                                 @endif
                                 @endif

                                 @if($movie->season !=0)
                                 <li class="list-info-group-item"><span>Season</span> : {{$movie->season}}</li>
                                 @endif
                                 <li class="list-info-group-item"><span>Thể loại</span> :
                                    @foreach($movie->movie_genre as $gen)
                                    <a href="{{route('genre',$gen->slug)}}" rel="category tag">{{$gen->title}}</a>
                                    @endforeach
                                 </li>
                                 <li class="list-info-group-item"><span>Danh mục</span> :
                                    <a href="{{route('category',$movie->category->slug)}}" rel="category tag">{{$movie->category->title}}</a>
                                 </li>
                                 <li class="list-info-group-item"><span>Quốc gia</span> :
                                    <a href="{{route('country',$movie->country->slug)}}" rel="tag">{{$movie->country->title}}</a>
                                 </li>
                                 @if($movie->category->title == 'Phim Bộ')
                                          @if(isset($episode))
                                          <li class="list-info-group-item"><span>Tập phim mới nhất</span> :
                                             @foreach($episode as $key => $ep)
                                             <a href="{{url('xem-phim/'.$ep->movie->slug.'/tap-'.$ep->episode)}}" rel="tag">Tập {{$ep->episode}}</a>
                                             @endforeach
                                          </li>
                                          @endif
                                 @else
                                          <li class="list-info-group-item">
                                             @foreach($episode as $key => $ep)
                                          <button class="btn btn-primary"><a href="{{url('xem-phim/'.$ep->movie->slug.'/tap-'.$ep->episode)}}" rel="tag">Xem Phim</a></button>
                                             @endforeach
                                          </li>
                                 @endif
                                 <li class="list-info-group-item">
                                    <span class="total_rating">Đánh giá : {{$rating}}/{{$count_total}} lượt</span>
                                  </li>
                                  <style>
                                    .rating {
                                    margin-bottom: 10px;
                                    float: revert;
                                 }
                                  </style>
                                 <ul class="list-inline rating"  title="Average Rating">

                                    @for($count=1; $count<=5; $count++)

                                      @php

                                        if($count<=$rating){
                                          $color = 'color:#ffcc00;'; //mau vang
                                        }
                                        else {
                                          $color = 'color:#ccc;'; //mau xam
                                        }

                                      @endphp

                                      <li title="star_rating"

                                      id="{{$movie->id}}-{{$count}}"

                                      data-index="{{$count}}"
                                      data-movie_id="{{$movie->id}}"

                                      data-rating="{{$rating}}"
                                      class="rating"
                                      style="cursor:pointer; {{$color}}

                                      font-size:30px;">&#9733;</li>

                                    @endfor

                          </ul>


                              </ul>
                              <div class="movie-trailer ">
                                 @php
                                 $current =Request::url();
                                 @endphp
                                 <div class="fb-like" data-href="{{ $current}}"
                                  data-width="" data-layout="button_count" data-action="like" data-size="small"
                                   data-share="true"></div>
                              </div>
                           </div>
                        </div>

                     @else
                        <div class="movie_info col-xs-12">
                           <div class="movie-poster col-md-3">
                              <a href="{{url('xem-phim/'.$movie->slug)}}" class="bwac-btn">
                                 <img class="movie-thumb" src="{{asset('uploads/movie/'.$movie->image)}}" alt="{{$movie->title}}"></a>
                             @if($movie->resolution!=5)
                              @if(isset($episode->movie))
                              <div class="bwa-content">
                                 <div class="loader"></div>

                                 <a href="{{url('xem-phim/'.$movie->slug)}}" class="bwac-btn">
                                 <i class="fa fa-play"></i>
                                 </a>
                              </div>
                              @endif
                              @else
                              <a href="#watch_trailer" style="display: block" class="btn btn-primary watch_trailer">Xem Trailer</a>
                              @endif
                           </div>
                           <div class="film-poster col-md-9">
                              <h1 class="movie-title title-1" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{$movie->title}}</h1>
                              <h2 class="movie-title title-2" style="font-size: 12px;">{{$movie->name_eng}}</h2>
                              <ul class="list-info-group">
                                 <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality">
                                     @if($movie->resolution==0)
                                    HD
                                @elseif($movie->resolution==1)
                                    SD
                                @elseif($movie->resolution==2)
                                    HDcam
                                @elseif($movie->resolution==3)
                                    Cam
                                @elseif($movie->resolution==4)
                                    Full HD
                                    @else
                                    Trailer
                                @endif
                              </span>
                              @if($movie->resolution!=5)
                                    <span class="episode">
                                       @if($movie->phude==0)
                                       Vietsub
                                       @if($movie->season !=0)
                                       -Season {{$movie->season}}
                                     @endif
                                     @else
                                       Thuyết minh
                                       @if($movie->season !=0)
                                       -Season {{$movie->season}}
                                     @endif
                                      @endif
                                    </span>
                                    @endif
                                 </li>

                                 <li class="list-info-group-item"><span>Thời lượng</span> : {{$movie->thoiluong}}</li>
                                 {{-- @if($movie->category->title == 'Phim Bộ')
                                    @if($episode_curren_list_count==$movie->sotap)
                                 <li class="list-info-group-item"><span>Số tập</span> : {{$episode_curren_list_count}}/{{$movie->sotap}}  <b>-  Hoàn Thành</b></li>
                                    @else
                                    <li class="list-info-group-item"><span>Số tập</span> : {{$episode_curren_list_count}}/{{$movie->sotap}}<b> - Đang cập nhật</b></li>
                                 @endif
                                 @endif --}}

                                 @if($movie->season !=0)
                                 <li class="list-info-group-item"><span>Season</span> : {{$movie->season}}</li>
                                 @endif
                                 <li class="list-info-group-item"><span>Thể loại</span> :
                                    @foreach($movie->movie_genre as $gen)
                                    <a href="{{route('genre',$gen->slug)}}" rel="category tag">{{$gen->title}}</a>
                                    @endforeach
                                 </li>
                                 <li class="list-info-group-item"><span>Danh mục</span> :
                                    <a href="{{route('category',$movie->category->slug)}}" rel="category tag">{{$movie->category->title}}</a>
                                 </li>
                                 <li class="list-info-group-item"><span>Quốc gia</span> :
                                    <a href="{{route('country',$movie->country->slug)}}" rel="tag">{{$movie->country->title}}</a>
                                 </li>
                                 {{-- @if($movie->category->title == 'Phim Bộ')
                                          @if(isset($episode))
                                          <li class="list-info-group-item"><span>Tập phim mới nhất</span> :
                                             @foreach($episode as $key => $ep)
                                             <a href="{{url('xem-phim/'.$ep->movie->slug.'/tap-'.$ep->episode)}}" rel="tag">Tập {{$ep->episode}}</a>
                                             @endforeach
                                          </li>
                                          @endif
                                 @else
                                          <li class="list-info-group-item">
                                             @foreach($episode as $key => $ep)
                                          <button class="btn btn-primary"><a href="{{url('xem-phim/'.$ep->movie->slug.'/tap-'.$ep->episode)}}" rel="tag">Xem Phim</a></button>
                                             @endforeach
                                          </li>
                                 @endif --}}
                                 <li class="list-info-group-item">
                                    <span class="total_rating">Đánh giá : {{$rating}}/{{$count_total}} lượt</span>
                                  </li>
                                  <style>
                                    .rating {
                                    margin-bottom: 10px;
                                    float: revert;
                                 }
                                  </style>
                                 <ul class="list-inline rating"  title="Average Rating">

                                    @for($count=1; $count<=5; $count++)

                                      @php

                                        if($count<=$rating){
                                          $color = 'color:#ffcc00;'; //mau vang
                                        }
                                        else {
                                          $color = 'color:#ccc;'; //mau xam
                                        }

                                      @endphp

                                      <li title="star_rating"

                                      id="{{$movie->id}}-{{$count}}"

                                      data-index="{{$count}}"
                                      data-movie_id="{{$movie->id}}"

                                      data-rating="{{$rating}}"
                                      class="rating"
                                      style="cursor:pointer; {{$color}}

                                      font-size:30px;">&#9733;</li>

                                    @endfor

                          </ul>


                              </ul>
                              <div class="movie-trailer ">
                                 @php
                                 $current =Request::url();
                                 @endphp
                                 <div class="fb-like" data-href="{{ $current}}"
                                  data-width="" data-layout="button_count" data-action="like" data-size="small"
                                   data-share="true"></div>
                              </div>
                           </div>
                        </div>
                     @endif
                     </div>
                     <div class="clearfix"></div>
                     <div id="halim_trailer"></div>
                     <div class="clearfix"></div>
                     <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                     </div>
                     <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                           <article id="post-38424" class="item-content">
                              {{$movie->description}}
                           </article>
                        </div>
                     </div>
                     <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Tags Phim</span></h2>
                     </div>
                     <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                           <article id="post-38424" class="item-content">
                             @if ($movie->tags!=Null)
                             @php
                             $tags=array();
                             $tags=explode(",",$movie->tags);
                             @endphp
                             @foreach($tags as $key =>$tag)
                             <a href="{{url('tag/'.$tag)}}">{{$tag}}</a>
                             @endforeach
                             @endif
                           </article>
                        </div>
                     </div>
                     <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Bình luận</span></h2>
                     </div>

                        @php
                        $current_url =Request::url();

                        @endphp

                              <div class="movie-trailer ">
                              <div class="fb-comments" data-href="http://localhost/webphim/public/phim/biet-thu-doat-menh" data-width="" data-numposts="5"></div>
                           </div>

                     </div>
                     <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Trailer Phim</span></h2>
                     </div>
                     <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                           <article id="watch_trailer" class="item-content">
                              <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$movie->trailer}}" title="YouTube video player"
                               frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                     </div>

                  </div>
               </section>
               <section class="related-movies">
                  <div id="halim_related_movies-2xx" class="wrap-slider">
                     <div class="section-bar clearfix">
                        <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
                     </div>
                     <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                        @foreach($related as $key => $hot)
                        <article class="thumb grid-item post-38498">
                           <div class="halim-item">
                              <a class="halim-thumb" href="{{route('movie',$hot->slug)}}" title="{{$hot->title}}">
                                 <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$hot->image)}}" alt="{{$hot->title}}" title="{{$hot->title}}"></figure>
                                 <span class="status">
                                    @if($hot->resolution==0)
                                    HD
                                @elseif($hot->resolution==1)
                                    SD
                                @elseif($hot->resolution==2)
                                    HDcam
                                @elseif($hot->resolution==3)
                                    Cam
                                @elseif($hot->resolution==4)
                                    Full HD
                                @endif
                                 </span>
                                 <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                    @if($hot->phude==0)
                                    Vietsub
                                  @else
                                    Thuyết minh
                                   @endif
                                 </span>
                                 <div class="icon_overlay"></div>
                                 <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                       <p class="entry-title">{{$hot->title}}</p>
                                       <p class="original_title">{{$hot->name_eng}}</p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </article>
                        @endforeach

                     </div>
                     <script>
                        $(document).ready(function($) {
                        var owl = $('#halim_related_movies-2');
                        owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="hl-down-open rotate-left"></i>', '<i class="hl-down-open rotate-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 4}}})});
                     </script>
                  </div>
               </section>
            </main>
            <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4"></aside>
         </div>
@endsection