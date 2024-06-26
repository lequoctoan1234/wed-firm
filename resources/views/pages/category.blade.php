@extends('layout')
@section('content')
<div class="row container" id="wrapper">
    <div class="halim-panel-filter">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <div class="yoast_breadcrumb hidden-xs"><span><span>Danh Mục Phim » <span class="breadcrumb_last" aria-current="page"><a href="">{{$cate_slug->title}}</a></span></span></span></div>
                </div>
            </div>
        </div>
        <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
            <div class="ajax"></div>
        </div>
    </div>
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
        <section>
            <div class="section-bar clearfix">
                <h1 class="section-title"><span>{{$cate_slug->title}}</span></h1>
            </div>
            <div class="halim_box">
                @foreach($movie as $key => $mov)
                <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                   <div class="halim-item">
                      <a class="halim-thumb" href="{{route('movie',$mov->slug)}}">
                         <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$mov->image)}}" title="{{$mov->title}}"></figure>
                         <span class="status">
                        {{$mov->quality}}
                    </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>{{$mov->sub}}</span> 
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
            <div class="clearfix"></div>
            <div class="text-center">
            {!! $movie->links("pagination::bootstrap-4") !!}
            </div>
        </section>
    </main>
    @include('pages.include.sidebar')
</div>
@endsection