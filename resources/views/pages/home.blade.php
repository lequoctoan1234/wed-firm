@extends('layout')
@section('content')
<div class="row fullwith-slider"></div>
      </div>
      <div class="container">
         <div class="row container" id="wrapper">
            <div class="halim-panel-filter">
               <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                  <div class="ajax"></div>
               </div>
            </div>
            <div id="halim_related_movies-2xx" class="wrap-slider">
               <div class="section-bar clearfix">
                  <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
               </div>
               <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                  @foreach($phimhot as $key => $hot)
                  <article class="thumb grid-item post-38498">
                     <div class="halim-item">
                        <a class="halim-thumb" href="{{route('movie',$hot->slug)}}" title="{{$hot->title}}">
                           <figure><img class="lazy img-responsive" src="{{asset('/uploads/movie/'.$hot->image)}}" alt="{{$hot->title}}"" title="{{$hot->title}}""></figure>
                           <span class="status">{{$hot->quality}}</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Hot</span> 
                           <div class="icon_overlay"></div>
                           <div class="halim-post-title-box">
                              <div class="halim-post-title ">
                                 <p class="entry-title">{{$hot->title}}"</p>
                                 <p class="original_title">{{$hot->eng}}"</p>
                              </div>
                           </div>
                        </a>
                     </div>
                  </article>
                  @endforeach
                    
               </div>
            </div>
            <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
               @foreach($category_home as $key => $cate_home)
               <section id="halim-advanced-widget-2">
                  <div class="section-heading">
                     <a href="{{route('category',$cate_home->slug)}}" title="{{$cate_home->title}}">
                     <span class="h-text">{{$cate_home->title}}</span>
                     </a>
                  </div>
                  <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                     @foreach($cate_home->movie->take(8) as $key => $mov)
                     <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                        <div class="halim-item">
                           <a class="halim-thumb" href="{{route('movie',$mov->slug)}}">
                              <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$mov->image)}}" title="{{$mov->title}}"></figure>
                              <span class="status">{{$mov->quality}}</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>{{$mov->sub}}</span> 
                              <div class="icon_overlay"></div>
                              <div class="halim-post-title-box">
                                 <div class="halim-post-title ">
                                    <p class="entry-title">{{$mov->title}}</p>
                                    <p class="original_title">{{$mov->eng}}</p>
                                 </div>
                              </div>
                           </a>
                        </div>
                     </article>
                     @endforeach
                  </div>
               </section>
               <div class="clearfix"></div>
               @endforeach
            </main>
            @include('pages.include.sidebar')
            <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
               <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
                  <div class="section-bar clearfix">
                     <div class="section-title">
                        <span>Phim Hot</span>
                     </div>
                  </div>
                  <section class="tab-content">
                     <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                        <div class="halim-ajax-popular-post hidden"></div>
                        <div class="popular-post">
                          @foreach($phimhot_sidebar as $key => $hot)
                           <div class="item post-37176">
                              <a href="{{route('movie',$hot->slug)}}" title="{{$hot->title}}">
                                 <div class="item-link">
                                    <img src="{{asset('uploads/movie/'.$hot->image)}}" class="lazy post-thumb" alt="{{$hot->title}}" title="{{$hot->title}}" />
                                    <span class="is_trailer">Hot</span>
                                 </div>
                                 <p class="title">{{$hot->title}}</p>
                              </a>
                              <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                              <div style="float: left;">
                                 <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                                 <span style="width: 0%"></span>
                                 </span>
                              </div>
                           </div>
                           @endforeach
                        </div>
                     </div>
                  </section>
               </div>
            </aside>
         </div>
@endsection