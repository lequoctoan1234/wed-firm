@extends('layouts.app')

@section('content')
<div class="container-fluid">
            <a href="{{route('movie.create')}}" class="btn btn-primary">Thêm Phim </a>
                <table class="Table" id="mytable">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        {{-- <th scope="col">Description</th> --}}
                        <th scope="col">category</th>
                        <th scope="col">country</th>
                        <th scope="col">genre</th>
                        <th scope="col">director</th>
                        <th scope="col">actor</th>
                        <th scope="col">image</th>
                        <th scope="col">Phim Hot</th>
                        <th scope="col">Name English</th>
                        <th scope="col">Trailer</th>
                        <th scope="col">SUB</th>
                        <th scope="col">Quality</th>
                        <th scope="col">Top View</th>
                        <th scope="col">Year</th>
                        <th scope="col">season</th>
                        <th scope="col">Time</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Ative</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Manage</th>
                      </tr>
                    </thead>
                    <tbody class="order_position">
                        @foreach ($list as $key => $movi)
                        <tr id="{{$movi->id}}">
                            <th scope="row">{{$key}}</th>
                            <td>{{$movi->title}}</td>
                            {{-- <td>{{$movi->description}}</td> --}}
                            <td>{{$movi->category->title}}</td>
                            <td>{{$movi->country->title}}</td>
                            <td>
                                @foreach($movi->movie_genre as $gen)
                                <span class="badge badge-dark">{{$gen->title}}</span>
                                @endforeach
                            </td>
                            <td>{{$movi->director}}</td>
                            <td>{{$movi->actor}}</td>
                            <td><img src="{{asset('uploads/movie/'.$movi->image)}}" width="50%"></td>
                            <td>
                                @if($movi->phim_hot == 0)
                                    Không
                                @else
                                    Có
                                @endif
                            </td>
                            <td>{{$movi->eng}}</td>
                            <td>{{$movi->trailer}}</td>
                            <td>{{$movi->sub}}</td>
                            <td>
                                {{$movi->quality}}
                            </td>
                            <td>
                                {!! Form::select('topview',['0'=>'Không','1'=>'Ngày','2'=>'Tuần','3'=>'Tháng'],isset($movi->topview) ? $movi->topview : '',['class'=>'select-topview','id'=>$movi->id])!!}
                            </td>
                            <td>
                                {!! Form::selectYear('year',1800,2024,isset($movi->year) ? $movi->year : '',['class'=>'select-year','id'=>$movi->id]) !!}
                            </td>
                            <td>
                                {!!form::selectRange('season',0,20,isset($movi->season) ? $movi->season : '',['class'=>'select-season','id'=>$movi->id])!!}
                            </td>
                            <td>{{$movi->time." Phút"}}</td>
                            <td>{{$movi->tags}}</td>
                            <td>
                                @if($movi->status)
                                    Hiển thị
                                @else
                                    Không hiển thị
                                @endif
                            </td>
                            <td>{{$movi->slug}}</td>
                            <td style="display: flex;">
                                {!! Form::open(['method' => 'DELETE', 'route' => ['movie.destroy',$movi->id],'onsubmit'=>'return confirm("Bạn chắc chắn muốn xóa danh mục này?")']) !!}
                                {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                <a href="{{route('movie.edit', $movi->id)}}" class="btn btn-danger" style="margin-left:5px"> Sửa</a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>    
@endsection
