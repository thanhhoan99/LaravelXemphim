<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
       <div class="section-bar clearfix">
          <div class="section-title">
             <span>Phim Hot</span>

          </div>
       </div>
       <section class="tab-content">
          <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
             <div class="halim-ajax-popular-post-loading hidden"></div>
             <div id="halim-ajax-popular-post" class="popular-post">
                @foreach($phimhot_sidebar as $key =>$hot_sidebar)
                <div class="item post-37176">
                   <a href="{{route('movie',$hot_sidebar->slug)}}" title="{{$hot_sidebar->title}}">
                      <div class="item-link">
                         <img src="{{asset('uploads/movie/'.$hot_sidebar->image)}}" class="lazy post-thumb"
                          alt="{{$hot_sidebar->title}}" title="{{$hot_sidebar->title}}" />
                         <span class="is_trailer">
                            @if($hot_sidebar->resolution==0)
                            HD
                        @elseif($hot_sidebar->resolution==1)
                            SD
                        @elseif($hot_sidebar->resolution==2)
                            HDcam
                        @elseif($hot_sidebar->resolution==3)
                            Cam
                        @elseif($hot_sidebar->resolution==4)
                            Full HD
                            @else
                            Trailer
                        @endif
                         </span>
                      </div>
                      <p class="title">{{$hot_sidebar->title}}</p>
                   </a>
                   <div class="viewsCount" style="color: #9d9d9d;">
                     @if($hot_sidebar->count_view>0)
                     {{$hot_sidebar->count_view}} lượt xem
                     @else
                     @php
                      echo rand(100,99999);
                     @endphp
                      lượt xem
                     @endif
                  </div>
                   <div style="float: left;">
                      {{-- <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                      <span style="width: 0%"></span>
                      </span> --}}


                        @for($count=1; $count<=5; $count++)

                        <ul class="list-inline rating"  title="Average Rating">

                          <li title="star_rating"

                          class="rating"
                          style="cursor:pointer;

                          font-size:20px;color:#ffcc00;">&#9733;</li>
                           </ul>

                        @endfor



                   </div>
                </div>
                @endforeach


             </div>
          </div>
       </section>
       <div class="clearfix"></div>
    </div>
 </aside>
 <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
   <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
      <div class="section-bar clearfix">
         <div class="section-title">
            <span>Phim Sắp chiếu</span>

         </div>
      </div>
      <section class="tab-content">
         <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
            <div class="halim-ajax-popular-post-loading hidden"></div>
            <div id="halim-ajax-popular-post" class="popular-post">
               @foreach($phimhot_trailer as $key =>$hot_sidebar)
               <div class="item post-37176">
                  <a href="{{route('movie',$hot_sidebar->slug)}}" title="{{$hot_sidebar->title}}">
                     <div class="item-link">
                        <img src="{{asset('uploads/movie/'.$hot_sidebar->image)}}" class="lazy post-thumb"
                         alt="{{$hot_sidebar->title}}" title="{{$hot_sidebar->title}}" />
                        <span class="is_trailer">
                           @if($hot_sidebar->resolution==0)
                           HD
                       @elseif($hot_sidebar->resolution==1)
                           SD
                       @elseif($hot_sidebar->resolution==2)
                           HDcam
                       @elseif($hot_sidebar->resolution==3)
                           Cam
                       @elseif($hot_sidebar->resolution==4)
                           Full HD
                           @else
                           Trailer
                       @endif
                        </span>
                     </div>
                     <p class="title">{{$hot_sidebar->title}}</p>
                  </a>
                  <div class="viewsCount" style="color: #9d9d9d;">
                     @if($hot_sidebar->count_view>0)
                     {{$hot_sidebar->count_view}} lượt xem
                     @else
                     @php
                      echo rand(100,99999);
                     @endphp
                      lượt xem
                     @endif
                  </div>
                  <div style="float: left;">
                     @for($count=1; $count<=5; $count++)

                     <ul class="list-inline rating"  title="Average Rating">

                       <li title="star_rating"

                       class="rating"
                       style="cursor:pointer;

                       font-size:20px;color:#ffcc00;">&#9733;</li>
                        </ul>

                     @endfor

                  </div>
               </div>
               @endforeach


            </div>
         </div>
      </section>
      <div class="clearfix"></div>
   </div>
</aside>
 <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
       <div class="section-bar clearfix">
          <div class="section-title">
             <span>Top Views</span>
          </div>
       </div>
       <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item active ">
          <a class="nav-link filter-sidebar" id="pills-home-tab" role="tab" aria-controls="pills-home" aria-selected="false " data-toggle="pill" href="#ngay">Ngày</a>
        </li>
        <li class="nav-item">
          <a class="nav-link filter-sidebar" id="pills-profile-tab" role="tab" aria-controls="pills-profile" aria-selected="false " data-toggle="pill" href="#tuan">Tuần</a>
        </li>
        <li class="nav-item">
          <a class="nav-link filter-sidebar" id="pills-contact-tab" role="tab" aria-controls="pills-contact" aria-selected="false " data-toggle="pill" href="#thang">Tháng</a>
        </li>
      </ul>


      <!-- Tab panes -->
      <div class="tab-content" id="pills-tabContent">
         <div id="halim-ajax-popular-post-default" class="popular-post">
         <span id="show_data_default"></span>
         </div>
        <div class="tab-pane fade show active  " role="tabpanel" id="tuan" aria-labelledby="pills-home-tab">
          <div id="halim-ajax-popular-post" class="popular-post">
                      <span id="show_data"></span>
                </div>
        </div>
      </div>
       <div class="clearfix"></div>
    </div>
 </aside>